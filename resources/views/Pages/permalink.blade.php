@include('Layouts.nav')
<div class="mx-auto max-w-screen-xl bg-gray-400-100 p-8 rounded-lg shadow-md">
        <!-- 2/3 of flex -->
    <div class="flex">
        <!-- 2/3 of flex -->
        <div class="w-2/3  p-4">
            <h2 class="text-2xl  mb-4"><strong>{{$car->make}} {{$car->model}} {{$car->body_type}}</strong><span class=" text-xl text-gray-500"> {{$car->year}}.year</span></h2>
            <div class="bg-gray-300 placeholder-image mb-4">
                <img src="{{$car->image}}" alt="Image">
            </div>
            <div class="flex mb-3 ">
                <div class="image-box" >1</div>
                <div class="image-box">2</div>
                <div class="image-box">3</div>
                <div class="image-box">4</div>
                <div class="image-box">5</div>
                <div class="image-box">6</div>

            </div>
            <div class="  rounded-lg shadow-md p-8 bg-gray-200">

                <div class=" bg-white rounded-lg shadow-md p-8">

                    <h3 class="text-xl font-bold mb-4">Car Information</h3>
                    <div class="flex flex-wrap">
                        <!-- First column -->
                        <ul class="w-1/2 pb-2 pr-4">
                            <li class="border-b border-gray-300 flex justify-between mb-2.5">
                                <span class="font-semibold">Make:</span>
                                <span>{{$car->make}}</span>
                            </li>
                            <li class="border-b border-gray-300 flex justify-between mb-2.5">
                                <span class="font-semibold">Model:</span>
                                <span>{{$car->model}}</span>
                            </li>
                            <li class="border-b border-gray-300 flex justify-between mb-2.5">
                                <span class="font-semibold">Year:</span>
                                <span>{{$car->year}}</span>
                            </li>
                            <li class="border-b border-gray-300 flex justify-between mb-2.5">
                                <span class="font-semibold">Mileage:</span>
                                <span>{{$car->mileage}}</span>
                            </li>
                            <li class="border-b border-gray-300 flex justify-between mb-2.5">
                                <span class="font-semibold">Body type:</span>
                                <span>{{$car->body_type}}</span>
                            </li>
                        </ul>
                        <!-- Second column -->
                        <ul class="w-1/2 pb-2 pl-4">
                            <li class="border-b border-gray-300 flex justify-between mb-2.5">
                                <span class="font-semibold">Fuel type:</span>
                                <span>{{$car->fuel_type}}</span>
                            </li>
                            <li class="border-b border-gray-300 flex justify-between mb-2.5">
                                <span class="font-semibold">Power:</span>
                                <span>{{$car->power}} HP</span>
                            </li>
                            <li class="border-b border-gray-300 flex justify-between mb-2.5">
                                <span class="font-semibold">Gear:</span>
                                <span>{{$car->gear}}</span>
                            </li>
                            <li class="border-b border-gray-300 flex justify-between mb-2.5">
                                <span class="font-semibold">Number of doors:</span>
                                <span>{{$car->number_of_doors}}</span>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="bg-white rounded-lg shadow-md p-8 mt-8 whitespace-pre-line">
                    <h4 class="text-lg font-bold mb-2">Description</h4>
                    <div class="max-w-full" style="overflow-wrap: break-word; word-wrap: break-word; overflow: hidden;">
                        {{$car->description}}
                    </div>
                </div>
            </div>
        </div>

        <!-- 1/3 of flex -->
        <div class="w-1/3  p-4">
            <div class="text-left">
                <h3 class="text-3xl font-bold text-black">{{$car->price}} €</h3>
            </div>
            <div class="bg-white rounded-lg shadow-md p-8 mt-8">
                <p class="text-lg font-semibold mb-4">Information about seller</p>
                <ul class=" pb-2 pr-4">
                    <li class="border-b border-gray-300 flex justify-between mb-2.5">
                        <span class="font-semibold">Country:</span>
                        <span>{{$user->country}}</span>
                    </li>
                    <li class="border-b border-gray-300 flex justify-between mb-2.5">
                        <span class="font-semibold">City:</span>
                        <span>{{$user->city}}</span>
                    </li>
                    <li class="border-b border-gray-300 flex justify-between mb-2.5">
                        <span class="font-semibold">Address:</span>
                        <span>{{$user->address}}</span>
                    </li>
                    <li class="border-b border-gray-300 flex justify-between mb-2.5">
                        <span class="font-semibold">Phone:</span>
                        <span>{{$user->phone}}</span>
                    </li>
                </ul>
            </div>
            <div class="bg-white rounded-lg shadow-md p-8 mt-8">
                <h2 class="text-xl font-bold mb-4">Featured Cars</h2>
                <p>Check out our latest collection of cars available for sale.</p>
                <p>Explore a wide range of brands, models, and years.</p>
                <a href="/cars" class="text-blue-500 hover:underline">View All Cars</a>
            </div>
            <div class="bg-white rounded-lg shadow-md p-8 mt-8">
                <h2 class="text-xl font-bold mb-4">Car Maintenance Tips</h2>
                <ul>
                    <li>Regular Oil Changes</li>
                    <li>Tire Rotation and Inspection</li>
                    <li>Check Fluid Levels</li>
                    <li>Inspect Brakes and Suspension</li>
                </ul>
                <a href="/cars" class="text-blue-500 hover:underline">Read More Tips</a>
            </div>


        </div>
    </div>

    <style>
        .placeholder-image {
            height: 500px; /* Adjust the height as needed */
            width: auto;
        }
        .image-box{
            height: 100px;
            border: 1px solid black;
            width: 100px;
            margin-left: 10px;

        }
    </style>
    </div>
</div>
<!-- Main Content -->




@include('Layouts.footer')
