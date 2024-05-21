@include('Layouts.nav')
<div class=" mx-auto max-w-screen-xl bg-white p-8 rounded-lg shadow-md">
    <div class="flex min-h-screen h-auto">
        <!-- Sidebar -->

        @include('Layouts.userNav')

        <div class="flex-1 p-10 h-auto">
            @if(session('success'))
                <div class="bg-green-200 text-green-800 p-4 mb-4 rounded" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class=" mx-auto bg-white rounded-lg shadow-md p-8 ">
                <div>
                    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Contact us</h2>
                </div>

            </div>
            <div class="max-w-xl mx-auto mt-10 px-4 py-6 bg-white shadow-md rounded-lg">
                <h2 class="text-2xl font-semibold mb-4">Contact Us</h2>
                <form action="{{route('user.message', ['id'=> auth()->user()->id])}}" method="POST">
                    {{csrf_field()}}
                    <div class="mb-6">
                    <p class="text-gray-600 text-sm">Your profile information will be automatically populated and sent along with your message.</p>
                        <p class="text-gray-600 text-sm"><strong>You will receive our response via email.</strong></p>
                    </div>
                    <div class="mb-4">
                        <label for="subject" class="block text-gray-700 font-medium">Subject</label>
                        <input type="text" id="subject" name="subject" value="{{old('subject')}}" class="mt-1 px-4 py-2 w-full border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="message" class="block text-gray-700 font-medium">Message</label>
                        <textarea id="message" name="message" rows="4" class="mt-1 px-4 py-2 w-full border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" required>{{old('message')}}</textarea>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger text-red flex justify-center text-red-600">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="mt-6 flex justify-center">
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Submit</button>
                    </div>
                </form>

            </div>

        </div>

    </div>
</div>

<!-- Main Content -->




@include('Layouts.footer')
