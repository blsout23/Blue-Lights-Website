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
    <link rel="stylesheet" href="css/members.css">
    <title>Blue Lights</title>
</head>
<body>
    <?php
        echo file_get_contents("header.html");
    ?>
    
    <section class="member">
        <h2>George Costanza - 98</h2>
        <img class="headshot" alt="George" src="css/media/george.JPG">
        <div class="memberBio">
            <p>George Louis Costanza is a fictional character in the American television sitcom Seinfeld (1989–1998), played by Jason Alexander. He is a short, stocky, bald man who struggles with numerous insecurities, often dooming his romantic relationships through his own fear of being dumped. He is also remarkably lazy; during periods of unemployment he actively avoids getting a job, and while employed he often finds ingenious ways to conceal idleness from his bosses. He is friends with Jerry Seinfeld, Cosmo Kramer, and Elaine Benes.</p>
        </div>
    </section>

    <section class="member">
        <h2>Carl Wheezer - 06</h2>
        <img class="headshot" alt="Carl" src="css/media/carl.JPG">
        <div class="memberBio">
            <p>Carlton Ulysses Wheezer (voiced by Rob Paulsen) is a bespectacled dim-witted boy and one of Jimmy's best friends. Carl and his parents have numerous allergies, at times even to things that are incapable of triggering allergic reactions. He passionately loves llamas, and his passion for them is often used as a running gag throughout the series. He is also a bit cowardly and developed a crush on Jimmy's mom, as shown throughout a multitude of episodes. His crush on Judy becomes so extreme that he is shown an interest in exterminating Judy's husband and Jimmy's dad, Hugh Neutron.</p>
        </div>
    </section>

    <div class="footerSpacer"></div>

    <?php
        echo file_get_contents("footer.html");
    ?>  
</body>
</html>