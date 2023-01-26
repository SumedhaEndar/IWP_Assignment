let addToCartBtn = document.querySelector('.quan-add .add').children[0]
let cartNotification = document.querySelector('.addCartAnime')
let disMissBtn = document.querySelector(".addCartAnime .dismissBtn")
let shirtName = ""

addToCartBtn.addEventListener("click", e=>{
    // console.log(e.target)
    // console.log(e.target.parentElement)
    // console.log(e.target.parentElement.parentElement)
    // console.log(e.target.parentElement.parentElement.parentElement)
    // console.log(e.target.parentElement.parentElement.parentElement.parentElement)
    // console.log(e.target.parentElement.parentElement.parentElement.parentElement.previousElementSibling)
    // console.log(e.target.parentElement.parentElement.parentElement.parentElement.previousElementSibling.children[0])
    shirtName = e.target.parentElement.parentElement.parentElement.parentElement.previousElementSibling.children[0].innerText
    console.log(shirtName)
    cartNotification.children[1].innerText = `"${shirtName}" has added to your cart`
    cartNotification.classList.add("cartAnime")
    
    timeoutId = setTimeout(function(){
        cartNotification.classList.remove("cartAnime")
    },5000)
})

disMissBtn.addEventListener("click", ()=>{
    cartNotification.classList.remove("cartAnime")
    clearTimeout(timeoutId)
})
