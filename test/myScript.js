var i = 0;

function buttonToggleMenu() {
    toggle();
}

function toggle() {

    if (i == 0) {
        document.getElementById("isleft").className = "toggle";
        i++;
    } else {
        document.getElementById("isleft").className = "show";
        i--;
    }
}
}