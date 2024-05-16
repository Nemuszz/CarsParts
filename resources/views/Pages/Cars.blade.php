@include('Layouts.nav')
<div class=" mx-auto bg-white p-8 rounded-lg shadow-md">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="bg-gray-800 text-white w-64 h-50 flex flex-col">
            <div class="p-4 flex justify-between items-center">
                <span class="text-2xl font-semibold">Dashboard</span>

            </div>
            <nav class="flex-1 overflow-y-auto">
                <a href="{{route('user.profile', ['id'=> auth()->user()->id])}}" class="block p-4 hover:bg-gray-700">Profile</a>
                <a href="{{route('car.add')}}" class="block p-4 hover:bg-gray-700">Add car</a>
                <a href="#" class="block p-4 hover:bg-gray-700">Your car</a>
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
                <form class="mt-8 space-y-6" action="{{route('car.insert')}}" method="POST">
                    {{csrf_field()}}
                    <div class="rounded-md shadow-sm -space-y-px">
                        <div>
                            <label for="image">Image:</label>
                            <input type="file" name="image" id="image" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Username" value="">
                        </div>
                        <div>
                            <label for="username" class="">Make</label>
                            <input id="username" name="make" type="text"  required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Username" value="">
                        </div>
                        <div>
                            <label for="email-address" class="">Model</label>
                            <input id="email-address" name="model" type="text"  required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email address" value="">
                        </div>
                        <div>
                            <h3 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Description</h3>
                        </div>
                        <div>
                            <label for="country" class="">Year</label>
                            <input id="country" name="year" type="number" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Country" value="">
                        </div>
                        <div>
                            <label for="city" class="">mileage</label>
                            <input id="city" name="mileage" type="number" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="City" value="">
                        </div>
                        <div>
                            <label for="address" class="">price</label>
                            <input id="address" name="price" type="number" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Address" value="">
                        </div>
                        <div>
                            <label for="postcode" class="">Body type</label>
                            <input id="postcode" name="body_type" type="text" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Postcode" value="">
                        </div>
                        <div>
                            <label for="phone" class="">Fuel_type</label>
                            <input id="phone" name="fuel_type" type="text"  class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Phone number" value="">
                        </div>
                        <div>
                            <label for="phone" class="">Power</label>
                            <input id="phone" name="power" type="number"  class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Phone number" value="">
                        </div>
                        <div>
                            <label for="phone" class="">Gear</label>
                            <input id="phone" name="gear" type="text"  class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Phone number" value="">
                        </div>
                        <div>
                            <label for="phone" class="">Number of doors</label>
                            <input id="phone" name="number_of_doors" type="number"  class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Phone number" value="">
                        </div>
                        <div>
                            <label for="phone" class="">Description</label>
                            <input id="phone" name="description" type="text"  class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Phone number" value="">
                        </div>
                        <input id="phone" name="user_car_id" type="number"  class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Phone number" value="{{auth()->user()->id}}">

                    </div>


                    <div class="flex items-center justify-center">
                        <button  type="submit" class="group relative flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Update profile
                        </button>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>
@include('Layouts.footer')
