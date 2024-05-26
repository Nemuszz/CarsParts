<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use App\Repositories\PartImagesRepository;
use App\Repositories\PartRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    private $partModel;
    private $partImagesModel;
    public function __construct()
    {
        $this->partModel = new PartRepository();
        $this->partImagesModel = new PartImagesRepository();
    }
    public function addToCart(Request $request)
    {
        $partId = $request->input('partId');
        $part = $this->partModel->partById($partId);
        $partImage = $this->partImagesModel->imagesByPartID($partId);



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

            $singlePart = $this->partModel->partById($partId);
            $singlePart->amount -= $part['amount'];
            $singlePart->save();

        }

        $request->session()->forget('cart');
        return redirect()->back()->with('success', 'Your order has been successfully placed!');
        }
    }


}
