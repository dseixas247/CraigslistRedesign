<?php include_once 'header.php'; ?>

<main class="profileContainer">
    <?php
        if(isset($_SESSION["email"])){

            require_once 'components/buttons.php';

            $name = $_SESSION["name"];
            $image = $_SESSION["image"];

            if($image != "") {
                echo("<div class='userInfo'><img id='userImage' src='serverImages/".$image."' alt='Profile Picture ".$name."'>");
            }
            else {
                echo("<div class='userInfo'><img id='userImage' src='craigslistImages/userDefault.jpg' alt='Profile Picture ".$name."'>");
            }
            echo("<h2>Olá ".$name."</h2></div>");

            echo("<div class='userActions'>");
            echo regularButton("", "Meus Anúncios");
            echo regularButton("", "Editar Perfil");
            echo regularButton("", "Alterar Palavra-passe");
            echo regularButton("postHandlers/logoutUser.php", "Fazer Logout");
            echo("</div>");
        }
        else{
            header ("location: ./index.php");
        }
    ?>
</main>

<?php include_once 'footer.php'; ?>