<?php

namespace App\Http\Controllers;

use App\Models\CarsModel;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminHome(){
        $cars = CarsModel::where(['checked_out' => 'unchecked'])->get();

        return view('Admin/adminHome', compact('cars') );

    }
    public function adminUsers()
    {


        $adminUsers = User::where(['role'=>'admin'])->get();
        $justUsers = User::where(['role'=>'user'])->get();


        return view('Admin/adminUsers',compact('adminUsers','justUsers'));
    }
    public function adminPermalink($car)
    {

        $car = CarsModel::where(['id' => $car])->first();
        $user = User::where(['id' => $car->user_car_id])->first();



        return view('Admin/adminPermalink', compact( 'car','user'));

    }
}
