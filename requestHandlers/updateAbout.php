<?php 
/*
Colby Blue Lights Website
CS325 - Final Project
Ben Southwick, Emerson Wright

Updates the about.json
expects:
    $_POST['content1']
    $_POST['content2']
    $_POST['content3'] The three content fields on the home page
    $_POST['contentLarge'] The content field on the about page
    $_POST['image1'] The link to image on home page
    $_POST['image2'] The link to image on about page
*/ 
$aboutPATH = "../about.json";
$about = json_decode(file_get_contents($aboutPATH), true);

foreach ($about as $key => $value) {
    if ($_POST[$key] != "") {
        $about[$key] = htmlspecialchars($_POST[$key]);
    }
}

file_put_contents($aboutPATH, json_encode($about));

echo 'success';

?>