<?php
class SignUpController {
    public $user;
    public $token;
    public function __construct($user, $token){
        $this->user = $user;
        $this->token = $token;
    }
    public function invoke(){ 
        $this->user->signUp($this->token);
    }
}
?>
