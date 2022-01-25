<?php 

$dbPASSWD = "etzi9ajgv3";

$song = $_POST['song'];
$artist = $_POST['artist'];

$song = htmlspecialchars($song);
$artist = htmlspecialchars($artist);

try {
    $db = new PDO('mysql:host=localhost;dbname=ebwrig23', 'ebwrig23', $dbPASSWD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $song = $db->quote($song);
    $artist = $db->quote($artist);
    $sql = "INSERT INTO songRequest (song, artist) VALUES ($song, $artist);";
    $db->exec($sql);

    ?>
    <p class="songSubmitMessage">Thank you for your request!</p>
    <?php

} catch (PDOException $e) { ?>
    
    <p class="songSubmitMessage">Sorry, there was an error on the server, try agian later.</p>

<?php } ?>