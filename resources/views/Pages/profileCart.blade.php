@include('Layouts.nav')
<div class=" mx-auto max-w-screen-xl bg-white p-8 rounded-lg shadow-md">
    <div class="flex h-screen">
        <!-- Sidebar -->
        @include('Layouts.userNav')
        <!-- Main Content -->
        <div class="flex-1 p-10 ">
            <div class="w-15 mx-auto bg-white rounded-lg shadow-md p-8">
                @if(session('success'))
                    <div class="bg-green-200 text-green-800 p-4 mb-4 rounded" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
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
                        <form action="{{ route('cart.purchase') }}" method="POST">
                            {{csrf_field()}}
                        @if(count($cart) > 0)
                            <ul>
                                @foreach($cart as $partId => $part)
                                    @php
                                        $totalPrice += $part['price'] * $part['amount'];
                                    @endphp

                                    <input type="hidden" name="cart[{{ $partId }}][make]" value="{{ $part['make'] }}">
                                    <input type="hidden" name="cart[{{ $partId }}][model]" value="{{ $part['model'] }}">
                                    <input type="hidden" name="cart[{{ $partId }}][section]" value="{{ $part['section'] }}">
                                    <input type="hidden" name="cart[{{ $partId }}][name]" value="{{ $part['name'] }}">
                                    <input type="hidden" name="cart[{{ $partId }}][price]" value="{{ $part['price'] }}">
                                    <input type="hidden" name="cart[{{ $partId }}][amount]" value="{{ $part['amount'] }}">
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
                                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Checkout</button>
                            </div>

                        @else
                            <p class="text-black">Your cart is empty.</p>
                        @endif
                        </form>
                    </div>

                </div>


            </div>
            <div class="w-full bg-gray-500 h-6 ">
                <div class="w-full flex justify-center">
                    <h2 class="text-black">Wish list</h2>
                </div>

                <table class="w-full divide-y divide-gray-200">
                    <thead class="bg-gray-800">
                    <tr>
                        <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">Make</th>
                        <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">Model</th>
                        <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">Section</th>
                        <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">Name</th>
                        <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">Amount</th>
                        <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">Price</th>
                        <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">Part code</th>
                    </tr>

                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">


                    @foreach($allParts as $part)
                        <tr>
                            <td class="px-2 py-1 whitespace-nowrap">{{$part->make}}</td>
                            <td class="px-2 py-1 whitespace-nowrap">{{$part->model}}</td>
                            <td class="px-2 py-1 whitespace-nowrap">{{$part->section}}</td>
                            <td class="px-2 py-1 whitespace-nowrap">{{$part->name}}</td>
                            <td class="px-2 py-1 whitespace-nowrap">{{$part->amount}}</td>
                            <td class="px-2 py-1 whitespace-nowrap">{{$part->price}}</td>
                            <td class="px-2 py-1 whitespace-nowrap">{{$part->part_code}}</td>


                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>



        </div>
    </div>
</div>
@include('Layouts.footer')
