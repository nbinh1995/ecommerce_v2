function btnMinus(ele) {
    let display = ele.nextElementSibling.nextElementSibling;
    if (display.value == 1) {
        display.value = 1;
    } else {
        display.value = +display.value - 1;
    }
}

function btnPlus(ele) {
    let display = ele.nextElementSibling;
    display.value = +display.value + 1;
}