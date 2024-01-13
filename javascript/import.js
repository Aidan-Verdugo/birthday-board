//external docs
import bData from "../Data/childData.json" assert {type:"json"};


//inputs from form
let childNameInput = document.getElementById("childName_input");
let timeInput = document.getElementById("time_input");
let themeInput = document.getElementById("theme_input");
let dayInput = document.getElementById("day_input");
let infoForm = document.getElementById("addInfoForm");

//arrays
let nameArray = [];
let timeArray = [];
let themeArray = [];
let dayArray = [];

//name outputs
let childNameOutput = document.getElementById("name");
let timeOutput = document.getElementById("time");
let themeOutput = document.getElementById("theme");
let dayOutput = document.getElementById("day");

importDataFromJson();
displayData();
//listen for submit
infoForm.addEventListener("submit", (e) => {
    e.preventDefault();
    getInputValues();
    if(childNameInput.value == "" || timeInput.value == "" || themeInput.value == "" || dayInput.value == 0){
        alert("Please fill all form fields");
    }
    else{
        submitData(childNameInput.value, timeInput.value, themeInput.value, dayInput.value);
        displayData();
        clearInputValues();
        exportDataToJson(nameArray, themeArray, timeArray, dayArray);
    }
    

  });

function clearInputValues(){
    childNameInput.value = "";
    timeInput.value = "";
    themeInput.value = "";
    dayInput.value = "";
}

function getInputValues(){
    childNameInput = document.getElementById("childName_input");
    timeInput = document.getElementById("time_input");
    themeInput = document.getElementById("theme_input");
    dayInput = document.getElementById("day_input");
}

function displayData(){
    let htNameFill = "";
    let htTimeFill = "";
    let htThemeFill = "";
    let htDayFill = "";
    for(let i = 0; i < nameArray.length; i++){
        htNameFill = htNameFill + " <p>" + nameArray[i] + " </p> <br>";
        htTimeFill = htTimeFill + " <p>" + timeArray[i] + " </p> <br>";
        htThemeFill = htThemeFill + " <p>" + themeArray[i] + " </p> <br>";
        htDayFill = htDayFill + " <p>" + dayArray[i] + " </p> <br>";
    }
    childNameOutput.innerHTML = htNameFill;
    themeOutput.innerHTML = htThemeFill;
    timeOutput.innerHTML = htTimeFill;
    dayOutput.innerHTML = htDayFill;

}

function submitData(nameinput, timeinput, themeinput, dayinput){
    console.log("function submitData started");
    nameArray.push(nameinput);
    timeArray.push(timeinput);
    themeArray.push(themeinput);
    dayArray.push(dayinput);
    console.log("function submitData finished");
    
}

function exportDataToJson(childarrayinput, themearrayinput, timearrayinput, dayarrayinput){
    bData.childName = childarrayinput;
    bData.partyTime = timearrayinput;
    bData.theme = themearrayinput;
    bData.partyDate = dayarrayinput;
    console.log("Data Exported");
}
function importDataFromJson(){
    nameArray = bData.childName;
    timeArray = bData.partyTime;
    themeArray = bData.theme;
    dayArray = bData.partyDate;
    console.log("Data Imported")
}
