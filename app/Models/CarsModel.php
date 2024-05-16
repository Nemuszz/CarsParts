<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarsModel extends Model
{

    use HasFactory;

    protected $table = 'cars';

    protected $fillable = [
        'user_car_id',
        'make',
        'model',
        'year',
        'mileage',
        'price',
        'body_type',
        'fuel_type',
        'power',
        'gear',
        'number_of_doors',
        'description',
    ];

}
