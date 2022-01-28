<?php

include requestHandlers/renderEvents.php;

try {

    $db = new PDO('mysql:host=localhost;dbname=ebwrig23', 'ebwrig23', 'etzi9ajgv3');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $tables = ['events', 'members', 'email', 'songRequest', 'videos'];
    $data = [];
    foreach($tables as $table){
        $sql = "SELECT * FROM $table";
        $results = $db->query($sql);
        $data[$table] = $results->fetchAll();
    }

    $about = json_decode(file_get_contents('about.json'), true);


} catch (PDOException $e) {
    echo $e->getMessage();
    echo "An error has occured on the server. Please try again later.";
    die();
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/editor.js"></script>
    <link rel="stylesheet" href="css/editor.css">
    <title>Webpage Editor</title>
    
</head>
<body>
    
    <details>
        <summary>Events</summary>
        <details>
            <summary>Add Event</summary>
            <form id="addEvent">
                <label for="title">Event Name</label>
                <input type="text" name="title" id="title" required><br>
                <label for="date">Event Date</label>
                <input type="date" id="date" name="date" required>
                <label for="time">Event Time</label>
                <input type="time"id="time" name="time" required><br>
                <label for="location">Event Location</label>
                <input type="text" name="location"required><br>
                <p>Small event description will apear on home page, large will apear on full events page</p>
                <label for="contentSmall">Event Description Small</label>
                <textarea name="contentSmall" required></textarea><br>
                <label for="contentLarge">Event Description Large</label>
                <textarea name="contentLarge" required></textarea><br>

                <p>Event images must be hosted off server. 
                There are many services that do image hosting, 
                <a href="https://imgbb.com/">Here</a> 
                is one that works well. Use the HTML embed links.</p>
                <label for="image">Link to Event Image</label>
                <input type="text" name="image" id="eventImageInput" required><br>
                <div id="eventImageContainer"></div>
                <button type="submit">Add Event</button>
                <button type="reset">Clear</button>
            </form>
        </details>

        <details>
            <summary>Edit Events</summary>
            <div id="eventContainer">
            <?php
                foreach($data['events'] as $event){
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
                <?php } ?>
                
            </div>
        </details>
    </details>

    <details>
        <summary>Members</summary>
        <details>
            <summary>Add Member</summary>
            <form id="addMember">
                <label for="firstName">Member First Name</label>
                <input type="text" name='firstName' id="firstName"><br>
                <label for="lastName">Member Last Name</label>
                <input type="text" name='lastName'  id="lastName"><br>
                <label for="classYear">Class Year</label>
                <input type="number" id="classYear" name="classYear"><br>
                <label for="bio">Bio</label>
                <textarea id="bio" name="bio"></textarea><br>
                <p>Event images must be hosted off server. 
                There are many services that do image hosting, 
                <a href="https://imgbb.com/">Here</a> 
                is one that works well. Use the HTML embed links.</p>
                <label for="image">Link to Member Image</label>
                <input type="text" id="memberImage" name="image"><br>
                <button type="submit" id="memberSubmit">Add Member</button>
                <button type="reset">Clear</button>
            </form>
        </details>

        <details>
            <summary>Edit Memebers</summary>
            <div id="memberContainer">
            <?php
                foreach($data['members'] as $member){
                    ?>
            
                    <div class="member" id="member<?php echo $member['id'];?>">
                        <h3><?php echo $member['firstName'] . " " . $member['lastName'];?></h3>
                        <img src="<?php echo $member['image'];?>" alt="memberImage">
                        <p><?php echo $member['classYear'];?></p>
                        <p><?php echo $member['bio'];?></p>
                        <button class="editMember" id="editMember<?php echo $member['id']; ?>">Edit</button>
                        <button class="deleteMember" id="deleteMember<?php echo $member['id']; ?>">Delete</button>
                    </div>
                <?php } ?>
            </div>
        </details>
    </details>

    <details id="aboutDetails">
        <summary>Edit About</summary>
        <form id="editAbout">
            <label for="content1">Main page 1: </label>
            <textarea name="content1" id="content1"><?php echo $about['content1'];?></textarea><br>
            <label for="content2">Main page 2: </label>
            <textarea name="content2" id="content2"><?php echo $about['content2'];?></textarea><br>
            <label for="content3">Main page 3: </label>
            <textarea name="content3" id="content3"><?php echo $about['content3'];?></textarea><br>
            <label for="contentLarge">About Page Content: </label>
            <textarea name="contentLarge" id="contentLarge"><?php echo $about['contentLarge'];?></textarea><br>
            <p>Current Main Page Image</p>
            <img src="<?php echo $about['image1'];?>" alt="aboutImage" id="aboutImagePreview1"><br>
            <p>Event images must be hosted off server. 
            There are many services that do image hosting, 
            <a href="https://imgbb.com/">Here</a> 
            is one that works well. Use the HTML full embed links, 
            only taking the text inside the src atribute in img tag.</p>
            <label for="newAboutImage1">New Image Upload:</label>
            <input type="text" name="newAboutImage1" id="aboutImage1" value="<?php echo $about['image1']; ?>"><br>
            <p>Current About Page Image</p>
            <img src="<?php echo $about['image2'];?>" alt="aboutImage" id="aboutImagePreview2"><br>
            <label for="newAboutImage2">New About Page Image Upload:</label>
            <input type="text" name="newAboutImage2" id="aboutImage2" value="<?php echo $about['image2']; ?>"><br>

            <button type="submit" id="aboutSubmit">Update</button>
            <button type="reset">Reset</button>
        </form>
        <div id="aboutMessageContainer"></div>
    </details>

    <details>
        <summary>Edit Videos</summary>
        <form id="addVideo">
            <label for="video-title">Video Title</label>
            <input type="text" name="title" id="video-title"><br>
            <label for="video-link">Video Link (from youtube)</label>
            <input type="text" name="link" id="video-link"><br>
            <button type="submit" id='addVideoSubmit'>Add Video</button>
            <button type="reset">Clear</button>
        </form>

        <div id="videoContainer">
            <?php
            foreach($data['videos'] as $video){
                ?>
                <div class="video" id="video<?php echo $video['id'];?>">
                    <h3><?php echo $video['title'];?></h3>
                    <iframe width="560" height="315" src="<?php echo $video['url'];?>" frameborder="0" allowfullscreen></iframe>
                    <button class="deleteVideo" id="deleteVideo<?php echo $video['id']; ?>">Delete</button>
                </div>
            <?php } ?>
        </div>
    </details>


    <details id="emailList">
        <summary>Email List</summary>
        <ul id="emailListContainer">
            <?php 
            foreach($data['email'] as $email){
                ?>
                <li id="emailAddress<?php echo $email['id'];?>">
                    <?php echo $email['email'];?>
                    <button class="deleteEmail" id="deleteEmail<?php echo $email['id'];?>">Delete</button>
                </li>
            <?php } ?>
        </ul>
    </details>

    <details id="songRequests">
        <summary>Song Requests</summary>
        <ul id="songRequestContainer">
            <?php
            foreach($data['songRequest'] as $song){
                ?>
                <li id="songRequest<?php echo $song['id'];?>">
                    <?php echo $song['song'];?> by <?php echo $song['artist'];?>
                    <button class="deleteSong" id="deleteSong<?php echo $song['id']; ?>">Delete</button>
                </li>
            <?php } ?>
        </ul>
    </details>

</body>
</html>
