const mainBody = document.querySelector(".main-body");
const hiddenWhenMobile = document.querySelector("#mobile-hidden");
window.addEventListener('resize', changehomeBody);
window.addEventListener('load', changehomeBody);

function changehomeBody() {
    if (window.innerWidth <= 990) {
        if (mainBody)
            mainBody.classList.add("mobile-body");
        if (hiddenWhenMobile)
            hiddenWhenMobile.classList.add("d-none");
    } else if (window.innerWidth > 990) {
        if (mainBody)
            mainBody.classList.remove("mobile-body");
        if (hiddenWhenMobile)
            hiddenWhenMobile.classList.remove("d-none");
    }
}

