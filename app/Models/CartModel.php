<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartModel extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $table = 'cart';
    protected $fillable = [
        'part_id',
        'user_id',
        'make',
        'model',
        'section',
        'name',
        'price',
        'amount',
        'part_code',
    ];
}
