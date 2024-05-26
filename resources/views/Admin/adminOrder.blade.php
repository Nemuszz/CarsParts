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
                        <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">#</th>
                        <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">Subject</th>
                        <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">Message</th>
                        <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">Name</th>
                        <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">Email</th>
                        <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">Phone</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                    </tbody>
                </table>
            </div>
        </div>






    </div>
</div>
</div>
@include('Layouts.footer')
