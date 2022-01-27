<?php 

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