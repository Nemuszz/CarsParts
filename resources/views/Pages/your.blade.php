@include('Layouts.nav')
<div class=" mx-auto max-w-screen-xl bg-white p-8 rounded-lg shadow-md">
    <div class="flex min-h-screen h-auto">
        <!-- Sidebar -->
        <div class="bg-gray-800 text-white w-64 h-50 flex flex-col">
            <div class="p-4 flex justify-between items-center">
                <span class="text-2xl font-semibold">Dashboard</span>

            </div>
            <nav class="flex-1 overflow-y-auto">
                <a href="{{route('user.profile', ['id'=> auth()->user()->id])}}" class="block p-4 hover:bg-gray-700">Profile</a>
                <a href="{{route('car.add')}}" class="block p-4 hover:bg-gray-700">Add car</a>
                <a href="{{route('car.yours', ['id'=> auth()->user()->id])}}" class="block p-4 hover:bg-gray-700">Your car</a>
                <a href="#" class="block p-4 hover:bg-gray-700">Purchased parts</a>
                <a href="{{route('user.contact', ['id'=> auth()->user()->id])}}" class="block p-4 hover:bg-gray-700">Contact</a>
            </nav>

        </div>

        <div class="flex-1 p-10 h-auto">

            <div class=" mx-auto bg-white rounded-lg shadow-md p-8 ">
                <div>
                    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Your Cars</h2>
                </div>

            </div>
            @foreach($cars as $car)

                <div>
                    <a href="{{route('car.permalink', ['car'=> $car])}}">
            <div class="mx-auto bg-white rounded-lg shadow-md p-8 mt-2">


                <div class="flex">

                    <div class="w-1/2 h-48">
                        @if(isset($images[$car->id]))
                            <img class="h-full w-full object-cover rounded" src="{{ asset('images/' . $images[$car->id]->path) }}" alt="Car Image">
                        @else
                            <img src="{{ asset('images/placeholder.jpg') }}" alt="Car Image" class="h-full w-full object-cover rounded">
                        @endif
                    </div>
                    <div class="w-16">

                    </div>
                    <!-- Right side - Info for car -->
                    <div class="w-full md:w-1/2 text-left relative" >
                        <h2 class="text-xl font-bold mb-8">{{$car->make}} {{$car->model}}</h2>
                        <p class="text-xl font-bold text-left mb-8">{{$car->price}} €</p>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p><strong>Year:</strong> {{$car->year}}</p>
                                <p><strong>Body:</strong> {{$car->body_type}}</p>


                            </div>
                            <div>
                                <p><strong>Fuel:</strong> {{$car->fuel_type}}</p>
                                <p><strong>Mileage:</strong> {{$car->mileage}}</p>

                            </div>
                        </div>

                    </div>

                </div>


            </div>
                        <div class="mx-auto bg-white shadow-md p-2 flex justify-center">
                            <div class="w-1/2 bg-blue-200 rounded-l-lg">
                                <a href="{{route('car.change', $car)}}" class="block w-full h-full py-2 text-blue-900 font-semibold text-center hover:bg-blue-300 transition duration-300">Insert</a>
                            </div>
                            <div class="w-1/2 bg-red-500 rounded-r-lg">
                                <a href="{{route('car.delete', $car)}}" class="block w-full h-full py-2 text-white font-semibold text-center hover:bg-red-600 transition duration-300">Delete</a>
                            </div>
                        </div>

                    </a>




                </div>


            @endforeach
        </div>

    </div>
    </div>

    <!-- Main Content -->




@include('Layouts.footer')
