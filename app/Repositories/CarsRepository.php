<?php

namespace App\Repositories;
use App\Models\CarsModel;

class CarsRepository{

    private $carsModel;
    public function __construct()
    {
        $this->carsModel = new CarsModel();
    }
    public function getCarsByID($car){
        return $this->carsModel->where(['id' => $car])->first();
    }
    public function carCreate($carData)
    {
       return $this->carsModel->create([$carData]);
    }
    public function userCars($user)
    {
        return $this->carsModel->where('user_car_id', $user->id)->get();
    }
    public function checkOutCarsAll()
    {
        return $this->carsModel->where(['checked_out'=>'checked'])->get();

    }
    public function checkOutCar()
    {
        return $this->carsModel->where(['checked_out'=>'checked']);

    }

    public function unCheckedCars()
    {
        return $this->carsModel->where(['checked_out'=>'unchecked'])->get();

    }

}
?>
