<?php

session_start();

//echo json_encode($_FILES);
$name = $_FILES['pic']['name'];
$tmp_name = $_FILES['pic']['tmp_name'];
$type = mime_content_type($tmp_name);
$size = $_FILES['pic']['size'];

if ($size > 1000000) {
    $errors['pic']= "Image must be less than 1MB";
}

if (!($type == 'image/jpeg' || $type == 'image/png')){
    $errors['pic']= "Image format must be .jpg or .png";
}



if(empty($errors)){
move_uploaded_file($tmp_name, "uploads/" . session_id(). $name);
}else {
    foreach($errors as $err){
        echo "$err <Br>";
    }
}