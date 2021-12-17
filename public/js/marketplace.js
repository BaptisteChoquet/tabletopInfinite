let allTemplates = document.getElementsByClassName('template-card');
let input = document.getElementById('input-search');
console.log(input);

input.addEventListener('input', e =>{
    let search = e.target.value;
    for (let i = 0; i < allTemplates.length; i++) {
        if (!allTemplates[i].innerText.toLowerCase().includes(search.toLowerCase())) {
            allTemplates[i].style.display = "none"
        }else{
            allTemplates[i].style.display = "block"
        }
    }
})

for (let i = 0; i < allTemplates.length; i++) {
    allTemplates[i].innerHTML = allTemplates[i].innerText;

    
}

