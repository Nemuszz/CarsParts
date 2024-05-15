var drop_btn = document.getElementById('drop_btn');
var drop_menu = document.getElementById('drop_menu');

// Step 2: Add event listener to toggle the menu
drop_btn.addEventListener('click', function() {
    // Step 3: Toggle the class to show/hide the menu
    drop_menu.classList.toggle('display');
});
