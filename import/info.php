<?php
#-------------------
$hostname = "localhost:3306";
$username = "root";
$password = "password";
$db = "partydb";

$dbconnect = mysqli_connect($hostname, $username, $password, $db);


if($dbconnect->connect_error) {
    die("Database connection failed: " . $dbconnect->connect_error);
}
if(isset($_POST['submit'])){
    $childName_input= $_POST['childName_input'];
    $time_input=$_POST['time_input'];
    $day_input=$_POST['day_input'];
    $theme_input=$_POST['theme_input'];


    $query = "INSERT INTO party_table (child_name, theme, party_time, party_day) 
    VALUES ('" . $childName_input . "', '" . $theme_input . "', '" . $time_input . "', '" . $day_input . "')";

    if(!mysqli_query($dbconnect, $query)){
        die('An error occured when submitting your data.');
    }else{
        echo "Data submitted.";
    }
}
header("Location: http://localhost:8089/import/index.php");
die();

#-------------------
?>