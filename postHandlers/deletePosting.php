<?php

if(isset($_POST['submit'])){

    require_once '../dbFunctions/posting/delete.php';
    require_once '../dbFunctions/image/get.php';
    require_once '../dbFunctions/image/delete.php';
    require_once '../dbFunctions/dbConnect.php';

    deletePosting($db, $_POST['id']);

    $images = getImage($db, $_POST["id"]);

    foreach($images as $image) {
        unlink('../serverImages/'.$image['id']);
        deleteImage($db, $image['id']);
    } 

    header("location: ../myPostings.php?error=noneDelete");
    exit();

}else{
    header("location: ../index.php");
    exit();
}