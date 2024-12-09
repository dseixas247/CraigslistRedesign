<?php

if(isset($_POST['submit'])){

    require_once '../dbFunctions/user/login.php';
    require_once '../dbFunctions/dbConnect.php';

    $email= $_POST['email'];
    $pass= $_POST['pass'];

    if($email == "" or $pass == ""){
        header("location: ../login.php?error=emptyInput");
        exit();
    }

    loginUser($db, $email, $pass);

}
else{
    header("location: ../login.php");
    exit();
}

?>