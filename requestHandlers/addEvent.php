<?php
/*
Colby Blue Lights Website
CS325 - Final Project
Ben Southwick, Emerson Wright

Adds event from editor to database
expects: 
    $_POST['title'] to be the event title
    $_POST['date'] to be the event date as string
    $_POST['time'] to be the event time as string
    $_POST['location'] to be the event location
    $_POST['image'] link to the event image
    $_POST['contentSmall'] to be the short event description
    $_POST['contentLarge'] to be the long event description
    $_POST['UNIXtime'] to be the event time in UNIX time
*/ 

$data = array();

foreach ($_POST as $key => $value) {
    $data[$key] = processInputs($value);
}

//Database stores unix time
$data['date'] = $data['UNIXtime'];

// These dont need to be added to database
unset($data['UNIXtime']);
unset($data['time']);

try {
    $db = new PDO('mysql:host=localhost;dbname=ebwrig23', 'ebwrig23', 'etzi9ajgv3');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO events (title, date, location, image, contentSmall, contentLarge) VALUES (:title, :date, :location, :image, :contentSmall, :contentLarge);";
    $stmt = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $stmt->execute($data);
    echo "success";
    

} catch (PDOException $e) {
    echo "Error adding event, please try again later.";
}

function processInputs($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}
?>