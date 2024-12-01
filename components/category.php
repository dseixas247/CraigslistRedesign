<?php
    function category($title, $categories){
        $component = "<div class='category'><h2>".$title."</h2><div class='subCategory'>";

        foreach($categories as $name){
            $component = $component."<a class='categoryItem' href='search.php?category=".$title.$name."'>".$name."</a>";
        }

        $component = $component."</div></div>";

        return $component;
    }
?>