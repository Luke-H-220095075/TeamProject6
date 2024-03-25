<?php
class Message {
    public $id;
    public $messagetext;
    public $subject;
    public $username;
    public $email;

    public function __construct($id, $subject, $messagetext, $username, $email)
    {
        $this->id = $id;
        $this->messagetext = $messagetext;
        $this->subject = $subject;
        $this->username = $username;
        $this->email = $email;
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
    public function reply(){
      include '../connect.php';
        try{
          $sth=$db->prepare("UPDATE inquiries SET reply = 1 WHERE inquiryId = :id");
          $sth->bindparam(':id', $this->id, PDO::PARAM_STR, 64);
          $sth->execute();
          return true;
        }catch(PDOException $ex){
          ?>
          <p>Sorry, a database error occurred.<p>
          <p>Error details: <em> <?= $ex->getMessage() ?></em></p>
          <?php
        }           
    }
}
?>
