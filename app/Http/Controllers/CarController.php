<?php

namespace App\Http\Controllers;

use App\Models\CarsModel;
use Illuminate\Http\Request;

class CarController extends Controller
{


    public function add()
    {

        return view('Pages/Cars');

    }

    public function carsImageAdd(Request $request, CarsModel $car)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed
        ]);

        $path = $request->file('image')->store('car_images');

        // Associate the image with the car
        $car->images()->create([
            'path' => $path,
        ]);

        return redirect()->back()->with('success', 'Image uploaded successfully.');

    }
}
