<?php

namespace App\Http\Controllers;

use App\Models\Notifications;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use App\Models\UserProfile;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //load a registration form

    public function loadRegisterForm(){
        return view("register");
    }

    public function registerUser(Request $request){
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:8|confirmed',
        ]);
        
        try {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make( $request->password );
            $user->save();

            $user_profile = new UserProfile;
            $user_profile->user_id = $user->id;
            $user_profile->save();

            return redirect('/registration/form')->with('success','You Have been Registered Successfully!');
        } catch (\Exception $e) {
            return redirect('/registration/form')->with('error',$e->getMessage());
            
        }
    }


    // load a login form
    public function loadLoginPage(){
        return view('login-page');
    }

    // perform login
    public function LoginUser(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:6|max:8',
        ]);
        
        try {
            
            $userCredentials = $request->only('email','password');

            if(Auth::attempt($userCredentials)){
                
                $user = Auth::user();

                if ($user->role == 0) {  
                    $notifications = Notifications::where('user_id', $user->id)
                    ->where('is_read', false)
                    ->latest()
                    ->get();

                // Pass notifications to the user home page
                return redirect('/user/home')->with(['notifications' => $notifications]);
                    
                } elseif ($user->role == 1) {  
                    return redirect('/admin/home');
                } else {
                    return redirect('/login/form')->with('error', 'Error finding your role');
                }
                
            }else{
                return redirect('/login/form')->with('error','Wrong User Credentials');
            }
        } catch (\Exception $e) {
            return redirect('/login/form')->with('error',$e->getMessage());
        }
    }
    
    public function LogoutUser(Request $request){
        Session::flush();
        Auth::logout();
        return redirect('/login/form');
    }
    
    public function forgotPassword(){
        return view('forgot-password');
    }

    // perform email sending logic
    public function forgot(Request $request){
        // validate here
        $request->validate([
            'email' => 'required'
        ]);
        // check if email exist
        $user = User::where('email',$request->email)->get();

        foreach ($user as $value) {
            # code...
        }

        if(count($user) > 0){
            $token = Str::random(40);
            $domain = URL::to('/');
            $url = $domain.'/reset/password?token='.$token;

            $data['url'] = $url;
            $data['email'] = $request->email;
            $data['title'] = 'Password Reset';
            $data['body'] = 'Please click the link below to reset your password';

            Mail::send('forgotPasswordMail',['data' => $data], function($message) use ($data){
                $message->to($data['email'])->subject($data['title']);
            });

            
            $passwordReset = new PasswordReset;
            $passwordReset->email = $request->email;
            $passwordReset->token = $token;
            $passwordReset->user_id = $value->id;
            $passwordReset->save();

            return back()->with('success','please check your mail inbox to reset your password');
        }else{
            return redirect('/forgot/password')->with('error','email does not exist!');
        }
    
    }

    public function loadResetPassword(Request $request){
        $resetData = PasswordReset::where('token',$request->token)->get();
        if(isset($request->token) && count($resetData) > 0){
            $user = User::where('id',$resetData[0]['user_id'])->get();
            foreach ($user as $user_data) {
                # code...
            }
            return view('reset-password',compact('user_data'));
        }else{
            return view('404');
        }
    }

    // perform password reset logic
    public function ResetPassword(Request $request){
        $request->validate([
            'password' => 'required|min:6|max:8|confirmed'
        ]);
        try {
            $user = User::find($request->user_id);
            $user->password = Hash::make($request->password);
            $user->save();

            // delete reset token
            PasswordReset::where('email',$request->user_email)->delete();

            return redirect('/login/form')->with('success','Password Changed Successfully');
        } catch (\Exception $e) {
            return back()->with('error',$e->getMessage());
        }
    }

    public function load404(){
        return view('404');
    }

}
