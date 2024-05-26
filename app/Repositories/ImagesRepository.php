<?php
namespace App\Repositories;

use App\Models\Image;
use App\Models\User;

class ImagesRepository{

    private $imagesModel;

    public function __construct(){
        $this->imagesModel = new Image();

    }
    public function imageCars($car)
    {
        return $this->imagesModel->where(['car_id' => $car->id])->get();
    }
    public function imageCar($car)
    {
        return $this->imagesModel->where(['car_id' => $car->id])->first();
    }

}
?>
