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
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/card.css">
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
            $sql = "SELECT * FROM members";
            $results = $db->query($sql);
            $memberData = $results->fetchAll();
        
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    ?>
        
    <section class="eventsPreview">
        <a href="events.html"><h2>Upcoming Events</h2></a>
        <?php
        foreach($eventsData as $event){
            $date = date('d F H:i', $event['date']);
            $datetime = date('Y-m-d H:i:s', $event['date']);
            ?>
    
            <div class="eventSmall" id="<?php echo $event['id'];?>">
                <h2 class="eventTitle"><?php echo $event['title'];?></h2>
                <img class="realImage" src="<?php echo $event['image'];?>" alt="eventImage">
                <div class="eventText">
                    <p><?php echo $event['contentSmall'];?></p>
                    <div class="eventDetails">
                        <time datetime="<?php echo $datetime;?>"><?php echo $date;?></time>
                        <p><?php echo $event['location'];?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
        
        
    </section>

    <section class="aboutPreview">
        <p id="founded">Founded in 1994, the Blue Lights are the heartthrobs of Colby's a cappella community. </p>
        <img id="groupPic" alt="group Picture of Blue Lights Group" src="css/media/group4.jpg">
        <div id="leftPhoto">
            <p id="vibes">The Blue Lights are all about good vibes and performing to entertain, working just hard enough to sound good while still remembering to have fun with it.</p>
            <p id="read">Read on for concert footage, announcements, and an inside look at what it's like to be a Blue Light.</p>
        </div>
        
    </section>

    <section class="membersPreview">
        <h2>Members</h2>
        <div id="membersContainer">
        <?php
        foreach($memberData as $member){
            ?>

            <div class="member">
                <img class="memberPic" src="<?php echo $member['image'];?>" alt="memberImage">
                <p class="name"><?php echo $member['firstName'] . " " . $member['lastName'];?></p>
                <p class="classYear"><?php echo $member['classYear'];?></p>
            </div>
        <?php } ?>
    </section>
    
    <?php
        echo file_get_contents("footer.html");
    ?>
      
</body>
</html>