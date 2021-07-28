<?php
session_start();

require_once 'validations-m.php';

require_login();

//connect to db
require_once 'databaseone.php';
$conn = db_connect();
?>

<?php
include_once 'shared/topone.php'
?>

    <div class="container">
    <h1 class="text-center mt-5">New Manager Career <i class="bi bi-person-bounding-box"></i></h1>


        <div class="row mt-5 justify-content-center ">
            <form class="col-6" action="save-manager.php" method="POST" novalidate>

            <div class="row mb-4 test">             
                <label class="col-2 col-form-label fs-5" for="manager_id">Manager ID</label>
                <div class="col-10">
                <input inputmode="numeric" pattern="[0-9]{}" class="form-control form-control-lg" type="text" name="manager_id">
                </div>
            </div>

            <div class="row mb-4 test">             
                <label class="col-2 col-form-label fs-5" for="year">Year</label>
                <div class="col-10">
                <input pattern="/(?<=\D|^)(?<year>\d{4})(?<sep>[^\w\s])(?<month>1[0-2]|0[1-9])\k<sep>(?<day>0[1-9]|[12][0-9]|(?<=11\k<sep>|[^1][4-9]\k<sep>)30|(?<=1[02]\k<sep>|[^1][13578]\k<sep>)3[01])(?=\D|$)/gm"
                 class="form-control form-control-lg" type="text" name="year">
                </div>
            </div>


            <div class="row mb-4 test">             
                <label class="col-2 col-form-label fs-5" for="manager_name">Manager Name</label>
                <div class="col-10">
                <input required class="form-control form-control-lg" type="text" name="manager_name">
                </div>
            </div>


            <div class="row mb-4 test">             
                <label class="col-2 col-form-label fs-5" for="team">Team</label>
                <div class="col-10">
               <select name="team" id="" class="form-select form-select-lg">
               <?php 
                $sql = "SELECT team FROM teams ORDER BY team";
                $teams = db_queryAll($sql, $conn);
                
                foreach ($teams as $team) {
                    echo "<option value=". $team["team"] . ">" . ucfirst($team["team"]) . "</option>";

                
                }
                
             ?>
               </select>
                </div>
            </div>
       <div class="d-grid">
       <button class="btn btn-primary btn-lg">Submit</button>
        </div>  
            </form>
        </div>

        <?php
include_once 'shared/footerone.php'
   ?>