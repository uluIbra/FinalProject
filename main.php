<?php
session_start();

require_once 'validations.php';

require_login();

//connect to db
require_once 'database.php';
$conn = db_connect();
?>

<?php


include_once 'shared/top.php';

?>

<img src="img/arcade.jpg" class="img-fluid" alt="">

<?php

include_once 'shared/footer.php'
?>