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
                <a href="{{route('car.yours')}}" class="block p-4 hover:bg-gray-700">Your car</a>
                <a href="#" class="block p-4 hover:bg-gray-700">Purchased parts</a>
                <a href="#" class="block p-4 hover:bg-gray-700">Contact</a>
            </nav>

        </div>
        <!-- Main Content -->
        <div class="flex-1 p-10 ">
            <div class=" mx-auto bg-white rounded-lg shadow-md p-8 ">
                <div>
                    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Your Cars</h2>
                </div>

            </div>
            <div class="mx-auto bg-white rounded-lg shadow-md p-8 mt-2">
            <!-- Right side - Info for car -->
            <div class="flex">
                <!-- Left side - Image of car -->
                <div class="w-1/2">
                    <img src="" alt="Car Image" class="w-full">
                </div>

                <!-- Right side - Info for car -->
                <div class="w-1/2">
                    <h2 class="text-xl font-bold mb-4">Car Information</h2>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p><strong>Make:</strong> Audi</p>
                            <p><strong>Model:</strong> A4</p>
                            <p><strong>Year:</strong> 2022</p>
                        </div>
                        <div>
                            <p><strong>Mileage:</strong> 30,000 miles</p>
                            <p><strong>Price:</strong> $25,000</p>
                            <!-- Add more car information as needed -->
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
</div>

@include('Layouts.footer')
