<?php

try {

    $db = new PDO('mysql:host=localhost;dbname=ebwrig23', 'ebwrig23', 'etzi9ajgv3');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM events";
    $results = $db->query($sql);
    $eventsData = $results->fetchAll();


    renderEvents($eventsData);

} catch (PDOException $e) {
    echo "An error has occured on the server. Please try again later.";
    die();
}



function renderEvents($events) {

    foreach($events as $event){
        $date = date('d F Y H:i', $event['date']);
        $datetime = date('Y-m-d H:i:s', $event['date']);
        ?>

        <div class="event" id="<?php echo $event['id'];?>">
            <h3><?php echo $event['title'];?></h3>
            <img src="<?php echo $event['image'];?>" alt="eventImage">
            <p><?php echo $event['location'];?></p>
            <time datetime="<?php echo $datetime;?>"><?php echo $date;?></time>
            <p><?php echo $event['contentSmall'];?></p>
            <p><?php echo $event['contentLarge'];?></p>
            <button class="editEvent" id="editEvent<?php echo $event['id']; ?>">Edit</button>
            <button class="deleteEvent" id="deleteEvent<?php echo $event['id']; ?>">Delete</button>
        </div>
    <?php }
    return;
} 


?>