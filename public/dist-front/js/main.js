// Navbar menu
menu = document.getElementById('menu')
hamburger = document.getElementById('hamburger');
closeMenu = document.getElementById('closeMenu');

hamburger.addEventListener('click', function() {
    menu.classList.remove('hidden')
    menu.classList.add('flex')
    menu.classList.remove('translate-y-full')

})

closeMenu.addEventListener('click', function() {
    menu.classList.add('hidden')
    menu.classList.remove('flex')
    menu.classList.add('translate-y-full')
})