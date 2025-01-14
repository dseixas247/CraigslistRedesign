<?php

function updatePosting($db, $postingId, $title, $price, $description, $category, $subcategory, $region, $user, $email, $phone) {

    $sql = "UPDATE posting SET title = ? , price = ?, description = ?, category = ?, subcategory = ?, region = ?, user = ?, email = ?, phone = ? WHERE id = ?;";
    $stmt = mysqli_stmt_init($db);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header ("location: ../myPostings.php?error=stmtfailedUSER");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssssssssss", $title, $price, $description, $category, $subcategory, $region, $user, $email, $phone, $postingId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    session_start();
    $_SESSION["email"] = $email;
    $_SESSION["name"] = $name;
    $_SESSION["image"] = $image;

    header ("location: ../myPostings.php?error=noneEdit");
    exit();

}

?>