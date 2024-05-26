<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCarRequest;
use App\Models\Image;
use App\Models\User;
use App\Repositories\CarsRepository;
use App\Repositories\ImagesRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CarController extends Controller
{    private $carModel;
    private $userModel;
    private $imageModel;
    public function __construct()
    {
        $this->carModel = new CarsRepository();
        $this->userModel = new UserRepository();
        $this->imageModel = new ImagesRepository();
    }


    public function index()
    {
        $cars = $this->carModel->checkOutCarsAll();
        $year = 2024;
        $images = [];

        foreach ($cars as $car) {
            $image = $this->imageModel->imageCar($car);
            if ($image) {
                $images[$car->id] = $image;
            }
        }

        return view('Guest/allCars', compact('cars', 'year','images'));

    }
    public function search(Request $request)
    {

        $query = $this->carModel->checkOutCar();
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
            $image = $this->imageModel->imageCar($car);
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
            $car = $this->carModel->carCreate($carData);

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
            return redirect()->route('user.profile', ['id' => $user->id])->with('success', 'Car added successfully!');
        }
    }

    public function yours($id)
    {
        $user = $this->userModel->userFind($id);
        $cars = $this->carModel->userCars($user);
        $images = [];

        foreach ($cars as $car) {
            $image =  $this->imageModel->imageCar($car);
            if ($image) {
                $images[$car->id] = $image;
            }
        }

        return view('Pages/your', compact('user', 'cars', 'images'));
    }
    public function permalink($car)
    {
        $car = $this->carModel->getCarsByID($car);
        $user = $this->userModel->userCar($car);
        $images = $this->imageModel->imageCars($car);

        return view('Pages/permalink', compact( 'car','user', 'images'));
    }
    public function delete($car)
    {

        $singleCar = $this->carModel->getCarsByID($car);
        $singleCar->delete();

        return redirect()->back()->with('success', 'Car deleted successfully!');
    }
    public function changeCar($car)
    {

        $car = $this->carModel->getCarsByID($car);
        $user = $this->userModel->userCar($car);

        $year = 2024;

        return view('Pages/changeCar', compact( 'car','user', 'year'));
    }
    public function update(Request $request, $car)
    {

        $singleCar = $this->carModel->getCarsByID($car);
        $singleCar->update($request->all());

        return redirect()->back()->with('success', 'Car updated successfully!');

    }
}
