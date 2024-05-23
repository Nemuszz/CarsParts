<div class=" bg-gray-900 text-white py-4">
<footer class=" mx-auto max-w-screen-xl bg-gray-900 text-white py-8">
    <div class="container mx-auto flex flex-wrap justify-center items-center">
        <div class="w-full md:w-1/2 mb-6 md:mb-0 text-center md:text-left">
            <a href="/" class="text-2xl font-bold">Cars&Parts</a>
            <p class="mt-4">123 Main Street</p>
            <p>City, State ZIP</p>
            <p>Phone: (123) 456-7890</p>
            <p>Email: info@secondhandcars.com</p>
        </div>
        <div class="w-full md:w-1/2 text-center md:text-right">
            <h3 class="text-lg mb-4">Follow Us</h3>
            <div class="flex justify-center md:justify-end space-x-4">
                <a href="#" class="text-white hover:text-gray-400">
                    <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"></svg>
                </a>
                <!-- Add more social media icons here -->
            </div>
        </div>
    </div>
    <div class="text-center mt-8">
        <p>&copy; 2024 Second Hand Cars. All rights reserved.</p>
    </div>
</footer>
</div>
<script>
    document.getElementById('cart_link').addEventListener('click', function() {
        var cartDiv = document.getElementById('cart_div');
        cartDiv.classList.toggle('hidden');
    });
</script>








<script src="{{ asset('index.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
