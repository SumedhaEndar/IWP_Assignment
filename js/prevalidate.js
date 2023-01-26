let loginForm = document.getElementById("userLoginForm");
let usernameOrEmail = document.getElementById("usernameOrEmail");
let passwordInput = document.getElementById("passwordLogin");


loginForm.addEventListener("mouseover", function prevalidateLoginUser(event) {

	let formIsValid = true;

	if (usernameOrEmail.value === "") {
		formIsValid = false;
		usernameOrEmail.style.borderColor = "red";
	} else {
		usernameOrEmail.style.borderColor = "green";
	}

	if (passwordInput.value === "") {
		formIsValid = false;
		passwordInput.style.borderColor = "red";
	} else {
		passwordInput.style.borderColor = "green";
	}
	
	if (!formIsValid) {
		event.preventDefault();
		return false;
	}
});