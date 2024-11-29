<?php include_once 'header.php'; ?>

<div>
    <h1> Buttons </h1>
    <?php
        require_once 'components/buttons.php';
        echo regularButton("", "botão regular"); 
        echo "<br><br>";
        echo dangerButton("", "botão de perigo");
        echo "<br><br>";
        echo userButton("");
        echo "<br><br>";
        echo favoritesButton("");
        echo "<br><br>";
        echo chatButton("");
        echo "<br><br>";
    ?>

    <h1> Searchbar </h1>
    <?php
        require_once 'components/searchbar.php';
        echo searchbar();
        echo "<br><br>";
    ?>
    
    <h1> Category </h1>
    <?php
        require_once 'components/category.php';
        echo category("titulo da categoria", ["item1", "item2", "item3", "item4", "item5", "item6", "item7"]);
    ?>

    <h1> Anuncio </h1>
    <?php
        $examplePosting = array("id"=>"1", "name"=>"hbsdvuhfbghasbdgasgsbdgagjhjgfgjgjkbasbgjgbagbjf", "image"=>"placeholder.png", "price"=>"12,99");
        require_once 'components/posting.php';
        echo posting($examplePosting);
        echo postingWithActions($examplePosting);
    ?>
</div>

<?php include_once 'footer.php'; ?>