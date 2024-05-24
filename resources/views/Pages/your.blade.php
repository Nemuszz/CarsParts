@include('Layouts.nav')
<div class=" mx-auto max-w-screen-xl bg-white p-8 rounded-lg shadow-md">
    <div class="flex min-h-screen h-auto">
        <!-- Sidebar -->
        @include('Layouts.userNav')
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
                <div class="mx-auto bg-white rounded-lg shadow-md p-8 mt-2 flex flex-col md:flex-row relative justify-center">
                    <!-- Left side - Image of car -->
                    <div class=" w-80 md:w-1/2 md:h-52 mb-8 md:mr-8 md:mb-0">
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
@include('Layouts.footer')
