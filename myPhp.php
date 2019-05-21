<?php
$servername = "localhost";
$username = "phpdb";
$password = "wachtwoord";


try {
    $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
$sql = "INSERT INTO adressCards (firstname, lastname, gender, city)
VALUES ('Michael', 'Schmidt Crans', 'man', 'Leeuwarden')";    

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Records created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>