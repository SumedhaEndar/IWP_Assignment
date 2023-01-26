let myProfileNav = document.getElementById("myProfileNav");
let employeeListNav = document.getElementById("employeeListNav");
let addEmployeeNav = document.getElementById("addEmployeeNav");
let productListNav = document.getElementById("productListNav");
let addProductNav = document.getElementById("addProductNav");
let orderListNav = document.getElementById("orderListNav");
let feedbackListNav = document.getElementById("feedbackListNav");

function show_myProfileNav()
{
    myProfileNav.classList.add("active");
    employeeListNav.classList.remove("active");
    addEmployeeNav.classList.remove("active");
    productListNav.classList.remove("active");
    addProductNav.classList.remove("active");
    orderListNav.classList.remove("active");
    feedbackListNav.classList.remove("active");
}

function show_employeeListNav()
{
    myProfileNav.classList.remove("active");
    employeeListNav.classList.add("active");
    addEmployeeNav.classList.remove("active");
    productListNav.classList.remove("active");
    addProductNav.classList.remove("active");
    orderListNav.classList.remove("active");
    feedbackListNav.classList.remove("active");
}

function show_addEmployeeNav()
{
    myProfileNav.classList.remove("active");
    employeeListNav.classList.remove("active");
    addEmployeeNav.classList.add("active");
    productListNav.classList.remove("active");
    addProductNav.classList.remove("active");
    orderListNav.classList.remove("active");
    feedbackListNav.classList.remove("active");   
}

function show_productListNav()
{
    myProfileNav.classList.remove("active");
    employeeListNav.classList.remove("active");
    addEmployeeNav.classList.remove("active");
    productListNav.classList.add("active");
    addProductNav.classList.remove("active");
    orderListNav.classList.remove("active");
    feedbackListNav.classList.remove("active");   
}

function show_addProductNav()
{
    myProfileNav.classList.remove("active");
    employeeListNav.classList.remove("active");
    addEmployeeNav.classList.remove("active");
    productListNav.classList.remove("active");
    addProductNav.classList.add("active");
    orderListNav.classList.remove("active");
    feedbackListNav.classList.remove("active");   
}

function show_orderListNav()
{
    myProfileNav.classList.remove("active");
    employeeListNav.classList.remove("active");
    addEmployeeNav.classList.remove("active");
    productListNav.classList.remove("active");
    addProductNav.classList.remove("active");
    orderListNav.classList.add("active");
    feedbackListNav.classList.remove("active");   
}

function show_feedbackListNav()
{
    myProfileNav.classList.remove("active");
    employeeListNav.classList.remove("active");
    addEmployeeNav.classList.remove("active");
    productListNav.classList.remove("active");
    addProductNav.classList.remove("active");
    orderListNav.classList.remove("active");
    feedbackListNav.classList.add("active");   
}