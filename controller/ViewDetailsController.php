<?php
class ViewDetailsController {
    public $user;
    public function __construct($user){
        $this->user = $user;
    }
    public function invoke(){ 
        $this->user->getDetails();
        include("showDetails.php");
    }
}
?>
