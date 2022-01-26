<?php 

$data = array();

foreach ($_POST as $key => $value) {
    $data[$key] = processInputs($value);
}

$data['date'] = $data['UNIXtime'];

$image = processImage();
if ($image === false) { ?>
    <p class="addEventError">
        There was an error uploading your image. Please make sure it is
        less than 2MB and is a .jpg, .jpeg, .png, or .gif file.
    </p> 
    <?php
    die();
}

$data['image'] = $image;

unset($data['UNIXtime']);
unset($data['time']);

try {
    $db = new PDO('mysql:host=localhost;dbname=ebwrig23', 'ebwrig23', 'etzi9ajgv3');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO events (title, date, location, image, contentSmall, contentLarge) VALUES (:title, :date, :location, :image, :contentSmall, :contentLarge);";
    $stmt = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $stmt->execute($data);
    echo "success";
    

} catch (PDOException $e) {
    //TODO need real error message
    echo "Error: " . $e->getMessage();
}


//TODO image not moving to correct location
//TODO file_ext not working
function processImage(){
   
    if(isset($_FILES['image'])){
        print_r($_FILES['image']['name']);
        $path = "css/media/";
        $fileName = $_FILES['image']['name'];   
        $file_tmp = $_FILES['image']['tmp_name'];
        //get just the file extension as a string
        $file_ext = strtolower(end(explode('.', $fileName)));
        $error = $_FILES['image']['error'];
        echo "error: $error \n";

        // $file_ext = preg_grep('/\.(jpg|jpeg|gif|png)$/i', $fileName);
        $fileSize = $_FILES['image']['size'];
        echo "File Extention: $file_ext \n";
        $newName = $path . uniqid() . "." . $file_ext;
        echo "New Name: $newName \n";
        echo "File TMP: $file_tmp \n";
        if(!(preg_match('/^.*\.(jpg|jpeg|gif|png)$/i', $fileName) && $fileSize < 2000000)){
            return false;
        }else{
            if(move_uploaded_file($file_tmp, $newName)) return $newName;
            else return false;
        }
    }
}


function processInputs($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}
?>