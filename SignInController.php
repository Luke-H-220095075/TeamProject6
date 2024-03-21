<?php
class SignInController {
    public $user;
    public function __construct($user){
        $this->user = $user;
    }
    public function invoke(){ 
        $this->user->signIn();
    }
}
?>
