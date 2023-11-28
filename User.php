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
    }
    public function signIn(){
        try{
            $sth=$db->prepare("SELECT uid FROM users WHERE username = :username");
            $sth->bindparam(':username', $this->username, PDO::PARAM_STR, 10);
            $sth->execute();
            $row=$sth->fetch(PDO::FETCH_ASSOC);

            if(!empty($row))
            {
              if(password_verify(($this->password), $row['password']))
              {
                if(is_array($username))
                {
                  $username = $username[0];
                }
                  $_SESSION["user"] = $username;
                  $_SESSION["uid"] = $row['uid'];
                  header('Location: home.php');
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
    public function signUp(){
      include 'connect.php';
        try{
          $sth=$db->prepare("INSERT INTO users(username, password, email, admin) VALUES (:username, :password, :email, :admin)");
          $sth->bindparam(':username', $this->username, PDO::PARAM_STR, 64);
          $sth->bindparam(':password', $this->password, PDO::PARAM_STR, 64);
          $sth->bindparam(':email', $this->email, PDO::PARAM_STR, 64);
          $sth->bindparam(':admin', $this->admin, PDO::PARAM_STR, 64);
          $sth->execute();
          ?><script type='text/javascript'>alert("You have successfully signed up");</script><?php
          session_start();
          $_SESSION["user"] = $username;
          $sth=$db->prepare("SELECT uid FROM users WHERE username = :username");
          $sth->bindparam(':username', $username, PDO::PARAM_STR, 10);
          $sth->execute();
          $row=$sth->fetch(PDO::FETCH_ASSOC);
          $_SESSION["uid"] = $row['uid'];
        }catch(PDOException $ex){
          ?>
          <p>Sorry, a database error occurred.<p>
          <p>Error details: <em> <?= $ex->getMessage() ?></em></p>
          <?php
        }           
    }
    public function changePassword(){
        include 'connect.php';
          try{
            $sth=$db->prepare("UPDATE user SET password = :password WHERE username = :username AND email = :email");
            $sth->bindparam(':username', $this->username, PDO::PARAM_STR, 10);
            $sth->bindparam(':password', $this->password, PDO::PARAM_STR, 64);
            $sth->bindparam(':email', $this->email, PDO::PARAM_STR, 64);
            $sth->execute();
            if($sth == true){
              //password updated
            }
        }catch(PDOException $ex){
          ?>
          <p>Sorry, a database error occurred.<p>
          <p>Error details: <em> <?= $ex->getMessage() ?></em></p>
          <?php
        } 
    }
    public function updateEmail(){
      include 'connect.php';
      try{
        $sth=$db->prepare("UPDATE user SET email = :email WHERE userName = :username");
        $sth->bindparam(':username', $this->username, PDO::PARAM_STR, 10);
        $sth->bindparam(':email', $this->email, PDO::PARAM_STR, 64);
        $sth->execute();
        if($sth == true){
          //email updated
          }
        }catch(PDOException $ex){
        ?>
        <p>Sorry, a database error occurred.<p>
        <p>Error details: <em> <?= $ex->getMessage() ?></em></p>
        <?php
        }
    }
    public function updatePhone(){
      include 'connect.php';
      try{
        $sth=$db->prepare("UPDATE user SET PhoneNumber = :phone WHERE userName = :username");
        $sth->bindparam(':username', $this->username, PDO::PARAM_STR, 10);
        $sth->bindparam(':phone', $this->phone, PDO::PARAM_STR, 10);
        $sth->execute();
        if($sth == true){
          //phone updated
        }
      }catch(PDOException $ex){
      ?>
      <p>Sorry, a database error occurred.<p>
      <p>Error details: <em> <?= $ex->getMessage() ?></em></p>
      <?php
      }
    }
    public function updateFirstname(){
      include 'connect.php';
      try{
        $sth=$db->prepare("UPDATE user SET FirstName = :name WHERE userName = :username");
        $sth->bindparam(':username', $this->username, PDO::PARAM_STR, 10);
        $sth->bindparam(':name', $this->firstname, PDO::PARAM_STR, 10);
        $sth->execute();
        if($sth == true){
          //firstname updated
        }
      }catch(PDOException $ex){
      ?>
      <p>Sorry, a database error occurred.<p>
      <p>Error details: <em> <?= $ex->getMessage() ?></em></p>
      <?php
      }
    }
    public function updateSurname(){
      include 'connect.php';
      try{
        $sth=$db->prepare("UPDATE user SET SurName = :name WHERE userName = :username");
        $sth->bindparam(':username', $this->username, PDO::PARAM_STR, 10);
        $sth->bindparam(':name', $this->surname, PDO::PARAM_STR, 10);
        $sth->execute();
        if($sth == true){
          //surname updated
        }
      }catch(PDOException $ex){
      ?>
      <p>Sorry, a database error occurred.<p>
      <p>Error details: <em> <?= $ex->getMessage() ?></em></p>
      <?php
      }
    }
    public function updateAddress(){
      include 'connect.php';
      try{
        $sth=$db->prepare("UPDATE user SET Address = :address WHERE userName = :username");
        $sth->bindparam(':username', $this->username, PDO::PARAM_STR, 10);
        $sth->bindparam(':address', $this->address, PDO::PARAM_STR, 10);
        $sth->execute();
        if($sth == true){
          //address updated
        }
      }catch(PDOException $ex){
      ?>
      <p>Sorry, a database error occurred.<p>
      <p>Error details: <em> <?= $ex->getMessage() ?></em></p>
      <?php
      }
    }
    public function forgottenUsername(){
      include 'connect.php';
      try{
        $sth=$db->prepare("SELECT UserName WHERE Email = :email");
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
}
?>
