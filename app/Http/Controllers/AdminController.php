<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminHome(){
        $users = User::all();
        return view('Admin/adminHome',compact('users') );

    }
    public function adminUsers()
    {


        $adminUsers = User::where(['role'=>'admin'])->get();
        $justUsers = User::where(['role'=>'user'])->get();


        return view('Admin/adminUsers',compact('adminUsers','justUsers'));
    }
}
