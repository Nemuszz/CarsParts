
@include('Layouts.nav')
<div class=" mx-auto max-w-screen-xl bg-white p-8 rounded-lg shadow-md">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="bg-gray-800 text-white w-64 h-50 flex flex-col">
            <div class="p-4 flex justify-between items-center">
                <span class="text-2xl font-semibold">Admin</span>

            </div>
            <nav class="flex-1 overflow-y-auto">
                <a href="{{route('admin.page')}}" class="block p-4 hover:bg-gray-700">Car requests</a>
                <a href="{{route('admin.users')}}" class="block p-4 hover:bg-gray-700">Users</a>
                <a href="" class="block p-4 hover:bg-gray-700">Orders</a>
                <a href="#" class="block p-4 hover:bg-gray-700">Messages</a>

            </nav>

        </div>
        <!-- Main Content -->
        <div class="flex-1 p-10 ">
            <div class="w-15 mx-auto bg-white rounded-lg shadow-md p-8">
                <div>

                    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Car requests</h2>

                </div>
                <div class="w-15 mx-auto bg-white rounded-lg shadow-md p-8">
        @foreach($cars as $car)

                        <div>
                            <a href="{{route('admin.permalink', ['car'=> $car])}}">
                                <div class="mx-auto bg-white rounded-lg shadow-md p-8 mt-2">


                                    <div class="flex">

                                        <!-- Left side - Image of car -->
                                        <div class="w-1/2">
                                            <img  src="{{ route('car.yours', ['id' => $car->image]) }}" alt="Car Image" class="w-full bg-blue-500">
                                        </div>

                                        <!-- Right side - Info for car -->
                                        <div class="w-1/2">
                                            <h2 class="text-xl font-bold mb-4">Car Information</h2>
                                            <div class="grid grid-cols-2 gap-4">
                                                <div>
                                                    <p><strong>Make:</strong> {{$car->make}}</p>
                                                    <p><strong>Model:</strong> {{$car->model}}</p>
                                                    <p><strong>Year:</strong> {{$car->year}}</p>
                                                </div>
                                                <div>
                                                    <p><strong>Mileage:</strong> {{$car->mileage}}</p>
                                                    <p><strong>Price:</strong> {{$car->price}}</p>

                                                </div>

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
</div>
@include('Layouts.footer')
