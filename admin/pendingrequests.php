<?php 
//display users to approve
include("../model/ViewUsers.php");
$pendingUsers = new ViewUsers();
$pendingUsers->usersToApprove();
$displayUsers = $pendingUsers->users;
if(count($displayUsers) == 0){
echo 'No pending users';
}
for($i=0; $i<count($displayUsers); $i++){
    echo $displayUsers[$i]->username;
    echo '<form  method="post">';
    echo '<input type="hidden" name="user" value="'.$displayUsers[$i]->username.'"/input>';
    echo '<button type="submit" name="approve" style="cursor: pointer">Approve request</button>';
    echo '</form>'; 
 }
 if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['approve'])){
    $user = new User($_POST['user'], null, null, null, null, null, null, null);
    if($user->updateAdmin()){

        }
    else{
        echo 'A problem occured, please try again later';
    }
 }
 ?>
 