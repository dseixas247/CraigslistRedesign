<?php

if(isset($_GET['id']) && isset($_GET['user'])){

    require_once '../dbFunctions/favorite/create.php';
    require_once '../dbFunctions/favorite/delete.php';
    require_once '../dbFunctions/favorite/get.php';
    require_once '../dbFunctions/dbConnect.php';
    
    $posting = $_GET['id'];
    $user = $_GET['user'];
    
    if($posting == "" || $user == ""){
        header("location: ../index.php?error=empty");
        exit();
    }

    if(getFavorite($db, $posting, $user) == false){
        $id = uniqid('', true);

        while(getFavorite($db, $posting, $user) != false){
            $id = uniqid('', true);
        }

        createFavorite($db, $id, $posting, $user);

        header("location: ../posting.php?id=".$_GET['id']);
        exit();
    }else{
        deleteFavorite($db, $posting, $user);

        header("location: ../posting.php?id=".$_GET['id']);
        exit();
    }

}
else{
    header("location: ../posting.php?id=".$_GET['id']);
    exit();
}