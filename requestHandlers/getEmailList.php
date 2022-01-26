<?php 

try {
    $db = new PDO('mysql:host=localhost;dbname=ebwrig23', 'ebwrig23', 'etzi9ajgv3');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM email;";
    $emails = $db->query($sql);
    $emailsJSON = json_encode($emails->fetchAll());
    echo $emailsJSON;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>