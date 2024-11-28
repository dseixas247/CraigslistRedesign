<?php include_once 'header.php'; ?>

<div>
    <h1> Buttons </h1>
    <?php
        require_once 'components/buttons.php';
        echo regularButton("", "botão regular"); 
        echo "<br><br>";
        echo dangerButton("", "botão de perigo");
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
</div>

<?php include_once 'footer.php'; ?>