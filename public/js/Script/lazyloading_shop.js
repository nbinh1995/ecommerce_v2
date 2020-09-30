let sectionBox = [...document.querySelectorAll(".section-box")];
let sectionBox2 = [...document.querySelectorAll(".box-product")];

let inAdvance = document.querySelector(".section-shop-main").offsetTop + 50;
let page = document.q
function lazyLoad() {
    sectionBox.forEach((box, i) => {
        if (box.offsetTop < window.innerHeight + window.pageYOffset) {
            sectionBox[i].classList.add("come-in");
        }
    });
}

function lazyLoad2() {
    sectionBox2.forEach((box, i) => {
        console.log(box.offsetTop);
        if ((box.offsetTop + inAdvance) < (window.innerHeight + window.pageYOffset)) {
            sectionBox2[i].classList.add("come-in");
        }
    });
}

lazyLoad();
lazyLoad2();

window.addEventListener("scroll", () => {
    lazyLoad();
    lazyLoad2();
});