<?php

session_start();
try
{
    $connect = new PDO('mysql:host=localhost;dbname=qcm;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
?>