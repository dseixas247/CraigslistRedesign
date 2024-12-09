<?php

function registerUser($db, $email, $name, $pass){

$stmt = mysqli_stmt_init($db);
$sql = "INSERT INTO user (email, name, passHash) Values(?,?,?);";

if(!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../register.php?error=stmtfailed");
    exit();
}

$passHash = password_hash($pass, PASSWORD_DEFAULT);

mysqli_stmt_bind_param($stmt, "sss", $email, $name, $passHash);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
header("location: ../register.php?error=none");
exit();
}

?>