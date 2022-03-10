var slideIndex = 1;
var slide = document.getElementsByClassName("slideShow");

function activeSlide() {
    for (i = 0; i < 4; i++) {
        slide[i].style.display = "none";
    }

    slide[0].style.display = 'block';
}

function actionBtn(n) {
    var tmp = 0;

    for (x = 0; x < 4; x++) {
        if (slide[x].style.display == "block") {
            slide[x].style.display = "none";
            break;
        }
        tmp++;
    }

    if (tmp + n > 3) {
        slide[3].style.display = "block";
    }
    else if (tmp + n < 1) {
        slide[0].style.display = "block";
    }
    else {
        slide[tmp+n].style.display = "block"; 
    }
}

function slideChange(page) {
    for (i = 0; i < 4; i++) {
        slide[i].style.display = "none";
    }
    slide[page].style.display = "block";
}

