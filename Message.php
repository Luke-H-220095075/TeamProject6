<?php
class Message {
    public $user;
    public $messagetext;
    public $subject;

    public function __construct($user, $subject, $messagetext)
    {
        $this->user = $user;
        $this->messagetext = $messagetext;
        $this->subject = $subject;
    }
    public function sendMessage(){
        include 'connect.php';
        try{
          $sth=$db->prepare("INSERT INTO Inquiries(Username, InquiryDate, Subject, Message) VALUES (:username, GETDATE(), :subject, :message)");
          $sth->bindparam(':username', $this->user->username, PDO::PARAM_STR, 64);
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