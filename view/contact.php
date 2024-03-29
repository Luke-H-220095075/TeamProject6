<?php
  include("connect.php");
  if(isset($_POST["submitted"])) 
  {
    if(!empty(trim($_POST['message'])))
    {
      if(!empty(trim($_POST['subject'])))
      {
        require("model/Message.php");
        $message = new Message(null, $_POST['subject'], $_POST['message'], null, null, null);
        require("controller/SendMessageController.php");
        $controller = new SendMessageController($message);
        $controller->invoke();  
    }
    else{
      echo "Please enter a subject.";
    }  
  }
  else{
    echo "Please enter a message.";
  }
}
      
  ?>
