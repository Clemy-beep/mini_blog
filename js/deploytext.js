var isclicked = false;

function deployText(id) {
    var deployButton = document.getElementById("deployButton" + id);
    var textToDeploy = document.getElementById("id" + id);

    deployButton.addEventListener('click', function() {
        if (isclicked === true) {
            textToDeploy.style.display = "";
            deployButton.innerHTML = '<i class="fas fa-caret-down"> See more';
            isclicked = false;
        } else {
            textToDeploy.style.display = "block";
            deployButton.innerHTML = '<i class="fas fa-caret-up"> See less';
            isclicked = true;
        }

    }, false);
}