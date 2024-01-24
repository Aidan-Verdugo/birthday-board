<?php
$hostname = "192.168.1.48:3306";
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
                    <p>&nbsp;</p>
                    <p><span>Before you can display birthday messages on the main birthday board you first have to input them into the board database. The leftmost input form allows you to add entries to the database. The first field is for the child’s name, this field takes normal text. The second field is for the time of the party, this field only allows you to input time in “HH:MM AM/PM” format. The third field is for the party date, </span>ONLY INPUT THE DAY<span>, it takes the date in “ Day ” format. The last field is a drop-down for selecting the theme of the party, for example, “Dinosaur”. Below is an example of what a fully filled-out form looks like.</span>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p><span>Once the form is filled out click the “Add” button to submit the data. </span><b>PLEASE FILL ALL OF THE FIELDS IN THE FORM BEFORE SUBMITTING<span>. If you accidentally submit a blank form please see</span><span style="font-style:italic">&nbsp;Deleting Data </span>below. </p>
                    <p>&nbsp;</p>
                    <img src="./addEntrySS.png">
                    <h2><a></a>Deleting Data</h2>

                    <p>To delete data use the second form from the right. Type the name of the child you want to remove in the “Entry Name”. After adding the child's name click the “Delete Entry” button. To delete a blank form submission simply leave the “Entry Name” field blank and click the “Delete Entry” button. Below is an example of a properly filled-in data deletion form.</p>
                    <p>&nbsp;</p>
                    <img src="./deleteEntrySS.png">
                    <h2><a></a>Clearing All Data</h2>

                    <p>To clear all data click the “CLEAR ALL” button on the far right. Below is what the “Delete All Data” form looks like.</p>
                    <img src="./deleteAllDataSS.png">
                    <p>&nbsp;</p>
                </div>
            </div>
            <div class="floatdivR">
                <div class="datasheetholder">
                    <h1>Input Data</h1>
                    <div class="tableHolder">
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
                    </div>
                    <div class="formHolder">
                        <script src="../javascript/checkFormDialog.js"></script>
                        <form id="addInfoForm" accept-charset="utf-8" action="./info.php" method="POST" onsubmit="return validate()">
                            <div class="formSection">
                                <p><b>Add Entry</b></p>
                                <input type="text" name="childName_input" placeholder="Child's Name"> 
                                <input name="time_input" type="time"> 
                                <input type="number" name="day_input" placeholder="Day" style="width: 20%;"> 
                                <select name="theme_input">
                                    <option value="Standard">Standard</option>    
                                    <option value="Dino">Dinosaur</option>
                                    <option value="Art">Art</option>
                                    <option value="Tech">Tech</option>
                                </select> 
                                <input  type="submit" name="submit" value="Add">
                            </div>
                            <div class="formSection">
                                <p><b>Delete Single Entry</b></p>
                                <input type="text" name="rowDelNum" placeholder="Entry Name">
                                <input type="submit" name="delete" value="Delete Entry">
                            </div>
                            <div class="formSection">
                                <p><b>Delete All Data</b></p>
                                <input type="submit" name="clear" value="CLEAR ALL">
                            </div>
                         
                        </form>
                    </div>
                    
                </div>
                    
            </div>
            
        </div>
        
        

    </body>

</html>