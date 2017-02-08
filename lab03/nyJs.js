function loadDoc() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("para").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "homepage.txt", true);
    xhttp.send();
}