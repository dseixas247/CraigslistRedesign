<?php include_once 'header.php'; ?>

<div>
    <h1> Buttons </h1>
    <?php
        require_once 'components/buttons.php';
        echo regularButton("", "botão regular"); 
        echo "<br><br>";
        echo dangerButton("", "botão de perigo");
    ?>
    <h1> Searchbar </h1>
    <?php
        require_once 'components/searchbar.php';
        echo searchbar();
    ?>
</div>

<?php include_once 'footer.php'; ?>