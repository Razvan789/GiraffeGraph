const mainBody = document.querySelector(".main-body");
window.addEventListener('resize',changehomeBody);
window.addEventListener('load', changehomeBody);

function changehomeBody() {
    if(window.innerWidth <= 990) {
        mainBody.classList.add("mobile-body");
    } else if(window.innerWidth > 990) {
        mainBody.classList.remove("mobile-body");
        
    }
}

