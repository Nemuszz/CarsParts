<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishListModel extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function part()
    {
        return $this->belongsTo(PartsModel::class);
    }

    protected $table = 'wishList';
    protected $fillable = [
        'user_id',
        'part_id'

    ];


}
