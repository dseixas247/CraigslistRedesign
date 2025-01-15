<?php include_once 'header.php'; ?>

<main class="searchPage">
    <div class="searchContainer">
        <?php 
            require_once 'components/searchbar.php'; 
            $search = $_GET['search'];
            $region = $_GET['region'];
            $category = $_GET['category'];
            $subcategory = $_GET['subcategory'];
            $priceMin = $_GET['priceMin'];
            $priceMax = $_GET['priceMax'];
            echo searchbarWithFilters($search, $region, $category, $subcategory, $priceMin, $priceMax);
        ?>
    </div>
    <div class="searchResultsContainer">
        <h2>Resultado</h2>
        <div class="searchResults">
            <?php
                require_once 'dbFunctions/posting/getFiltered.php';
                require_once 'dbFunctions/dbConnect.php';
                $searchResult = getPostingsFiltered($db, $search, $region, $category, $subcategory, $priceMin, $priceMax); 

                if($searchResult){
                    foreach($searchResult as $posting){
                        require_once 'dbFunctions/image/getMainByPosting.php';
                        $image = getMainImageByPosting($db, $posting["id"]);
                        require_once 'components/posting.php';
                        echo posting($posting,$image);
                    }
                }else{
                    echo("<p>Não encontramos anúncios</p>");
                } 
            ?>
        </div>
    </div>
</main>

<?php include_once 'footer.php'; ?>