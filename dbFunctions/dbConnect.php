<?php

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "craigslist_redesign";

$db = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

if(!$db){
    die("Falha de ligação: ". mysqli_connect_error());
}

?>