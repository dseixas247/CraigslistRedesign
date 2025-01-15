<?php
    function category($title, $categories){
        $component = "<div class='category'><h2>".$title."</h2><div class='subCategory'>";

        foreach($categories as $name){
            $component = $component."<a class='categoryItem' href='search.php?search=&region=Todo%20Portugal&category=".$title."&subcategory=".$name."&priceMin=&priceMax='>".$name."</a>";
        }

        $component = $component."</div></div>";

        return $component;
    }
?>