<?php

namespace App\Http\Controllers;

use App\Models\CarsModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{


    public function add()
    {
        $year = 2024;


        return view('Pages/Cars',compact('year'));

    }

    public function insert(Request $request){
        $validator = Validator::make($request->all(), [
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'integer',
            'mileage' => 'integer',
            'price' => 'integer',
            'body_type' => 'string',
            'fuel_type' => 'string',
            'power' => 'integer',
            'gear' => 'string',
            'number_of_doors' => 'integer',
            'description' => 'string',
            'user_car_id' => 'integer',
            'image' => 'image|mimetypes:image/jpeg,image/png,image/jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        CarsModel::create($request->all());

        return redirect()->route('user.profile',['id' => auth()->user()->id])->with('success', 'Car added successfully!');
    }


    public function yours($id)
    {
        $user = User::findOrFail($id);

        $cars = CarsModel::where(['user_car_id' => $user->id])->get();


        return view('Pages/your', compact('user', 'cars'));

    }
    public function permalink($car)
    {

        $car = CarsModel::where(['id' => $car])->first();
        $user = User::where(['id' => $car->user_car_id])->first();



        return view('Pages/permalink', compact( 'car','user'));

    }
}
