<?php
//connect to db
session_start();

require_once 'validations.php';

require_login();






require_once 'database.php';
$conn = db_connect();
?>

<?php
$title_tag="Add Game";
include_once 'shared/top.php'
?>

        <h1 class="text-center mt-5">Add Games <i class="bi bi-joystick"></i></h1>

        <div class= "row mt-5 justify-content-center">
            <form class="col-6 mb-5" action='save-game.php' method="POST" novalidate>
         <div class="row mb-4">
            <label class="col-2 col-form-label fs-4" for="title">Title</label>
        <div class="col-10">     
             <input required class="form-control form-control-lg" type="text" name="title">
        </div>
        </div>


    <div class="row mb-4 test">
        <label class="col-2 col-form-label fs-4" for="year">Year</label>
   <div class="col-10">     
         <input inputmode="numeric" pattern="[0-9]{}" class="form-control form-control-lg" type="text" name="year">
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
                
                foreach ($genres as $genre) {
                    echo "<option value=". $genre["genre"] . ">" . ucfirst($genre["genre"]) . "</option>";

                
                }
                
             ?>
         </select>
        </div>
    </div>


    <div class="row mb-4 test">
        <label class="col-2 col-form-label fs-4" for="url">Url</label>
   <div class="col-10">     
         <input required pattern="https?:\/\/.+\..+" class="form-control form-control-lg" title="Please enter a url beginning with http:// or https://" type="text" name="url">
    </div>
    </div>
        <div class="d-grid">
        <button class="btn btn-success btn-lg">Submit</button>
        </div>
    </form>
    </div>

    

   <?php
include_once 'shared/footer.php'
   ?>