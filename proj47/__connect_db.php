<?php

$mysqli = new mysqli('localhost', 'mini', 'minimony', 'proj47');

$mysqli->query("SET NAMES utf8");

if(! isset($_SESSION)){
    session_start();
}

?>