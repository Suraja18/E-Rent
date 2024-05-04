<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Company;
use App\Models\Contact;
use App\Models\MaintenanceRequest;
use App\Models\RentedProperty;
use App\Models\User;
use App\Models\webReview;
use App\Notifications\AccountDeactivationNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Start Feedback Count
        Carbon::setWeekStartsAt(Carbon::SUNDAY);
        Carbon::setWeekEndsAt(Carbon::SATURDAY);
        $currentWeekStart = Carbon::now()->startOfWeek();
        $currentWeekEnd = Carbon::now()->endOfWeek();
        $previousWeekStart = Carbon::now()->subWeek()->startOfWeek();
        $previousWeekEnd = Carbon::now()->subWeek()->endOfWeek();
        $currentWeekFeedbacks = Contact::where('created_at', '>=', $currentWeekStart)
                                        ->where('created_at', '<=', $currentWeekEnd)
                                        ->get();
        $previousWeekFeedbacks = Contact::whereBetween('created_at', [$previousWeekStart, $previousWeekEnd])
                                        ->get();
        $currentWeeklyFeedback = $this->aggregateFeedbackByDay($currentWeekFeedbacks);
        $previousWeeklyFeedback = $this->aggregateFeedbackByDay($previousWeekFeedbacks);
        $totalCurrentWeekFeedback = array_sum($currentWeeklyFeedback);
        $totalPreviousWeekFeedback = array_sum($previousWeeklyFeedback);
         // End Feedback Count
        //  Start Monthly User Registration Count
        $users = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                ->groupBy('month')
                ->orderBy('month')
                ->get();

        $monthlyData = [];
        foreach ($users as $user) {
            $monthlyData[$user->month] = $user->count;
        }
        //  End Monthly User Registration Count
        //  Start Monthly Rental Tenants Count
        $confirmedRentals = RentedProperty::where('status', 'Confirmed')
            ->selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();
        $monthlyConfirmedRentals = [];
        foreach ($confirmedRentals as $rental) {
            $monthlyConfirmedRentals[$rental->month] = $rental->count;
        }
        $currentMonthKey = date('Y-m');
        $previousMonthKey = date('Y-m', strtotime('-1 month'));

        $totalRentalsThisMonth = $monthlyConfirmedRentals[$currentMonthKey] ?? 0;
        $totalRentalsPreviousMonth = $monthlyConfirmedRentals[$previousMonthKey] ?? 0;
        //  End Monthly Rental Tenants Count
        // Start Showing Maintenance Request
        $currentMonthStart = Carbon::now()->startOfMonth();
        $currentMonthEnd = Carbon::now()->endOfMonth();
        $previousMonthStart = Carbon::now()->subMonth()->startOfMonth();
        $previousMonthEnd = Carbon::now()->subMonth()->endOfMonth();
        $currentMonthRequests = MaintenanceRequest::whereBetween('created_at', [$currentMonthStart, $currentMonthEnd])->count();
        $previousMonthRequests = MaintenanceRequest::whereBetween('created_at', [$previousMonthStart, $previousMonthEnd])->count();
        // End Showing Maintenance Request
        // Start Roles Distribution
        $yearStart = Carbon::now()->startOfYear();
        $yearEnd = Carbon::now()->endOfYear();
    
        $roleDistribution = User::select(DB::raw('MONTH(created_at) as month'), DB::raw('count(*) as total'), 'roles')
                                ->whereBetween('created_at', [$yearStart, $yearEnd])
                                ->whereIn('roles', [1, 2])
                                ->groupBy('month', 'roles')
                                ->orderBy('month')
                                ->get();
    
        $monthlyRoleData = [
            'tenant' => array_fill(1, 12, 0),
            'landlord' => array_fill(1, 12, 0) 
        ];
    
        foreach ($roleDistribution as $data) {
            if ($data->roles == 1) { 
                $monthlyRoleData['tenant'][$data->month] = $data->total;
            } elseif ($data->roles == 2) { 
                $monthlyRoleData['landlord'][$data->month] = $data->total;
            }
        }
        // End Roles Distribution
        // Start Rating Comparison
        $monthlyRatings = webReview::select(
                DB::raw('MONTH(created_at) as month'), 
                DB::raw('AVG(rate) as average_rate')
            )
            ->whereBetween('created_at', [$yearStart, $yearEnd])
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $monthlyRateData = array_fill(1, 12, 0);

        foreach ($monthlyRatings as $rating) {
            $monthlyRateData[$rating->month] = round($rating->average_rate, 2);
        }
        //  End Rating Comparison
        $data = [
            'currentWeeklyFeedback' => $currentWeeklyFeedback,
            'previousWeeklyFeedback' => $previousWeeklyFeedback,
            'totalCurrentWeekFeedback' => $totalCurrentWeekFeedback,
            'totalPreviousWeekFeedback' => $totalPreviousWeekFeedback,
            'monthlyData' => $monthlyData,
            'monthlyConfirmedRentals' => $monthlyConfirmedRentals,
            'totalRentalsThisMonth' => $totalRentalsThisMonth,
            'totalRentalsPreviousMonth' => $totalRentalsPreviousMonth,
            'currentMonthRequests' => $currentMonthRequests,
            'previousMonthRequests' => $previousMonthRequests,
            'monthlyRoleData' => $monthlyRoleData,
            'monthlyRatings' => $monthlyRateData
        ];
        return view('Admin.index', $data);
    }
    private function aggregateFeedbackByDay($feedbacks)
    {
        $weeklyFeedback = array_fill(0, 7, 0);
        foreach ($feedbacks as $feedback) {
            $dayOfWeek = Carbon::parse($feedback->created_at)->dayOfWeek;
            $weeklyFeedback[$dayOfWeek]++;
        }
        return $weeklyFeedback;
    }
    public function profile()
    {
        $data = ['user' => User::findOrFail(Auth::id()),];
        return view('Admin.edit-profile', $data);
    }
    public function banners()
    {
        $banner = Banner::first();
        return view('Admin.Banner.index', compact('banner'));
    }
    public function bannerStore(Request $request)
    {
        $validate = $request->validate([
            'user_heading' => 'required|string|min:3|max:100',
            'user_description' => 'required|string|min:3|max:250',
            'tenant_heading' => 'required|string|min:3|max:100',
            'tenant_description' => 'required|string|min:3|max:250',
            'image_1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_3' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($validate)
        {
            $banner = Banner::first();
            $banner->user_head = $request->user_heading;
            $banner->user_desc = $request->user_description;
            $banner->tenant_head = $request->tenant_heading;
            $banner->tenant_desc = $request->tenant_description;
            $image1 = $request->image_1;
            $image2 = $request->image_2;
            $image3 = $request->image_3;
            $image4 = $request->image_4;
            if ($image1) {
                File::delete($banner->image1);
                $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image1->getClientOriginalExtension();
                $image1->move('Images/Variable/Banner', $imageName);
                $banner->image1 = "Images/Variable/Banner/" . $imageName;
            }
            if ($image2) {
                File::delete($banner->image2);
                $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image2->getClientOriginalExtension();
                $image2->move('Images/Variable/Banner', $imageName);
                $banner->image2 = "Images/Variable/Banner/" . $imageName;
            }
            if ($image3) {
                File::delete($banner->image3);
                $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image3->getClientOriginalExtension();
                $image3->move('Images/Variable/Banner', $imageName);
                $banner->image3 = "Images/Variable/Banner/" . $imageName;
            }
            if ($image4) {
                File::delete($banner->image4);
                $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image4->getClientOriginalExtension();
                $image4->move('Images/Variable/Banner', $imageName);
                $banner->image4 = "Images/Variable/Banner/" . $imageName;
            }
            $banner->update();
            Alert::success('Banner Successfully updated');
            return redirect()->route('admin.banners');
        }

    }
    public function company()
    {
        $data = ['company' => Company::first(),];
        return view('Admin.Company.index', $data);
    }
    public function companyStore(Request $request)
    {
        $validate = $request->validate([
            'address'             => 'required|string|max:255',
            'email'               => 'required|email|max:255',
            'phone_number'        => 'required|numeric|digits_between:9,10',
            'logo'                => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'google_map'          => 'required|url|max:2048',
            'linkedin'            => 'required|url|max:2048',
            'facebook'            => 'required|url|max:2048',
            'instagram'           => 'required|url|max:2048',
            'twitter'             => 'required|url|max:2048',
            'contact_description' => 'required|string|min:25|max:250',
        ]);
        if($validate)
        {
            $company = Company::first();
            $company->address = $request->address;
            $company->email = $request->email;
            $company->phone_number = $request->phone_number;
            $image1 = $request->logo;
            if ($image1) {
                File::delete($company->logo);
                $imageName = Str::uuid()->toString() . '-' . time() . '.' . $image1->getClientOriginalExtension();
                $image1->move('Images/Variable/Company', $imageName);
                $company->logo = "Images/Variable/Company/" . $imageName;
            }
            $company->google_map = $request->google_map;
            $company->linkedin = $request->linkedin;
            $company->facebook = $request->facebook;
            $company->instagram = $request->instagram;
            $company->twitter = $request->twitter;
            $company->contact_description = $request->contact_description;
            $company->save();
            Alert::success('Company Details Updated Successfully');
            return redirect()->route('admin.company'); 
        }
       
    }
    public function getRating()
    {
        $data = ['rates' => webReview::orderBy('rate', 'desc')->get()];
        return view('Admin.Rating.index', $data);
    }
    public function deleteRating(string $id)
    {
        $rate = webReview::find($id);
        $rate->delete();
        Alert::success('User Rate Deleted Successfully');
        return redirect()->route('admin.rating.index'); 
    }
    public function Contact()
    {
        $data = [
            'contacts' => Contact::orderBy('read')
                                 ->latest()
                                 ->get(),
        ];
        return view('Admin.Contact.index', $data);
    }
    public function updateReadStatus(Request $request)
    {
        $contact = Contact::find($request->id);
        if ($contact) {
            $contact->read = $request->read;
            $message = "Contact Marked as Read!";
            if($request->read == "0"){
                $message = "Contact Marked as Unread!";
            }
            $contact->save();
            return response()->json(['message' => $message]);
        }
        return response()->json(['message' => 'Contact not found'], 404);
    }
    public function deleteContact(string $id)
    {
        $rate = Contact::find($id);
        $rate->delete();
        Alert::success('User Contact Deleted Successfully');
        return redirect()->route('admin.contact');    
    }
    public function contactView(string $email)
    {
        $contact = Contact::where('email', $email)->first();
        $data = ['contact' => $contact, 'type' => 'readonly'];
        return view('Admin.Contact.view', $data);
    }
    public function AllTenants()
    {
        $data = ['users' => User::where('roles', 1)->latest()->get(),];
        return view('Admin.Users.Tenants.index', $data);
    }
    public function AllLandlords()
    {
        $data = ['users' => User::where('roles', 2)->latest()->get(),];
        return view('Admin.Users.Landlords.index', $data);
    }
    public function destroyUser(string $id)
    {
        $user = User::findOrFail($id);
        if($user->roles == 1)
        {
            $user->delete(); 
            $user->notify(new AccountDeactivationNotification());
            Alert::success('The User account is deactivated temporary.', 'The account will permanently deleted after 30 days.');
            return redirect()->route('admin.all_tenants');
        }
        if($user->roles == 2)
        {
            $user->delete();
            $user->notify(new AccountDeactivationNotification());
            Alert::success('The User account is deactivated temporary.', 'The account will permanently deleted after 30 days.');
            return redirect()->route('admin.all_landlords');
        }
        return redirect()->back();
    }
}
