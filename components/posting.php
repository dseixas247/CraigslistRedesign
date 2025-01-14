<?php

    function posting($posting,$image){
        if($image){
            return "<div class='posting'>
                <a id='content' href='posting.php?id=".$posting["id"]."'>
                    <div id='itemPrice'>".$posting["price"]."€</div>
                    <img id='itemImage' src='serverImages/".$image["id"]."' alt='Posting ".$posting["title"]."'>
                    <div id='itemName'>".$posting["title"]."</div>
                </a>
            </div>";
        }else{
            return "<div class='posting'>
                <a id='content' href='posting.php?id=".$posting["id"]."'>
                    <div id='itemPrice'>".$posting["price"]."€</div>
                    <img id='itemImage' src='craigslistImages/craigslist_logo.png' alt='Posting ".$posting["title"]."'>
                    <div id='itemName'>".$posting["title"]."</div>
                </a>
            </div>";
        }
    }

    function postingWithActions($posting,$image){
        if($image){
            return "<div class='posting'>
                <div id='content'>
                    <div id='itemPrice'>".$posting["price"]."€</div>
                    <img id='itemImage' src='serverImages/".$image["id"]."' alt='Posting ".$posting["title"]."'>
                    <div id='itemName'>".$posting["title"]."</div>
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
        }else{
            return "<div class='posting'>
                <div id='content'>
                    <div id='itemPrice'>".$posting["price"]."€</div>
                    <img id='itemImage' src='craigslistImages/craigslist_logo.png' alt='Posting ".$posting["title"]."'>
                    <div id='itemName'>".$posting["title"]."</div>
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
    }

?>