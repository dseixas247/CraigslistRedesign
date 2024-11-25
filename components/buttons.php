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
?>