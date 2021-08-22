<?php
require_once 'db_cred.php';

function db_queryAll($sql, $conn, $word_list= []) {
    try{
        $cmd = $conn->prepare($sql);
        $cmd -> execute($word_list);
        $managers = $cmd->fetchAll();
        return $managers;
    } catch(Exception $e){
        header("Location: m-error.php");
        //mail('ibrahimulu_77@hotmail.com', 'PDO Error', $e);
        header("Location: error.php");
    }
}


function db_queryOne($sql, $conn) {
        try{
        $cmd = $conn->prepare($sql);
        $cmd -> execute();
        $managers = $cmd->fetch();
        return $managers;
        } catch(Exception $e){
            header("Location: m-error.php");
        }
}

function db_connect(){

    $conn = new PDO('mysql:host=' . DB_SERVER  . ';dbname=' . DB_USER, DB_NAME, DB_PASS);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
    
}

function db_disconnect($conn) {
    if(isset($conn)){

    // disconnect
    $conn = null;
    }
}
?>