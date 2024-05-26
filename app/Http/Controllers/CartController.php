<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use App\Models\PartsImagesModel;
use App\Models\PartsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use function PHPUnit\Framework\isEmpty;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $partId = $request->input('partId');
        $part = PartsModel::where('id', $partId)->first();
        $partImage = PartsImagesModel::where('part_id', $partId)->first();



        if($request->amount > $part->amount){
            return redirect()->back()->with('error','too high');
        }
        else{
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
                'part_code' => $part->part_code,

            ];
            session()->put('cart', $cart);

            return redirect()->back();
        }

    }
    public function removeToCart(Request $request, $partId)
    {
        // Get the current cart from the user's session
        $cart = $request->session()->get('cart', []);

        unset($cart[$partId]);

        $request->session()->put('cart', $cart);

        return redirect()->back();
    }


    public function purchaseToCart(Request $request)
    {
        $cartItems = $request->session()->get('cart', []);
        $user = Auth::user();

        if(empty($user->country) || empty($user->city) || empty($user->postcode) || empty($user->address)){
            return redirect()->route('user.profile', ['id' => $user->id])->withErrors('Fill all informations about you');
        }
        else{

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
            $cart->part_code = $part['part_code'];


            $cart->save();

            $singlePart = PartsModel::where(['id' => $partId])->first();
            $singlePart->amount -= $part['amount'];
            $singlePart->save();

        }

        $request->session()->forget('cart');
        return redirect()->back()->with('success', 'Your order has been successfully placed!');
        }
    }


}
