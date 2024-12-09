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
    <form class="loginForm" action="postHandlers/loginUser.php" method="post">
        <div class="changeButtons">
            <div class="changeLeftLogin">
                <?php
                    require_once 'components/buttons.php';
                    echo regularButton("", "Entrar");
                ?>
            </div>
            <div class="changeRightLogin">
                <?php
                    require_once 'components/buttons.php';
                    echo regularButton("register.php", "Criar Conta");
                ?>
            </div>
        </div>

        <label id="formLabel" for="email">Email</label>
        <input type="email" name="email">
        
        <label id="formLabel" for="pass">Palavra-passe</label>
        <input type="password" name="pass">
        
        <button id="button" type="submit" name="submit">Entrar</button>
    </form>

    <?php
        require_once 'components/alert.php';

        if(isset($_GET["error"])){
            if($_GET["error"]=="emptyInput"){
                echo errorAlert("Por favor preenche os campos todos");
            }
            if($_GET["error"]=="userDoesntExist"){
                echo errorAlert("Email não se encontra registado");
            }
            if($_GET["error"]=="wrongPass"){
                echo errorAlert("A palavra-passe está errada");
            }
            if($_GET["error"]=="none"){
                echo "<p id='success'>Login efetuado com sucesso!</p>";
            }
        }
    ?>

</main>

<?php include_once 'footer.php'; ?>