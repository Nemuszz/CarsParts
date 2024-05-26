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
            <li><a href="/" class="flex items-center justify-center h-full hover:text-gray-300">Home</a></li>
            <li><a href="/cars" class="flex items-center justify-center h-full hover:text-gray-300">Cars</a></li>
            <li><a href="/parts" class="flex items-center justify-center h-full hover:text-gray-300">Parts</a></li>
            @if(auth()->user())
                <li class="relative">
                    <div class="relative inline-block text-left">
                        <div class="mt-2">
                            <a id="drop_btn" class="flex items-center justify-center h-full hover:text-gray-300 cursor-pointer">
                                {{ auth()->user()->name }}
                            </a>
                        </div>
                        <div id="drop_menu" class="display absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
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
                    <a id="cart_link" class="cursor-pointer">
                        @php
                            $cart = session('cart', []);
                            $totalPrice = 0;
                        @endphp
                        <button class="relative flex items-center justify-center h-10 w-10 text-white rounded-full focus:outline-none focus:text-gray-500 transition duration-150 ease-in-out" aria-label="Cart">
                            <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            <span class="absolute inset-0 object-right-top -mr-6">
                            <div class="inline-flex items-center justify-center h-4 w-4 bg-red-500 text-white text-xs font-semibold leading-4 rounded-full">
                                {{count($cart)}}
                            </div>
                        </span>
                        </button>
                    </a>
                    <div id="cart_div" class="absolute top-full -left-56 z-50 w-64 h-auto rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden">
                        <div>

                            <div class="flex justify-center border-1 border-black">
                                <h2 class="text-black text-lg">Your cart has: {{ count($cart) }} parts</h2>
                            </div>

                            @if(count($cart) > 0)
                                <ul>
                                    @foreach($cart as $partId => $part)
                                        @php
                                            $totalPrice += $part['price'] * $part['amount'];
                                        @endphp
                                        <li class="flex items-center justify-between border-b border-gray-400 px-4 py-3">
                                            <div class="flex items-center">
                                                <div class="max-h-16 max-w-16 mr-4 overflow-hidden">
                                                    <img alt="part" src="{{ asset('partsImages/' . $part['image']) }}" class="w-16 h-16 object-cover rounded-lg shadow-md">
                                                </div>
                                                <div>
                                                    <p class="text-base font-semibold text-gray-800">{{$part['make']}} {{$part['model']}}</p>
                                                    <p class="text-sm text-gray-600">{{$part['section']}} {{$part['name']}}</p>
                                                    <p class="text-sm text-gray-600"><strong>{{$part['price']}} €</strong></p>
                                                </div>
                                            </div>
                                            <div class="flex flex-col items-end">
                                                <p class="text-base text-gray-800 text-center">Amount:<strong> {{$part['amount']}}</strong></p>
                                                <a href="{{ route('cart.remove', ['partId' => $partId]) }}" class="text-sm mt-20 text-red-600 hover:text-red-600">Remove</a>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="flex justify-center border-1 border-black">
                                    <h2 class="text-black text-lg">Sum of price: <strong>{{$totalPrice}} €</strong></h2>
                                </div>

                                <div class="flex justify-center mt-2 mb-2">
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-4"><a href="{{route('user.cart')}}">View Cart</a></button>
                                </div>

                            @else
                                <p class="text-black mt-2 flex justify-center border-1 border-black">Your cart is empty.</p>
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



