<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:6',
        ]);
        dd($request->all());
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:6|max:22',
            'email' => 'required|string|email',
            'password' => 'required|string|confirmed|min:6',
            'password_confirmation' => 'required|string|min:6',

        ]);
    }
}
