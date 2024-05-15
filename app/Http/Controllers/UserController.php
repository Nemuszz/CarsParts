<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:6',
        ]);

       $credentials = $request->only('email', 'password');
       if (Auth::attempt($credentials)) {
           return redirect()->intended('/');
       }
       return redirect("login")->with('error', 'Invalid Email or Password');



    }
    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required|string|min:5|max:20',
            'email' => 'required|string|email',
            'password' => 'required|string|min:6',
            'confirm_password' => 'required|string|min:6|same:password',

        ]);
             $user = User::create([
                'name'=> $request->name,
                'email'=> $request->email,
                'password'=> Hash::make($request->password),
            ]);
             if (!$user){
                 return Redirect::to('/login')->with('error','Register details are not valid');
             }


        return Redirect::to('/login');

    }
    public function logout(){
        Session::flush();
        Auth::logout();
        return Redirect::to('/login');
    }

    public function profile(){
        return view('Pages/Profile');
    }



}
