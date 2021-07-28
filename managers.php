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

//build a sql query
$sql = "SELECT * FROM manager";
$managers = db_queryAll($sql, $conn);
?>


<table class="table table-secondary rable-striped table-border-cevondary fs-5 mt-4">
  <thead>
    <tr>
      <th scope="col">Manager ID</th>
      <th scope="col">Year</th>
      <th scope="col">Manager Name</th>
      <th scope="col">Team</th>
      <?php if (is_logged_in()) { ?>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th> 
      <?php } ?>
    </tr>
  </thead>
  <tbody> 
  <?php foreach($managers as $manager) { ?>
    <tr>
      <th scope="row"><?php echo $manager['manager_id']; ?></th>
      <td><?php echo $manager['year']; ?></td>
      <td><?php echo $manager['manager_name']; ?></td>
      <td><?php echo $manager['team']; ?></td>
      <?php if (is_logged_in()) { ?>
      <td>
        <a href="manager-edit.php?manager_id=<?php echo $manager['manager_id'];?>" class="btn btn-secondary">Edit <i class="bi bi-arrows-fullscreen"></i></a>
        </td>
        <td>
        <a href="manager-delete.php?manager_id=<?php echo $manager['manager_id'];?>" class="btn btn-warning"><span class="visually-hidden">Delete </span> <i class="bi bi-trash"></i></a>
        </td>
     <?php } ?> 
    </tr>
    <?php } ?>
  </tbody>
</table>



<?php


include_once 'shared/footerone.php';
?>