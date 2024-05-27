
//hide and who at nav bar
var drop_btn = document.getElementById('drop_btn');
var drop_menu = document.getElementById('drop_menu');
var cart_link = document.getElementById('cart_link');
var cart_div = document.getElementById('cart_div');

drop_btn.addEventListener('click', function() {
    drop_menu.classList.toggle('display');

});

cart_link.addEventListener('click', function() {
    cart_div.classList.toggle('hidden');

});




