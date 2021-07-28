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


if ($_SERVER['REQUEST_METHOD'] =='POST'){

    $manager_id =trim(filter_var($_POST['manager_id'], FILTER_SANITIZE_NUMBER_INT));
    $year = trim(filter_var($_POST['year'], FILTER_SANITIZE_NUMBER_INT));
    $manager_name =trim(filter_var($_POST['manager_name'], FILTER_SANITIZE_STRING));
    $team = trim(filter_Var($_POST ['team'], FILTER_SANITIZE_STRING));
    



    $sql = "UPDATE manager SET manager_id=:manager_id ";
    $sql .="year=:year,manager_name=:manager_name, team=:team ";
    $sql .= "WHERE manager_id=:id";

    $cmd = $conn->prepare($sql);
    $cmd -> bindParam(':manager_id', $manager_id, PDO::PARAM_STR, 50);
    $cmd -> bindParam(':year', $year, PDO::PARAM_INT,);
    $cmd -> bindParam(':manager_name', $manager_name, PDO::PARAM_STR, 50);
    $cmd -> bindParam(':team', $team, PDO::PARAM_STR, 100);
    


$cmd -> execute();

header("Location: managers.php");

} else if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $id = filter_var ($_GET['manager_id'], FILTER_SANITIZE_NUMBER_INT);
   
    $sql = "SELECT * FROM manager WHERE manager_id=" . $id;
    $manager = db_queryOne($sql, $conn);

    $manager_id = $manager ['manager_id'];
    $year = $manager['year'];
    $manager_name= $manager['manager_name'];
    $team = $manager['team'];
}


?>



    <div class="container">
    <h1 class="text-center mt-5">Edit Career <i class="bi bi-person-bounding-box"></i></h1>


        <div class="row mt-5 justify-content-center ">
            <form class="col-6" action="manager-edit.php" method="POST" novalidate>

            <div class="row mb-4 test">             
                <label class="col-2 col-form-label fs-5" for="manager_id">Manager ID</label>
                <div class="col-10">
                <input inputmode="numeric" pattern="[0-9]{}" class="form-control form-control-lg" type="text" name="manager_id" value="<?php echo $manager_id?>">
                </div>
            </div>

            <div class="row mb-4 test">             
                <label class="col-2 col-form-label fs-5" for="year">Year</label>
                <div class="col-10">
                <input pattern="/(?<=\D|^)(?<year>\d{4})(?<sep>[^\w\s])(?<month>1[0-2]|0[1-9])\k<sep>(?<day>0[1-9]|[12][0-9]|(?<=11\k<sep>|[^1][4-9]\k<sep>)30|(?<=1[02]\k<sep>|[^1][13578]\k<sep>)3[01])(?=\D|$)/gm"
                 class="form-control form-control-lg" type="text" name="year" value="<?php echo $year?>">
                </div>
            </div>


            <div class="row mb-4 test">             
                <label class="col-2 col-form-label fs-5" for="manager_name">Manager Name</label>
                <div class="col-10">
                <input required class="form-control form-control-lg" type="text" name="manager_name"value="<?php echo $manager_name?>"">
                </div>
            </div>


            <div class="row mb-4 test">             
                <label class="col-2 col-form-label fs-5" for="team">Team</label>
                <div class="col-10">
               <select name="team" id="" class="form-select form-select-lg">
               <?php 
                $sql = "SELECT team FROM teams ORDER BY team";
                $teams = db_queryAll($sql, $conn);
                
                    foreach ($teams as $eachteam) {
                        echo "<option " . (($eachteam["team"] == strtolower($team)) ? 'selected' : '') . " value=". $eachteam["team"] . ">" . ucfirst($eachteam["team"]) . "</option>";


                
                }
                
             ?>
               </select>
                </div>
            </div>
       <div class="d-grid">
       <input readonly  class="form-control form-control-lg" type="hidden" name="manager_id" value= "<?php echo $manager_id; ?>">
       <button class="btn btn-primary btn-lg">Update Career</button>
        </div>  
            </form>
        </div>

        <?php
include_once 'shared/footerone.php'
   ?>