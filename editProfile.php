<?php include_once 'header.php'; ?>

<main class="formContainer">
    <h2>Editar Perfil</h2>
    <form class="form" action="postHandlers/updateUser.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="oldemail" value="<?=$_SESSION["email"]?>">
        <input type="hidden" name="oldimage" value="<?=$_SESSION["image"]?>">

        <label id="formLabel" for="image">Imagem de Perfil</label>
        <div class="imageInput">
            <?php
            if($_SESSION["image"] != "") {
                echo("<img id='userImage' src='serverImages/".$_SESSION["image"]."' alt='Profile Picture ".$_SESSION["name"]."'>");
            }
            else {
                echo("<img id='userImage' src='craigslistImages/userDefault.jpg' alt='Profile Picture ".$_SESSION["name"]."'>");
            }
            ?>
            <input type="file" name="image">
        </div>

        <label id="formLabel" for="name">Nome</label>
        <input type="text" name="name" value="<?=$_SESSION["name"]?>">

        <label id="formLabel" for="email">Email</label>
        <input type="email" name="email" value="<?=$_SESSION["email"]?>">
        
        <button id="button" type="submit" name="submit">Atualizar</button>
    </form>

    <?php
        require_once 'components/alert.php';

        if(isset($_GET["error"])){
            if($_GET["error"]=="emptyInput"){
                echo errorAlert("Por favor preencha os campos necessários");
            }
            if($_GET["error"]=="emailAlreadyUsed"){
                echo errorAlert("O email já se encontra registado com outra conta");
            }
            if($_GET["error"]=="fileTypeUnsupported"){
                echo errorAlert("Formato de imagem não suportado (formatos válidos: .jpg .jpeg .png .pdf)");
            }
            if($_GET["error"]=="uploadError"){
                echo errorAlert("Aconteceu um erro no upload da imagem");
            }
            if($_GET["error"]=="fileTooBig"){
                echo errorAlert("Imagem é demasiada grande (Tem de ter 5MB ou menos)");
            }
            if($_GET["error"]=="none"){
                echo successAlert("Perfil atualizado com successo");
            }
        }
    ?>
</main>

<?php include_once 'footer.php'; ?>