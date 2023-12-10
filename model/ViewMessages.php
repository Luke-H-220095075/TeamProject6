<?php
class ViewMessages {
    public $messages;

    public function __construct()
    {
        $this->messages = array();
    }
    public function viewMessages(){
        include("connect.php");
        try{
            $rows=$db->query("SELECT inquiries.inquiryDate, inquiries.subject, inquiries.message, users.username FROM inquiries INNER JOIN users ON inquiries.userId = users.userId"); 
            for($i=0; $i<$rows->rowCount(); $i++){
               $row = $rows->fetch();
               $message = new Message($row['inquiries.subject'], $row['inquiries.message'], $row['users.username']);
               $this->messages[] = $message;
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
