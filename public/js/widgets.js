let newWidget = document.getElementsByClassName("widget");
for (let i = 0; i < newWidget.length; i++) {
    newWidget[i].innerHTML = newWidget[i].innerText;

    
}

function allowDrop(ev) {
    ev.preventDefault();
  }
  
  function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
  }
  
  function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    console.log(data+"salut");
    ev.target.appendChild(document.getElementById(data));
  }
