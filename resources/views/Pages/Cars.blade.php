@include('Layouts.nav')
<div class=" mx-auto bg-white p-8 rounded-lg shadow-md">
    <div class="flex h-auto">
        <!-- Sidebar -->
        <div class="bg-gray-800 text-white w-64 h-50 flex flex-col">
            <div class="p-4 flex justify-between items-center">
                <span class="text-2xl font-semibold">Dashboard</span>

            </div>
            <nav class="flex-1 overflow-y-auto">
                <a href="{{route('user.profile', ['id'=> auth()->user()->id])}}" class="block p-4 hover:bg-gray-700">Profile</a>
                <a href="{{route('car.add')}}" class="block p-4 hover:bg-gray-700">Add car</a>
                <a href="{{route('car.yours')}}" class="block p-4 hover:bg-gray-700">Your car</a>
                <a href="#" class="block p-4 hover:bg-gray-700">Purchased parts</a>
                <a href="#" class="block p-4 hover:bg-gray-700">Contact</a>
            </nav>

        </div>
        <!-- Main Content -->
        <div class="flex-1 p-10 ">
            <div class="w-15 mx-auto bg-white rounded-lg shadow-md p-8">
                <div>

                    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Add car</h2>


                </div>
                <form class="mt-8 space-y-6 form-horizontal" action="{{route('car.insert')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="rounded-md shadow-sm -space-y-px">
                        <div id="imageInputs">
                            <label for="images">Images:</label>
                            <input required type="file" class="form-control" name="image" placeholder="image" multiple accept="image/*">
                        </div>
                        <button type="button" id="addImageInput">Add Image</button>
                        <div class="flex flex-col space-y-2 mx-4">
                            <label class="text-black-400">Make</label>
                            <select required name="make" class="px-4 py-2 rounded-lg border-none bg-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:ring focus:ring-blue-500">
                                <option value="Audi">Audi</option>
                                <option value="Bmw">Bmw</option>
                                <option value="Mercedes">Mercedes</option>
                                <!-- Add more options for make -->
                            </select>
                        </div>
                        <div class="flex flex-col space-y-2 mx-4">
                            <label for="model" class="">Model</label>
                            <input id="model" name="model" type="text"  required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email address" value="">
                        </div>
                        <div>
                            <h3 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Description</h3>
                        </div>
                        <div class="flex flex-col space-y-2 mx-4">
                            <label class="text-black-400">Year</label>
                            <select required name="year" class="px-4 py-2 rounded-lg border-none bg-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:ring focus:ring-blue-500">
                                <option value="">Select Year</option>
                                <option value="{{$year}}">{{$year}}</option>
                                @for($i = 0; $i < 50 ;$i++)
                                    <option value="{{$year-= 1}}">{{$year}}</option>
                                @endfor

                            </select>
                        </div>
                        <div class="flex flex-col space-y-2 mx-4">
                            <label for="mileage" class="">Mileage</label>
                            <input id="mileage" name="mileage" type="number" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Mileage" value="">
                        </div>
                        <div class="flex flex-col space-y-2 mx-4">
                            <label for="price" class="">Price</label>
                            <input id="price" name="price" type="number" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Price in euros" value="">
                        </div>
                        <div class="flex flex-col space-y-2 mx-4">
                            <label class="text-black-400">Body type</label>
                            <select required name="body_type" class="px-4 py-2 rounded-lg border-none bg-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:ring focus:ring-blue-500">
                                <option value="Hatchback">Hatchback</option>
                                <option value="Coupe">Coupe</option>
                                <option value="SUV">SUV</option>
                                <option value="Sedan">Sedan</option>
                                <option value="Station wagon">Station wagon</option>
                                <option value="Convertible">Convertible</option>
                            </select>
                            <label class="text-black-400">Fuel type</label>
                            <select required name="fuel_type" class="px-4 py-2 rounded-lg border-none bg-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:ring focus:ring-blue-500">
                                <option value="Petrol">Petrol</option>
                                <option value="Diesel">Diesel</option>
                                <option value="Hybrid">Hybrid</option>

                            </select>
                        </div>
                        <div class="flex flex-col space-y-2 mx-4">
                            <label class="text-black-400">Power</label>
                            <select required name="power" class="px-4 py-2 rounded-lg border-none bg-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:ring focus:ring-blue-500">
                                <option value="34">25KW (34KS)</option>
                                <option value="48">35KW (48KS)</option>
                                <option value="60">44KW (60KS)</option>
                                <option value="75">55KW (75KS)</option>
                                <option value="90">66KW (90KS)</option>
                                <option value="101">74KW (101KS)</option>
                                <option value="109">80KW (109KS)</option>
                                <option value="116">85KW (116KS)</option>
                                <option value="131">96KW (131KS)</option>
                                <option value="150">110KW (150KS)</option>
                                <option value="170">125KW (170KS)</option>
                                <option value="200">147KW (200KS)</option>
                                <option value="250">184KW (250KS)</option>

                            </select>

                            <label class="text-black-400">Gear</label>
                            <select required name="gear" class="px-4 py-2 rounded-lg border-none bg-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:ring focus:ring-blue-500">
                                <option value="Manual 4 gears">Manual 4 gears</option>
                                <option value="Manual 5 gears">Manual 5 gears</option>
                                <option value="Manual 6 gears">Manual 6 gears</option>
                                <option value="Automatic">Automatic</option>
                            </select>

                            <label class="text-black-400">Number of doors</label>
                            <select required name="number_of_doors" class="px-4 py-2 rounded-lg border-none bg-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:ring focus:ring-blue-500">
                                <option value="2">2/3</option>
                                <option value="5">4/5</option>

                            </select>
                            <div>
                                <label for="description" class="">Description</label>
                                <textarea name="description" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Description"></textarea>
                            </div>
                        </div>
                        <input  id="phone" name="user_car_id" type="hidden"  class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Phone number" value="{{auth()->user()->id}}">
                        @if ($errors->any())
                            <div class="alert alert-danger text-red">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>



                    <div class="flex items-center justify-center">
                        <button  type="submit" class="group relative flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Add your car
                        </button>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#addImageInput').click(function() {
            $('#imageInputs').append('<input type="file" name="images[]" class="imageInput" accept="image/*"><br>');
        });
    });
</script>
@include('Layouts.footer')
