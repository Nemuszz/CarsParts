@include('Layouts.nav')
<div class="mx-auto max-w-screen-xl bg-white p-4 md:p-8 rounded-lg shadow-md">
    <!-- Main Content -->
    <div class="flex flex-col">
        <!-- Navigation -->
        <div class="bg-gray-800 text-white flex justify-between items-center p-4">
            <span class="text-xl md:text-2xl font-semibold">Admin</span>
            <nav class="hidden md:flex">
                <a href="{{route('admin.page')}}" class="p-2 md:p-4 hover:bg-gray-700">Car requests</a>
                <a href="{{route('admin.users')}}" class="p-2 md:p-4 hover:bg-gray-700">Users</a>
                <a href="" class="p-2 md:p-4 hover:bg-gray-700">Orders</a>
                <a href="{{route('admin.messages')}}" class="p-2 md:p-4 hover:bg-gray-700">Messages</a>
            </nav>
        </div>
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
                            <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">#</th>
                            <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">Subject</th>
                            <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">Message</th>
                            <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">Name</th>
                            <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">Email</th>
                            <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">Phone</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($messages as $message)
                            <tr>
                                <td class="px-2 py-1 whitespace-nowrap">{{ $loop->iteration }}</td>
                                <td class="px-2 py-1 whitespace-nowrap">{{$message->subject}}</td>
                                <td class="px-2 py-1">
                                    <div class="max-w-xs md:max-w-full overflow-hidden" style="word-wrap: break-word;">{{$message->message}}</div>
                                </td>
                                <td class="px-2 py-1 whitespace-nowrap">{{$message->name}}</td>
                                <td class="px-2 py-1 whitespace-nowrap">{{$message->email}}</td>
                                <td class="px-2 py-1 whitespace-nowrap">{{$message->phone}}</td>
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
