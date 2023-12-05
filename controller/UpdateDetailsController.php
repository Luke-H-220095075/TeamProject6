<?php
class UpdateDetailsController {
    public $user;
    public function __construct($user){
        $this->user = $user;
    }
    public function invoke(){ 
        if($this->user->address != null){
            $this->user->updateAddress();
        }
        if($this->user->email != null){
            $this->user->updateEmail();
        }
        if($this->user->firstname != null){
            $this->user->updateFirstname();
        }
        if($this->user->surname != null){
            $this->user->updateSurname();
        }
        if($this->user->phone != null){
            $this->user->updatePhone();
        }
    }
}
?>
