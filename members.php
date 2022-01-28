<?php 
/*
Colby Blue Lights Website
CS325 - Final Project
Ben Southwick, Emerson Wright

Renders the members page using the database
*/ 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Getting Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Damion&family=Varela+Round&display=swap" rel="stylesheet"> 
    
    <link rel="stylesheet" href="./css/master.css">
    <link rel="stylesheet" href="./css/members.css">
    <title>Blue Lights</title>
</head>
<body>
    <?php
        echo file_get_contents("header.html");
        try {

            $db = new PDO('mysql:host=localhost;dbname=ebwrig23', 'ebwrig23', 'etzi9ajgv3');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM members";
            $results = $db->query($sql);
            $memberData = $results->fetchAll();
        
        } catch (PDOException $e) {
            echo 'An error has occured on the server. Please try again later.';
            die();
        }
        foreach($memberData as $member){
            ?>
            <section class="member" id="<?php echo $member['id'];?>">
                <h2><?php echo $member['firstName'] . " " . $member['lastName'] . " - " . $member['classYear'];?></h2>
                <img class="headshot" src="<?php echo $member['image'];?>" alt="memberImage">
                <div class="memberBio">
                    <p><?php echo $member['bio'];?></p>
                </div>
        </section>
        <?php }
    ?>

    <div class="footerSpacer"></div>

    <?php
        echo file_get_contents("footer.html");
    ?>  
</body>
</html>