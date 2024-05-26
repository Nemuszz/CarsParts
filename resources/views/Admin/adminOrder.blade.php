@include('Layouts.nav')
<div class="mx-auto max-w-screen-xl min-h-screen bg-white p-4 md:p-8 rounded-lg shadow-md">
    <!-- Main Content -->
    @include('Layouts.adminNav')
    <!-- Table -->
    <div class="flex-1">



        <div class="flex-1">
            <div class="mx-auto bg-white rounded-lg shadow-md p-4 md:p-8">
                <div>
                    <h2 class="mt-6 mb-4 text-center text-lg md:text-3xl font-extrabold text-gray-900 border-b-2 border-gray-300 pb-2">Orders</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full divide-y divide-gray-200">
                        <thead class="bg-gray-800">
                        <tr>
                            <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">Part code</th>
                            <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">Amount</th>
                            <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">Price</th>
                            <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">Date</th>
                            <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">Email</th>
                            <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">Country</th>
                            <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">City</th>
                            <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">Address</th>
                            <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">Postcode</th>

                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($parts as $part)
                            <tr>
                                <td class="px-2 py-1 whitespace-nowrap">{{$part->part_code}}</td>
                                <td class="px-2 py-1 whitespace-nowrap">{{$part->amount}}</td>
                                <td class="px-2 py-1 whitespace-nowrap">{{$part->price}}</td>
                                <td class="px-2 py-1 whitespace-nowrap">{{$part->created_at }}</td>
                                <!-- Assuming each part has a user_id associated -->
                                <!-- Fetch user data for the part -->
                                @php
                                    $user = App\Models\User::find($part->user_id);
                                @endphp
                                <td class="px-2 py-1 whitespace-nowrap">{{$user->email}}</td>
                                <td class="px-2 py-1 whitespace-nowrap">{{$user->country}}</td>
                                <td class="px-2 py-1 whitespace-nowrap">{{$user->city}}</td>
                                <td class="px-2 py-1 whitespace-nowrap">{{$user->address}}</td>
                                <td class="px-2 py-1 whitespace-nowrap">{{$user->postcode}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>






    </div>
</div>
</div>
@include('Layouts.footer')
