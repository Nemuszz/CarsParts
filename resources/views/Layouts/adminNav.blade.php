<div class="flex flex-col">
    <!-- Navigation -->
    <div class="bg-gray-800 text-white flex justify-between items-center p-4">
        <span class="text-xl md:text-2xl font-semibold">Admin</span>
        <nav class=" flex">
            <a href="{{route('admin.page')}}" class="p-2 md:p-4 hover:bg-gray-700">Car requests</a>
            <a href="{{route('admin.users')}}" class="p-2 md:p-4 hover:bg-gray-700">Users</a>
            <a href="{{route('admin.parts.add')}}" class="p-2 md:p-4 hover:bg-gray-700">Parts</a>
            <a href="{{route('admin.orders')}}" class="p-2 md:p-4 hover:bg-gray-700">Orders</a>
            <a href="{{route('admin.messages')}}" class="p-2 md:p-4 hover:bg-gray-700">Messages</a>
        </nav>
    </div>
