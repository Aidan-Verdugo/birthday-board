<?php
$hostname = "localhost:3306";
$username = "root";
$password = "password";
$db = "partydb";

$dbconnect = mysqli_connect($hostname, $username, $password, $db);


if($dbconnect->connect_error) {
    die("Database connection failed: " . $dbconnect->connect_error);
}
$query = "SELECT * FROM party_table";
$result = mysqli_query($dbconnect, $query);
?>
<!-------------------------------------------------------------------------------------------------------------->
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
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Time</th>
                            <th>Day</th>
                            <th>Theme</th>
                        </tr>
                        <?php
                        while($rows=$result->fetch_assoc())
                        { ?>
                        <tr>
                            <td><?php echo $rows['child_name'];?></td>
                            <td><?php echo $rows['party_time'];?></td>
                            <td><?php echo $rows['party_day'];?></td>
                            <td><?php echo $rows['theme'];?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </table>
                    
                    <form id="addInfoForm" accept-charset="utf-8" action="./info.php" method="POST">
                        <input type="text" name="childName_input" placeholder="Child's Name"> <input name="time_input" type="time"> <input type="number" name="day_input" placeholder="Day" style="width: 10%;"> <select name="theme_input">
                            <option value="Dino">Dinosaur</option>
                            <option value="Temp">Temp</option>
                        </select> <input  type="submit" name="submit" value="Add"> <p>|</p> <input type="text" name="rowDelNum" placeholder="Entry Name"  style="width: 10%;"><input type="submit" name="delete" value="Delete Entry"> <input type="submit" name="clear" value="CLEAR ALL"> <p>|</p> <input type="submit" name="delete" value="CLEAR ALL">
                    </form>
                    
                </div>
            </div>
            
        </div>
        
        

    </body>

</html>