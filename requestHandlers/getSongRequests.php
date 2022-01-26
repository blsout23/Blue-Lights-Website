<?php 
try {
    
    $db = new PDO('mysql:host=localhost;dbname=ebwrig23', 'ebwrig23', 'etzi9ajgv3');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM songRequest;";
    $songs = $db->query($sql);
    $songs = $songs->fetchAll();
    echo json_encode($songs);
 
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}


?>