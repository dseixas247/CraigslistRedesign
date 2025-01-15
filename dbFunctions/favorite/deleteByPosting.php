<?php

function deleteFavoritesByPosting($db, $posting){

$sql = "DELETE FROM favorite WHERE posting = ?;";
$stmt = mysqli_stmt_init($db);

if(!mysqli_stmt_prepare($stmt, $sql)){
    header ("location: ../index.php?error=stmtfailed");
    exit();
}

mysqli_stmt_bind_param($stmt, "s", $posting);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

return;

}

?>