<?php
session_start();

require_once 'validations-m.php';

require_login();

//connect to db
require_once 'databaseone.php';
$conn = db_connect();


include_once 'shared/topone.php'
?>
<main.container class="container">
    <div class="row">
        <div class="col">
                <h1 class="mt-5 pt-5"> Something Wrong!!!</h1>
                <p>It's a problem. Our support ream reach you out as soon as possible!!!</p>
                <a href="mainone.php" class="btn btn-outline-warning">Back to Manager Page</a>
        </div>
        <div class="col">
            <img src="img/404.png" alt="404unxecpred error error" style="width: 800px">
        </div>
        
    </div>
    <?php
include_once 'shared/footerone.php'
   ?>
