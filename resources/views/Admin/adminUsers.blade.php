@include('Layouts.nav')
<div class=" mx-auto max-w-screen-xl bg-white p-8 rounded-lg shadow-md">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="bg-gray-800 text-white w-64 h-50 flex flex-col">
            <div class="p-4 flex justify-between items-center">
                <span class="text-2xl font-semibold">Admin</span>

            </div>
            <nav class="flex-1 overflow-y-auto">
                <a href="{{route('admin.page')}}" class="block p-4 hover:bg-gray-700">Car requests</a>
                <a href="{{route('admin.users')}}" class="block p-4 hover:bg-gray-700">Users</a>
                <a href="" class="block p-4 hover:bg-gray-700">Orders</a>
                <a href="#" class="block p-4 hover:bg-gray-700">Messages</a>

            </nav>

        </div>
        <!-- Main Content -->
        <div class="flex-1 p-10 ">
            <div class="w-15 mx-auto bg-white rounded-lg shadow-md p-8">
                <div>

                    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Users list</h2>

                </div>
                <div class="w-15 mx-auto bg-white rounded-lg shadow-md p-8">
                    <table class="w-full sm:w-4/5 md:w-3/4 lg:w-2/3 xl:w-1/2 divide-y divide-gray-200">
                        <thead class="bg-gray-800">
                        <tr>
                            <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">Name</th>
                            <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">Email</th>
                            <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">Country</th>
                            <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">City</th>
                            <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">Address</th>
                            <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">Postcode</th>
                            <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">Phone</th>
                            <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">Role</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($adminUsers as $adminUser)
                            <tr>
                                <td class="px-2 py-1 whitespace-nowrap">{{$adminUser->name}}</td>
                                <td class="px-2 py-1 whitespace-nowrap">{{$adminUser->email}}</td>
                                <td class="px-2 py-1 whitespace-nowrap">{{$adminUser->country}}</td>
                                <td class="px-2 py-1 whitespace-nowrap">{{$adminUser->city}}</td>
                                <td class="px-2 py-1 whitespace-nowrap">{{$adminUser->address}}</td>
                                <td class="px-2 py-1 whitespace-nowrap">{{$adminUser->postcode}}</td>
                                <td class="px-2 py-1 whitespace-nowrap">{{$adminUser->phone}}</td>
                                <td class="px-2 py-1 whitespace-nowrap">{{$adminUser->role}}</td>
                            </tr>
                        @endforeach

                        @foreach($justUsers as $justUser)
                            <tr>
                                <td class="px-2 py-1 whitespace-nowrap">{{$justUser->name}}</td>
                                <td class="px-2 py-1 whitespace-nowrap">{{$justUser->email}}</td>
                                <td class="px-2 py-1 whitespace-nowrap">{{$justUser->country}}</td>
                                <td class="px-2 py-1 whitespace-nowrap">{{$justUser->city}}</td>
                                <td class="px-2 py-1 whitespace-nowrap">{{$justUser->address}}</td>
                                <td class="px-2 py-1 whitespace-nowrap">{{$justUser->postcode}}</td>
                                <td class="px-2 py-1 whitespace-nowrap">{{$justUser->phone}}</td>
                                <td class="px-2 py-1 whitespace-nowrap">{{$justUser->role}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@include('Layouts.footer')
