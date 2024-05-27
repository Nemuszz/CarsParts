@include('Layouts.nav')
<!-- CSS to position navigation buttons -->

<style>
    .swiper-button-prev, .swiper-button-next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 30px;
        height: 30px;
        background-color: rgba(0, 0, 0, 0.5);
        color: #fff;
        border-radius: 50%;
        cursor: pointer;
        z-index: 10;
    }

    .swiper-button-prev {
        left: 10px;
    }

    .swiper-button-next {
        right: 10px;
    }
    .image-box {
        margin-top: 10px;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .image-box:hover {
        opacity: 0.7;
    }
    .image-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .swiper-slide img {
        width: 100%;
        height: 100%;
        object-fit: contain !important;
    }
    .swiper-wrapper, .swiper-slide {
        height: auto !important;
    }
    .image-box{
        height: 100px;
        border: 1px solid black;
        width: 100px;
        margin-left: 10px;

    }



</style>
<div class=" relative mx-auto max-w-screen-xl bg-gray-400-100 p-8 min-h-screen rounded-lg shadow-md">

    <div class="flex">
        <div class="w-1/3 p-4">
            <div class="swiper-container overflow-hidden parent-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide flex items-center justify-center">
                        <div class="swiper-container child-swiper">
                            <div class="swiper-wrapper h-full">

                                @foreach($images as $image)
                                    <div class="swiper-slide h-full flex items-center justify-center">
                                        <img src="{{ asset('partsImages/' . $image->path) }}" alt="Car Image" class="object-contain w-full h-full max-w-full max-h-full">
                                    </div>

                                @endforeach
                            </div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex mb-3">
                @foreach($images as $image)
                    <div class="image-box">
                        <img src="{{ asset('partsImages/' . $image->path) }}" alt="Car Image" class="object-cover w-full h-full">
                    </div>
                @endforeach
            </div>

            <div class="w-full bg-white rounded-lg shadow-md p-8 mt-8 whitespace-pre-line">
                <h4 class="text-lg font-bold mb-2">Description</h4>
                <div class="max-w-full" style="overflow-wrap: break-word; word-wrap: break-word; overflow: hidden;">
                    {{$singePart->description}}
                </div>
            </div>

        </div>
        <div class="w-1/3 ">
            <h2 class="text-lg font-medium mb-4"><strong>{{$singePart->make}} {{$singePart->model}} {{$singePart->section}} {{$singePart->name}}</strong></h2>
            <p>Part code: {{$singePart->part_code}}</p>
            @if($singePart->amount > 0)
                <p class="text-sm text-green-600">&#10004; In Stock</p>
                <p class="text-sm text-green-600">&#10004; FREE Standard delivery available</p>
                <p class="text-sm text-green-600">&#10004; Next day delivery available (Order before 4pm Mon-Thur)</p>
                <form action="{{route('cart.add')}}" method="POST">
                    {{csrf_field()}}
                    <div class="flex items-center mt-4">
                        <input name="partId" value="{{$singePart->id}}" type="hidden">

                        <button id="decrease" class="flex items-center justify-center w-10 h-10 bg-gray-200 text-gray-600 rounded-l focus:outline-none focus:bg-gray-300 hover:bg-gray-300">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                            </svg>
                        </button>
                        <input id="inputAmount" name="amount" class="w-16 h-10 text-center bg-gray-100 border border-gray-300 focus:outline-none" value="1" min="1" max="{{$singePart->amount}}" readonly type="number">


                        <button id="increase" class="flex items-center justify-center w-10 h-10 bg-gray-200 text-gray-600 rounded-r focus:outline-none focus:bg-gray-300 hover:bg-gray-300">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </button>

                    </div>
                    <div class=" mt-3 mb-2 text-xl">
                        <p><strong>{{$singePart->price}} €</strong> <span class="text-sm">per one part</span></p>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Add to cart</button>
                    </div>
                </form>



            @else
                <p class="text-sm text-red-600 mt-4">&#215; Not In Stock</p>
                <p class="text-sm  mt-4">If u want to order this product u can contact us here:<a class="text-blue-500" href="{{route('user.contact', ['id' => auth()->user()->id])}}"> Message</a>  with number of product and amount of it, you will be contacted vie email.</p>
                <div class="mt-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Add to wish list</button>
                </div>
            @endif
        </div>
        <!-- 1/3 of flex -->
        <div class="w-1/3 p-4">
            <div class="bg-white rounded-lg shadow-md p-8 mt-8">
                <h2 class="text-xl font-bold mb-4">Featured Cars</h2>
                <p>Check out our latest collection of cars available for sale.</p>
                <p>Explore a wide range of brands, models, and years.</p>
                <a href="/cars" class="text-blue-500 hover:underline">View All Cars</a>
            </div>
            <div class="bg-white rounded-lg shadow-md p-8 mt-8">
                <h2 class="text-xl font-bold mb-4">Car Maintenance Tips</h2>
                <ul>
                    <li>Regular Oil Changes</li>
                    <li>Tire Rotation and Inspection</li>
                    <li>Check Fluid Levels</li>
                    <li>Inspect Brakes and Suspension</li>
                </ul>
                <a href="/cars" class="text-blue-500 hover:underline">Read More Tips</a>
            </div>
        </div>
    </div>



</div>



<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


<script>
    var parentSwiper = new Swiper('.parent-swiper', {
        loop: true,
        autoplay: false,
    });

    // Initialize Child Swiper
    var childSwiper = new Swiper('.child-swiper', {
        loop: true,
        autoplay: false,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });


</script>

<script>
    var inputAmount = document.getElementById('inputAmount');
    var decreaseButton = document.getElementById('decrease');
    var increaseButton = document.getElementById('increase');
    var minValue = parseInt(inputAmount.min);
    var maxValue = parseInt(inputAmount.max);

    decreaseButton.addEventListener('click', function(event) {
        event.preventDefault();
        var value = parseInt(inputAmount.value);
        if (value > minValue) {
            value--;
            inputAmount.value = value;
        }
    });

    increaseButton.addEventListener('click', function(event) {
        event.preventDefault();
        var value = parseInt(inputAmount.value);
        if (value < maxValue) {
            value++;
            inputAmount.value = value;
        }
    });

</script>
<script>
    const swiper = new Swiper('.swiper-container', {
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    const imageBoxes = document.querySelectorAll('.image-box');
    imageBoxes.forEach(imageBox => {
        imageBox.addEventListener('click', () => {
            const index = parseInt(imageBox.dataset.index);
            swiper.slideTo(index);
        });
    });
</script>



@include('Layouts.footer')
