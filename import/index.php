<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../CSS/import.css">
        <title>Import Birthday Data</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        
    </head>
    <body>
    
        <div class="divholder">
            <div class="floatdivL">
                <div class="howtoholder">
                    <h1>How to Input Data  </h1>
                    <p>fill fill fill<br> fill fill fill<br> fill fill fill</p>
                </div>
            </div>
            <div class="floatdivR">
                <div class="datasheetholder">
                    <h1>Input Data</h1>
                    <div class="nameTableHolder">
                        <div class="nameTableElement" id="name">
                            <p>name.name</p><br>
                        </div>
                        <div class="nameTableElement" id="time">
                            <p>time.time</p><br>
                        </div>
                        <div class="nameTableElement" id="day">
                            <p>day.day</p>
                        </div>
                        <div class="nameTableElement" id="theme">
                            <p>theme.theme</p><br>
                        </div>
                        
                    </div>
                    
                    <form id="addInfoForm" accept-charset="utf-8">
                        <input type="text" id="childName_input" placeholder="Child's Name"> <input id="time_input" type="time"> <input type="number" id="day_input" placeholder="Day" style="width: 10%;"> <select id="theme_input">
                            <option value="Dino">Dinosaur</option>
                            <option value="Temp">Temp</option>
                        </select> <input  type="submit" id="add-btn" value="Add">
                    </form>
                    <script type="module" src="../javascript/import.js"></script>
                </div>
            </div>
            
        </div>
        
        

    </body>

</html>