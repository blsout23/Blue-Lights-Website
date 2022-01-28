<?php 
$about = json_decode(file_get_contents('about.json'), true);
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
    <link rel="stylesheet" href="css/about.css">
    <title>Blue Lights</title>
</head>
<body>
    <?php
        echo file_get_contents("header.html");
    ?>
    
    <section class="box">
        <h2>About the Blue Lights</h2>
        <img class="groupPic" alt="group picture" src="<?php echo $about['image2']; ?>">
        <div class="boxText">
            <p>
                <?php echo $about['contentLarge']; ?>
            </p>
        </div>
    </section>

    <?php
        echo file_get_contents("footer.html");
    ?>  
</body>
</html>
