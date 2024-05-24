<?php

namespace App\Http\Controllers;

use App\Models\PartsImagesModel;
use App\Models\PartsModel;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {

        $partId = $request->input('partId');
        $part = PartsModel::where('id', $partId)->first();
        $partImage = PartsImagesModel::where('part_id', $partId)->first();

        $cart = session()->get('cart', []);


        $imagePath = $partImage ? $partImage->path : null;

        $cart[$partId] = [
            'image' => $imagePath, // Use the 'image' attribute of $partImage or null if $partImage is null
            'make' => $part->make,
            'model' => $part->model,
            'section' => $part->section,
            'name' => $part->name,
            'price' => $part->price,
            'amount' => $request->amount,
        ];
        session()->put('cart', $cart);

        return redirect()->back();


    }
    public function removeToCart(Request $request, $partId)
    {


        // Get the current cart from the user's session
        $cart = $request->session()->get('cart', []);

        // Remove the product from the cart
        unset($cart[$partId]);

        // Store the updated cart in the user's session
        $request->session()->put('cart', $cart);

        // Return a response
        return redirect()->back();
    }



}
