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
    ?>
    
    <section class=event>
        <h2>Blue Lights Auditions</h2>
        <div id="fakeImage">image here</div>
        <div class="eventText">
            <p>Come on down for audtions to join the Colby Blue Lights. All are welcome, no skill required. Sign up for auditons <a href="https://google.com">here</a>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Libero aliquam aperiam, debitis ea expedita eum quisquam fugit placeat repellat dolore quam cum sequi ratione, vero ullam quia vel deleniti dicta. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita, exercitationem omnis. Quaerat officiis reprehenderit voluptatibus eius commodi totam inventore doloribus. Consectetur asperiores doloribus tenetur, delectus officiis fugiat beatae explicabo sunt.</p>
            <div class="eventDetails">
                <time datetime="2022-02-10 17:00">Febuary 10th, 5 pm</time>
                <p>Event Location</p> 
            </div>  
        </div>
    </section>

    <h2>Past Events</h2>

    <div class="footerSpacer"></div>

    <?php
        echo file_get_contents("footer.html");
    ?>  
</body>
</html>