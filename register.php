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
        <input type="password" name="passConfirm">
        
        <button id="button" type="submit" name="submit">Entrar</button>
    </form>
</main>

<?php include_once 'footer.php'; ?>