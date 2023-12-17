<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Jobs\NewUserJob;
use Illuminate\Http\Request;
use App\Mail\UserCreatedMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;



class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function registerPost(Request $request)
    {
        $user = new User();

        $this->validate($request, [
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3|max:255',
        ]);
 
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        // $user->phone = $request->email;
        // $user->address = $request->address;
 
        $user->save();

        

        NewUserJob::dispatch();

        
 
        return back()->with('success', 'Register successfully');
    }

    public function login()
    {
        return view('login');
    }

    public function loginPost(Request $request)
    {
        $credetials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
 
        if (Auth::attempt($credetials)) {
            return redirect()->route('dashboard')->with('success', 'Login Success');
        }
 
        return back()->with('error', 'Error Email or Password');
    }
 
    public function logout()
    {
        Session::flush();
        
        Auth::logout();
 
        return redirect()->route('login');
    }
}
