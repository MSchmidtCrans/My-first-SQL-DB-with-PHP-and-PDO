<?php

header('Content-type: application/json; charset=utf-8');

$servername = "localhost";
$username = "phpdb";
$password = "wachtwoord";


try {
    //connect to DB
    $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);

    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //Prepare and execute mysql query
    $itemsquery = $conn->prepare("SELECT * FROM adressCards");
    $itemsquery->execute();

    //Set array
    $persons = array();
    
    //Loop through all rows from table
    foreach($itemsquery as $item) {
        //echo($item['firstname'].' '.$item['lastname'].' '.$item['gender'].' '.$item['city'].'</br>');    

    //Add value to array
    $persons['id'] = $item['id'];
    $persons['firstName'] = $item['firstname']; 
    $persons['lastName'] = $item['lastname'];
    $persons['gender'] = $item['gender'];
    $persons['city'] = $item['city'];
    }

    //Sent array as JSON
    echo json_encode($persons);

    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>