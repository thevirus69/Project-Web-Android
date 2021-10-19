score = 0 ;
cross = true;

document.onkeydown = function(e){
    console.log("keycode is :" , e.keyCode)
    if(e.keyCode == 38){
        mario = document.querySelector('.mario')
        mario.classList.add('animMario')
        setTimeout(() => {
            mario.classList.remove('animMario')
        }, 1000);
    }
    if(e.keyCode == 39){
        mario = document.querySelector('.mario')
        mariox = parseInt(window.getComputedStyle(mario, null).getPropertyValue('left'));
        mario.style.left = (mariox + 112) +"px";
    }
    if(e.keyCode == 37){
        mario = document.querySelector('.mario')
        mariox = parseInt(window.getComputedStyle(mario, null).getPropertyValue('left'));
        mario.style.left = (mariox - 112) +"px";
    }

}


setInterval(() => {
    mario = document.querySelector('.mario')
    gameOver = document.querySelector(".gameOver")
    eagle = document.querySelector('.eagle')

    mx = parseInt(window.getComputedStyle(mario, null).getPropertyValue('left'));
    my = parseInt(window.getComputedStyle(mario, null).getPropertyValue('top'));

    ex =  parseInt(window.getComputedStyle(eagle, null).getPropertyValue('left'));
    ey = parseInt(window.getComputedStyle(eagle, null).getPropertyValue('top'));

    offsetX = Math.abs(mx - ex);
    offsetY = Math.abs(my - ey);
    if (offsetX < 50 && offsetY < 52) {
        console.log(offsetX)
        eagle.classList.remove('animEagle')
        gameOver.innerHTML = "Game Over"
    }
    else if(offsetX <145 && cross){
        score += 1;
        updateScore(score);
        cross = false;
        setTimeout(() => {
            cross = true;
        }, 500);
    }
}, 10);


function updateScore(score){
    scoreCont = document.querySelector('.scoreCont')
    scoreCont.innerHTML = "your Score : " + score;
}