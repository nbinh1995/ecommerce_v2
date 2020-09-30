const Slide = document.querySelectorAll(".slide");
const SlideLeft = document.getElementById("product-left");
const SlideRight = document.getElementById("product-right");

var Xl_BreakPoint = window.matchMedia("(min-width: 1200px)");
var Lg_BreakPoint = window.matchMedia("(min-width: 768px)");
var Sm_BreakPoint = window.matchMedia("(min-width: 576px)");

let displays;
let len = Slide.length;

function queryWidth() {
  if (Xl_BreakPoint.matches) {
    displays = 3;
  } else {
    if (Lg_BreakPoint.matches) {
      displays = 2;
    } else {
      if (Sm_BreakPoint.matches) {
        displays = 1;
      }
    }
  }
  if (document.querySelectorAll(".slide--none").length == 0) {
    SlideLeft.style.opacity = "0.3";
  }
  if (len - document.querySelectorAll(".slide--none").length == displays) {
    SlideRight.style.opacity = "0.3";
  }
}
queryWidth();

function slideLeft() {
  let lenNone = document.querySelectorAll(".slide--none").length;
  console.log(lenNone);
  if (lenNone == 0) {
    SlideLeft.style.opacity = "0.3";
    SlideRight.style.opacity = "0.8";
  } else {
    document
      .querySelectorAll(".slide--none")
      [lenNone - 1].classList.remove("slide--none");
    SlideLeft.style.opacity = "0.8";
    SlideRight.style.opacity = "0.8";
  }
}
function slideRight(ele) {
  let lenNone = document.querySelectorAll(".slide--none").length;
  console.log(lenNone);
  if (len - lenNone == displays) {
    SlideLeft.style.opacity = "0.8";
    SlideRight.style.opacity = "0.3";
  } else {
    Slide[lenNone].classList.add("slide--none");
    SlideLeft.style.opacity = "0.8";
    SlideRight.style.opacity = "0.8";
  }
}
Xl_BreakPoint.addListener(queryWidth);
Lg_BreakPoint.addListener(queryWidth);
Sm_BreakPoint.addListener(queryWidth);
