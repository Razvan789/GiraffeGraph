const slider = document.querySelector(".card-container");
let sliderChildren = slider.querySelectorAll(".card");
const sliderButton = document.querySelector("#open-slider-btn");
const prevSlideBtn = document.querySelector("#slider-prev-btn");
const nextSlideBtn = document.querySelector("#slider-next-btn");
const sliderContainer = document.querySelector("[data-card-slider]");
let maxCardWidth = 175;
let currentCards = [];
let numCards = Math.ceil(slider.offsetWidth / maxCardWidth);
let pageNumber = 0;
//Hide the ones on page 2 on window load

sliderButton.addEventListener("click", ()=> {sliderContainer.classList.toggle("d-none")});
/*window.addEventListener("load", () => {
    // on load update the slider to have the proper number of cards.
    numCards = Math.ceil(slider.offsetWidth / maxCardWidth);
    updateCurrentCards(0, numCards);
    //Check if Next and previous should be shown

});

window.addEventListener("resize", () => {
    //Make sure nothing happens if the slider is not visible
    setTimeout(() => {
        if (!sliderContainer.classList.contains("d-none")) {
            numCards = Math.ceil(sliderContainer.clientWidth / maxCardWidth);
            updateCurrentCards(pageNumber * numCards, (pageNumber * numCards) + numCards);
        }
    }, 20);
    


});

sliderButton.addEventListener("click", () => {
    if (sliderContainer.classList.contains("d-none")) {
        sliderContainer.classList.remove("d-none");
        numCards = Math.ceil(slider.offsetWidth / maxCardWidth);
        updateCurrentCards(pageNumber * numCards, (pageNumber * numCards) + numCards);
    } else {
        sliderContainer.classList.add("d-none");
    }
});


nextSlideBtn.addEventListener("click", () => {
    pageNumber++;
    updateCurrentCards(pageNumber * numCards, (pageNumber * numCards) + numCards);
    if (!sliderChildren[sliderChildren.length - 1].classList.contains("d-none")) {
        nextSlideBtn.classList.add("d-none");
    }
    prevSlideBtn.classList.remove("d-none");
});

prevSlideBtn.addEventListener("click", () => {
    pageNumber--;
    updateCurrentCards(pageNumber * numCards, (pageNumber * numCards) + numCards);
    if (!sliderChildren[0].classList.contains("d-none")) {
        prevSlideBtn.classList.add("d-none");
    }
    nextSlideBtn.classList.remove("d-none");
});
function updateCurrentCards(firstCard, lastCard) {
    //empty the array
    currentCards = [];
    //fill it back up with the proper cards
    for (var i = firstCard; i < lastCard; i++) {
        currentCards.push(sliderChildren[i]);
    }
    changeShownCards();
    checkButtons();
}


function changeShownCards() {
    //make them all invisible
    sliderChildren.forEach((card) => {
        card.classList.add("d-none");
    });
    //make the necessay ones visible
    for (var i = 0; i < currentCards.length; i++) {
        if (currentCards[i] != null) {
            currentCards[i].classList.remove("d-none");
        }
    }
}

function checkButtons() {
    if (!sliderChildren[0].classList.contains("d-none")) {
        prevSlideBtn.classList.add("d-none");
    } else {
        prevSlideBtn.classList.remove("d-none")
    }
    if (!sliderChildren[sliderChildren.length - 1].classList.contains("d-none")) {
        nextSlideBtn.classList.add("d-none");
    } else {
        nextSlideBtn.classList.remove("d-none")
    }
}*/