<?php

namespace App\Http\Controllers;

use App\Models\PartsModel;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $partId = $request->input('partId');
        $part = PartsModel::where('id', $partId)->first();

        $cart = session()->get('cart',[]);

        $cart[$partId] = [
            'make' => $part->make,
            'model' => $part->model,
            'section' => $part->section,
            'name' => $part->name,
        ];
        session()->put('cart', $cart);

        return redirect()->back();

    }


}
