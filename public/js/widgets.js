

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

//Allows to edit the content and values of a widget
let widgetId = "";
function editWidget(widget){
    widgetId = widget;
    widgetId = document.getElementById(widgetId);
    let valueModifier = document.getElementsByClassName("hide");
    valueModifier[0].style.display = "flex";
    
}

//Creates the attributes to modify in a widget
function modifyWidget(){
    let exit = Exit();
    console.log(exit);

}

//Creates a slider to change div width value
function modifyWidth(){
let valueModifier = document.getElementsByClassName("hide");
let element = document.createElement("input");
let label = document.createElement("label");
label.innerHTML = "width";
let widgetClass = document.createAttribute("class");
widgetClass.value = "widthSlider";
element.setAttributeNode(widgetClass);
let attribute = document.createAttribute("type");
attribute.value = "range";
element.setAttributeNode(attribute);
valueModifier[0].appendChild(label);
valueModifier[0].appendChild(element);

let min = document.createAttribute("min");
min.value = "0";
element.setAttributeNode(min);

let max = document.createAttribute("max");
max.value = "100";
element.setAttributeNode(max);

let value = document.createAttribute("value");
value.value = "50";
element.setAttributeNode(value);

let widthSlider = document.getElementsByClassName("widthSlider");
widthSlider[0].addEventListener("change",(sliderValue) =>{
    
    let modifiedWidget = document.getElementById(widgetId);
    console.log(widgetId);
    //console.log(modifiedWidget[0]);
    console.log(sliderValue.target.value);
    widgetId.style.width = sliderValue.target.value+"%";
    console.log(widgetId.style);
})
}

modifyWidth();

//Creates a slider to change div height value
function modifyHeight(){
let valueModifier = document.getElementsByClassName("hide");
let element = document.createElement("input");
let label = document.createElement("label");
label.innerHTML = "height";
let widgetClass = document.createAttribute("class");
widgetClass.value = "heightSlider";
element.setAttributeNode(widgetClass);
let attribute = document.createAttribute("type");
attribute.value = "range";
element.setAttributeNode(attribute);
valueModifier[0].appendChild(label);
valueModifier[0].appendChild(element);

let min = document.createAttribute("min");
min.value = "0";
element.setAttributeNode(min);

let max = document.createAttribute("max");
max.value = "100";
element.setAttributeNode(max);

let value = document.createAttribute("value");
value.value = "50";
element.setAttributeNode(value);

let heightSlider = document.getElementsByClassName("heightSlider");
heightSlider[0].addEventListener("change",(sliderValue) =>{
    
    let modifiedWidget = document.getElementById(widgetId);
    console.log(widgetId);
    
    //console.log(modifiedWidget[0]);
    console.log(sliderValue.target.value);
    widgetId.style.height = sliderValue.target.value+"%";
    console.log(widgetId.style);
})
}

modifyHeight();
modifyWidget();

//'<div class="Life_bar"><div class="progress"></div></div><style type="text/css">.Life_bar{width: 70%;height: 10px;background-color: grey;}.progress{width: 50%;height: 10px;background-color: green;}</style>'