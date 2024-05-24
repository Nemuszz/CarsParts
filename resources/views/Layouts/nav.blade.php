<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secondhand Cars</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <style>
        .car-card {
            transition: transform 0.3s ease;
        }

        .car-card:hover {
            transform: scale(1.05);
        }
        .display {
            display: none;
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-900">

<div class=" bg-gray-800 text-white py-4">
<nav class=" mx-auto max-w-screen-xl bg-gray-800 text-white py-1">
    <div class="container mx-auto flex justify-between items-center">
        <a href="#" class="text-xl font-bold">Cars&Parts</a>
        <ul class="flex space-x-4">
            <li><a href="/" class="hover:text-gray-300">Home</a></li>
            <li><a href="/cars" class="hover:text-gray-300">Cars</a></li>
            <li><a href="/parts" class="hover:text-gray-300">Parts</a></li>
            @if(auth()->user())
                <li>
                    <div class="relative inline-block text-left">
                        <div>
                            <a id="drop_btn" class="hover:text-gray-300">
                                {{ auth()->user()->name }}
                            </a>
                        </div>
                        <div id="drop_menu" class="display absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 ">
                            <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                <a href="{{ route('user.profile', ['id'=> auth()->user()->id]) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Profile</a>
                                @if(auth()->user()->role == 'admin')
                                    <a href="/admin/page" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Admin</a>
                                @endif
                                <a href="/user/logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Logout</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="relative">
                    <a id="cart_link" class="hover:text-gray-300">Cart</a>
                    <div id="cart_div" class="hidden absolute top-full -left-56 w-64 h-auto rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                        <div>
                            @php
                                $cart = session('cart', []);
                                $totalPrice = 0;
                            @endphp
                            <div class="flex justify-center border-1 border-black">
                                <h2 class="text-black text-lg">Your cart has: {{ count($cart) }} parts</h2>
                            </div>

                            @if(count($cart) > 0)
                                <ul>
                                    @foreach($cart as $partId => $part)
                                        @php
                                            $totalPrice += $part['price'] * $part['amount'];
                                        @endphp
                                        <li class="flex items-center justify-between border-b px-4 py-3 border-2 border-gray-400">
                                            <div class=" flex items-center">
                                                <div>
                                                    <p class="text-base font-semibold text-black">{{$part['make']}} {{$part['model']}}</p>
                                                    <p class="text-sm text-gray-500">{{$part['section']}} {{$part['name']}}</p>
                                                    <p class="text-sm text-gray-500"><strong>{{$part['price']}} €</strong></p>
                                                </div>
                                            </div>
                                            <div>
                                                <p class="text-base text-black">Amount: {{$part['amount']}}</p>
                                                <a href="{{ route('cart.remove', ['partId' => $partId]) }}" class="text-sm text-red-600 hover:text-red-600">Remove</a>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="flex justify-center border-1 border-black">
                                    <h2 class="text-black text-lg">Sum of price: {{$totalPrice}} €</h2>
                                </div>

                                <div class="flex justify-center mt-2 mb-2">
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-4"><a href="#">View Cart</a></button>
                                    <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"><a href="#">Checkout</a></button>
                                </div>

                            @else
                                <p class="text-black">Your cart is empty.</p>
                            @endif
                        </div>

                    </div>
                </li>
            @else
                <li><a href="/register" class="hover:text-gray-300">Sign up</a></li>
            @endif
        </ul>
    </div>

</nav>
</div>



