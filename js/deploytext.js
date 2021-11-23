var isclicked = false;
var deployButton = document.querySelectorAll("deploy");
var textToDeploy = document.querySelectorAll("article-content");

function deployText() {
    deployButton.addEventListener('click', function() {
        if (isclicked === false) {
            isclicked = !isclicked;
            textToDeploy.style.display = "block";
        } else {
            isclicked = !isclicked;
            textToDeploy.style.display = "";
        }
    });
}