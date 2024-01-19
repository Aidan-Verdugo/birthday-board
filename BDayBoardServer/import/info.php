<?php
header("Location: /import/index.php");
#-------------------
$hostname = "192.168.1.51:3306";
$username = "root";
$password = "password";
$db = "partydb";


$dbconnect = mysqli_connect($hostname, $username, $password, $db);


if($dbconnect->connect_error) {
    die("Database connection failed: " . $dbconnect->connect_error);
}
if(isset($_POST['clear'])){
    $clearQuery = "DELETE FROM party_table";
    if(!mysqli_query($dbconnect, $clearQuery)){
        die('An error occured while deleting data.');
    }else{
        echo "Data deleted.";
    }
}
if(isset($_POST['delete'])){
    $indexInput = $_POST['rowDelNum'];
    $deleteQuery = "DELETE FROM party_table
    WHERE child_name = '" . $indexInput . "'";
    if(!mysqli_query($dbconnect, $deleteQuery)){
        die('could not delete');
    }else{
        echo "data deleted.";
    }
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

die();

#-------------------
?>
