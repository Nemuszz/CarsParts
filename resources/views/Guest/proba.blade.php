
@include('Layouts.nav')
<!-- Hero Section -->
<header class="bg-gray-900 text-white py-20 px-8">
    <div class="container mx-auto">
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
            <img src="car1.jpg" alt="Car 1" class="w-full h-48 object-cover mb-4 rounded">

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
            <img src="car.jpg" alt="Car 1" class="w-full h-48 object-cover mb-4 rounded">

            <!-- Car Details -->
            <h2 class="text-xl font-bold mb-2">Car Title</h2>
            <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

            <!-- View Details Button -->
            <a href="#" class="block bg-blue-500 text-white py-2 px-4 rounded mt-4 hover:bg-blue-600">View
                Details</a>
        </div>
        <div class="bg-white rounded shadow-md p-4 car-card">
            <!-- Car Image -->
            <img src="car1.jpg" alt="Car 1" class="w-full h-48 object-cover mb-4 rounded">

            <!-- Car Details -->
            <h2 class="text-xl font-bold mb-2">Car Title</h2>
            <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

            <!-- View Details Button -->
            <a href="#" class="block bg-blue-500 text-white py-2 px-4 rounded mt-4 hover:bg-blue-600">View
                Details</a>
        </div>
        <div class="bg-white rounded shadow-md p-4 car-card">
            <!-- Car Image -->
            <img src="car1.jpg" alt="Car 1" class="w-full h-48 object-cover mb-4 rounded">

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

<footer class="bg-gray-900 text-white py-8">
    <div class="container mx-auto flex flex-wrap justify-center items-center">
        <div class="w-full md:w-1/2 mb-6 md:mb-0 text-center md:text-left">
            <a href="/" class="text-2xl font-bold">Cars&Parts</a>
            <p class="mt-4">123 Main Street</p>
            <p>City, State ZIP</p>
            <p>Phone: (123) 456-7890</p>
            <p>Email: info@secondhandcars.com</p>
        </div>
        <div class="w-full md:w-1/2 text-center md:text-right">
            <h3 class="text-lg mb-4">Follow Us</h3>
            <div class="flex justify-center md:justify-end space-x-4">
                <a href="#" class="text-white hover:text-gray-400">
                    <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"></svg>
                </a>
                <!-- Add more social media icons here -->
            </div>
        </div>
    </div>
    <div class="text-center mt-8">
        <p>&copy; 2024 Second Hand Cars. All rights reserved.</p>
    </div>
</footer>









<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
