<?php

namespace App\Http\Controllers;

use App\Models\CarsModel;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{

    public function index()
    {
        $cars = CarsModel::where(['checked_out'=> 'checked'])->get();
        $year = 2024;


        return view('Guest/allCars', compact('cars', 'year'));

    }
    public function search(Request $request)
    {



        $query = CarsModel::where('checked_out', 'checked');
        if ($request->filled('year')) {
            $query->where('year', $request->year);
        }

        if ($request->filled('make')) {
            $query->where('make', $request->make);
        }
        if ($request->filled('model')) {
            $query->where('model', $request->model);
        }
        if ($request->filled('mileage')) {
            $query->where('mileage','<', $request->mileage);
        }
        if ($request->filled('price')) {
            $query->where('price','<', $request->price);
        }



        $cars = $query->get();

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

        return view('Guest/searchCars', compact('cars', 'request','userCities'));

    }


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
            'images' => 'required|array|min:1',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $carData = $request->except('images');
        $car = CarsModel::create($carData);

        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $imageModel = new Image();
                $imageModel->path = $imageName;
                $imageModel->car_id = $car->id;
                $imageModel->save();
            }
        }

        return redirect()->route('user.profile', ['id' => auth()->user()->id])->with('success', 'Car added successfully!');
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
        $images = Image::where(['car_id' => $car->id])->get();



        return view('Pages/permalink', compact( 'car','user', 'images'));

    }
    public function delete($car)
    {


        $singleCar = CarsModel::where(['id' => $car])->first();
        $singleCar->delete();




        return redirect()->back()->with('success', 'Car deleted successfully!');

    }
    public function changeCar($car)
    {


        $car = CarsModel::where(['id' => $car])->first();
        $user = User::where(['id' => $car->user_car_id])->first();

        $year = 2024;

        return view('Pages/changeCar', compact( 'car','user', 'year'));





    }
    public function update(Request $request, $car)
    {


        $singleCar = CarsModel::where(['id' => $car])->first();
        $singleCar->update($request->all());




        return redirect()->back()->with('success', 'Car updated successfully!');

    }


}
