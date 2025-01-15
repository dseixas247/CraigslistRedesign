<?php

function getPostingsFiltered($db, $title, $region, $category, $subcategory, $priceMin, $priceMax){

$title = "%".$title."%";

$priceMin = $priceMin == "" ? "0" : $priceMin; 
$priceMax = $priceMax == "" ? "1000000000" : $priceMax; 

$stmt = mysqli_stmt_init($db);

if($category == "" && $subcategory == "" && $region == "Todo Portugal"){
    $sql = "SELECT * FROM posting WHERE title LIKE ? AND price >= ? AND price <= ? ORDER BY timestamp;";

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header ("location: ../index.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "sss", $title, $priceMin, $priceMax);
    mysqli_stmt_execute($stmt);
}

if($category == "" && $subcategory == "" && $region != "Todo Portugal"){
    $sql = "SELECT * FROM posting WHERE title LIKE ? AND region = ? AND price >= ? AND price <= ? ORDER BY timestamp;";

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header ("location: ../index.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "ssss", $title, $region, $priceMin, $priceMax);
    mysqli_stmt_execute($stmt);
}

if($category != "" && $subcategory == "" && $region == "Todo Portugal"){
    $sql = "SELECT * FROM posting WHERE title LIKE ? AND category = ? AND price >= ? AND price <= ? ORDER BY timestamp;";

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header ("location: ../index.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "ssss", $title, $category, $priceMin, $priceMax);
    mysqli_stmt_execute($stmt);
}

if($category != "" && $subcategory == "" && $region != "Todo Portugal"){
    $sql = "SELECT * FROM posting WHERE title LIKE ? AND region = ? AND category = ? AND price >= ? AND price <= ? ORDER BY timestamp;";

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header ("location: ../index.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "sssss", $title, $region, $category, $priceMin, $priceMax);
    mysqli_stmt_execute($stmt);
}

if($category != "" && $subcategory != "" && $region == "Todo Portugal"){
    $sql = "SELECT * FROM posting WHERE title LIKE ? AND category = ? AND subcategory = ? AND price >= ? AND price <= ? ORDER BY timestamp;";

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header ("location: ../index.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "sssss", $title, $category, $subcategory, $priceMin, $priceMax);
    mysqli_stmt_execute($stmt);
}

if($category != "" && $subcategory != "" && $region != "Todo Portugal"){
    $sql = "SELECT * FROM posting WHERE title LIKE ? AND region = ? AND category = ? AND subcategory = ? AND price >= ? AND price <= ? ORDER BY timestamp;";
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header ("location: ../index.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "ssssss", $title, $region, $category, $subcategory, $priceMin, $priceMax);
    mysqli_stmt_execute($stmt);
}

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