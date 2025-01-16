<?php
    require_once 'components/buttons.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="pt">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://kit.fontawesome.com/54b79dfd71.js" crossorigin="anonymous"></script>

    <script type="text/javascript">

        function changeOptions(category) {

            const comunidadeOptions = document.getElementsByClassName("comunidadeOptions");
            const imoveisOptions = document.getElementsByClassName("imoveisOptions");
            const empregosOptions = document.getElementsByClassName("empregosOptions");
            const vendasOptions = document.getElementsByClassName("vendasOptions");
            const servicosOptions = document.getElementsByClassName("servicosOptions");

            for (let i = 0; i < comunidadeOptions.length; i++) {
                comunidadeOptions[i].disabled = true;
                comunidadeOptions[i].hidden = true;
            }

            for (let i = 0; i < imoveisOptions.length; i++) {
                imoveisOptions[i].disabled = true;
                imoveisOptions[i].hidden = true;
            }

            for (let i = 0; i < empregosOptions.length; i++) {
                empregosOptions[i].disabled = true;
                empregosOptions[i].hidden = true;
            }

            for (let i = 0; i < vendasOptions.length; i++) {
                vendasOptions[i].disabled = true;
                vendasOptions[i].hidden = true;
            }

            for (let i = 0; i < servicosOptions.length; i++) {
                servicosOptions[i].disabled = true;
                servicosOptions[i].hidden = true;
            }

            document.getElementById("subcategory").disabled = false;

            if(category == "Comunidade") {
                for (let i = 0; i < comunidadeOptions.length; i++) {
                    comunidadeOptions[i].disabled = false;
                    comunidadeOptions[i].hidden = false;
                    document.getElementById("subcategory").value = "";
                }
            }

            else if(category == "Imóveis") {
                for (let i = 0; i < imoveisOptions.length; i++) {
                    imoveisOptions[i].disabled = false;
                    imoveisOptions[i].hidden = false;
                    document.getElementById("subcategory").value = "";
                }
            }

            else if(category == "Empregos") {
                for (let i = 0; i < empregosOptions.length; i++) {
                    empregosOptions[i].disabled = false;
                    empregosOptions[i].hidden = false;
                    document.getElementById("subcategory").value = "";
                }
            }

            else if(category == "Vendas") {
                for (let i = 0; i < vendasOptions.length; i++) {
                    vendasOptions[i].disabled = false;
                    vendasOptions[i].hidden = false;
                    document.getElementById("subcategory").value = "";
                }
            }

            else if(category == "Serviços") {
                for (let i = 0; i < servicosOptions.length; i++) {
                    servicosOptions[i].disabled = false;
                    servicosOptions[i].hidden = false;
                    document.getElementById("subcategory").value = "";
                }
            }

            else {
                document.getElementById("subcategory").disabled = true;
                document.getElementById("subcategory").value = "";
            }

        }

    </script>
    
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/main.css">
    
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/viewPosting.css">
    <link rel="stylesheet" href="css/editPosting.css">
    <link rel="stylesheet" href="css/deletePosting.css">
    <link rel="stylesheet" href="css/search.css">

    <link rel="stylesheet" href="css/buttons.css">
    <link rel="stylesheet" href="css/searchbar.css">
    <link rel="stylesheet" href="css/category.css">
    <link rel="stylesheet" href="css/posting.css">
    <link rel="stylesheet" href="css/alert.css">

    <title>Craigslist</title>

</head>

<body>

    <header>

        <nav id="navbar">

            <ul>
                
                <li id="left">
                    <img id="logoImage" src="craigslistImages\craigslist_logo.png" alt="Craigslist Logo">
                    <a id="logo" href="index.php">Craigslist</a>
                </li>

                <?php
                    if(isset($_SESSION["email"])){
                        echo("<li>"); 
                        echo regularButton("createPosting.php","Criar Anúncio"); 
                        echo("</li>");
                        echo("<li>"); 
                        echo favoritesButton("favorites.php"); 
                        echo("</li>");
                        echo("<li>"); 
                        echo chatButton("chat.php"); 
                        echo("</li>");
                        echo("<li>"); 
                        echo userButton("profile.php"); 
                        echo("</li>");
                    }else{
                        echo("<li>"); 
                        echo userButton("login.php"); 
                        echo("</li>");
                    }
                ?>
        
                <li><?php echo regularButton("","PT")?></li>  
                <li><?php echo regularButton("","Portugal")?></li>

            </ul>   
            
        </nav>
        
    </header>