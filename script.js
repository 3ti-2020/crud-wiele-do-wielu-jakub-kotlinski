const zmiana = document.querySelector('.zmiana_koloru');
const zmiana_1 = document.querySelector('.zmiana_koloru_1');
const head = document.querySelector('.head');
const left = document.querySelector('.left');
const right = document.querySelector('.right');

zmiana.addEventListener('click', function(){
    head.className = "head";
    left.className = "left";
    right.className = "right";
});

zmiana_1.addEventListener('click', function(){
    head.className = "head_1";
    left.className = "left_1";
    right.className = "right_1";
});