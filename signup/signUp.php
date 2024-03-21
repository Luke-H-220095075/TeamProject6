<script defer src="signUpScript.js"></script>
<?php
    include("../connect.php");
    if (isset($_POST["submitted"])) 
    {
      if(!empty(trim($_POST['username'])))
      {
        if(!empty(trim($_POST['password'])))
        {
            if($_POST['password'] === $_POST['password2'])
            {
             include_once("../User.php");                                                               //($username, $password, $email, $firstname, $surname, $address, $phone, $admin)
              $user = new User($_POST['username'], password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['email'], $_POST['firstname'], $_POST['surname'], null, null, 'Customer');
        include_once("SignUpController.php");
        $controller = new SignUpController($user, password_hash($_POST['sanswer'], PASSWORD_DEFAULT));
        $controller->invoke();
            }
            else{
              echo "Passwords do not match.";
            } 
        }
        else{
            echo "Please enter a password.";
        }
      }
      else{
          echo "Please enter a username.";
      }
    }
    ?>
