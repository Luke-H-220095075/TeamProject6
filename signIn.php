<?php
    if(isset($_POST["changePassword]"]))
    {
      include 'changePassword.php';  
    }
    if(isset($_POST["submitted"])) 
    {
      echo "submitted";
      if(!empty(trim($_POST['username'])))
      {
        if(!empty(trim($_POST['password'])))
        {
          include_once("User.php");
                            //($username, $password, $email, $firstname, $surname, $address, $phone, $admin
        $user = new User($_POST['username'], $_POST['password'], null, null, null, null, null, null);
        include_once("SignInController.php");
        $controller = new SignInController($user);
        $controller->invoke();
        }
        else
        {
            echo "please enter a password";
        }
    }
      else
      {
        echo "Please enter a username";
      }
}
    ?>
