<?php
session_start();
require_once 'validations.php';

//connect to db
require_once 'database.php';
$conn = db_connect();

?>
<?php
$title_tag = "Table Listing";
include_once 'shared/top.php';


//build a sql query
$sql = "SELECT * FROM games";
$games = db_queryAll($sql, $conn);
?>


<table class="table table-secondary table-striped table-bordered border-secondary fs-5 mt-4">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Year</th>
      <th scope="col">Genre</th>
      <th scope="col" class="col-1">Url</th>
      <?php if (is_logged_in()) { ?>
        <th scope="col" class="col-1">Edit</th>
        <th scope="col" class="col-1">Delete</th>
        <?php } ?>
      
    </tr>
  </thead>
  <tbody>
   <?php foreach ($games as $game) { ?>
    <tr>
      <th scope="row"><?php echo $game ['title']; ?></th>
      <td><?php echo $game ['year']; ?></td>
      <td><?php echo $game ['genre']; ?></td>
      <td><a class="btn btn-primary" target="_blank" href="<?php echo $game ['url']; ?>"> Play <i class="bi bi-box-arrow-up-right"></i>
      </a>
      </td>
      <?php if (is_logged_in()) { ?>
      <td><a href="game-edit.php?game_id=<?php echo $game['game_id'];?>" class="btn btn-secondary">Edit<i class="bi bi-pencil-square"></i></a></td>
        <td><a href="game-delete.php?game_id=<?php echo $game['game_id'];?>" class="btn btn-warning"><span class="visually-hidden">Delete</span>  <i class="bi bi-trash"></i></a></td>
        <?php } ?>
    </tr>
    <?php } ?>
  </tbody>
</table>






<?php


include_once 'shared/footer.php';
?>