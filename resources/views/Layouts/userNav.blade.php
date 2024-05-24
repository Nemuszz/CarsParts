<div class="bg-gray-800 text-white w-64 h-50 flex flex-col">
    <div class="p-4 flex justify-between items-center">
        <span class="text-2xl font-semibold">Dashboard</span>

    </div>
    <nav class="flex-1 overflow-y-auto">
        <a href="{{route('user.profile', ['id'=> auth()->user()->id])}}" class="block p-4 hover:bg-gray-700">Profile</a>
        <a href="{{route('car.add')}}" class="block p-4 hover:bg-gray-700">Add car</a>
        <a href="{{route('car.yours', ['id'=> auth()->user()->id])}}" class="block p-4 hover:bg-gray-700">Your car</a>
        <a href="{{route('user.cart')}}" class="block p-4 hover:bg-gray-700">Purchased parts</a>
        <a href="{{route('user.contact', ['id'=> auth()->user()->id])}}" class="block p-4 hover:bg-gray-700">Contact</a>
    </nav>

</div>
