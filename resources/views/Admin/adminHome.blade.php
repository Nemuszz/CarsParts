
@include('Layouts.nav')
<div class="mx-auto max-w-screen-xl min-h-screen bg-white p-4 md:p-8 rounded-lg shadow-md">
    <!-- Main Content -->
    <div class="flex flex-col">
        <!-- Navigation -->
        <div class="bg-gray-800 text-white flex justify-between items-center p-4">
            <span class="text-xl md:text-2xl font-semibold">Admin</span>
            <nav class=" flex">
                <a href="{{route('admin.page')}}" class="p-2 md:p-4 hover:bg-gray-700">Car requests</a>
                <a href="{{route('admin.users')}}" class="p-2 md:p-4 hover:bg-gray-700">Users</a>
                <a href="" class="p-2 md:p-4 hover:bg-gray-700">Orders</a>
                <a href="{{route('admin.messages')}}" class="p-2 md:p-4 hover:bg-gray-700">Messages</a>
            </nav>
        </div>
        <!-- Main Content -->
        <div class="flex-1 p-10 ">
            <div class="w-15 mx-auto bg-white rounded-lg shadow-md p-8">
                <div>

                    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Car requests</h2>

                </div>

        @foreach($cars as $car)

                        <div>
                            <a href="{{route('admin.permalink', ['car'=> $car])}}">
                                <div class="mx-auto bg-white rounded-lg shadow-md p-8 mt-2">
                                    <div class="flex flex-col md:flex-row">
                                        <!-- Left side - Image of car -->
                                        <div class="w-full md:w-1/2 md:text-center">
                                            <img src="{{ route('car.yours', ['id' => $car->image]) }}" alt="Car Image" class="w-80 h-52 bg-blue-500">
                                        </div>
                                        <div class="w-8">

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
                                            <div class=" absolute bottom-0 right-0">
                                                {{ $userCities[$car->id] ?? 'Unknown' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </a>

                        </div>
                    @endforeach





                </div>

            </div>
        </div>
    </div>

@include('Layouts.footer')
