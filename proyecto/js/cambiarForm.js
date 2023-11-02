let singUp = document.getElementById("singUp");
let singIn = document.getElementById("singIn");
let nameInput = document.getElementById("nameInput");
let dniInput = document.getElementById("dniInput");
let logorreg = document.getElementById("logorreg");

singIn.onclick = function () {
    nameInput.style.maxHeight = "0vw";
    dniInput.style.maxHeight = "0vw";
    logorreg.innerHTML = "Log In";
    singIn.classList.add("disable");
    singUp.classList.remove("disable");
}

singUp.onclick = function () {
    nameInput.style.maxHeight = "2vw";
    dniInput.style.maxHeight = "2vw";
    logorreg.innerHTML = "Registro";
    singUp.classList.add("disable");
    singIn.classList.remove("disable");
}