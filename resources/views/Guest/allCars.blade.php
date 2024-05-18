
@include('Layouts.nav')
<div class=" mx-auto max-w-screen-xl">
<header class="bg-gray-900 text-white py-20 px-8">
    <div class="container mx-auto text-center">
        <h1 class="text-4xl font-bold mb-6">Find Your Dream Car</h1>
        <p class="text-lg mb-8">Browse through our collection of high-quality secondhand cars</p>
        <div class="flex justify-center flex-wrap">
            <!-- Year, Mileage, Make -->
            <div class="flex flex-col space-y-2 mx-4">
                <label class="text-gray-400">Year</label>
                <select class="px-4 py-2 rounded-lg border-none bg-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:ring focus:ring-blue-500">
                    <option value="">Select Year</option>
                    <option value="2022">2022</option>
                    <option value="2021">2021</option>
                    <option value="2020">2020</option>
                    <!-- Add more options for years -->
                </select>
            </div>
            <div class="flex flex-col space-y-2 mx-4">
                <label class="text-gray-400">Mileage</label>
                <select class="px-4 py-2 rounded-lg border-none bg-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:ring focus:ring-blue-500">
                    <option value="">Select Mileage</option>
                    <option value="0-5000">0-5000 miles</option>
                    <option value="5000-10000">5000-10000 miles</option>
                    <option value="10000-20000">10000-20000 miles</option>
                    <!-- Add more options for mileage -->
                </select>
            </div>
            <div class="flex flex-col space-y-2 mx-4">
                <label class="text-gray-400">Make</label>
                <select class="px-4 py-2 rounded-lg border-none bg-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:ring focus:ring-blue-500">
                    <option value="">Select Make</option>
                    <option value="Toyota">Toyota</option>
                    <option value="Honda">Honda</option>
                    <option value="Ford">Ford</option>
                    <!-- Add more options for make -->
                </select>
            </div>
            <!-- Model, Price, Search Button -->
            <div class="flex flex-col space-y-2 mx-4">
                <label class="text-gray-400">Model</label>
                <select class="px-4 py-2 rounded-lg border-none bg-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:ring focus:ring-blue-500">
                    <option value="">Select Model</option>
                    <option value="Corolla">Corolla</option>
                    <option value="Civic">Civic</option>
                    <option value="F-150">F-150</option>
                    <!-- Add more options for model -->
                </select>
            </div>
            <div class="flex flex-col space-y-2 mx-4">
                <label class="text-gray-400">Price</label>
                <input placeholder="Up till price                      $" class="px-4 py-2 rounded-lg border-none bg-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:ring focus:ring-blue-500">
            </div>
            <div class="flex flex-col space-y-2 mx-4">
                <label class="text-gray-400 invisible">Condition</label>
                <button class="px-4 py-2 bg-blue-500 text-white rounded-lg focus:outline-none focus:bg-blue-600"><a href="#">Search</a></button>
            </div>
        </div>
    </div>
</header>






<!-- Car Listings -->
<section class="container mx-auto my-12">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        <!-- Car Card 1 -->
        <div class="bg-white rounded shadow-md p-4 car-card">
            <!-- Car Image -->
            <img src="" alt="Car 1" class="w-full h-48 object-cover mb-4 rounded">

            <!-- Car Details -->
            <h2 class="text-xl font-bold mb-2">Car Title</h2>
            <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

            <!-- View Details Button -->
            <a href="#" class="block bg-blue-500 text-white py-2 px-4 rounded mt-4 hover:bg-blue-600">View
                Details</a>
        </div>

        <!-- Car Card 2 -->
        <div class="bg-white rounded shadow-md p-4 car-card">
            <!-- Car Image -->
            <img src="" alt="Car 1" class="w-full h-48 object-cover mb-4 rounded">

            <!-- Car Details -->
            <h2 class="text-xl font-bold mb-2">Car Title</h2>
            <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

            <!-- View Details Button -->
            <a href="#" class="block bg-blue-500 text-white py-2 px-4 rounded mt-4 hover:bg-blue-600">View
                Details</a>
        </div>
        <div class="bg-white rounded shadow-md p-4 car-card">
            <!-- Car Image -->
            <img src="" alt="Car 1" class="w-full h-48 object-cover mb-4 rounded">

            <!-- Car Details -->
            <h2 class="text-xl font-bold mb-2">Car Title</h2>
            <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

            <!-- View Details Button -->
            <a href="#" class="block bg-blue-500 text-white py-2 px-4 rounded mt-4 hover:bg-blue-600">View
                Details</a>
        </div>
        <div class="bg-white rounded shadow-md p-4 car-card">
            <!-- Car Image -->
            <img src="" alt="Car 1" class="w-full h-48 object-cover mb-4 rounded">

            <!-- Car Details -->
            <h2 class="text-xl font-bold mb-2">Car Title</h2>
            <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

            <!-- View Details Button -->
            <a href="#" class="block bg-blue-500 text-white py-2 px-4 rounded mt-4 hover:bg-blue-600">View
                Details</a>
        </div>

        <!-- Add more car cards here -->
    </div>
</section>
</div>

@include('Layouts.footer')
