var event = document.createEvent("Event");
event.initEvent("amount", true, true);
function btnMinus(ele) {
    let display = ele.nextElementSibling.nextElementSibling;
    console.log(ele.nextElementSibling.nextElementSibling);
    if (display.value == 1) {
        display.value = 1;
    } else {
        display.value = +display.value - 1;
    }
    display.dispatchEvent(event);
}

function btnPlus(ele) {
    let display = ele.nextElementSibling;
    display.value = +display.value + 1;
    display.dispatchEvent(event);
}
