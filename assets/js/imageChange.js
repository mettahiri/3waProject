let img = document.querySelector("#imgProduit");

let img1 = img.dataset.img1;
let img2 = img.dataset.img2;

img.addEventListener("mouseenter", onImgEnter);
img.addEventListener("mouseout", onImgLeave);
img.addEventListener("touchstart", onImgEnter);
img.addEventListener("touchend", onImgLeave);
function onImgEnter() {
    img.src = `assets/img/${img2}`;
}

function onImgLeave() {
    img.src = `assets/img/${img1}`;
}