let newWidget = document.getElementsByClassName("Widget");
for (let i = 0; i < newWidget.length; i++) {
  let test = newWidget[i].innerText;

  newWidget[i].innerHTML = content;
}

//Allows to drag and drop elements from the widget list to the character sheet
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
