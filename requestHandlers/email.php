<?php 
/*
Colby Blue Lights Website
CS325 - Final Project
Ben Southwick, Emerson Wright

Add email to the database
expects:
    $_POST['email']
*/ 
$dbPASSWD = "etzi9ajgv3";

$email = $_POST['email'];

$email = htmlspecialchars($email);

try {
    $db = new PDO('mysql:host=localhost;dbname=ebwrig23', 'ebwrig23', $dbPASSWD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $email = $db->quote($email);
    $sql = "SELECT email FROM email WHERE email = $email;";
    if ($db->query($sql)->fetch()) {
        ?>
        <p class="emailMessage">You have already submitted an email address.</p>
        <?php
    } else {
        $sql = "INSERT INTO email (email) VALUES ($email);";
        $db->exec($sql);
        ?>
        <p class="emailMessage">Thank you for your email address!</p>
        <?php
    }

} catch (PDOException $e) { ?>
    
    <p class="emailMessage">Sorry, there was an error on the server, try agian later.</p>

<?php } ?>