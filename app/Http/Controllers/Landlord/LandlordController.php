<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Friends;
use App\Models\MaintenanceRequest;
use App\Models\Rating;
use App\Models\RentedProperty;
use App\Models\RentPayment;
use App\Models\RentProperty;
use App\Models\User;
use App\Notifications\FriendNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class LandlordController extends Controller
{
    public function dashboard()
    {
        // Start Weekly Payment
        Carbon::setWeekStartsAt(Carbon::SUNDAY);
        Carbon::setWeekEndsAt(Carbon::SATURDAY);
        $landlordId = Auth::id();
        $properties = RentProperty::where('landlord_id', $landlordId)->get();
        $currentWeeklyPayments = [];
        $previousWeeklyPayments = [];
        $previousWeekStart = Carbon::now()->subWeek()->startOfWeek();
        $previousWeekEnd = Carbon::now()->subWeek()->endOfWeek();
        
        foreach ($properties as $property) {
            $rentals = RentedProperty::where('rent_id', $property->id)->get();
        
            foreach ($rentals as $rental) {
                $currentPayments = RentPayment::where('rented_id', $rental->id)
                    ->where('status', '!=', 'Unpaid')
                    ->where('created_at', '>=', Carbon::now()->startOfWeek())
                    ->get();
                $previousPayments = RentPayment::where('rented_id', $rental->id)
                    ->where('status', '!=', 'Unpaid')
                    ->whereBetween('created_at', [$previousWeekStart, $previousWeekEnd])
                    ->get();
                foreach ($currentPayments as $payment) {
                    $day = Carbon::parse($payment->created_at)->format('w');
                    $currentWeeklyPayments[$day][] = $payment->amt_paid;
                }
                foreach ($previousPayments as $payment) {
                    $day = Carbon::parse($payment->created_at)->format('w');
                    $previousWeeklyPayments[$day][] = $payment->amt_paid;
                }
            }
        }
        $currentAggregatedPayments = array_fill(0, 7, 0);
        $totalWeekPayment = 0;
        foreach ($currentWeeklyPayments as $day => $payments) {
            $currentAggregatedPayments[$day] = array_sum($payments);
            $totalWeekPayment += $currentAggregatedPayments[$day];
        }
        $previousAggregatedPayments = array_fill(0, 7, 0);
        $totalPreviousWeekPayment = 0;
        foreach ($previousWeeklyPayments as $day => $payments) {
            $previousAggregatedPayments[$day] = array_sum($payments);
            $totalPreviousWeekPayment += $previousAggregatedPayments[$day];
        }
        // End Weekly Payment

        // Active Tenants Start
        $currentMonthStart = Carbon::now()->startOfMonth();
        $currentMonthEnd = Carbon::now()->endOfMonth();
        $previousMonthStart = Carbon::now()->subMonth()->startOfMonth();
        $previousMonthEnd = Carbon::now()->subMonth()->endOfMonth();
        $currentMonthActiveTenants = User::whereHas('rentedProperties', function ($query) use ($currentMonthStart, $currentMonthEnd) {
            $query->whereBetween('created_at', [$currentMonthStart, $currentMonthEnd])
                ->whereNull('deleted_at')
                ->where('status', 'Confirmed');
        })->whereHas('rentedProperties.rentProperty.landlord', function ($query) use ($landlordId) {
            $query->where('id', $landlordId);
        })->where('roles', '1')->count();
        $previousMonthActiveTenants = User::whereHas('rentedProperties', function ($query) use ($previousMonthStart, $previousMonthEnd) {
            $query->whereBetween('created_at', [$previousMonthStart, $previousMonthEnd])
                ->whereNull('deleted_at')
                ->where('status', 'Confirmed');
        })->whereHas('rentedProperties.rentProperty.landlord', function ($query) use ($landlordId) {
            $query->where('id', $landlordId);
        })->where('roles', '1')->count();
        // Active Tenants End

        // Start Vacant Property
        $vacantProperties = RentProperty::whereNotIn('id', function ($query) {
            $query->select('rent_id')->from('rented_properties')->where(function ($query) {
                $query->whereIn('status', ['Confirmed', 'Approved']);
            });
        })->count();
        $occupiedProperties = RentProperty::whereIn('id', function ($query) {
            $query->select('rent_id')->from('rented_properties')->where(function ($query) {
                $query->whereIn('status', ['Confirmed', 'Approved']);
            });
        })->count();
        // End Vacant Property


        // Start Yearly Tenant
        $activeTenantsYearly = [];
        $currentYear = Carbon::now()->year;
        for ($month = 1; $month <= 12; $month++) {
            $startDate = Carbon::create($currentYear, $month, 1)->startOfMonth();
            $endDate = Carbon::create($currentYear, $month, 1)->endOfMonth();

            $activeTenantsCount = User::whereHas('rentedProperties', function ($query) use ($startDate, $endDate) {
                $query->whereBetween('created_at', [$startDate, $endDate])
                    ->whereNull('deleted_at')
                    ->where('status', 'Confirmed');
            })->whereHas('rentedProperties.rentProperty.landlord', function ($query) use ($landlordId) {
                $query->where('id', $landlordId);
            })->where('roles', '1')->count();

            $activeTenantsYearly[] = $activeTenantsCount;
        }
        $activeTenantsYearlyJSON = json_encode($activeTenantsYearly);

        // End Yearly Tenant


        // Start Yearly Revenue
        $currentYear = Carbon::now()->year;
        $currentYearRevenue = [];
        $previousYearRevenue = [];
        $previousPreviousYearRevenue = [];
        for ($month = 1; $month <= 12; $month++) {
            $startDate = Carbon::createFromDate($currentYear, $month, 1)->startOfMonth();
            $endDate = Carbon::createFromDate($currentYear, $month, 1)->endOfMonth();
            $previousStartDate = Carbon::createFromDate($currentYear-1, $month, 1)->startOfMonth();
            $previousEndDate = Carbon::createFromDate($currentYear - 1, $month, 1)->endOfMonth();
            $previousPreviousStartDate = Carbon::createFromDate($currentYear-2, $month, 1)->startOfMonth();
            $previousPreviousEndDate = Carbon::createFromDate($currentYear-2, $month, 1)->endOfMonth();
            $currentYearRevenue[] = RentPayment::whereHas('rentedProperty.rentProperty', function ($query) use ($landlordId) {
                $query->where('landlord_id', $landlordId);
            })
            ->where('status', '!=', 'Unpaid')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->sum('amt_paid');
            $previousYearRevenue[] = RentPayment::whereHas('rentedProperty.rentProperty', function ($query) use ($landlordId) {
                $query->where('landlord_id', $landlordId);
            })
            ->where('status', '!=', 'Unpaid')
            ->whereBetween('created_at', [$previousStartDate, $previousEndDate])
            ->sum('amt_paid');
            $previousPreviousYearRevenue[] = RentPayment::whereHas('rentedProperty.rentProperty', function ($query) use ($landlordId) {
                $query->where('landlord_id', $landlordId);
            })
            ->where('status', '!=', 'Unpaid')
            ->whereBetween('created_at', [$previousPreviousStartDate, $previousPreviousEndDate])
            ->sum('amt_paid');
        }
        $currentYearRevenueJSON = json_encode($currentYearRevenue);
        $previousYearRevenueJSON = json_encode($previousYearRevenue);
        $previousPreviousYearRevenueJSON = json_encode($previousPreviousYearRevenue);
        // End Revenue Comparison

        // Start Maintenance Request
        $maintenanceRequests = MaintenanceRequest::whereHas('rentedProperty', function ($query) use ($landlordId) {
            $query->whereHas('rentProperty', function ($query) use ($landlordId) {
                $query->where('landlord_id', $landlordId);
            });
        })->get();
        $monthlyData = [];
        foreach ($maintenanceRequests as $request) {
            $month = date('n', strtotime($request->date));
            $monthlyData[$month] = isset($monthlyData[$month]) ? $monthlyData[$month] + 1 : 1;
        }
        // End Maintenance Request

        // Start Active Tenant
        $activeTenants = User::whereHas('rentedProperties', function ($query) {
            $query->whereNull('deleted_at')
                ->where('status', 'Confirmed');
        })->whereHas('rentedProperties.rentProperty.landlord', function ($query) use ($landlordId) {
            $query->where('id', $landlordId); 
        })->where('roles', '1')->take(4)->get();
        // End Active Tenant

        $data = [
            'weeklyPayments' => $currentAggregatedPayments,
            'totalWeekPayment' => $totalWeekPayment,
            'totalPreviousWeekPayment' => $totalPreviousWeekPayment,
            'currentMonthActiveTenants' => $currentMonthActiveTenants,
            'previousMonthActiveTenants' => $previousMonthActiveTenants,
            'vacantProperties' => $vacantProperties,
            'occupiedProperties' => $occupiedProperties,
            'YearlyTenant' => $activeTenantsYearlyJSON,
            'currentYearRevenue' => $currentYearRevenueJSON,
            'currentYear' => $currentYear,
            'previousYearRevenue' => $previousYearRevenueJSON,
            'previousYear' => $currentYear - 1,
            'previousPreviousYearRevenue' => $previousPreviousYearRevenueJSON,
            'previousPreviousYear' => $currentYear - 2,
            'monthlyData' => $monthlyData,
            'tenants' => $activeTenants,
        ];
        // return $data;
        return view('Landlords.index', $data);
    }
    public function getFloors(Request $request, string $id)
    {
        $building = Building::findOrFail($id);
        return response()->json(['numberOfFloors' => $building->no_of_floors]);
    }
    public function profile()
    {
        $data = ['user' => User::findOrFail(Auth::id()),];
        return view('Landlords.edit-profile', $data);
    }
    public function Contact()
    {
        return view('Landlords.Contact.add');
    }
    public function addFriends()
    {
        return view('Landlords.Friends.add');
    }
    public function view()
    {
        return view('Landlords.Friends.view');
    }
    public function seeFriends(Request $request)
    {
        $tenant = User::findOrFail($request->tenantID);
        return view('Landlords.Profile.index', compact('tenant'));
    }
    public function unfriend(Request $request)
    {
        $tenantId = $request->tenantID;
        $authId = Auth::id();
        $tenant = User::findOrFail($tenantId);
        $friendship = Friends::where(function ($query) use ($authId, $tenantId) {
            $query->where('user_id', $authId)->where('sent_id', $tenantId)
                ->orWhere('user_id', $tenantId)->where('sent_id', $authId);
        })
        ->where('type', 'Accepted')
        ->first();
        if($friendship)
        {
            $friendship->delete();
        }
        return view('Landlords.Profile.index', compact('tenant'));
    }
    public function addingFriend(Request $request)
    {
        $friendId = $request->tenantID; 
        $authId = Auth::id();
        $friendship = Friends::where(function ($query) use ($authId, $friendId) {
            $query->where('user_id', $authId)->where('sent_id', $friendId)
                ->orWhere('user_id', $friendId)->where('sent_id', $authId);
        })
        ->where('type', 'New')
        ->first();
        if(!$friendship){
            Friends::create([
                'user_id' => auth()->id(),
                'sent_id' => $friendId,
                'type' => 'New'
            ]);
            $friend = User::find($friendId);
            if ($friend) {
                $friend->notify(new FriendNotification([
                    'friendMessage' => "New Friend Request from ". auth()->user()->first_name . " " . auth()->user()->last_name  . ".",
                ]));
            }
        }
        $friend = User::find($friendId);
        $tenant = $friend;
        return view('Landlords.Profile.index', compact('tenant'));
    }
    public function getRating()
    {
        $data = [
            'rates' => Rating::whereHas('rentProperty', function ($query) {
                $query->where('landlord_id', Auth::id());
            })->orderBy('rate', 'desc')->get()
        ];
        return view('Landlords.Rating.index', $data);
    }
    public function deleteRating(string $id)
    {
        $rate = Rating::find($id);
        $rate->delete();
        Alert::success('User Rate Deleted Successfully');
        return redirect()->route('landlord.rating.index'); 
    }
}
