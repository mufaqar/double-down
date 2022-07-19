function openMobileMenu() {
    var menu = document.querySelector('.menu');
    var closeNavBtn = document.querySelector('.closenav');
    var openNavBtn = document.querySelector('.opennav');
    closeNavBtn.style.display = "block";
    openNavBtn.style.display = "none";
    menu.style.top = "4.6rem";
}

function closeMobileMenu(){
    var menu = document.querySelector('.menu');
    var closeNavBtn = document.querySelector('.closenav');
    var openNavBtn = document.querySelector('.opennav');
    closeNavBtn.style.display = "none";
    openNavBtn.style.display = "block";
    menu.style.top = "-40rem";
}