import bData from '../Data/childData.json' assert {type:"json"};

//inputs from form
let childNameInput = document.getElementById("childName_input");
let timeInput = document.getElementById("time_input");
let themeInput = document.getElementById("theme_input");

//name outputs
let childNameOutput = document.getElementById("name")
let timeOutput = document.getElementById("time");
let themeOutput = document.getElementById("theme");


document.getElementById("add-btn").onclick = submitName(childNameInput);


function submitName(nameInput){
    console.log("function started");
    childNameOutput.innerHTML = nameInput;
    console.log("name submited");
}