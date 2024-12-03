function showPass(isSet){
    let input = document.getElementById("passInput");
    let open_eye = document.getElementById("eyeOpen");
    let close_eye = document.getElementById("eyeClosed");
     isSet == true ? input.type = "text": input.type = "password";
     open_eye.classList.toggle("hide");
    close_eye.classList.toggle("hide");
}

document.addEventListener("mousedown",(e)=>{//this to prevent double clicking
    if(e.detail > 1){
        e.preventDefault();
    }
})


let redirect = document.getElementById("redirectB");
redirect.addEventListener("click",()=>{
    window.location.href="editor.php";
})
