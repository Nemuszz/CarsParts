@include('Layouts.nav')
<div class="flex h-screen">
    <!-- Sidebar -->
    <div class="bg-gray-800 text-white w-64 flex flex-col">
        <div class="p-4 flex justify-between items-center">
            <span class="text-2xl font-semibold">Dashboard</span>
            <button class="text-white focus:outline-none">
                <svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M6 6h2v12H6zm3.5 6l8.5 6V6z" />
                </svg>
            </button>
        </div>
        <nav class="flex-1 overflow-y-auto">
            <a href="#" class="block p-4 hover:bg-gray-700">Profile</a>
            <a href="#" class="block p-4 hover:bg-gray-700">Settings</a>
            <a href="#" class="block p-4 hover:bg-gray-700">Security</a>
            <a href="#" class="block p-4 hover:bg-gray-700">Notifications</a>
            <a href="#" class="block p-4 hover:bg-gray-700">Billing</a>
            <a href="#" class="block p-4 hover:bg-gray-700">Help</a>
        </nav>
        <div class="p-4">
            <a href="#" class="block p-2 rounded bg-gray-700 hover:bg-gray-600">Logout</a>
        </div>
    </div>
    <!-- Main Content -->
    <div class="flex-1 p-10">
        <div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-8">
            <div>
                <img class="mx-auto h-20 w-20 rounded-full" src="https://via.placeholder.com/150" alt="Profile Picture">
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">John Doe</h2>
                <p class="mt-2 text-center text-sm text-gray-600">Web Developer</p>
            </div>
            <form class="mt-8 space-y-6" action="#" method="POST">
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="username" class="sr-only">Username</label>
                        <input id="username" name="username" type="text" autocomplete="username" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Username" value="john_doe">
                    </div>
                    <div>
                        <label for="email-address" class="sr-only">Email address</label>
                        <input id="email-address" name="email" type="email" autocomplete="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email address" value="john@example.com">
                    </div>
                </div>

                <div class="flex items-center justify-center">
                    <button type="submit" class="group relative flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Update Profile
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@include('Layouts.footer')
