<?php
class SendMessageController {
    public $message;
    public function __construct($message){
        $this->message= $message;
    }
    public function invoke(){ 
        $this->message->sendMessage();
    }
}
?>
