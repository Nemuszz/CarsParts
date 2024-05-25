<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use App\Models\PartsImagesModel;
use App\Models\PartsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isEmpty;

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
            'image' => $imagePath,
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
    public function purchaseToCart(Request $request){
        $cartItems = $request->session()->get('cart', []);
        $user = Auth::user();


        foreach ($cartItems as $partId => $part) {

            $cart = new CartModel();

            $cart->user_id = $user->id;
            $cart->part_id = $partId;
            $cart->make = $part['make'];
            $cart->model = $part['model'];
            $cart->section = $part['section'];
            $cart->name = $part['name'];
            $cart->price = $part['price'];
            $cart->amount = $part['amount'];


            $cart->save();
        }



        $request->session()->forget('cart');
        return redirect()->back()->with('success', 'Your order has been successfully placed!');
    }


}
