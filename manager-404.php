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
                <h1 class="mt-5 pt-5"> SORRY!!!!!!</h1>
                <p>There is no page. Go back and try again</p>
                <a href="mainone.php" class="btn btn-outline-warning">Back to Manager Page</a>
        </div>
        <div class="col">
            <img src="img/m-404.png" alt="404 error" style="width: 800px">
        </div>
        
    </div>




<?php
include_once 'shared/footerone.php'
   ?>