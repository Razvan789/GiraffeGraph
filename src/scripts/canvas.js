const canvas = document.querySelector("#canvas");
const context = canvas.getContext("2d");
const saveButton = document.querySelector("#saveCanv");
const updateButton = document.querySelector('#update-canvas-btn');
const clearButton = document.querySelector("#clearCanv");
const colorSelected = document.querySelector("#color-picker");
const sizeSelected = document.querySelector("#size-picker");
const modalButton = document.querySelector('#open-modal-btn');
function resizeCanvas() {
    canvas.height = window.innerHeight *.8;
    canvas.width = window.innerWidth * .8;
    if(window.innerWidth < 500) {
        canvas.width = window.innerWidth *.9
    } else {
        canvas.width = window.innerWidth * .8;
    }
}

window.addEventListener('load', () => {

    //canvas.style.display = "none";
    //Resize The canvas
    resizeCanvas();
    //Set background color to a sligtly off white
    context.fillStyle = 'WhiteSmoke';
    context.fillRect(0, 0, canvas.width, canvas.height);
    let drawing = false;

    function startPosition(e) {
        drawing = true;
        draw(e); // Allows sinle clicks to generate a dot on the canvas
    }
    //For mobile and touchscreen use 
    function touchStart(e) {
        e.preventDefault();
        drawing = true;
        touchDraw(e);
    }


    function endPosition(e) {
        e.preventDefault();
        drawing = false;
        if (!e.ctrlKey) {
            context.beginPath(); // Every time you stop allow for a new path to be made
        }
    }
    function clearCanvas() {
        context.fillStyle = 'WhiteSmoke';
        context.fillRect(0, 0, canvas.width, canvas.height);
    }
    function draw(e) {
        if (!drawing) return;
        var rect = e.target.getBoundingClientRect(); // Gets the bounding box of the canvas
        context.lineWidth = sizeSelected.value;
        context.lineCap = "round";
        context.strokeStyle = colorSelected.value;
        // Changes screen relation to canvas relation and then draws a line there
        context.lineTo(e.clientX - rect.left, e.clientY - rect.top);
        context.stroke();
        context.beginPath();
        context.moveTo(e.clientX - rect.left, e.clientY - rect.top);
    }

    function touchDraw(e) {
        e.preventDefault();
        if (!drawing) return;
        var rect = e.target.getBoundingClientRect(); // That same bounding box
        context.lineWidth = sizeSelected.value;
        context.lineCap = "round";
        context.strokeStyle = colorSelected.value;
        // Changes screen relation to canvas relation and then draws a line there
        context.lineTo(e.touches[0].clientX - rect.left, e.touches[0].clientY - rect.top);
        context.stroke();
        context.beginPath();
        context.moveTo(e.touches[0].clientX - rect.left, e.touches[0].clientY - rect.top);
    }
    //Mouse drawing control
    canvas.addEventListener('mousedown', startPosition);
    canvas.addEventListener('mouseup', endPosition);
    canvas.addEventListener('mousemove', draw);
    //Touch to draw
    canvas.addEventListener('touchmove', touchDraw);
    canvas.addEventListener('touchend', endPosition);
    canvas.addEventListener('touchstart', touchStart);
    //Set up button events
    //openButton.onclick = displayCanvas;
    clearButton.onclick = clearCanvas;
    modalButton.onclick = clearCanvas;
    console.log("Loaded Canvas");
});

window.addEventListener('resize', resizeCanvas);


document.querySelector('#canvasModal').addEventListener('show.bs.modal', function (e) {
    var canvas = document.querySelector("#canvas");
    var  context = canvas.getContext("2d");
    var img = e.relatedTarget.querySelector('#canImg');
    if (img != null) {
        context.drawImage(img, 0, 0);
        updateButton.classList.remove("d-none");
        saveButton.classList.add("d-none");
        img.classList.add('current-opened');
    } else {
        updateButton.classList.add("d-none");
        saveButton.classList.remove("d-none");
        console.log('no image');
    }
})

document.querySelector('#canvasModal').addEventListener('hidden.bs.modal', function () {
    var openedImg = document.querySelector('.current-opened');
    if(openedImg)
        openedImg.classList.remove('current-opened');
});

saveButton.addEventListener('click', saveCanvas);

updateButton.addEventListener('click', updateCanvas);

/*Notes for future me 
Current issue
    add the data-bs-target to each card created.
*/

function saveCanvas() {
    var base64 = canvas.toDataURL();
    const template = document.querySelector("#card-template");
    const newCard = template.content.cloneNode(true);
    const cardRow = document.querySelector("#card-row");
    newCard.querySelector("#canImg").src = base64;
    cardRow.prepend(newCard);
}

/*
function saveCanvas() {
    // This needs heavy reformating !!
    //Use templates!!
    var base64 = canvas.toDataURL();
    var elem = document.createElement("img");
    var card = document.createElement("button");
    var cardBody = document.createElement("div");
    var column = document.createElement("div");
    var cardText = document.createElement("h5");
    cardBody.classList.add('card-body');
    cardText.classList.add('card-title');
    card.classList.add('card');
    card.dataset.target = 'bs.#canvasModal';
    card.dataset.toggle = 'bs.modal';
    column.classList.add('col-auto');
    column.classList.add('col-md-offset-2');
    column.id = 'col';
    cardText.innerHTML = "Saved Image";
    cardBody.appendChild(cardText);
    console.log("Saving");
    //console.log(base64);
    elem.src = base64;
    elem.width = 200;
    elem.height = 200;
    elem.id = 'canImg';
    elem.classList.add('card-img-top');
    card.appendChild(elem);
    card.appendChild(cardBody);
    column.appendChild(card);
    document.querySelector('#card-row').prepend(card);
}*/

function updateCanvas() {
    var base64 = canvas.toDataURL();

    //sets the card that opened the canvas' modal to the new image
    document.querySelector('.current-opened').src = base64;
    console.log(base64);
}