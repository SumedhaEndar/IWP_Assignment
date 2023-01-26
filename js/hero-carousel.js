// Variables related to Slides
const slides = document.getElementsByClassName('hero-item')
let slidePosition = 0
const totalSlides = slides.length


// Variables related to Dots Nav
const dotsNav = document.querySelector(".hero-carousel-nav")
const dots = Array.from(dotsNav.children)


// Collection of Functions
function hideAllSlides(){
    for(let slide of slides) {
        slide.classList.remove('hero-item-visible')
        slide.classList.add('hero-item-hidden')
    }
}

function hideAllIndicator(){
    for(let dot of dotsNav.children){
        dot.classList.remove('current-slide')
    }
}


// Event Listener starts here
dotsNav.addEventListener('click', e=>{

    const targetDot = e.target.closest("button")

    if(!targetDot)
    {
        return
    }

    hideAllSlides()
    hideAllIndicator()

    const targetIndex = dots.findIndex(dot => dot===targetDot)
    slidePosition = targetIndex;

    slides[slidePosition].classList.add("hero-item-visible")
    dotsNav.children[slidePosition].classList.add("current-slide")
})


// Automatic Running
setInterval(function(){
    hideAllSlides()
    hideAllIndicator()

    if(slidePosition === totalSlides-1){
        slidePosition = 0
    }
    else{
        slidePosition = slidePosition + 1
    }

    slides[slidePosition].classList.add("hero-item-visible")
    dotsNav.children[slidePosition].classList.add("current-slide")
},5000)