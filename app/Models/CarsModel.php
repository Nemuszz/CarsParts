<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarsModel extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_car_id', 'id');
    }
    public function imagesRelation()
    {
        return $this->hasMany(Image::class, 'car_id', 'id');
    }
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
        'images'
    ];

}
