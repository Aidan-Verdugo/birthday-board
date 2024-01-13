//libraries


//varriables related to child info
let childName = ["empty"];
let theme = ["empty"];
let partyTime = ["empty"];
let partyDate = ["empty"]
let bgFiles = ["../backgrounds/dino.png","../backgrounds/temp.png","../backgrounds/no-parties.png"];
let time = new Date();

//misc vars
let nameTime = 120000;
let childNameActive = ["empty"];
let themeActive = ["empty"];
let childIndex = 0;


//varriables related to csv file
import bData from '../Data/childData.json' assert {type:"json"};

pullJasonData();
timeName();
setname(childNameActive, themeActive);

function pullJasonData(){
    childName = bData.childName;
    theme = bData.theme;
    partyDate = bData.partyDate;
    partyTime = bData.partyTime;
    setTimeout(pullJasonData, nameTime*childNameActive.length);
}

function removeSpaces(inputString){
    let tmpString = inputString.replace(/\s/g, '');
    return(tmpString);
}

function sortNames(groupNumber, nameHolder, timeHolder){
    let iT;
    let nameGroup = [];
    console.log("name group is zero");
    function sortifeven(gN, tN, Ti){
        if(groupNumber == gN){
            if(timeHolder[Ti] == tN){
                nameGroup.push(nameHolder[Ti]);
                console.log("Name added to group");
                console.log(gN);
            }
            
        }
    }
    function sortifodd(gN, tN1, tN2, Ti){
        if(groupNumber == gN){
            if(timeHolder[Ti] == tN1 || timeHolder[Ti] == tN2){
                nameGroup.push(nameHolder[Ti]);
                console.log("Name added to group");
                console.log(gN);
            }
            
        }
    }

    for (iT = 0; iT <= timeHolder.length; iT++){
        if(partyDate[iT] == time.getDate()){
        sortifeven(1,"10:00", iT);
        sortifodd(2,"10:00","11:00", iT);
        sortifeven(3,"11:00", iT);
        sortifodd(4,"11:00","12:00", iT);
        sortifeven(5,"12:00", iT);
        sortifodd(6,"12:00","13:00", iT);
        sortifeven(7,"13:00", iT);
        sortifodd(8,"13:00","14:00", iT);
        sortifeven(9,"14:00", iT);
        sortifodd(10,"14:00","15:00", iT);
        sortifeven(11,"15:00", iT);
        sortifodd(12,"15:00","16:00", iT);
        sortifeven(13,"16:00", iT);}
    }
    if(nameGroup.length == 0){
        nameGroup = ["empty"];
    }
    console.log(nameGroup);
    return(nameGroup);
}
function sortThemes(groupNumber, themeHolder, timeHolder){
    let iT;
    let themeGroup = [];

    function sortifeven(gN, tN, Ti){
        if(groupNumber == gN){
            if(timeHolder[Ti] == tN){
                themeGroup.push(themeHolder[Ti]);
                console.log("theme added to group");
                console.log(gN);
            }
            
        }
    }
    function sortifodd(gN, tN1, tN2, Ti){
        if(groupNumber == gN){
            if(timeHolder[Ti] == tN1 || timeHolder[Ti] == tN2){
                themeGroup.push(themeHolder[Ti]);
                console.log("theme added to group");
                console.log(gN);
            }
            
        }
    }

    for (iT = 0; iT <= timeHolder.length; iT++){
        if(partyDate[iT] == time.getDate()){
        sortifeven(1,"10:00", iT);
        sortifodd(2,"10:00","11:00", iT);
        sortifeven(3,"11:00", iT);
        sortifodd(4,"11:00","12:00", iT);
        sortifeven(5,"12:00", iT);
        sortifodd(6,"12:00","13:00", iT);
        sortifeven(7,"13:00", iT);
        sortifodd(8,"13:00","14:00", iT);
        sortifeven(9,"14:00", iT);
        sortifodd(10,"14:00","15:00", iT);
        sortifeven(11,"15:00", iT);
        sortifodd(12,"15:00","16:00", iT);
        sortifeven(13,"16:00", iT);}
    }
    if(themeGroup.length == 0){
        themeGroup = ["empty"];
    }
    console.log(themeGroup);
    return(themeGroup);
}
function setname(){
    
    let bgElement = document.getElementById("bg");
    let bgImage = "none";
    let nameText = document.getElementById("n1");
    
    
    if(childIndex >= childNameActive.length){childIndex = 0;}
    if (themeActive[childIndex] == "Dino"){bgImage = bgFiles[0];}
    if (themeActive[childIndex] == "Temp"){bgImage = bgFiles[1];}
    if (themeActive[childIndex] == "empty"){bgImage = bgFiles[2];}
    if (childNameActive[childIndex] == "empty") {nameText.innerHTML = " "}
    else {nameText.innerHTML = childNameActive[childIndex];}
    bgElement.src = bgImage;
    childIndex++;
    setTimeout(setname, nameTime);
    
}
function timeName(){
    
    console.log("timeName function started----------------------");
    function whenTime(tN,gN){
        if(time.getHours() == tN && time.getMinutes() <= 29){
            childNameActive = sortNames(gN, childName, partyTime);
            themeActive = sortThemes(gN, theme, partyTime);
            if(childNameActive.length > 0 && childNameActive[0] != "empty"){
                let debugnumber = childNameActive.length;
                console.log("there are " + debugnumber +" parties");
            }
            else{
                console.log("no parties at this time")
            }
        }
        if(time.getHours() == tN && time.getMinutes() > 29){
            childNameActive = sortNames(gN + 1, childName, partyTime);
            themeActive = sortThemes(gN + 1, theme, partyTime);
            if(childNameActive.length > 0 && childNameActive[0] != "empty"){
                let debugnumber = childNameActive.length;
                console.log("there are " + debugnumber +" parties");
            }
            else{
                console.log("no parties at this time")
            }
        }
        
    }
    whenTime(10, 1);
    whenTime(11, 3);
    whenTime(12, 5);
    whenTime(13, 7);
    whenTime(14, 9);
    whenTime(15, 11);
    if(time.getHours() == 16){
        childNameActive = sortNames(13, childName, partyTime);
        themeActive = sortThemes(13, theme, partyTime);
        if(childNameActive.length > 0 && childNameActive[0] != "empty"){
            let debugnumber = childNameActive.length;
            console.log("there are " + debugnumber +" parties");
        }
        else{
            console.log("no parties at this time")
        }
    }
    if(time.getHours() > 16 || time.getHours() < 10){
        document.getElementById("bg").src = "no-parties.png";
        document.getElementById("n1").innerHTML = " ";
    }
    let timeMultiplyer = childNameActive.length;
    console.log("timeName function finished---------------------")
    setTimeout(timeName, nameTime*timeMultiplyer);
}



