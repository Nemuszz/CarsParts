<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminPartsRequest;
use App\Models\CartModel;
use App\Models\ContactUsModel;
use App\Models\PartsImagesModel;
use App\Repositories\CarsRepository;
use App\Repositories\ImagesRepository;
use App\Repositories\PartRepository;
use App\Repositories\UserRepository;

class AdminController extends Controller
{
    private $carModel;
    private $userModel;
    private $imagesModel;
    private $partsModel;
    public function __construct()
    {
        $this->carModel = new CarsRepository();
        $this->userModel = new UserRepository();
        $this->imagesModel = new ImagesRepository();
        $this->partsModel = new PartRepository();
    }
    public function adminHome(){
        $cars = $this->carModel->unCheckedCars();

        $userCities = [];

        foreach ($cars as $car) {

            $user = $this->userModel->userCarById($car);

            if ($user) {
                $userCities[$car->id] = $user->city;
            } else {

                $userCities[$car->id] = 'Unknown';
            }
        }
        $images = [];

        foreach ($cars as $car) {
            $image = $this->imagesModel->imageCar($car);
            if ($image) {
                $images[$car->id] = $image;
            }
        }

        return view('Admin/adminHome', compact('cars', 'userCities','images') );

    }
    public function adminUsers()
    {

        $adminUsers = $this->userModel->userAdmins();
        $justUsers = $this->userModel->userUsers();

        return view('Admin/adminUsers',compact('adminUsers','justUsers'));
    }
    public function adminPermalink($car)
    {

        $car = $this->carModel->getCarsByID($car);
        $user = $this->userModel->userCar($car);
        $images = $this->imagesModel->imageCars($car);


        return view('Admin/adminPermalink', compact( 'car','user','images'));

    }
    public function adminDelete($car)
    {

        $singleCar = $this->carModel->getCarsByID($car);
        $singleCar->delete();


        return redirect(route('admin.page'))->with('success', 'Car deleted successfully!');

    }
    public function adminCheck($car)
    {

        $singleCar = $this->carModel->getCarsByID($car);
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
        $parts = $this->partsModel->partsAll();

        return view('Admin/adminParts',compact('parts') );
    }

    public function adminPartsInsert(AdminPartsRequest $request)
    {

        if ($request->validated()) {

        $highestPart = $this->partsModel->partHighest();
        $partCode = $highestPart ? $highestPart->part_code + 1 : 1;


        $partData = $request->except('images');
        $partData['part_code'] = $partCode;
        $part = $this->partsModel->partCreate($partData);

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
        }


        return redirect()->back()->with('success', 'Part added successfully!');
    }
    public function adminOrders()
    {
        $parts = CartModel::all();

        return view('Admin/adminOrder', compact('parts') );
    }
}
