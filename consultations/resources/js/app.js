require("./bootstrap");

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

function dropdownFunction(element) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    let list =
        element.parentElement.parentElement.getElementsByClassName(
            "dropdown-content"
        )[0];
    for (i = 0; i < dropdowns.length; i++) {
        dropdowns[i].classList.add("hidden");
    }
    list.classList.toggle("hidden");
}
window.onclick = function (event) {
    if (!event.target.matches(".dropbtn")) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            openDropdown.classList.add("hidden");
        }
    }
};
function checkAll(element) {
    let rows =
        element.parentElement.parentElement.parentElement.nextElementSibling
            .children;
    for (var i = 0; i < rows.length; i++) {
        if (element.checked) {
            rows[i].classList.add("bg-gray-100");
            rows[i].classList.add("dark:bg-gray-700");
            let checkbox = rows[i].getElementsByTagName("input")[0];
            if (checkbox) {
                checkbox.checked = true;
            }
        } else {
            rows[i].classList.remove("bg-gray-100");
            rows[i].classList.remove("dark:bg-gray-700");
            let checkbox = rows[i].getElementsByTagName("input")[0];
            if (checkbox) {
                checkbox.checked = false;
            }
        }
    }
}
function tableInteract(element) {
    var single = element.parentElement.parentElement;
    single.classList.toggle("bg-gray-100");
    single.classList.toggle("dark:bg-gray-700");
}
let temp = 0;
function pageView(val) {
    let text = document.getElementById("page-view");
    if (val) {
        if (temp === 2) {
            temp = 0;
        } else {
            temp = temp + 1;
        }
    } else if (temp !== 0) {
        temp = temp - 1;
    }
    switch (temp) {
        case 0:
            text.innerHTML = "Viewing 1 - 20 of 60";
            break;
        case 1:
            text.innerHTML = "Viewing 21 - 40 of 60";
            break;
        case 2:
            text.innerHTML = "Viewing 41 - 60 of 60";
        default:
    }
}
