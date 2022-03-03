var cardSliderElement = document.querySelector("#blank-card");
var tooltip = new bootstrap.Tooltip(cardSliderElement, {title:'Click Here!', trigger: "manual"});
var openButton = document.querySelector("#open-tooltip");
openButton.addEventListener("click", () => {
    tooltip.show();
});

cardSliderElement.addEventListener("shown.bs.tooltip", () => {
    //Remeber this is Async code
    setTimeout(() => {tooltip.hide()}, 3000);
});