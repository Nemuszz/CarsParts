<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCarRequest;
use App\Models\CarsModel;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CarController extends Controller
{

    public function index()
    {
        $cars = CarsModel::where(['checked_out'=> 'checked'])->get();
        $year = 2024;
        $images = [];

        foreach ($cars as $car) {
            $image = Image::where('car_id', $car->id)->first();
            if ($image) {
                $images[$car->id] = $image;
            }
        }

        return view('Guest/allCars', compact('cars', 'year','images'));

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


        foreach ($cars as $car) {

            $user = User::find($car->user_car_id);

            if ($user) {
                $userCities[$car->id] = $user->city;
            } else {

                $userCities[$car->id] = 'Unknown';
            }
        }
        $images = [];

        foreach ($cars as $car) {
            $image = Image::where('car_id', $car->id)->first();
            if ($image) {
                $images[$car->id] = $image;
            }
        }
        return view('Guest/searchCars', compact('cars', 'request','userCities','images'));
    }


    public function add()
    {
        $year = 2024;

        return view('Pages/Cars',compact('year'));
    }

    public function insert(AddCarRequest $request){
        $user = Auth::user();

        if(empty($user->country) || empty($user->city) || empty($user->postcode) || empty($user->address)){
            return redirect()->route('user.profile', ['id' => $user->id])->withErrors('Fill all informations about you');
        }
        else {

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
    }

    public function yours($id)
    {
        $user = User::findOrFail($id);
        $cars = CarsModel::where('user_car_id', $user->id)->get();
        $images = [];

        foreach ($cars as $car) {
            $image = Image::where('car_id', $car->id)->first();
            if ($image) {
                $images[$car->id] = $image; // Store the first image in an array with car ID as key
            }
        }

        return view('Pages/your', compact('user', 'cars', 'images'));
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
