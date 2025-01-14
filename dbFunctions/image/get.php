<?php

function getImage($db, $id){

$stmt = mysqli_stmt_init($db);
$sql = "SELECT * FROM image WHERE posting = ?;";

if(!mysqli_stmt_prepare($stmt, $sql)){
    header ("location: ../index.php?error=stmtfailed");
    exit();
}

mysqli_stmt_bind_param($stmt, "s", $id);
mysqli_stmt_execute($stmt);

$resultData = mysqli_stmt_get_result($stmt);

if($row = mysqli_fetch_assoc($resultData)){
    return $resultData;
}else{
    $result = false;
    return $result;
}

mysqli_stmt_close($stmt);
}

?>