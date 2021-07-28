<?php

session_start();

require_once 'validations-m.php';

require_login();
//connect to db
require_once 'databaseone.php';
$conn = db_connect();

if($_SERVER['REQUEST_METHOD'] == 'GET'){
     $id = filter_var ($_GET['manager_id'], FILTER_SANITIZE_NUMBER_INT);
    
     $sql = "SELECT * FROM manager WHERE manager_id=" . $id;
     $manager = db_queryOne($sql, $conn);

     $manager_id = $manager ['manager_id'];
     $year = $manager['year'];
     $manager_name= $manager['manager_name'];
     $team = $manager['team'];

    include_once 'shared/topone.php'
?>
    <div class="container">
    <h1  class="text-center mt-5 display-1 text-danger" ><i class="bi bi-exclamation-lg"></i></h1>
    <h1 class="text-center mt-5">Are you going to delete manager saved ? </h1>


        <div class="row mt-5 justify-content-center ">
            <form class="col-6" method="POST">

            <div class="row mb-4 test">             
                <label class="col-2 col-form-label fs-5" for="manager_id">Manager ID</label>
                <div class="col-10">
                <input readonly class="form-control form-control-lg" type="text" name="manager_id" value="<?php echo $manager_id; ?>">
                </div>
            </div>

            <div class="row mb-4 test">             
                <label class="col-2 col-form-label fs-5" for="year">Year</label>
                <div class="col-10">
                <input readonly class="form-control form-control-lg" type="text" name="year" value="<?php echo $year; ?>">
                </div>
            </div>


            <div class="row mb-4 test">             
                <label class="col-2 col-form-label fs-5" for="manager_name">Manager Name</label>
                <div class="col-10">
                <input readonly class="form-control form-control-lg" type="text" name="manager_name" value="<?php echo $manager_name; ?>">
                </div>
            </div>


            <div class="row mb-4 test">             
                <label class="col-2 col-form-label fs-5" for="team">Team</label>
                <div class="col-10">
                <input readonly class="form-control form-control-lg" type="text" name="team" value="<?php echo $team; ?>">
                </div>
            </div>
       <div class="d-grid">
       <input readonly  class="form-control form-control-lg" type="hidden" name="manager_id" value= "<?php echo $manager_id; ?>">
       <button class="btn btn-dark btn-lg">Delete Manager</button>
        </div>  
            </form>
        </div>
 <?php       

}else if ($_SERVER['REQUEST_METHOD']== 'POST'){

    $id = filter_var($_POST['manager_id'], FILTER_SANITIZE_NUMBER_INT);

    echo "id is $id";
//IF  this page is fetched via a POST
//then go ahead and actually delete the record

    $sql = "DELETE FROM manager WHERE manager_id=" . $id;

    $cmd = $conn->prepare($sql);
    $cmd -> execute();

    header("Location: managers.php");
}
