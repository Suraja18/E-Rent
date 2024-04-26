<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class EmailController extends Controller
{
    public function sendEmailByID(string $id)
    {
        $tenant = User::findorFail($id);
        return view('Landlords.Email.index', compact('tenant'));
    }
    public function sendEmailByEmail(string $email)
    {
        $tenant = User::where('email', $email)->first();
        return view('Admin.Email.index', compact('tenant'));
    }
    public function sendEmail()
    {
        $user = User::find(Auth::id());
        if($user->roles == 3)
        {
            return view('Admin.Email.index');
        }elseif($user->roles == 2){
            return view('Landlords.Email.index');
        }
    }
    public function successEmail(Request $request){
        $validate = $request->validate([ 
            'email' => 'required|string|email',
            'subject' => 'required|string|min:3|max:100',
            'description' => 'required|string|min:15|max:50000',
        ]);
        if($validate){
            $user = User::find(Auth::id());
            $data = ['body'=>$request->description];
            $user['to'] = $request->email;
            $subject = $request->subject;
            Mail::send('Users.Email.mail', $data, function($messages) use ($user, $subject){
                $messages->to($user['to']);
                $messages->subject($subject);
            });
            Alert::success('Email has been sent!');
            if($user->roles == 3)
            {
                return redirect()->route('admin.email.send');
            }elseif($user->roles==2){
                return redirect()->route('landlord.email.send');
            }
           
        }
    }
}
