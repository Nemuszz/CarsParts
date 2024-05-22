<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartsModel extends Model
{
    use HasFactory;

    protected $table = 'parts';
    protected $fillable = [
        'make',
        'model',
        'section',
        'name',
        'price',
        'description',
        'images'

    ];
}
