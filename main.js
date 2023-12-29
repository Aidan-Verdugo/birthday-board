//libraries
const csv = ('fast-csv');

//varriables related to child info
let childName = ["name1","name2","name3","name4","name5"];
let theme = ["Dino","Temp","Dino","Temp","Dino"];
let bgFiles = ["dino.png","temp.png"];
let time = new Date();


//varriables related to csv file
var file = "file.csv";


let childIndex = 0;
//setname();


function setname(){
    
    let bgElement = document.getElementById("bg");
    let bgImage = "none";
    let nameText = document.getElementById("n1");
    childIndex++;
    
    if(childIndex >= childName.length){childIndex = 0}
    if (theme[childIndex] == "Dino"){bgImage = bgFiles[0]}
    if (theme[childIndex] == "Temp"){bgImage = bgFiles[1]}
    nameText.innerHTML = childName[childIndex];
    bgElement.src = bgImage;

    setTimeout(setname, 5000);
    
}



