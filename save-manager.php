<?php

session_start();

require_once 'validations-m.php';

require_login();

//connect to db
require_once 'databaseone.php';
$conn = db_connect();

?>


<?php
//trims for blank
$manager_id =trim(filter_var($_POST['manager_id'], FILTER_SANITIZE_NUMBER_INT));
$year = trim(filter_var($_POST['year'], FILTER_SANITIZE_NUMBER_INT));
$manager_name =trim(filter_var($_POST['manager_name'], FILTER_SANITIZE_STRING));
$team = trim($_POST ['team']);

$is_form_valid = true;
// check if all inputs are valid

    if (empty(trim($manager_id))) {
        echo "Please Enter a Manager ID<br/>";
        $is_form_valid= false;
        }
        //for blank
    if (empty(trim($manager_name))) {
        echo "Please Enter a Manager Name<br/>";
        $is_form_valid= false;  
        }
    $year_regex = "/[0-9]{4}/";

    if($year< 0|| strlen($year) != 4 || !preg_match($year_regex, $year)){
        echo  "Please Enter a Valid Year<br/>";
        $is_form_valid = false;
    }

   




    if ($is_form_valid){
        try{
                $sql = "INSERT INTO manager (manager_id,  year, manager_name, team) VALUES ( :manager_id, :year, :manager_name, :team)";


            $cmd = $conn->prepare($sql);
            $cmd -> bindParam(':manager_id', $manager_id, PDO::PARAM_STR, 50);
            $cmd -> bindParam(':year', $year, PDO::PARAM_INT,);
            $cmd -> bindParam(':manager_name', $manager_name, PDO::PARAM_STR, 50);
            $cmd -> bindParam(':team', $team, PDO::PARAM_STR, 100);


            $cmd -> execute();

            $conn = null;
        } catch(Exception $e) {
            header("Location: m-error.php");
        }

echo "You can start to manage your team!!!";

}
?>