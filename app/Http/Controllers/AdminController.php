<?php

namespace App\Http\Controllers;

use App\Models\CarsModel;
use App\Models\ContactUsModel;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminHome(){
        $cars = CarsModel::where(['checked_out' => 'unchecked'])->get();

        $userCities = [];

        // Loop through each car to fetch the city of the corresponding user
        foreach ($cars as $car) {
            // Retrieve the user associated with the car
            $user = User::find($car->user_car_id);

            // If user found, get the city and store it in the array
            if ($user) {
                $userCities[$car->id] = $user->city;
            } else {
                // If user not found, store a placeholder value
                $userCities[$car->id] = 'Unknown';
            }
        }





        return view('Admin/adminHome', compact('cars', 'userCities') );

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
        $images = Image::where(['car_id' => $car->id])->get();



        return view('Admin/adminPermalink', compact( 'car','user','images'));

    }
    public function adminDelete($car)
    {


        $singleCar = CarsModel::where(['id' => $car])->first();
        $singleCar->delete();




        return redirect(route('admin.page'))->with('success', 'Car deleted successfully!');

    }
    public function adminCheck($car)
    {


        $singleCar = CarsModel::where(['id' => $car])->first();
        $singleCar->checked_out = 'checked';
        $singleCar->save();




        return redirect(route('admin.page'))->with('success', 'Car checked successfully!');

    }
    public function adminMessages()
    {
        $number = 0;
        $messages = ContactUsModel::all();

        return view('Admin/adminMessages',compact('messages','number') );
    }
}
