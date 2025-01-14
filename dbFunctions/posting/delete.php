<?php

function deletePosting($db, $id){

$sql = "DELETE FROM posting WHERE id = ?;";
$stmt = mysqli_stmt_init($db);

if(!mysqli_stmt_prepare($stmt, $sql)){
    header ("location: ../deleteImage.php?error=stmtfailed");
    exit();
}

mysqli_stmt_bind_param($stmt, "s", $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

return;

}

?>