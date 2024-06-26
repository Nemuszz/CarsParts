<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public function car()
    {
        return $this->belongsTo(CarsModel::class);
    }
    protected $table = 'images';

    protected $fillable = [
        'car_id',
        'path'
    ];
}
