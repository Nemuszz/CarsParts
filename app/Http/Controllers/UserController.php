<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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

    public function profile($id){
        $user = User::findOrFail($id);

        return view('Pages/Profile', ['user' => $user]);
    }
    public function edit(Request $request, $id){

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'country' => 'string|max:255|nullable',
            'city' => 'string|max:255|nullable',
            'address' => 'string|max:255|nullable',
            'phone' => 'integer|nullable',
            'postcode' => 'integer|nullable',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::findOrFail($id);

        $user->update($request->all());

        return redirect()->route('user.profile', $user->id)->with('success', 'Profile updated successfully');
    }


}