<?php
class SignUpController {
    public $user;
    public function __construct($user){
        $this->user = $user;
    }
    public function invoke(){ 
        $this->user->signUp();
    }
}
?>
