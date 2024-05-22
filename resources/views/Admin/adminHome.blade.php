
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
                    <a href="{{ route('admin.permalink', ['car'=> $car]) }}">
                        <div class="mx-auto bg-white rounded-lg shadow-md p-6 mt-2" style="max-height: 14rem;">
                            <div class="flex items-center">
                                <!-- Left side - Image of car -->
                                <div class="w-1/2 mr-4 flex justify-center">
                                    @if(isset($images[$car->id]))
                                        <img class="max-h-40 rounded" style="max-width: 75%;" src="{{ asset('images/' . $images[$car->id]->path) }}" alt="Car Image">
                                    @else
                                        <img src="{{ asset('images/placeholder.jpg') }}" alt="Car Image">
                                    @endif
                                </div>
                                <!-- Right side - Info for car -->
                                <div class="w-full md:w-1/2 text-left relative">
                                    <h2 class="text-lg font-bold mb-4">{{ $car->make }} {{ $car->model }}</h2>
                                    <p class="text-lg font-bold mb-8">{{ $car->price }} €</p>
                                    <div class="grid grid-cols-2 gap-2">
                                        <div>
                                            <p><strong>Year:</strong> {{ $car->year }}</p>
                                            <p><strong>Body:</strong> {{ $car->body_type }}</p>
                                        </div>
                                        <div>
                                            <p><strong>Fuel:</strong> {{ $car->fuel_type }}</p>
                                            <p><strong>Mileage:</strong> {{ $car->mileage }}</p>
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
