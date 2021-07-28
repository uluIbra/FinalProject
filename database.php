<?php
require_once 'db_cred.php';

function db_queryAll ($sql, $conn){
    try {
    //run query and store the results
    $cmd = $conn->prepare($sql);
    $cmd-> execute();
    $games = $cmd->fetchAll();
    return $games;
 } catch (Expection $e) {
        header("Location: error.php");
 }
}

function db_queryOne ($sql, $conn){
    try {
    //run query and store the results
    $cmd = $conn->prepare($sql);
    $cmd-> execute();
    $games = $cmd->fetch();
    return $games;
    } catch (Exception $e) {
       // mail('200456630@student.georgianc.on.ca', 'PDO Error', $e);
        header("Location: error.php");
    }
}

function db_connect(){

    $conn = new PDO ('mysql:host=' . DB_SERVER  . ';dbname=' . DB_USER, DB_NAME, DB_PASS);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}

function db_disconnect($conn) {
    if (isset($conn)) {
    
        //disconnect
         $conn = null;
    }
}
?>