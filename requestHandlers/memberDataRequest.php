<?php

// Send json with the following format:

// {
// "members": [
//         {'firstName': "Dave", 
//         'lastName': "Phillips",
//         'classYear': "23", 
//         'image': "css/media/profile1.jpg"
//         'bio': ... ,},

//         more member objects...
//     ]
// }


    // Somehow we get a list of members from the database

    // Making fake data for now
    $fakeJSON = file_get_contents("fakemembers.json");
    echo $fakeJSON;

 ?>