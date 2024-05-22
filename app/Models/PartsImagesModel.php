<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartsImagesModel extends Model
{
    public function parts()
    {
        return $this->belongsTo(PartsImagesModel::class);
    }
    use HasFactory;

    protected $table = 'parts_images';
    protected $fillable = [
        'part_id',
        'path',
    ];
}
