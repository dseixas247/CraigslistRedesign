<?php

if(isset($_POST['submit'])){

require_once '../dbFunctions/user/updatePass.php';
require_once '../dbFunctions/user/get.php';
require_once '../dbFunctions/dbConnect.php';

$email = $_POST['email'];
$pass = $_POST['pass'];
$new = $_POST['new'];
$newRepeat = $_POST['newrepeat'];

if($email == "" || $pass == "" || $new == "" || $newRepeat == ""){
    header("location: ../editPass.php?error=emptyInput");
    exit();
}

if($new != $newRepeat){
    header("location: ../editPass.php?error=passRepeatMismatch");
    exit();
}

if(getUser($db, $email) == false){
    header("location: ../editPass.php?error=userDoesntExist");
    exit();
}

updateUserPass($db, $email, $pass, $new);

}
else{
header("location: ../register.php");
exit();
}