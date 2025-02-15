<?php

function getSimilarPostings($db, $id, $subcategory, $region){

$stmt = mysqli_stmt_init($db);
$sql = "SELECT * FROM posting WHERE subcategory = ? AND region = ? AND id != ? ORDER BY timestamp;";

if(!mysqli_stmt_prepare($stmt, $sql)){
    header ("location: ../index.php?error=stmtfailed");
    exit();
}

mysqli_stmt_bind_param($stmt, "sss", $subcategory, $region, $id);
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