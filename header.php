<?php
    require_once 'components/buttons.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="pt">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/buttons.css">
    <link rel="stylesheet" href="css/searchbar.css">

    <title>Craigslist</title>

</head>

<body>

    <div id="navbar">

        <ul>
            
            <li id="left">
                <img id="logoImage" src="craigslistImages\craigslist_logo.png" alt="Craigslist Logo">
                <a id="logo" href="index.php">Craigslist</a>
            </li>

            <?php
                if(isset($_SESSION["type"])){
                    if($_SESSION["type"] == "Admin"){
                        echo("<li>"); 
                        echo regularButton("backend.php","Gerir"); 
                        echo("</li>");
                        echo("<li>"); 
                        echo regularButton("postHandlers/logoutUser.php","Logout"); 
                        echo("</li>");
                    }
                    else if($_SESSION["type"] == "Client"){
                        echo("<li>"); 
                        echo regularButton("createPosting.php","Criar Anúncio"); 
                        echo("</li>");
                        echo("<li>"); 
                        echo regularButton("favorites.php","Favoritos"); 
                        echo("</li>");
                        echo("<li>"); 
                        echo regularButton("chat.php","Chat"); 
                        echo("</li>");
                        echo("<li>"); 
                        echo regularButton("profile.php","Minha Conta"); 
                        echo("</li>");
                    }
                }else{
                    echo("<li>"); 
                    echo regularButton("login.php","Login"); 
                    echo("</li>");
                }
            ?>
    
            <li><?php echo regularButton("","PT")?></li>  
            <li><?php echo regularButton("","Portugal")?></li>
        </ul>   

    </div>