<?php
$servername = "localhost";
$username = "phpdb";
$password = "wachtwoord";


try {
    $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$sql = "SELECT * FROM adressCards";    

    // use exec() because no results are returned
    
    echo "Records selected successfully";
    
    }

catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>