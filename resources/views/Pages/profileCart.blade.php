@include('Layouts.nav')
<div class=" mx-auto max-w-screen-xl bg-white p-8 rounded-lg shadow-md">
    <div class="flex h-screen">
        <!-- Sidebar -->
        @include('Layouts.userNav')
        <!-- Main Content -->
        <div class="flex-1 p-10 ">
            <div class="w-15 mx-auto bg-white rounded-lg shadow-md p-8">
                <div>

                    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Your Cart</h2>

                </div>
                <div>

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
                                    <li class="flex items-center justify-between border-b border-gray-400 px-4 py-3">
                                        <div class="flex items-center">
                                            <div class="max-h-12 mr-4">
                                                <img alt="part" src="{{ asset('partsImages/' . $part['image']) }}" class="max-h-24 rounded-lg shadow-md">
                                            </div>
                                            <div>
                                                <p class="text-base font-semibold text-gray-800">{{$part['make']}} {{$part['model']}}</p>
                                                <p class="text-sm text-gray-600">{{$part['section']}} {{$part['name']}}</p>
                                                <p class="text-sm text-gray-600 mt-2"><strong>{{$part['price']}} €</strong></p>
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
                                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"><a href="#">Checkout</a></button>
                            </div>

                        @else
                            <p class="text-black">Your cart is empty.</p>
                        @endif
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>
