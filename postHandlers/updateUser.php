<?php

if(isset($_POST['submit'])){

    require_once '../dbFunctions/user/update.php';
    require_once '../dbFunctions/user/get.php'
    require_once '../dbFunctions/dbConnect.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $oldEmail = $_POST['oldemail'];
    $image = $_FILES['image'];
    $oldImage = $_POST['oldimage'];

    $imageName = $_FILES['image']['name'];
    $imageTmpName = $_FILES['image']['tmp_name'];
    $imageSize = $_FILES['image']['size'];
    $imageError = $_FILES['image']['error'];

    $imageExt = explode('.', $imageName);
    $imageActualExt = strtolower(end($imageExt));
    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    if($name == "" || $email == "") {
        header("location: ../editProfile.php?error=emptyInput");
        exit();
    }

    if(getUser($db, $email) != false && $email != $oldEmail){
        header("location: ../register.php?error=emailAlreadyUsed");
        exit();
    }

    if($imageName == "") {
        updateUser($db, $oldEmail, $email, $name, $oldImage);
    }
    else {
        if(!in_array($imageActualExt, $allowed)){
            header("location: ../editProfile.php?error=fileTypeUnsupported");
            exit();
        }

        if($imageError !== 0){
            header("location: ../editProfile.php?error=uploadError");
            exit();
        }

        if($imageSize > 5000000){
            header("location: ../editProfile.php?error=fileTooBig");
            exit();
        }

        $newImage = uniqid('', true).".".$imageActualExt;
        $destination = '../serverImages/'.$newImage;

        unlink('../serverImages/'.$oldImage);
        move_uploaded_file($imageTmpName, $destination);

        updateUser($db, $oldEmail, $email, $name, $newImage);
    }

}else{
header("location: ../editProfile.php");
exit();
}