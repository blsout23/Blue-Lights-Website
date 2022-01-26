<?php 

$data = array();

foreach ($_POST as $key => $value) {
    $data[$key] = processInputs($value);
}

$data['date'] = $data['UNIXtime'];


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
    //TODO need real error message
    echo "Error: " . $e->getMessage();
}

function processInputs($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}
?>