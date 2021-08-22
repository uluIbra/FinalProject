<?php
function is_logged_in() {
    return isset($_SESSION['user_id']);
}

function require_login() {
    if(!is_logged_in()){
    header("Location:login-m.php");
    exit;
    }
}


function validate_manager($manager) {
    $errors = [];

    if (empty(trim($manager['manager_id']))) {
        $errors['manager_id'] = "Please Enter a Manager ID";
        
        }
        //for blank
    if (empty(trim($manager['manager_name']))) {
        $errors['manager_name'] = "Please Enter a Manager Name";
        
        }
    $year_regex = "/[0-9]{4}/";
        $year = $manager['year'];
    if($year< 0|| strlen($year) != 4 || !preg_match($year_regex, $year)){
        $errors['year'] =  "Please Enter a Valid Year";
       
    }


    return $errors;



}

function validate_registration($user, $conn){
    $errors = [];


    if(empty(trim($user['email']))){
    $errors['email'] = "Email cannot be blank";
    
    
    }   

    $email_regex="/.+\@.+/";
    if(!preg_match($email_regex, $user['email'])){
        $errors['email']= "Username must be a valid email address";
    }

    if(empty(trim($user['new-password']))){


        $errors['password'] = "Password cannot be blank";


    }

    
    if(empty(trim($user['confirm-password']))){


        $errors['confirm'] = "Confirm Password cannot be blank";


    }

    $sql = "SELECT * FROM users WHERE username='" . $user['email'] . "'";
    $cmd = $conn -> prepare($sql);
    $cmd -> execute();
    $found_username = $cmd -> fetch();

    if($found_username){
        $errors['email'] = 'Username already taken';
    }

    return $errors;

}


function display_toast($m, $msg) {
    if (!($m && $msg)) {
        return;
     }
  

    $msgs = [];
    $msgs['0'] = "Successfully Added";
    $msgs['1'] = "Successfully Deleted";
    $msgs['2'] = "Successfully Edited";

    echo <<<EOL
        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header bg-dark text-light">
            
            <strong class="me-auto">$msgs[$m]</strong>
            <small>11 mins ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <div class="toast-body bg-dark text-light">
            $msg
          </div>
        </div>
        </div>
        <script>
          window.addEventListener('DOMContentLoaded', () => {
            var toastElList = [].slice.call(document.querySelectorAll('.toast'))
            var toastList = toastElList.map(function (toastEl) {
              return new bootstrap.Toast(toastEl)
            });
            toastList.forEach(toast => toast.show())
          });
        </script>
    
    
    EOL;
    
    }