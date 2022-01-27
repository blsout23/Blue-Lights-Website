<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=ebwrig23', 'ebwrig23', 'etzi9ajgv3');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM videos";
    $results = $db->query($sql);
    $videoData = $results->fetchAll();
} catch (PDOException $e) {
    echo "An error has occured on the server. Please try again later.";
    die();
}

foreach($videoData as $video){ ?>
    <div class="video" id="video<?php echo $video['id'];?>">
        <h3><?php echo $video['title'];?></h3>
        <iframe width="560" height="315" src="<?php echo $video['url'];?>" frameborder="0"  allowfullscreen></iframe>
        <button class="deleteVideo" id="deleteVideo<?php echo $video['id']; ?>">Delete</button>
    </div>
<?php } ?>