<?php
class ViewMessages {
    public $messages;

    public function __construct()
    {
        $this->messages = array();
    }
    public function viewMessages(){
        include("Message.php");
        include("../connect.php");
        try{
            $rows=$db->query("SELECT inquiries.inquiryId, inquiries.inquiryDate, inquiries.subject, inquiries.message, users.username, users.email FROM inquiries INNER JOIN users ON inquiries.userId = users.userId WHERE reply = 0"); 
            for($i=0; $i<$rows->rowCount(); $i++){
               $row = $rows->fetch();
               $message = new Message($row['inquiryId'], $row['subject'], $row['message'], $row['username'], $row['email']);
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
