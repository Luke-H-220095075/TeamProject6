<?php
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
  public $cbEmail;
  public $cbText;

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
    $this->cbEmail = null;
    $this->cbText = null;
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
          if(is_array($this->username))
          {
            $username = $username[0];
          }
          
            $this->setSession();
            if ($_SESSION["access"] == "admin"){
              header('Location: admin/dashboard.php');
          } else{
            header('Location: customerprofile.php');
          }
          }
          else
          {
            echo "<p>Incorrect password</p>";
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
      $sth=$db->prepare("SELECT userId FROM users WHERE username = :username");
      $sth->bindparam(':username', $this->username, PDO::PARAM_STR, 10);
      $sth->execute();
      $row=$sth->fetch(PDO::FETCH_ASSOC);

      if(!empty($row))
      {
        echo 'That username has already been taken. Please enter another username.';
      }
      else{
    try{
      $sth=$db->prepare("INSERT INTO users(username, forename, surname, password, email, admin, secretAnswer) VALUES (:username, :firstname, :surname, :password, :email, :admin, :token)");
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
} catch(PDOException $ex){
  ?>
  <p>Sorry, a database error occurred.<p>
  <p>Error details: <em> <?= $ex->getMessage() ?></em></p>
  <?php
}         
  }
  public function updateDetails($cbe, $cbt){
    include 'view/connect.php';
    $this->cbEmail = $cbe;
    $this->cbText = $cbt;
        try{
          $sth=$db->prepare("UPDATE users SET email = :email, phone = :phone, firstname = :name, surname = :surname, address = :address, contactByEmail = :cbe, contactByText = :cbt WHERE username = :username");
          $sth->bindparam(':username', $this->username, PDO::PARAM_STR, 10);
          $sth->bindparam(':email', $this->email, PDO::PARAM_STR, 64);
          $sth->bindparam(':phone', $this->phone, PDO::PARAM_STR, 10);
          $sth->bindparam(':name', $this->firstname, PDO::PARAM_STR, 10);
          $sth->bindparam(':surname', $this->surname, PDO::PARAM_STR, 10);
          $sth->bindparam(':address', $this->address, PDO::PARAM_STR, 10);
          $sth->bindparam(':cbe', $this->cbEmail, PDO::PARAM_STR, 10);
          $sth->bindparam(':cbt', $this->cbText, PDO::PARAM_STR, 10);
          $sth->execute();
          if($sth == true){
            header('Location: Customerprofile.php');
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
    require 'view/connect.php';
    try{
      $_SESSION["user"] = $this->username;
      $sth=$db->prepare("SELECT admin, userId FROM users WHERE username = :username");
      $sth->bindparam(':username', $this->username, PDO::PARAM_STR, 10);
      $sth->execute();
      $row=$sth->fetch(PDO::FETCH_ASSOC);
      $_SESSION["access"] = $row['admin'];
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
    include 'view/connect.php';
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
      $this->cbEmail = $row['contactByEmail'];
      $this->cbText = $row['contactByText'];
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
    public function verifySecretAnswer($token){
      include("connect.php");
      echo 'verifying';
      $sth=$db->prepare("SELECT secretAnswer FROM users WHERE username = :username");
      $sth->bindparam(':username', $this->username, PDO::PARAM_STR, 10);
      $sth->execute();
      $row=$sth->fetch(PDO::FETCH_ASSOC);
      $row = implode("", $row);
      if($row != null && password_verify($token, $row))
      {
        $this->updatePassword();
        }
        else{
          echo 'Incorrect secret answer';
        }
      
    }
    public function updatePassword(){
      include 'connect.php';

          try{
            $sth=$db->prepare("UPDATE users SET password = :password WHERE username = :username");
            $sth->bindparam(':username', $this->username, PDO::PARAM_STR, 10);
            $sth->bindparam(':password', $this->password, PDO::PARAM_STR, 64);
            $sth->execute();
            if($sth == true){
              header('Location: loginview.php');
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
    public function updateAdmin(){
      include 'view/connect.php';
          try{
            $sth=$db->prepare("UPDATE users SET admin = 'admin', pendingApproval = 0 WHERE username = :username");
            $sth->bindparam(':username', $this->username, PDO::PARAM_STR, 10);
            $sth->execute();
            if($sth == true){
              header('Location: pendingrequests.php');
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
      public function disapproveAdmin(){
        include 'view/connect.php';
            try{
              $sth=$db->prepare("UPDATE users SET pendingApproval = 0 WHERE username = :username");
              $sth->bindparam(':username', $this->username, PDO::PARAM_STR, 10);
              $sth->execute();
              if($sth == true){
                header('Location: pendingrequests.php');
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
      public function requestAdmin(){
        include 'view/connect.php';
          try{
            $sth=$db->prepare("UPDATE users SET pendingApproval = 1 WHERE username = :username");
            $sth->bindparam(':username', $this->username, PDO::PARAM_STR, 10);
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
