<?php

namespace App\Http\Controllers;

use App\Models\CarsModel;
use App\Models\Image;
use App\Models\PartsModel;
use App\Models\User;
use Illuminate\Http\Request;

class PartsController extends Controller
{
    public function parts()
    {

        $parts = PartsModel::all();


        return view('guest/parts',compact('parts') );
    }
}
