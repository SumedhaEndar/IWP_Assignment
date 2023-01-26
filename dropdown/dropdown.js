let womenList = document.getElementById("womenList")
let menList = document.getElementById("menList")
let boyList = document.getElementById("boyList")
let girlList = document.getElementById("girlList")

function show_list1() 
{
    womenList.style.display = "block";
    menList.style.display = "none";
    boyList.style.display = "none";
    girlList.style.display = "none";
}

function show_list2() 
{
    womenList.style.display = "none";
    menList.style.display = "block";
    boyList.style.display = "none";
    girlList.style.display = "none";
}

function show_list3() 
{
    womenList.style.display = "none";
    menList.style.display = "none";
    girlList.style.display = "block";
    boyList.style.display = "none";
}

function show_list4() 
{
    womenList.style.display = "none";
    menList.style.display = "none";
    girlList.style.display = "none";
    boyList.style.display = "block";
}

function close_list1()
{
    womenList.style.display = "none";
}

function close_list2()
{
    menList.style.display = "none";
}

function close_list3()
{
    girlList.style.display = "none";
}

function close_list4()
{
    boyList.style.display = "none";
}

// window.onmouseover = function (event) 
// {
//     if (!event.target.matches('.btn')) 
//     {
//         document.getElementById('womenList').style.display = "none";
//         document.getElementById('menList').style.display = "none";
//         document.getElementById('girlList').style.display = "none";
//         document.getElementById('boyList').style.display = "none";
//     }
    
// }
