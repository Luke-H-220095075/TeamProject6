<?php
include_once("model/User.php");
include("controller/ViewDetailsController");
$controller = new ViewDetailsController();
$controller->invoke();
if(isset($_POST["change email"])) {
    if(!empty(trim($_POST['email'])))
      {
         $user = new User($_POST['username'],null ,$_POST['email'], null, null, null, null, null);
      }
      else
        {
            echo "please enter a new email";
        }
}
if(isset($_POST["change firstname"])) {
    if(!empty(trim($_POST['firstname'])))
      {
         $user = new User($_POST['username'],null ,null , $_POST['firstname'], null, null, null, null);
      }
      else
        {
            echo "please enter a new first name";
        }
}
if(isset($_POST["change surname"])) {
    if(!empty(trim($_POST['surname'])))
      {
         $user = new User($_POST['username'],null ,null ,null , $_POST['surname'], null, null, null);
      }
      else
        {
            echo "please enter a new surname";
        }
}
if(isset($_POST["change address"])) {
    if(!empty(trim($_POST['address'])))
      {
         $user = new User($_POST['username'],null ,null ,null , null, $_POST['address'], null, null);
      }
      else
        {
            echo "please enter a new address";
        }
}
if(isset($_POST["change phone"])) {
    if(!empty(trim($_POST['phone'])))
      {
         $user = new User($_POST['username'],null ,null ,null , null, null, $_POST['phone'], null);
      }
      else
        {
            echo "please enter a new phone number";
        }
}
if($user != null){
    include_once("controller/UpdateDetailsController.php");
    $controller = new UpdateDetailsController($user);
    $controller->invoke();
}
