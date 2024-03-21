<?php
class UpdateDetailsController {
    public $user;
    public function __construct($user){
        $this->user = $user;
    }
    public function invoke($cbe, $cbt){ 
            $this->user->updateDetails($cbe, $cbt);
    }
    public function chgPass($sanswer){ 
        $this->user->verifySecretAnswer($sanswer);
}
}
?>
