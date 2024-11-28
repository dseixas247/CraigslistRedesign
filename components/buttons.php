<?php
    function regularButton($link, $text){
        return "
            <div class='button'>
                <a id='regularButton' href='$link'>
                    $text
                </a>
            </div>
        ";
    }

    function dangerButton($link, $text){
        return "
            <div class='button'>
                <a id='dangerButton' href='$link'>
                    $text
                </a>
            </div>
        ";
    }

    function userButton($link){
        return "
            <div class='button'>
                <a id='regularButton' href='$link'>
                    <i class='fas fa-user-alt'></i>
                </a>
            </div>
        ";
    }

    function favoritesButton($link){
        return "
            <div class='button'>
                <a id='regularButton' href='$link'>
                    <i class='fas fa-star'></i>
                </a>
            </div>
        ";
    }

    function chatButton($link){
        return "
            <div class='button'>
                <a id='regularButton' href='$link'>
                    <i class='fas fa-comment'></i>
                </a>
            </div>
        ";
    }

?>