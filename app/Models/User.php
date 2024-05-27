<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public function cart()
    {
        return $this->hasMany(CartModel::class);
    }
    public function cars()
    {
        return $this->hasMany(CarsModel::class);
    }
    public function wishListItems()
    {
        return $this->hasMany(WishListModel::class);
    }
    public function images()
    {
        return $this->hasManyThrough(Image::class, CarsModel::class);
    }
    protected $fillable = [
        'name',
        'email',
        'password',
        'country',
        'city',
        'address',
        'postcode',
        'phone',
        'role',

    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
