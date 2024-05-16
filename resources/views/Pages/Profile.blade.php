@include('Layouts.nav')
<div class=" mx-auto bg-white p-8 rounded-lg shadow-md">
<div class="flex h-screen">
    <!-- Sidebar -->
    <div class="bg-gray-800 text-white w-64 h-50 flex flex-col">
        <div class="p-4 flex justify-between items-center">
            <span class="text-2xl font-semibold">Dashboard</span>

        </div>
        <nav class="flex-1 overflow-y-auto">
            <a href="#" class="block p-4 hover:bg-gray-700">Profile</a>
            <a href="#" class="block p-4 hover:bg-gray-700">Settings</a>
            <a href="#" class="block p-4 hover:bg-gray-700">Security</a>
            <a href="#" class="block p-4 hover:bg-gray-700">Notifications</a>
            <a href="#" class="block p-4 hover:bg-gray-700">Billing</a>
            <a href="#" class="block p-4 hover:bg-gray-700">Help</a>
        </nav>

    </div>
    <!-- Main Content -->
    <div class="flex-1 p-10 ">
        <div class="w-15 mx-auto bg-white rounded-lg shadow-md p-8">
            <div>

                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Profile</h2>

            </div>
            <form class="mt-8 space-y-6" action="{{route('user.edit')}}" method="POST">
                {{csrf_field()}}
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="username" class="">Name</label>
                        <input id="username" name="name" type="text"  required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Username" value="{{$profileinfo->name}}">
                    </div>
                    <div>
                        <label for="email-address" class="">Email address</label>
                        <input id="email-address" name="email" type="email"  required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email address" value="{{$profileinfo->email}}">
                    </div>
                    <div>
                        <h3 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Address</h3>
                    </div>
                    <div>
                        <label for="country" class="">Country</label>
                        <input id="country" name="country" type="text" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Country" value="{{$profileinfo->country}}">
                    </div>
                    <div>
                        <label for="city" class="">City</label>
                        <input id="city" name="city" type="text" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="City" value="{{$profileinfo->city}}">
                    </div>
                    <div>
                        <label for="address" class="">Address</label>
                        <input id="address" name="address" type="text" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Address" value="{{$profileinfo->address}}">
                    </div>
                    <div>
                        <label for="postcode" class="">Postcode</label>
                        <input id="postcode" name="postcode" type="number" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Postcode" value="{{$profileinfo->postcode}}">
                    </div>
                    <div>
                        <label for="phone" class="">Phone number</label>
                        <input id="phone" name="phone" type="number"  class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Phone number" value="{{$profileinfo->number}}">
                    </div>
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
