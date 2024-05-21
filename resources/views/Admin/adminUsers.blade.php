@include('Layouts.nav')
<div class="mx-auto max-w-screen-xl min-h-screen bg-white p-4 md:p-8 rounded-lg shadow-md">
    <!-- Main Content -->
    @include('Layouts.adminNav')
        <!-- Table -->
        <div class="flex-1">
            <div class="mx-auto bg-white rounded-lg shadow-md p-4 md:p-8">
                <div>
                    <h2 class="mt-6 mb-4 text-center text-lg md:text-3xl font-extrabold text-gray-900 border-b-2 border-gray-300 pb-2">Messages</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full divide-y divide-gray-200">
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
