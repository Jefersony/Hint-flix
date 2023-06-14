// contagem da direção 

var num = 350;
var num2 = 350;

// botão direito 

var btnRight = document.getElementById('btn-right');

btnRight.addEventListener('click', () => {

    var limiter = document.getElementById('limiter').getBoundingClientRect().left;
    var roundLimiter = Math.round(limiter);

    var bottomRight = document.getElementById('btn-right').getBoundingClientRect().left;
    var roundBottomRight = Math.round(bottomRight);

    var containerFilms = document.getElementById('container-films');
    var carrouselFilms = document.getElementById('carousels-films');

    if (roundLimiter > roundBottomRight) {

        containerFilms.style.transform = 'translateX( -' +num+ 'px)';

        num = num + 350;
        num2 = num2 - 350;

    } else {

        var stop = roundBottomRight * containerFilms.clientWidth / 
        carrouselFilms.clientWidth - carrouselFilms.clientWidth + 350;

        var roundStop = Math.round(stop);

        containerFilms.style.transform = 'translateX(-' +roundStop+ 'px)';
    }
});

// botão esquerdo

var btnLeft = document.getElementById('btn-left');

btnLeft.addEventListener('click', () =>{

    var limiter = document.getElementById('limiter').getBoundingClientRect().left;
    var roundLimiter = Math.round(limiter);

    var bottomLeft = document.getElementById('btn-left').getBoundingClientRect().left;
    var roundBottomLeft = Math.round(bottomLeft);

    var containerFilms = document.getElementById('container-films');
    var carrouselFilms = document.getElementById('carousels-films');

    var slide = containerFilms.getBoundingClientRect().left;

    if (slide < roundBottomLeft) {

        containerFilms.style.transform = 'translateX('+num2+'px)';

        num = num - 350;
        num2 = num2 + 350;

    } else {

        containerFilms.style.transform = 'translateX(0)';

        num = 350;
    }
        
        
        
});