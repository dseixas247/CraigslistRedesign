<?php include_once 'header.php'; ?>

<main class="formContainer">
    <h2>Alterar Palavra-passe</h2>
    <form class="form" action="postHandlers/updateUserPass.php" method="post">

        <input type="hidden" name="email" value="<?=$_SESSION["email"]?>">

        <label id="formLabel" for="pass">Palavra-passe atual</label>
        <input type="password" name="pass">

        <label id="formLabel" for="new">Palavra-passe nova</label>
        <input type="password" name="new">

        <label id="formLabel" for="newrepeat">Confirmar palavra-passe nova</label>
        <input type="password" name="newrepeat">
        
        <button id="button" type="submit" name="submit">Alterar</button>
    </form>

    <?php
        require_once 'components/alert.php';

        if(isset($_GET["error"])){
            if($_GET["error"]=="emptyInput"){
                echo errorAlert("Por favor preenche os campos todos");
            }
            if($_GET["error"]=="wrongPass"){
                echo errorAlert("A palavra-passe está errada");
            }
            if($_GET["error"]=="passRepeatMismatch"){
                echo errorAlert("A palavra-passe não corresponde à repetição");
            }
            if($_GET["error"]=="none"){
                echo successAlert("A palavra-passe foi alterada com successo");
            }
        }
    ?>

</main>

<?php include_once 'footer.php'; ?>