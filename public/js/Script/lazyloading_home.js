let sectionBox = [...document.querySelectorAll(".section-box")];


function lazyLoad() {
    sectionBox.forEach((box, i) => {
        if (box.offsetTop < window.innerHeight + window.pageYOffset) {
            sectionBox[i].classList.add("come-in");
        }
    });
}


lazyLoad();


window.addEventListener("scroll", lazyLoad);