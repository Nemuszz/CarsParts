<?php

namespace App\Http\Controllers;

use App\Models\CarsModel;
use App\Models\Image;
use App\Models\PartsImagesModel;
use App\Models\PartsModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\isEmpty;

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

    public function partDelete($part){

        $singlePart = PartsModel::where(['id' => $part])->first();
        $singlePart->delete();

        return redirect()->route('admin.parts.add')->with('success', 'Part successfully deleted!');
    }



    public function partAmount(Request $request, $part){

        $validator = Validator::make($request->all(), [
            'amount' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }



        $singlePart = PartsModel::findOrFail($part);
        $newAmount = $singlePart->amount + $request->input('amount');
        $singlePart->update(['amount' => $newAmount]);

        return redirect()->route('admin.parts.add')->with('success', 'Amount successfully increased!');
    }

    public function partPermalink($part){

        $singePart = PartsModel::where(['id' => $part])->first();
        $images = PartsImagesModel::where(['part_id' => $part])->get();


        return view('Guest.partPermalink', compact('part','images','singePart'));
    }

}
