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
    ?>
        
    <section class="eventsPreview">
        <h2>Upcoming Events</h2>
        <a href="events.html">
        <div class="eventSmall">
            <h2 class="eventTitle">Blue Lights Auditions</h2>
            <div id="fakeImage">image here</div>
            <div class="eventText">
                <p>Come on down for audtions to join the Colby Blue Lights. All are welcome, no skill required. Sign up for auditons <a href="https://google.com">here</a></p>
                <div class="eventDetails">
                    <time datetime="2022-02-10 17:00">Febuary 10th, 5 pm</time>
                    <p>Event Location</p> 
                </div>
            </div>
        </div>
        </a>
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
            <div class="member">
                <img class="memberPic" src="css/media/profile1.jpg">
                <p class="name">Dave Phillips</p>
                <p class="classYear">'23</p>
            </div>
        
            <div class="member">
                <img class="memberPic" src="css/media/profile1.jpg">
                <p class="name">Dave Phillips</p>
                <p class="classYear">'23</p>
            </div>
        
            <div class="member">
                <img class="memberPic" src="css/media/profile1.jpg">
                <p class="name">Dave Phillips</p>
                <p class="classYear">'23</p>
            </div>
        
            <div class="member">
                <img class="memberPic" src="css/media/profile1.jpg">
                <p class="name">Dave Phillips</p>
                <p class="classYear">'23</p>
            </div>
        </div>
        
    </section>
    
    <?php
        echo file_get_contents("footer.html");
    ?>
      
</body>
</html>