<?php
    session_start();
class Message {
    public $messagetext;
    public $subject;
    public $username;

    public function __construct($subject, $messagetext, $username)
    {
        $this->messagetext = $messagetext;
        $this->subject = $subject;
        $this->username = $username;

    }
    public function sendMessage(){
        include 'connect.php';
        try{
          $sth=$db->prepare("INSERT INTO inquiries(userId, inquiryDate, subject, message) VALUES (:userid, curdate(), :subject, :message)");
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
