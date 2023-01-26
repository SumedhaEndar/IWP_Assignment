let dashItemContainer = document.querySelectorAll('.dashboard-container .dashboard-item-container')
let cartNotification = document.querySelector('.addCartAnime')
let disMissBtn = document.querySelector(".addCartAnime .dismissBtn")

let shirtName = ""
let timeoutId

// console.log(dashItemContainer.length)
for(let i = 0; i < dashItemContainer.length; i++)
{
    dashItemContainer[i].addEventListener("click", e=>{
        if(e.target.className === "fa-solid fa-cart-plus fa-xl cart-btn")
        {
            // console.log(e.target)
            // console.log(e.target.parentElement)
            // console.log(e.target.parentElement.parentElement)
            // console.log(e.target.parentElement.parentElement.parentElement)
            // console.log(e.target.parentElement.parentElement.parentElement.children[1])
            // console.log(e.target.parentElement.parentElement.parentElement.children[1].children[0].innerText)
            shirtName = e.target.parentElement.parentElement.parentElement.children[1].children[0].innerText;
            cartNotification.children[1].innerText = `"${shirtName}" has added to your cart`
            cartNotification.classList.add("cartAnime")
            
            timeoutId = setTimeout(function(){
                cartNotification.classList.remove("cartAnime")
            },5000)
        }
    })
}

disMissBtn.addEventListener("click", ()=>{
    cartNotification.classList.remove("cartAnime")
    clearTimeout(timeoutId)
})


// console.log(disMissBtn)

