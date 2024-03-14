<?php
session_start();
class User {
  public $username;
  public $password;
  public $email;
  public $firstname;
  public $surname;
  public $address;
  public $phone;
  public $admin;
  public $userID;

  public function __construct($username, $password, $email, $firstname, $surname, $address, $phone, $admin) {
    $this->username = $username;
    $this->password = $password;
    $this->email = $email;
    $this->admin = $admin;
    $this->firstname = $firstname;
    $this->phone = $phone;
    $this->surname = $surname;
    $this->address = $address;
    $this->phone = $phone;
    $this->userID = null;
  }
  public function signIn(){

    include 'view/connect.php';
    try{
      $sth=$db->prepare("SELECT userId, password FROM users WHERE username = :username");
      $sth->bindparam(':username', $this->username, PDO::PARAM_STR, 10);
      $sth->execute();
      $row=$sth->fetch(PDO::FETCH_ASSOC);

      if(!empty($row))
      {
        if(password_verify(($this->password), $row['password']))
        {
          echo $_SESSION["user"];
          if(is_array($username))
          {
            $username = $username[0];
          }
            $this->setSession();
            echo "success";
            header('Location: ../TeamProject6/Customerprofile.php');
          }
          else{
          ?>
          <p>Incorrect password</p>
          <?php
        }
      }
      else
      {
        ?>
        <p>Incorrect username<p>
        <?php
      }
    }
    catch(PDOException $ex)
    {
      ?>
      <p>Sorry, a database error occurred.<p>
      <p>Error details: <em> <?= $ex->getMessage() ?></em></p>
      <?php
    }
  }
  public function signUp($token){
    include 'view/connect.php';
    try{
      $sth=$db->prepare("INSERT INTO users(username, forename, surname, password, email, userType, secretAnswer) VALUES (:username, :firstname, :surname, :password, :email, :admin, :token)");
      $sth->bindparam(':username', $this->username, PDO::PARAM_STR, 64);
      $sth->bindparam(':password', $this->password, PDO::PARAM_STR, 64);
      $sth->bindparam(':firstname', $this->firstname, PDO::PARAM_STR, 64);
      $sth->bindparam(':surname', $this->surname, PDO::PARAM_STR, 64);
      $sth->bindparam(':email', $this->email, PDO::PARAM_STR, 64);
      $sth->bindparam(':admin', $this->admin, PDO::PARAM_STR, 64);
      $sth->bindparam(':token', $token, PDO::PARAM_STR, 64);
      $sth->execute();
      /*alert($sth);*/
      ?><script type='text/javascript'>alert("You have successfully signed up");</script><?php
      $this->setSession();
      } catch(PDOException $ex){
      ?>
      <p>Sorry, a database error occurred.<p>
      <p>Error details: <em> <?= $ex->getMessage() ?></em></p>
      <?php
    }           
  }
  public function changeDetails(){
    include 'view/connect.php';
        try{
          $sth=$db->prepare("UPDATE users SET password = :password, email = :email, phoneNumber = :phone, forename = :name, surname = :surname, address = :address WHERE username = :username");
          $sth->bindparam(':username', $this->username, PDO::PARAM_STR, 10);
          $sth->bindparam(':password', $this->password, PDO::PARAM_STR, 64);
          $sth->bindparam(':email', $this->email, PDO::PARAM_STR, 64);
          $sth->bindparam(':phone', $this->phone, PDO::PARAM_STR, 10);
          $sth->bindparam(':name', $this->firstname, PDO::PARAM_STR, 10);
          $sth->bindparam(':surname', $this->surname, PDO::PARAM_STR, 10);
          $sth->bindparam(':address', $this->address, PDO::PARAM_STR, 10);
          $sth->execute();
          if($sth == true){
            //details updated
          }
      }catch(PDOException $ex){
        ?>
        <p>Sorry, a database error occurred.<p>
        <p>Error details: <em> <?= $ex->getMessage() ?></em></p>
        <?php
      } 
  }
  public function forgottenUsername(){
    include 'view/connect.php';
    try{
      $sth=$db->prepare("SELECT Username FROM users WHERE email = :email");
      $sth->bindparam(':username', $this->username, PDO::PARAM_STR, 10);
      $sth->bindparam(':email', $this->email, PDO::PARAM_STR, 10);
      $sth->execute();

    }catch(PDOException $ex){
    ?>
    <p>Sorry, a database error occurred.<p>
    <p>Error details: <em> <?= $ex->getMessage() ?></em></p>
    <?php
    }
  }
  public function setSession(){
    session_start();
    require 'view/connect.php';
    try{
      $_SESSION["user"] = $this->username;
      $sth=$db->prepare("SELECT userType, userId FROM users WHERE username = :username");
      $sth->bindparam(':username', $this->username, PDO::PARAM_STR, 10);
      $sth->execute();
      $row=$sth->fetch(PDO::FETCH_ASSOC);
      $_SESSION["access"] = $row['userType'];
      $_SESSION["userID"] = $row['userId'];
    }
    catch(PDOException $ex){
      ?>
      <p>Sorry, a database error occurred.<p>
      <p>Error details: <em> <?= $ex->getMessage() ?></em></p>
      <?php
    }    
  }
  public function getDetails(){
    include '../../view/connect.php';
    if(isset($_SESSION)){
      $sth=$db->prepare("SELECT * FROM users WHERE username = :username");
      $sth->bindparam(':username', $_SESSION["user"], PDO::PARAM_STR, 10);
      $sth->execute();
      $row=$sth->fetch(PDO::FETCH_ASSOC);
      $this->username = $row['username'];
      $this->firstname = $row['firstname'];
      $this->surname = $row['surname'];
      $this->email = $row['email'];
      $this->address = $row['address'];
      $this->phone = $row['phone'];
      $this->admin = $row['admin'];
    }
    else{
      echo "you need to log in first";
    }
    }
    public function setSecretAnswer($token){
    include("connect.php");
    try{
    $sth=$db->prepare("INSERT INTO passtokens(token, username, expiry) VALUES (:token, :id, :expiry)");
    $sth->bindparam(':id', $this->username, PDO::PARAM_STR, 64);
    $sth->bindparam(':token', password_hash($token, PASSWORD_DEFAULT), PDO::PARAM_STR, 64);
    $sth->bindparam(':', $this->firstname, PDO::PARAM_STR, 64);
    $sth->execute();}
    catch(PDOException $ex){
        echo "A database error occurred";
    }

    }
    public function verifyToken($token){
      include '../../view/connect.php';
    if(isset($_SESSION)){
      $sth=$db->prepare("SELECT token FROM users WHERE username = :username");
      $sth->bindparam(':username', $_SESSION["user"], PDO::PARAM_STR, 10);
      $sth->execute();
      $row=$sth->fetch(PDO::FETCH_ASSOC);
      if($row != null && password_verify($token, $row)) 
      {
          return true;//success
        }
        else{
          return false;
        }
      
    }
    }
    public function updatePassword(){
      include 'view/connect.php';
          try{
            $sth=$db->prepare("UPDATE users SET password = :password WHERE username = :username");
            $sth->bindparam(':username', $this->username, PDO::PARAM_STR, 10);
            $sth->bindparam(':password', $this->password, PDO::PARAM_STR, 64);
            $sth->execute();
            if($sth == true){
              return true;
            }
        }catch(PDOException $ex){
          ?>
          <p>Sorry, a database error occurred.<p>
          <p>Error details: <em> <?= $ex->getMessage() ?></em></p>
          <?php
        } 
        return false;
    }
}
?>
