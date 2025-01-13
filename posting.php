<?php include_once 'header.php'; ?>

<?php
    require_once 'dbFunctions/posting/get.php';
    require_once 'dbFunctions/posting/getSimilar.php';
    require_once 'dbFunctions/user/get.php';
    require_once 'dbFunctions/image/getMainByPosting.php';
    require_once 'dbFunctions/image/get.php';
    require_once 'dbFunctions/dbConnect.php';

    if(isset($_GET["id"])){
        $posting = getPosting($db, $_GET["id"]);
        if($posting){ 
            $similar = getSimilarPostings($db, $posting['subcategory'], $posting['region']);
            $user = getUser($db, $posting['user']);
            $mainImage = getMainImageByPosting($db, $_GET["id"]);
            $images = getImage($db, $_GET["id"]);?>

            <main>
                <div class="infoHead">
                    <div class="postColumnLeft">
                        <div class="postTitle">
                            <?php
                            require_once 'components/buttons.php';
                            echo shareButton("");
                            ?>

                            <h2><?=$posting["title"]?></h2>

                            <?php
                            require_once 'components/buttons.php';
                            echo favoritesButton("");
                            ?>
                        </div>
                        
                        <div class="imagesContainer">
                            <img id="mainImage" src="serverImages/<?=$mainImage['id'];?>" alt="">

                            <div class="secondaryImages">
                                <?php if($images){
                                        foreach($images as $image){
                                            if($image['position'] != 1){ ?>
                                    <img id="postImage" src="serverImages/<?=$image['id'];?>" alt="">
                                <?php }}} ?>
                            </div>
                        </div>
                    </div>

                    <div class="postColumnRight">
                        <div class="userInfoOnPost">
                            <img id="userImageOnPost" src="serverImages/<?=$user['image'];?>" alt="">
                            <h2><?=$user["name"]?></h2>
                        </div>
                        <div class="contactContainer">
                            <?php
                                require_once 'components/buttons.php';
                                echo regularButton("", "Enviar Mensagem");
                                if($posting["email"]){ echo(regularButton("", $posting["email"])); }
                                if($posting["phone"]){ echo(regularButton("", $posting["phone"])); } 
                            ?>
                        </div>
                    </div>
                </div>

                <div class="infoContent">
                    <h2><?=$posting["price"]."€"?></h2>

                    <p><?=$posting['description'];?></p>
                    
                    <h3><?="#".$posting['region']." #".$posting['category']." #".$posting['subcategory'];?></h3>
                </div>

                <div class="similarContainer">
                    <?php
                    if($similar){
                        echo("<div class='otherContainer'>");
                        echo("<h2>Anúncios Semelhantes</h2> <div class='similarPostings'>");

                        foreach($similar as $posting){
                            if($posting['id'] != $_GET["id"]){
                                require_once 'dbFunctions/image/getMainByPosting.php';
                                $image = getMainImageByPosting($db, $posting['id']);
                                require_once 'components/posting.php';
                                echo postingWithActions($posting,$image);
                            }
                        }

                        echo("</div></div>");
                    }
                    ?>
                </div>
                
            </main>
        <?php
        }else{
            echo "<p>Não foi encontrado o produto</p>";
        }
    }else{
        echo "<p>Não foi encontrado o produto</p>";
    }
?>

<?php include_once 'footer.php'; ?>