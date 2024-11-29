<?php

    function posting($posting){
        return "<div class='posting'>
            <a id='content' href='posting.php?id=".$posting["id"]."'>
                <div id='itemPrice'>".$posting["price"]."€</div>
                <img id='itemImage' src='serverImages/".$posting["image"]."' alt='Posting ".$posting["name"]."'>
                <div id='itemName'>".$posting["name"]."</div>
            </a>
        </div>";
    }

    function postingWithActions($posting){
        return "<div class='posting'>
            <div id='content'>
                <div id='itemPrice'>".$posting["price"]."€</div>
                <img id='itemImage' src='serverImages/".$posting["image"]."' alt='Posting ".$posting["name"]."'>
                <div id='itemName'>".$posting["name"]."</div>
            </div>
            <div id='actions'>
                <a id='view' href='posting.php?id=".$posting["id"]."'>
                    <i class='fa fa-eye'></i>
                </a>
                <a id='edit' href='editPosting.php?id=".$posting["id"]."'>
                    <i class='fa fa-edit'></i>
                </a>
                <a id='delete' href='deletePosting.php?id=".$posting["id"]."'>
                    <i class='fa fa-trash-o'></i>
                </a>
            </div>
        </div>";
    }

?>