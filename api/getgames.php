<?php

//connect to db
require_once '../databaseone.php';
$conn = db_connect();

$sql = "SELECT * FROM manager ORDER BY manager_id";

$cmd = $conn -> prepare($sql);
$cmd -> execute();
$games = $cmd -> fetchAll(PDO::FETCH_ASSOC);

function insert_img_urls($object){
    if(isset($object['photo'])){
      $object['photo']= "http://localhost/week-9/uploads" . $object['photo'];
    }else{
        $object['photo'] = null;
    }
    return $object;
}


$games2 = array_map('insert_img_urls', $games);



echo json_encode($games2);