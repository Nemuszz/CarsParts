<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartsImagesModel extends Model
{

    use HasFactory;
    public function partsModel()
    {
        return $this->belongsTo(PartsModel::class);
    }

    protected $table = 'parts_images';
    protected $fillable = [
        'part_id',
        'path',
    ];
}
