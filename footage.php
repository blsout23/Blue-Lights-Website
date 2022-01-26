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
    <link rel="stylesheet" href="css/footage.css">
    <title>Blue Lights</title>
</head>
<body>
    <?php
        echo file_get_contents("header.html");
    ?>
    <div id="videos">
        <iframe src="https://www.youtube.com/embed/2e5tAlelJXc"></iframe>
        <iframe src="https://www.youtube.com/embed/JurGajlyEew"></iframe>
        <iframe src="https://www.youtube.com/embed/T28LyXf8MlU"></iframe>
    </div>
    <div class="footerSpacer"></div>

    <?php
        echo file_get_contents("footer.html");
    ?>  
</body>
</html>