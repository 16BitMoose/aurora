function viewPassword(num) {
    var password = document.getElementById("password");
    if(num == 1){
        if (password.type === "password") {
            password.type = "text";
            document.getElementById("eye").src="assets/images/eyeOpen.svg"
        } else {
            password.type = "password";
            document.getElementById("eye").src="assets/images/eyeClosed.svg"
        }
    }
    var passwordConfirm = document.getElementById("passwordConfirm");
    if(num == 2){
        if (passwordConfirm.type === "password") {
            passwordConfirm.type = "text";
            document.getElementById("eyeConfirm").src="assets/images/eyeOpen.svg"
            password.type = "text";
        } else {
            password.type = "password";
            document.getElementById("eyeConfirm").src="assets/images/eyeClosed.svg"
            passwordConfirm.type = "password";
        }
    }
} 