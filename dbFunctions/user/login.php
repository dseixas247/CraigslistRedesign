<?php

function loginUser($db, $email, $pass){

    require_once '../dbFunctions/user/get.php';

    $user = getUser($db, $email);

    if($user == false){
        header("location: ../login.php?error=userDoesntExist");
        exit();
    }

    $passHash=$user['passHash'];
    $checkPass = password_verify($pass, $passHash);

    if($checkPass === false){ 
        header ("location: ../login.php?error=wrongPass");
        exit();

    }else if($checkPass === true){ 
        session_start();
        $_SESSION["email"] = $user['email'];
        $_SESSION["name"] = $user['name'];
        $_SESSION["image"] = $user['image'];
        header ("location: ../index.php");
        exit();
    }

    else{echo($checkPass);}
}

?>