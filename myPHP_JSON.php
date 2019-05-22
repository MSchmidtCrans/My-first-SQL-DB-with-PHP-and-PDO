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
    $person = array();
    $person = array();
    
    //Loop through all rows from table
    foreach($itemsquery as $item) {
        //echo($item['firstname'].' '.$item['lastname'].' '.$item['gender'].' '.$item['city'].'</br>');    

    //Add values to person array
    $person['id'] = $item['id'];
    $person['firstName'] = $item['firstname']; 
    $person['lastName'] = $item['lastname'];
    $person['gender'] = $item['gender'];
    $person['city'] = $item['city'];

    //Add person array to persons array (2-dimensional)
    $x = $person[id] - 1;
    $persons[$x] = $person;
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