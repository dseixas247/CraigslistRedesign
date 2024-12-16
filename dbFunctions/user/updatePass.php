<?php

function updateUserPass($db, $email, $pass, $new){

    require_once '../dbFunctions/user/get.php';

    $user = getUser($db, $email);

    if($user == false){
        header("location: ../editPass.php?error=userDoesntExist");
        exit();
    }

    $passHash=$user['passHash'];
    $checkPass = password_verify($pass, $passHash);

    if($checkPass === false){ 
        header ("location: ../editPass.php?error=wrongPass");
        exit();

    }else if($checkPass === true){ 
        $sql = "UPDATE user SET passHash = ? WHERE email = ?;";
        $stmt = mysqli_stmt_init($db);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header ("location: ../editPass.php?error=stmtfailedUSER");
            exit();
        }

        $newHash = password_hash($new, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "ss", $newHash, $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header ("location: ../editPass.php?error=none");
        exit();
    }

    else{echo($checkPass);}
}

?>