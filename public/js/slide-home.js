let slides = document.querySelectorAll('.slide-container');
const backButton = document.getElementById('back'); 
const nextButton = document.getElementById('next');
let index = 0;

function next() {
    slides[index].classList.remove('active');
    index = (index + 1) % slides.length;
    slides[index].classList.add('active');
}

function back() {
    slides[index].classList.remove('active');
    index = (index - 1 + slides.length) % slides.length;
    slides[index].classList.add('active');
}

setInterval(next, 8000);

backButton.addEventListener('click', back);
nextButton.addEventListener('click', next);

