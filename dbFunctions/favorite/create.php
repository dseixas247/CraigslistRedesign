<?php

function createFavorite($db, $id, $posting, $user){
    $stmt = mysqli_stmt_init($db);
    $sql = "INSERT INTO favorite (id, posting, user) Values(?,?,?);";

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../createPosting.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sss", $id, $posting, $user);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return;
}

?>