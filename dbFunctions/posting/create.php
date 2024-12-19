<?php

function createPosting($db, $id, $title, $price, $description, $category, $subcategory, $region, $user, $email, $phone){
    $stmt = mysqli_stmt_init($db);
    $sql = "INSERT INTO posting (id, title, price, description, category, subcategory, region, user, email, phone, timestamp) Values(?,?,?,?,?,?,?,?,?,?,now());";

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../createPosting.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssisssssss", $id, $title, $price, $description, $category, $subcategory, $region, $user, $email, $phone);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return;
}

?>