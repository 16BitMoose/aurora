const username = document.getElementById("usernameWrapper");
const usernameSVG = document.getElementById("usernameSVG");
const password = document.getElementById("passwordWrapper");
const passwordSVG = document.getElementById("passwordSVG");
const passwordConfirm = document.getElementById("passwordConfirmWrapper");
const passwordConfirmSVG = document.getElementById("passwordConfirmSVG");

function gainFocus(num){
    if(num == 1){
        username.style.borderBottomColor = "#3b51dd";
        usernameSVG.style.stroke = "#3b51dd";
    }
    else if(num == 2){
        password.style.borderBottomColor = "#3b51dd";
        passwordSVG.style.stroke = "#3b51dd";
    }
    else if(num == 3){
        passwordConfirm.style.borderBottomColor = "#3b51dd";
        passwordConfirmSVG.style.stroke = "#3b51dd";
    }
}

function loseFocus(num){
    if(num == 1){
        username.style.borderBottomColor = "#f0f0f4a4";
        usernameSVG.style.stroke = "#f0f0f4a4";
    }
    else if(num == 2){
        password.style.borderBottomColor = "#f0f0f4a4";
        passwordSVG.style.stroke = "#f0f0f4a4";
    }
    else if(num == 3){
        passwordConfirm.style.borderBottomColor = "#f0f0f4a4";
        passwordConfirmSVG.style.stroke = "#f0f0f4a4";
    }
}
