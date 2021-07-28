<?php
session_start();

require_once 'validations-m.php';

require_login();

//connect to db
require_once 'databaseone.php';
$conn = db_connect();

?>



<?php


include_once 'shared/topone.php';

?>

<img src="img/manager.jpg" class="img-fluid" alt="">

<?php

include_once 'shared/footerone.php'
?>