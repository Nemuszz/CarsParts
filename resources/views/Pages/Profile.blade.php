@include('Layouts.nav')
<div class=" mx-auto max-w-screen-xl bg-white p-8 rounded-lg shadow-md">
<div class="flex h-screen">
    <!-- Sidebar -->
    @include('Layouts.userNav')
    <!-- Main Content -->
    <div class="flex-1 p-10 ">
        <div class="w-15 mx-auto bg-white rounded-lg shadow-md p-8">
            @if(session('success'))
                <div class="bg-green-200 text-green-800 p-4 mb-4 rounded" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div>

                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Profile</h2>

            </div>
            <form class="mt-8 space-y-6" action="{{route('user.edit', $user->id)}}" method="POST">
                {{csrf_field()}}
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="username" class="">Name</label>
                        <input id="username" name="name" type="text"  required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Username" value="{{$user->name}}">
                    </div>
                    <div>
                        <label for="email-address" class="">Email address</label>
                        <input id="email-address" name="email" type="email"  required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email address" value="{{$user->email}}">
                    </div>
                    <div>
                        <h3 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Address</h3>
                    </div>
                    <div>
                        <label for="country" class="">Country</label>
                        <input id="country" name="country" type="text" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Country" value="{{$user->country}}">
                    </div>
                    <div>
                        <label for="city" class="">City</label>
                        <input id="city" name="city" type="text" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="City" value="{{$user->city}}">
                    </div>
                    <div>
                        <label for="address" class="">Address</label>
                        <input id="address" name="address" type="text" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Address" value="{{$user->address}}">
                    </div>
                    <div>
                        <label for="postcode" class="">Postcode</label>
                        <input id="postcode" name="postcode" type="number" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Postcode" value="{{$user->postcode}}">
                    </div>
                    <div>
                        <label for="phone" class="">Phone number</label>
                        <input id="phone" name="phone" type="number"  class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Phone number" value="{{$user->phone}}">
                    </div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger text-red">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

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
