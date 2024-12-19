<?php

function createImage($db, $id, $posting, $position, $message){
    $stmt = mysqli_stmt_init($db);
    $sql = "INSERT INTO image (id, posting, position, message) Values(?,?,?,?);";

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../createPosting.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssis", $id, $posting, $position, $message);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return;
}

?>