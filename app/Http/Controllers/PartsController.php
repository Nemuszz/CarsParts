<?php

namespace App\Http\Controllers;

use App\Models\CarsModel;
use App\Models\Image;
use App\Models\PartsImagesModel;
use App\Models\PartsModel;
use App\Models\User;
use Illuminate\Http\Request;

class PartsController extends Controller
{
    public function parts()
    {

        $parts = PartsModel::all();

        $images = [];

        foreach ($parts as $part) {
            $image = PartsImagesModel::where('part_id', $part->id)->first();
            if ($image) {
                $images[$part->id] = $image; // Store the first image in an array with car ID as key
            }
        }


        return view('Guest/parts',compact('parts', 'images') );
    }
}
