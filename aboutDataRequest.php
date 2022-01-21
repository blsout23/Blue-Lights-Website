<!-- 

Sends about data from db to browser for render
data is sent as json in following format:

{
    "groupImage": "css/media/group4.jpg",
    "content1": "Founded in 1994, the Blue Lights are the heartthrobs of Colby's a cappella community.",
    "content2": "The Blue Lights are all about good vibes and performing to entertain, working just hard enough to sound good while still remembering to have fun with it.",
    "content3": "Read on for concert footage, announcements, and an inside look at what it's like to be a Blue Light."
}

 -->

<?php

// For now, using temp json file instead of database

echo file_get_contents("fakeAbout.json");

?>