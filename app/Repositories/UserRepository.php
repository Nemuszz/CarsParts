<?php
namespace App\Repositories;

use App\Models\User;

class UserRepository{

    private $userModel;

    public function __construct(){
        $this->userModel = new User();

    }
    public function userCar($car)
    {
        return $this->userModel->where(['id' => $car->user_car_id])->first();
    }
    public function userFind($id)
    {
        return $this->userModel->findOrFail($id);
    }
    public function userCarById($car)
    {
        return $this->userModel->find($car->user_car_id);
    }
    public function userAdmins()
    {
        return $this->userModel->where(['role'=>'admin'])->get();
    }
    public function userUsers()
    {
        return $this->userModel->where(['role'=>'user'])->get();
    }


}
?>
