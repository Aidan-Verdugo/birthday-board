<?php
$jsonPath = '../Data/childData.json';

$hostname = "192.168.1.51:3306";
$username = "root";
$password = "password";
$db = "partydb";

$dbconnect = mysqli_connect($hostname, $username, $password, $db);
if($dbconnect->connect_error) {
    die("Database connection failed: " . $dbconnect->connect_error);
}
$query = "SELECT * FROM party_table";
$result = mysqli_query($dbconnect, $query);

$nameArray = array();
$themeArray = array();
$timeArray = array();
$dayArray = array();


while($rows=$result->fetch_assoc()){
    array_push($nameArray, $rows['child_name']);
    array_push($themeArray, $rows['theme']);
    array_push($timeArray, $rows['party_time']);
    array_push($dayArray, $rows['party_day']);
}

$nameString = json_encode($nameArray, JSON_PRETTY_PRINT);
$themeString = json_encode($themeArray, JSON_PRETTY_PRINT);
$timeString = json_encode($timeArray, JSON_PRETTY_PRINT);
$dayString = json_encode($dayArray, JSON_PRETTY_PRINT);


$allPartyString = 
"{
    \"childName\":" . $nameString . ",
    \"theme\":" . $themeString . ",
    \"partyTime\":" . $timeString . ",
    \"partyDate\":" . $dayString . "
}";


$fp = fopen($jsonPath, 'w');
fwrite($fp,$allPartyString);
fclose($fp);

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../CSS/main.css">
        <title>Birthday Announcements</title>
        
    </head>
    <body>
        
            
        <img id="bg" src="../backgrounds/dino.png"  height="100%">
 
        <div class="centered-text">
            <p id="n1">NAME.NAME</p>
        </div>
        <script type="module" src="../Data/childData.json"></script>
        <script type="module" src="../javascript/main.js"></script>
        
    </body>
</html>