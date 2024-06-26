<?php

namespace App\Http\Controllers;

use App\Http\Requests\AmountRequest;
use App\Models\PartsModel;
use App\Models\WishListModel;
use App\Repositories\PartImagesRepository;
use App\Repositories\PartRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PartsController extends Controller
{
    private $partModel;
    private $partImagesModel;
    public function __construct()
    {
        $this->partModel = new PartRepository();
        $this->partImagesModel = new PartImagesRepository();
    }
    public function parts()
    {

        $parts = $this->partModel->partsAll();



        $images = [];

        foreach ($parts as $part) {
            $image = $this->partImagesModel->ImagePart($part);
            if ($image) {
                $images[$part->id] = $image;
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
            $image = $this->partImagesModel->ImagePart($part);
            if ($image) {
                $images[$part->id] = $image;
            }
        }

        return view('Guest.searchParts', compact('parts','request',  'images'));

    }

    public function partDelete($part){

        $singlePart = $this->partModel->partId($part);
        $singlePart->delete();

        return redirect()->route('admin.parts.add')->with('success', 'Part successfully deleted!');
    }



    public function partAmount(AmountRequest $request, $part){

        $singlePart = $this->partModel->partFind($part);
        $newAmount = $singlePart->amount + $request->input('amount');
        $singlePart->update(['amount' => $newAmount]);

        return redirect()->route('admin.parts.add')->with('success', 'Amount successfully increased!');
    }

    public function partPermalink($part){
        $userId = Auth::id();

        $isInWishList = WishListModel::where('part_id', $part)
            ->where('user_id', $userId)
            ->exists();



            $singePart = $this->partModel->partId($part);
            $images = $this->partImagesModel->imagesOfPart($part);



        return view('Guest.partPermalink', compact('part','images','singePart','isInWishList'));
    }

}
