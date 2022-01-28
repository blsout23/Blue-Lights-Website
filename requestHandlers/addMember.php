<?php 

try {

    $db = new PDO('mysql:host=localhost;dbname=ebwrig23', 'ebwrig23', 'etzi9ajgv3');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO members (firstName, lastName, bio, image, classYear) VALUES (:firstName, :lastName, :bio, :image, :classYear);";                                                                                                                        
    $stmt = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $stmt->execute($_POST);

    echo "success";

} catch (PDOException $e) {
    echo "An error has occured on the server. Please try again later.";
    die();

}

?>