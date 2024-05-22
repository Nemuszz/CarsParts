<?php

namespace App\Http\Controllers;

use App\Models\CarsModel;
use App\Models\ContactUsModel;
use App\Models\Image;
use App\Models\PartsImagesModel;
use App\Models\PartsModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $images = [];

        foreach ($cars as $car) {
            $image = Image::where('car_id', $car->id)->first();
            if ($image) {
                $images[$car->id] = $image; // Store the first image in an array with car ID as key
            }
        }

        return view('Admin/adminHome', compact('cars', 'userCities','images') );

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
    public function adminPartsAdd()

    {
        $parts = PartsModel::all();

        return view('Admin/adminParts',compact('parts') );
    }

    public function adminPartsInsert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'section' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'images' => 'required|array|min:1',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $highestPart = PartsModel::orderBy('part_code', 'desc')->first();
        $partCode = $highestPart ? $highestPart->part_code + 1 : 1;


        $partData = $request->except('images');
        $partData['part_code'] = $partCode;
        $part = PartsModel::create($partData);

        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('partsImages'), $imageName);
                $imageModel = new PartsImagesModel();
                $imageModel->path = $imageName;
                $imageModel->part_id = $part->id;
                $imageModel->save();
            }
        }


        return redirect()->back()->with('success', 'Part added successfully!');
    }
}
