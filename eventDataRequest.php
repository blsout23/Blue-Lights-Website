<!-- 

Sends about data from db to browser for render
data is sent as json in following format:


 -->

 <?php

// For now, using temp json file instead of database

echo file_get_contents("fakeEvents.json");

?>