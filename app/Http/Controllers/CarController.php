<?php

namespace App\Http\Controllers;

use App\Models\CarsModel;
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
}
