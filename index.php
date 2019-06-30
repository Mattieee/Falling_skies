<?php
session_start();


$bdd = new PDO('mysql:host=localhost;dbname=espace_membre', 'root', '');

header('Location: index-2.php');
?>