const modal = document.getElementById('id01');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
if (event.target == modal) {
modal.style.display = "none";
    }
}

let password = document.querySelectorAll(".password");
password[0].addEventListener('keydown', show);
password[0].addEventListener('keyup', hidden);
password[1].addEventListener('keydown', show1);
password[1].addEventListener('keyup', hidden1);

function show(){
    password[0].type = "text";
}
function hidden() {
    password[0].type = "password";
}
function show1(){
    password[1].type = "text";
}

function hidden1() {
    password[1].type = "password";
}
