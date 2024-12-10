<?php include_once 'header.php'; ?>

<main class="formContainer">

    <div class="externalLogin">
        <?php
            require_once 'components/buttons.php';
            echo regularButton("", "Entrar com Facebook");
            echo regularButton("", "Entrar com Apple");
            echo regularButton("", "Entrar com Google");
        ?> 
    </div>

    <div class="seperator"><span>ou</span></div>

    <form class="loginForm" action="postHandlers/registerUser.php" method="post">
        <div class="changeButtons">
            <div class="changeLeftRegister">
                <?php
                    require_once 'components/buttons.php';
                    echo regularButton("login.php", "Entrar");
                ?>
            </div>
            <div class="changeRightRegister">
                <?php
                    require_once 'components/buttons.php';
                    echo regularButton("", "Criar Conta");
                ?>
            </div>
        </div>

        <label id="formLabel" for="name">Nome</label>
        <input type="text" name="name">

        <label id="formLabel" for="email">Email</label>
        <input type="email" name="email">
        
        <label id="formLabel" for="pass">Palavra-passe</label>
        <input type="password" name="pass">

        <label id="formLabel" for="passConfirm">Confirmar Palavra-passe</label>
        <input type="password" name="passRepeat">
        
        <button id="button" type="submit" name="submit">Criar</button>
    </form>

    <?php
        require_once 'components/alert.php';

        if(isset($_GET["error"])){
            if($_GET["error"]=="emptyInput"){
                echo errorAlert("Por favor preenche os campos todos");
            }
            if($_GET["error"]=="userAlreadyExists"){
                echo errorAlert("O email já se encontra registado");
            }
            if($_GET["error"]=="passRepeatMismatch"){
                echo errorAlert("A palavra-passe não corresponde à repetição");
            }
            if($_GET["error"]=="none"){
                echo successAlert("Utilizador registado com sucesso!");
            }
        }
    ?>

</main>

<?php include_once 'footer.php'; ?>