

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


function editWidget(widget){
    let valueModifier = document.getElementsByClassName("hide");
    valueModifier[0].style.display = "flex";
    
}

