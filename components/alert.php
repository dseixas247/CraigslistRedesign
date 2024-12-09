<?php
    function errorAlert($text){
        return "
            <div class='errorAlert'>
                <span class='closebtn' onclick='this.parentElement.style.display=`none`;'>&times;</span>
                ".$text."
            </div>
        ";
    }

    function successAlert($text){
        return "
            <div class='successAlert'>
                <span class='closebtn' onclick='this.parentElement.style.display=`none`;'>&times;</span>
                ".$text."
            </div>
        ";
    }

?>