<?php

function updateUser($db, $oldEmail, $email, $name, $image) {

    $sql = "UPDATE user SET email = ? , name = ?, image = ? WHERE email = ?;";
    $stmt = mysqli_stmt_init($db);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header ("location: ../editProfile.php?error=stmtfailedUSER");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssss", $email, $name, $image, $oldEmail);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    session_start();
    $_SESSION["email"] = $email;
    $_SESSION["name"] = $name;
    $_SESSION["image"] = $image;

    header ("location: ../editProfile.php?error=none");
    exit();

}

?>