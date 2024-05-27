<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProfileRequest;
use App\Http\Requests\LoingRequest;
use App\Http\Requests\MessageRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\PartsModel;
use App\Models\User;
use App\Models\WishListModel;
use App\Repositories\UsermessageRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    private $contactUsRepo;
    private $userModel;
    public function __construct()
    {
        $this->contactUsRepo = new UsermessageRepository();
        $this->userModel = new UserRepository();

    }

    public function login(LoingRequest $request)
    {


       $credentials = $request->only('email', 'password');
       if (Auth::attempt($credentials)) {
           return redirect()->intended('/');
       }
       return redirect("login")->with('error', 'Invalid Email or Password');

    }
    public function register(RegisterRequest $request)
    {

             $user = User::create([
                'name'=> $request->name,
                'email'=> $request->email,
                'password'=> Hash::make($request->password),
            ]);
             if (!$user){
                 return Redirect::to('/login')->with('error','Register details are not valid');
             }
        return Redirect::to('/login');
    }
    public function logout(){
        Session::flush();
        Auth::logout();
        return Redirect::to('/login');
    }

    public function profile($id){
        $user = $this->userModel->userFind($id);

        return view('Pages/Profile', ['user' => $user]);
    }
    public function edit(EditProfileRequest $request, $id){


        $user = $this->userModel->userFind($id);

        $user->update($request->all());

        return redirect()->route('user.profile', $user->id)->with('success', 'Profile updated successfully');
    }
    public function contact($id)
    {

        $user = $this->userModel->userFind($id);


        return view('Pages/Contact');
    }
    public function message(MessageRequest $request, $id)
    {

        $user = $this->userModel->userFind($id);

        $this->contactUsRepo->createMessage($request, $user);


        return redirect()->back()->with('success', 'Message sent successfully, thanks!');
    }
    public function userCart()
    {
        $wishListItems = WishListModel::where('user_id', Auth::id())->get();


        $allParts = [];


        foreach ($wishListItems as $wishListItem) {

            $partDetails = PartsModel::find($wishListItem->part_id);


            if ($partDetails) {

                $allParts[] = $partDetails;
            }
        }





        return view('Pages/profileCart',compact('allParts'));
    }

    public function wishList(Request $request)
    {
       $user = auth()->user();
       $partId = $request->input('partId');
       $user->wishListItems()->create(['part_id' => $partId]);

       return redirect()->back()->with('success','item added to wish list');
    }
    public function removeFromWishList(Request $request)
    {
        $user = auth()->user();
        $partId = $request->input('partId');

        $user->wishListItems()->where('part_id', $partId)->delete();

        return redirect()->back()->with('success', 'Part removed from wish list successfully.');
    }

}

