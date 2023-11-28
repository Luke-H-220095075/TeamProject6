<?php
  include("connect.php");
  if (isset($_POST ["submitted"])) 
  {
    if(!empty(trim($_POST['message'])))
    {
      if(!empty(trim($_POST['subject'])))
      {
        include_once("model/Message.php");
        $message = new Message($_POST['subject'], $_POST['message']);
        include_once("controller/MessageController.php");
        $controller = new MessageController($message);
        $controller->invoke();  
      }
    }
    else{
      echo "Please enter a subject.";
    }  
  }
  else{
    echo "Please enter a message.";
  }
      
  ?>