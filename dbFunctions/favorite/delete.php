<?php

function deleteFavorite($db, $posting, $user){

$sql = "DELETE FROM favorite WHERE posting = ? AND user = ?;";
$stmt = mysqli_stmt_init($db);

if(!mysqli_stmt_prepare($stmt, $sql)){
    header ("location: ../index.php?error=stmtfailed");
    exit();
}

mysqli_stmt_bind_param($stmt, "ss", $posting, $user);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

return;

}

?>