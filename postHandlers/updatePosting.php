<?php

if(isset($_POST['submit'])){
    
    require_once '../dbFunctions/posting/update.php';
    require_once '../dbFunctions/image/create.php';
    require_once '../dbFunctions/image/get.php';
    require_once '../dbFunctions/dbConnect.php';
    
    $postingId = $_POST['postingId'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $region = $_POST['region'];
    $user = $_POST['user'];
    $category = $_POST['category'];
    $subcategory = $_POST['subcategory'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Image 1 Data
    $image1 = $_FILES['image1'];
    $image1Name = $_FILES['image1']['name'];
    $image1TmpName = $_FILES['image1']['tmp_name'];
    $image1Size = $_FILES['image1']['size'];
    $image1Error = $_FILES['image1']['error'];

    $image1Ext = explode('.', $image1Name);
    $image1ActualExt = strtolower(end($image1Ext));

    // Image 2 Data
    $image2 = $_FILES['image2'];
    $image2Name = $_FILES['image2']['name'];
    $image2TmpName = $_FILES['image2']['tmp_name'];
    $image2Size = $_FILES['image2']['size'];
    $image2Error = $_FILES['image2']['error'];

    $image2Ext = explode('.', $image2Name);
    $image2ActualExt = strtolower(end($image2Ext));

    // Image 3 Data
    $image3 = $_FILES['image3'];
    $image3Name = $_FILES['image3']['name'];
    $image3TmpName = $_FILES['image3']['tmp_name'];
    $image3Size = $_FILES['image3']['size'];
    $image3Error = $_FILES['image3']['error'];

    $image3Ext = explode('.', $image3Name);
    $image3ActualExt = strtolower(end($image3Ext));

    // Image 4 Data
    $image4 = $_FILES['image4'];
    $image4Name = $_FILES['image4']['name'];
    $image4TmpName = $_FILES['image4']['tmp_name'];
    $image4Size = $_FILES['image4']['size'];
    $image4Error = $_FILES['image4']['error'];

    $image4Ext = explode('.', $image4Name);
    $image4ActualExt = strtolower(end($image4Ext));

    // Image 5 Data
    $image5 = $_FILES['image5'];
    $image5Name = $_FILES['image5']['name'];
    $image5TmpName = $_FILES['image5']['tmp_name'];
    $image5Size = $_FILES['image5']['size'];
    $image5Error = $_FILES['image5']['error'];

    $image5Ext = explode('.', $image5Name);
    $image5ActualExt = strtolower(end($image5Ext));
    
    $imagesName = [$image1Name, $image2Name, $image3Name, $image4Name, $image5Name];
    $imagesTmpName = [$image1TmpName, $image2TmpName, $image3TmpName, $image4TmpName, $image5TmpName];
    $imagesExt = [$image1ActualExt, $image2ActualExt, $image3ActualExt, $image4ActualExt, $image5ActualExt];
    $imagesError = [$image1Error, $image2Error, $image3Error, $image4Error, $image5Error]; 
    $imagesSize = [$image1Size, $image2Size, $image3Size, $image4Size, $image5Size];
    $allowed = array('jpg', 'jpeg', 'png', 'pdf');
    
    if($title == "" || $price == "" || $description == "" || $region == "" || $category == "" || $subcategory == ""){
        header("location: ../editPosting.php?error=emptyInput");
        exit();
    }

    for($x = 0; $x <= 4; $x++){
        if(!in_array($imagesExt[$x], $allowed) && $imagesName[$x] != ""){
            header("location: ../editPosting.php?error=fileTypeUnsupported&image=".$x+1);
            exit();
        }
    
        if($imagesError[$x] !== 0 && $imagesName[$x] != ""){
            header("location: ../editPosting.php?error=uploadError&image=".$x+1);
            exit();
        }

        if($imagesSize[$x] > 5000000){
            header("location: ../editPosting.php?error=fileTooBig&image=".$x+1);
            exit();
        }
    }

    // Image 1 Upload
    if($image1Name != ""){
        if($_POST['image1Id']){
            $image1Id = $_POST['image1Id'];
            $destination1 = '../serverImages/'.$image1Id;

            if(file_exists($destination1)){
                unlink($destination1);
            }

            move_uploaded_file($image1TmpName, $destination1);

        }else{
            $image1Id = uniqid('', true).".".$image1ActualExt;
            while(getImage($db, $image1Id) != false){
                $image1Id = uniqid('', true).".".$image1ActualExt;
            }
            $destination1 = '../serverImages/'.$image1Id;

            move_uploaded_file($image1TmpName, $destination1);

            createImage($db, $image1Id, $postingId, 1, "");
        }
    }

    // Image 2 Upload
    if($image2Name != ""){
        if($_POST['image2Id']){
            $image2Id = $_POST['image2Id'];
            $destination2 = '../serverImages/'.$image2Id;

            if(file_exists($destination2)){
                unlink($destination2);
            }

            move_uploaded_file($image2TmpName, $destination2);

        }else{
            $image2Id = uniqid('', true).".".$image2ActualExt;
            while(getImage($db, $image2Id) != false){
                $image2Id = uniqid('', true).".".$image2ActualExt;
            }
            $destination2 = '../serverImages/'.$image2Id;

            move_uploaded_file($image2TmpName, $destination2);

            createImage($db, $image2Id, $postingId, 2, "");
        }
    }

    // Image 3 Upload
    if($image3Name != ""){
        if($_POST['image3Id']){
            $image3Id = $_POST['image3Id'];
            $destination3 = '../serverImages/'.$image3Id;

            if(file_exists($destination3)){
                unlink($destination3);
            }

            move_uploaded_file($image3TmpName, $destination3);

        }else{
            $image3Id = uniqid('', true).".".$image3ActualExt;
            while(getImage($db, $image3Id) != false){
                $image3Id = uniqid('', true).".".$image3ActualExt;
            }
            $destination3 = '../serverImages/'.$image3Id;

            move_uploaded_file($image3TmpName, $destination3);

            createImage($db, $image3Id, $postingId, 3, "");
        }
    }

    // Image 4 Upload
    if($image4Name != ""){
        if($_POST['image4Id']){
            $image4Id = $_POST['image4Id'];
            $destination4 = '../serverImages/'.$image4Id;

            if(file_exists($destination4)){
                unlink($destination4);
            }

            move_uploaded_file($image4TmpName, $destination4);

        }else{
            $image4Id = uniqid('', true).".".$image4ActualExt;
            while(getImage($db, $image4Id) != false){
                $image4Id = uniqid('', true).".".$image4ActualExt;
            }
            $destination4 = '../serverImages/'.$image4Id;

            move_uploaded_file($image4TmpName, $destination4);

            createImage($db, $image4Id, $postingId, 4, "");
        }
    }

    // Image 5 Upload
    if($image5Name != ""){
        if($_POST['image5Id']){
            $image5Id = $_POST['image5Id'];
            $destination5 = '../serverImages/'.$image5Id;

            if(file_exists($destination5)){
                unlink($destination5);
            }

            move_uploaded_file($image5TmpName, $destination5);

        }else{
            $image5Id = uniqid('', true).".".$image5ActualExt;
            while(getImage($db, $image5Id) != false){
                $image5Id = uniqid('', true).".".$image5ActualExt;
            }
            $destination5 = '../serverImages/'.$image5Id;

            move_uploaded_file($image5TmpName, $destination5);

            createImage($db, $image5Id, $postingId, 5, "");
        }
    }

    updatePosting($db, $postingId, $title, $price, $description, $category, $subcategory, $region, $user, $email, $phone);

    header("location: ../myPostings.php?error=noneEdit");
    exit();

}