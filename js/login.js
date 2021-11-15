let signIn = document.getElementById("sign-in");

signIn.addEventListener("mouseenter", function(event) {
    event.target.style.backgroundColor = "#E1A560";
    event.target.style.opacity = 1;
}, false);

signIn.addEventListener("mouseleave", function(event) {
    event.target.style.backgroundColor = "";
    event.target.style.opacity = 1;
}, false);

let signUp = document.getElementById("sign-up");

signUp.addEventListener("mouseenter", function(event) {
    event.target.style.backgroundColor = "#E1A560";
    event.target.style.opacity = 1;
}, false);

signUp.addEventListener("mouseleave", function(event) {
    event.target.style.backgroundColor = "";
    event.target.style.opacity = 1;
}, false);