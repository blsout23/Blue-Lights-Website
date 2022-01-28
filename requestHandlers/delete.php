<?php 
/*
Colby Blue Lights Website
CS325 - Final Project
Ben Southwick, Emerson Wright

deletes the row with 'id' from the table 'type'
both need to be sent in GET request
*/ 
if(isset($_GET['id']) && isset($_GET['type'])){
    $type = $_GET['type'];
    $id = $_GET['id'];
    try {
        $db = new PDO('mysql:host=localhost;dbname=ebwrig23', 'ebwrig23', 'etzi9ajgv3');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql= "DELETE FROM $type WHERE id = '$id';";
        $db->exec($sql);
        echo 'success';
    } catch (PDOException $e) {
        echo "An error occured on the server, please try again later.";
    }
}
?>