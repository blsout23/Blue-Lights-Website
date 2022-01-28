<?php
/*
Colby Blue Lights Website
CS325 - Final Project
Ben Southwick, Emerson Wright

Returns the HTML for members displayed in editor
This happens when an member is deleted or added in order to 
render the current state of the database
*/ 
try {
    $db = new PDO('mysql:host=localhost;dbname=ebwrig23', 'ebwrig23', 'etzi9ajgv3');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM members";
    $results = $db->query($sql);
    $memberData = $results->fetchAll();
} catch (PDOException $e) {
    echo "An error has occured on the server. Please try again later.";
    die();
}

foreach($memberData as $member){ ?>
    <div class="member" id="member<?php echo $member['id'];?>">
        <h3><?php echo $member['firstName'] . " " . $member['lastName'];?></h3>
        <img src="<?php echo $member['image'];?>" alt="memberImage">
        <p><?php echo $member['classYear'];?></p>
        <p><?php echo $member['bio'];?></p>
        <button class="editMember" id="editMember<?php echo $member['id']; ?>">Edit</button>
        <button class="deleteMember" id="deleteMember<?php echo $member['id']; ?>">Delete</button>
    </div>
<?php } ?>

