<?php 
/*
Colby Blue Lights Website
CS325 - Final Project
Ben Southwick, Emerson Wright

Renders the event page using the database
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
    
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/events.css">
    <title>Blue Lights</title>
</head>
<body>
    <?php
        echo file_get_contents("header.html");
        try {

            $db = new PDO('mysql:host=localhost;dbname=ebwrig23', 'ebwrig23', 'etzi9ajgv3');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM events";
            $results = $db->query($sql);
            $eventsData = $results->fetchAll();
        
        } catch (PDOException $e) {
            echo 'An error has occured on the server. Please try again later.';
            die();
        }

        foreach($eventsData as $event){
            $date = date('d F H:i', $event['date']);
            $datetime = date('Y-m-d H:i:s', $event['date']);
            ?>
    
            <section class="event" id="<?php echo $event['id'];?>">
                <h2><?php echo $event['title'];?></h2>
                <img src="<?php echo $event['image'];?>" alt="eventImage" width="250px" height="350px">
                <div class="eventText">
                    <p><?php echo $event['contentLarge'];?></p>
                    <div class="eventDetails">
                        <time datetime="<?php echo $datetime;?>"><?php echo $date;?></time>
                        <p><?php echo $event['location'];?></p>
                    </div>
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
