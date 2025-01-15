<?php

if(isset($_POST['submit'])){

    $search = $_POST['search'];
    $region = $_POST['region'];
    $category = $_POST['category'];
    $subcategory = $_POST['subcategory'];
    $priceMin = $_POST['priceMin'];
    $priceMax = $_POST['priceMax'];

    if($priceMin > $priceMax){
        header("location: ../search.php?search=".$search."&region=".$region."&category=".$category."&subcategory=".$subcategory."&priceMin=&priceMax=");
        exit();
    }
    else{
        header("location: ../search.php?search=".$search."&region=".$region."&category=".$category."&subcategory=".$subcategory."&priceMin=".$priceMin."&priceMax=".$priceMax);
        exit();
    }

}
else{
    header("location: ../register.php");
    exit();
}