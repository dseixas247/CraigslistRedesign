<?php

if(isset($_POST['submit'])){

    require_once '../dbFunctions/user/register.php';
    require_once '../dbFunctions/user/get.php';
    require_once '../dbFunctions/dbConnect.php';

    $email = $_POST['email'];
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $passRepeat = $_POST['passRepeat'];

    if($email == "" || $name == "" || $pass == "" || $passRepeat == ""){
        header("location: ../register.php?error=emptyInput");
        exit();
    }

    if($pass != $passRepeat){
        header("location: ../register.php?error=passRepeatMismatch");
        exit();
    }

    if(getUser($db, $email) != false){
        header("location: ../register.php?error=userAlreadyExists");
        exit();
    }

    registerUser($db, $email, $name, $pass);

}
else{
    header("location: ../register.php");
    exit();
}