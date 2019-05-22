<?php
$servername = "localhost";
$username = "phpdb";
$password = "wachtwoord";


try {
    $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $itemsquery = $conn->prepare("SELECT * FROM adressCards");
    $itemsquery->execute();

    foreach($itemsquery as $item) {
        echo($item['firstname'].' '.$item['lastname'].' '.$item['gender'].' '.$item['city'].'</br>');    
        echo $result;
    }


    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>