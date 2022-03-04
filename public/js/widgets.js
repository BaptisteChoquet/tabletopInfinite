let newWidget = document.getElementsByClassName("Widget");
for (let i = 0; i < newWidget.length; i++) {
  let test = newWidget[i].innerText;

  newWidget[i].innerHTML = content;
}

/*Allows to drag and drop elements from the widget list to the character sheet
function allowDrop(ev) {
  ev.preventDefault();
}

function drag(ev) {
  ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
  ev.preventDefault();
  var data = ev.dataTransfer.getData("text");
  ev.target.appendChild(document.getElementById(data));
}
*/
function editWidget(widget) {
  let valueModifier = document.getElementsByClassName("hide");
  valueModifier[0].style.display = "flex";
}

let IsBorderActive = "true";
function apercu() {
  let widgets = document.getElementsByClassName("widget");
  if (IsBorderActive == "true") {
    for (let i = 0; i < widgets.length; i++) {
      widgets[i].style.border = "none";
    }
    IsBorderActive = "false";
  } else {
    for (let i = 0; i < widgets.length; i++) {
      widgets[i].style.border = "solid";
    }
    IsBorderActive = "true";
  }
}

let allWidgets = document.getElementsByClassName("widget_container");
let input = document.getElementById("search");
console.log(input);

input.addEventListener("input", e => {
  console.log("salut");
  let search = e.target.value;
  for (let i = 0; i < allWidgets.length; i++) {
    let name = document.getElementsByClassName("name");
    if (!name[i].innerText.toLowerCase().includes(search.toLowerCase())) {
      allWidgets[i].style.display = "none";
    } else {
      allWidgets[i].style.display = "block";
    }
  }
  
  






});

function save(){

  let popup = document.getElementById("pop_up_save");
  let page = document.getElementById("sheet-preview-id");
  let invisible = document.getElementById("invisiblevalue");
  
  page = page.innerHTML;
  popup.style.display = "flex";
  
  invisible.value = page;
 
  
  //envoyer la page en bdd
  //crée l'entité
}

//Make the DIV element draggagle:
let moveWidget = document.getElementsByClassName("widget");
for (let i = 0; i < moveWidget.length; i++){
  console.log(moveWidget[i].id);
dragElement(document.getElementById(moveWidget[i].id));

function dragElement(elmnt) {
  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  if (document.getElementById(elmnt.id + "header")) {
    /* if present, the header is where you move the DIV from:*/
    document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
  } else {
    /* otherwise, move the DIV from anywhere inside the DIV:*/
    elmnt.onmousedown = dragMouseDown;
  }

  function dragMouseDown(e) {
    e = e || window.event;
    e.preventDefault();
    // get the mouse cursor position at startup:
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    // calculate the new cursor position:
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    console.log(pos1,pos2,pos3,pos4);
    // set the element's new position:
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    console.log(elmnt.style.top);
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }

  function closeDragElement() {
    /* stop moving when mouse button is released:*/
    document.onmouseup = null;
    document.onmousemove = null;
  }
}
}

function closeDiv(id){
  let div = document.getElementById(id);
  div.style.display = "none";
}

function setDiv(id){
  console.log("blockToInsert");
  let div = document.getElementById(id);
  let display = document.getElementById("sheet-preview-id");
  let blockToInsert = document.createElement("Widget");
  blockToInsert.appendChild(div);
  console.log(blockToInsert);
  display.appendChild(blockToInsert);
}

