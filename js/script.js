const mobileMenuButton = document.getElementById('mobile-menu-button');
const mobileMenu = document.getElementById('mobile-menu');

mobileMenuButton.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
});

// 1. Opening and Closing modals
let open = document.getElementById('open');
let close = document.getElementById('close');
let modal = document.getElementById('modal');

open.addEventListener("click", ()=>{
    modal.classList.remove('hidden');
})
close.addEventListener("click", ()=>{
    modal.classList.add('hidden');
})
