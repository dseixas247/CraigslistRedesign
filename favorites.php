<?php include_once 'header.php'; ?>

<main class="myFavoritesContainer">
    <h2>Meus Favoritos</h2>

    <div class="productListContainer">
        <?php
            require_once 'dbFunctions/favorite/getByUser.php';
            require_once 'dbFunctions/dbConnect.php';
            $myFavorites = getFavoritesByUser($db, $_SESSION['email']); 

            if($myFavorites){
                foreach($myFavorites as $favorite){
                    require_once 'dbFunctions/image/getMainByPosting.php';
                    $image = getMainImageByPosting($db, $favorite["posting"]);
                    require_once 'dbFunctions/posting/get.php';
                    $posting = getPosting($db, $favorite["posting"]);
                    require_once 'components/posting.php';
                    echo posting($posting,$image);
                }
            }else{
                echo("<p>Ainda não tem favoritos</p>");
            }
        ?>
    </div>

    <?php
        require_once 'components/alert.php';

        if(isset($_GET["error"])){
            if($_GET["error"]=="noneDelete"){
                echo successAlert("Anúncio apagado com successo");
            }
            if($_GET["error"]=="noneEdit"){
                echo successAlert("Anúncio atualizado com successo");
            }
        }
    ?>
</main>

<?php include_once 'footer.php'; ?>