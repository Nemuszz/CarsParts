
@include('Layouts.nav')
<div class="mx-auto max-w-screen-xl min-h-screen bg-white p-4 md:p-8 rounded-lg shadow-md">
    <!-- Main Content -->
    @include('Layouts.adminNav')
        <div class="flex-1 p-10 ">
            <div class="w-15 mx-auto bg-white rounded-lg shadow-md p-8">
                <div>

                    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Car requests</h2>

                </div>

        @foreach($cars as $car)

                        <div>
                            <a href="{{route('admin.permalink', ['car'=> $car])}}">
                                <div class="mx-auto bg-white rounded-lg shadow-md p-8 mt-2">
                                    <div class="flex">
                                        <div class="w-1/2">
                                            @if(isset($images[$car->id]))
                                                <img class="max-h-25 rounded" src="{{ asset('images/' . $images[$car->id]->path) }}" alt="Car Image">
                                            @else
                                                <img src="{{ asset('images/placeholder.jpg') }}" alt="Car Image">
                                            @endif
                                        </div>
                                        <div class="w-8">
                                        </div>
                                        <!-- Right side - Info for car -->
                                        <div class="w-full md:w-1/2 text-left relative">
                                            <h2 class="text-lg font-bold mb-8">{{$car->make}} {{$car->model}}</h2>
                                            <p class="text-lg font-bold text-left mb-12">{{$car->price}} €</p>
                                            <div class="grid grid-cols-2 gap-2">
                                                <div>
                                                    <p><strong>Year:</strong> {{$car->year}}</p>
                                                    <p><strong>Body:</strong> {{$car->body_type}}</p>
                                                </div>
                                                <div>
                                                    <p><strong>Fuel:</strong> {{$car->fuel_type}}</p>
                                                    <p><strong>Mileage:</strong> {{$car->mileage}}</p>
                                                </div>
                                            </div>
                                            <div class="absolute bottom-0 right-0">
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
