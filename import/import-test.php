<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $connection = pg_connect("host=localhost:3306 dbname=partydb user=root password=password");
    if (!$connection){
        echo "An error occurred. <br>";
        exit;
    }
    $ersult = pg_query($connection, "SELECT * FROM partydata");
    if(!$result){
        echo "An error occurred. <br>";
        exit;
    }
    ?>
    
    <table>
        <tr>
            <th>Name</th>
            <th>Theme</th>
            <th>Party Time</th>
            <th>Party Day</th>
        </tr>
        <?php
        while($row = pg_fetch_assoc($result)){
            echo "
            <tr>
                <td>$row[name]</td>
                <td>$row[theme]</td>
                <td>$row[partytime]</td>
                <td>$row[partyday]</td>
            </tr>
            ";
        }
        
        ?>

    </table>
</body>
</html>