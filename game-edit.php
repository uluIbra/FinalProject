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

// if (POST)
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    // - use same for fields as before
    //save form inputs into variables
    $title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
    $year = trim(filter_var($_POST['year'], FILTER_SANITIZE_NUMBER_INT));
    $genre = trim(filter_var($_POST['genre'], FILTER_SANITIZE_STRING));
    $url = trim(filter_var($_POST['url'], FILTER_SANITIZE_URL));
    $id = trim(filter_var($_POST['game_id'], FILTER_SANITIZE_URL));
    // - run UPDATE statement
    $sql = "UPDATE games SET title=:title, ";
    $sql .="year=:year, genre=:genre, url=:url ";
    $sql .= "WHERE game_id=:id";

 

    //create a command object and fill the parameters the form values
    $cmd = $conn->prepare($sql);
    $cmd -> bindParam(':title', $title, PDO::PARAM_STR, 50);
    $cmd -> bindParam(':year', $year, PDO::PARAM_INT,);
    $cmd -> bindParam(':genre', $genre, PDO::PARAM_STR, 32);
    $cmd -> bindParam(':url', $url, PDO::PARAM_STR, 100);
    $cmd -> bindParam(':id', $id, PDO::PARAM_INT);

    //execute the command
    $cmd -> execute();
    // -redirect to games.php
    header("Location: games.php");
    // if (GET)


}else if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    //- GET ID FROM URL
    $id = filter_var($_GET['game_id'], FILTER_SANITIZE_NUMBER_INT);
   
    //-query db for 1 record
    $sql= "SELECT * FROM games WHERE game_id=" . $id;
    $game = db_queryOne($sql, $conn);

    $title = $game['title'];
    $year = $game['year'];
    $genre = $game['genre'];
    $url = $game['url'];
}   


?>

        <h1 class="text-centre mt-5">Edit Game <i class="bi bi-joystick"></i></h1>

        <div class= "row mt-5 justify-content-center">
            <form class="col-6 mb-5" action='game-edit.php' method="POST" novalidate>
         <div class="row mb-4">
            <label class="col-2 col-form-label fs-4" for="title">Title</label>
        <div class="col-10">     
             <input required class="form-control form-control-lg" type="text" name="title" value= "<?php echo $title; ?>">
        </div>
        </div>


    <div class="row mb-4 test">
        <label class="col-2 col-form-label fs-4" for="year">Year</label>
   <div class="col-10">     
         <input inputmode="numeric" pattern="[0-9]{}" class="form-control form-control-lg" type="text" name="year" value= "<?php echo $year; ?>">
    </div>
    </div>


    <div class="row mb-4 test">
        <label class="col-2 col-form-label fs-4" for="genre">Genre</label>
   <div class="col-10">     
        <select name="genre" id="" class= "form-select form-select-lg">
        <!-- <option value= "action">Action</option> -->
             <?php 
                $sql = "SELECT genre FROM genres ORDER BY genre";
                $genres = db_queryAll($sql, $conn);
                
                foreach ($genres as $eachgenre) {
                    echo "<option " . (($eachgenre["genre"] ==strtolower($genre)) ? 'selected' : '') . " value=". $eachgenre["genre"] . ">" . ucfirst($eachgenre["genre"]) . "</option>";
                  

                
                }
                
             ?>
         </select>
        </div>
    </div>


    <div class="row mb-4 test">
        <label class="col-2 col-form-label fs-4" for="url">Url</label>
   <div class="col-10">     
         <input required pattern="https?:\/\/.+\..+" class="form-control form-control-lg" title="Please enter a url beginning with http:// or https://" type="text" name="url" value= "<?php echo $url; ?>">
    </div>
    </div>
        <div class="d-grid">
        <input readonly  class="form-control form-control-lg" type="hidden" name="game_id" value= "<?php echo $id; ?>">
        <button class="btn btn-success btn-lg">Update Game</button>
        </div>
    </form>
    </div>

   <?php
include_once 'shared/footer.php'
   ?>