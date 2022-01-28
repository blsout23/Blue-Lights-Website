<?php 
/*
Colby Blue Lights Website
CS325 - Final Project
Ben Southwick, Emerson Wright

Adds video from editor to database
expects $_POST['link'] to be the video url for embeding
expects $_POST['title'] to be the video title
*/ 
$data = array();

foreach ($_POST as $key => $value) {
    $data[$key] = processInputs($value);
}

try {
    $db = new PDO('mysql:host=localhost;dbname=ebwrig23', 'ebwrig23', 'etzi9ajgv3');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO videos (title, url) VALUES (:title, :link);";
    $stmt = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $stmt->execute($data);
    echo "success";
    

} catch (PDOException $e) {
    echo "Error adding video, please try again later.";
}

function processInputs($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}
?>