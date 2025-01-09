<?php include_once 'header.php'; ?>

<main>
    <h2>Meus Anúncios</h2>

    <div class="productListContainer">
        <?php
            require_once 'dbFunctions/posting/getByUser.php';
            require_once 'dbFunctions/dbConnect.php';
            $myPostings = getPostingsByUser($db, $_SESSION['email']); 

            foreach($myPostings as $posting){
                require_once 'dbFunctions/image/getMainByPosting.php';
                $image = getMainImageByPosting($db, $posting["id"]);
                require_once 'components/posting.php';
                echo postingWithActions($posting,$image);
            }
        ?>
    </div>
</main>

<?php include_once 'footer.php'; ?>