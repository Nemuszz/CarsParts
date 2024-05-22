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


    public function partSearch(Request $request)
    {

        $query = PartsModel::query();

        if ($request->filled('make')) {
            $query->where('make', $request->make);
        }
        if ($request->filled('model')) {
            $query->where('model', $request->model);
        }
        if ($request->filled('section')) {
            $query->where('section', $request->section);
        }
        if ($request->filled('name')) {
            $query->where('name', $request->name);
        }

        $parts = $query->get();

        $images = [];

        foreach ($parts as $part) {
            $image = PartsImagesModel::where('part_id', $part->id)->first();
            if ($image) {
                $images[$part->id] = $image; // Store the first image in an array with part ID as key
            }
        }

        return view('Guest.searchParts', compact('parts','request',  'images'));

    }
}
