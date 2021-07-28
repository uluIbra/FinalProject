<?php
session_start();

require_once 'validations.php';

require_login();

//connect to db
require_once 'database.php';
$conn = db_connect();

include_once 'shared/top.php'
?>

<main.container class="container">
    <div class="row">
        <div class="col">
                <h1 class="mt-5 pt-5"> We are Sorry!</h1>
                <p>Something unexpected just happened. Our suppport team has been notified and will get right on it </p>
                <a href="main.php" class="btn btn-outline-secondary">Back to Homepage</a>
        </div>
        <div class="col">
            <img src="img/error.png" alt="unexpected error" style="width: 800px">
        </div>
        
    </div>


<?php
include_once 'shared/footer.php'
   ?>