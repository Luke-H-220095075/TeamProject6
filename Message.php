<?php
class Message {
    public $messagetext;
    public $subject;

    public function __construct($subject, $messagetext)
    {
        $this->messagetext = $messagetext;
        $this->subject = $subject;
    }
    public function sendMessage(){
        include 'connect.php';
        try{
          $sth=$db->prepare("INSERT INTO inquiries(userID, inquiryDate, subject, message) VALUES (:userid, GETDATE(), :subject, :message)");
          $sth->bindparam(':userid', $_SESSION['userID'], PDO::PARAM_STR, 64);
          $sth->bindparam(':subject', $this->subject, PDO::PARAM_STR, 64);
          $sth->bindparam(':message', $this->messagetext, PDO::PARAM_STR, 64);
          $sth->execute();
        }catch(PDOException $ex){
          ?>
          <p>Sorry, a database error occurred.<p>
          <p>Error details: <em> <?= $ex->getMessage() ?></em></p>
          <?php
        }           
    }
}
?>