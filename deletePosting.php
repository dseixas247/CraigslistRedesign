<?php include_once 'header.php'; ?>

<main class="myPostingsContainer">
    <h2>Meus Anúncios</h2>

    <div class="productListContainer">
        <?php
            require_once 'dbFunctions/posting/getByUser.php';
            require_once 'dbFunctions/dbConnect.php';
            $myPostings = getPostingsByUser($db, $_SESSION['email']); 

            if($myPostings){
                foreach($myPostings as $posting){
                    require_once 'dbFunctions/image/getMainByPosting.php';
                    $image = getMainImageByPosting($db, $posting["id"]);
                    require_once 'components/posting.php';
                    echo postingWithActions($posting,$image);
                }
            }else{
                echo("<p>Ainda não tem anúncios publicados</p>");
            }
        ?>
    </div>

    <div class="darkBackground">    
    </div>

    <div class="windowed">
        <h2>Quer mesmo apagar o Anúncio?</h2>
        
        <form class="form" action="postHandlers/deletePosting.php" method="post">
            <input type="hidden" name="id" value="<?=$_GET["id"]?>">

            <a href="myPostings.php">Cancelar</a>
            <button id="button" type="submit" name="submit">Apagar</button>
        </form>

    </div>

</main>

<?php include_once 'footer.php'; ?>