<?php
class ViewUsers{
    public $users;

    public function __construct()
    {
        $this->users = array();
    }
    public function usersToApprove(){
        include("connect.php");
        include("../User.php");
        try{
            $rows=$db->query("SELECT username FROM users WHERE pendingApproval = 1"); 
            for($i=0; $i<$rows->rowCount(); $i++){
               $row = $rows->fetch();
               $user = new User($row['username'], null, null, null, null, null, null, null);
               $this->users[] = $user;
            }
        } catch(PDOException $ex){
            ?>
            <p>Sorry, a database error occurred.<p>
            <p>Error details: <em> <?= $ex->getMessage() ?></em></p>
            <?php
        }
      }
}
?>