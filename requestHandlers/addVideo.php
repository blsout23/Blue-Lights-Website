<?php 

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