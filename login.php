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
            <div class="changeLeft">
                <?php
                    require_once 'components/buttons.php';
                    echo regularButton("", "Entrar");
                ?>
            </div>
            <div class="changeRight">
                <?php
                    require_once 'components/buttons.php';
                    echo regularButton("register.php", "Criar Conta");
                ?>
            </div>
        </div>

        <label id="formLabel" for="email">Email</label>
        <input type="email" name="email">
        
        <label id="formLabel" for="email">Password</label>
        <input type="password" name="pass">
        
        <button id="button" type="submit" name="submit">Entrar</button>
    </form>
</main>

<?php include_once 'footer.php'; ?>