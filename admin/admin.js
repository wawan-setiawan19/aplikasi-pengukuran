// mendapatkan elemen sidenav dan konten
const sidenav = document.querySelector('.sidenav');
const main = document.querySelector('main');

// mendapatkan tombol untuk membuka dan menutup sidenav
const openNavBtn = document.querySelector('#openNav');
const closeNavBtn = document.querySelector('#closeNav');

openNavBtn.addEventListener('click',()=>{
    sidenav.style.left = "0px";
    openNavBtn.style.color = '#333'
})

closeNavBtn.addEventListener('click', ()=>{
    sidenav.style.left= "-200px";
    openNavBtn.style.color = '#fff'
})
