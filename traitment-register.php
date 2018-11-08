<?php
/* if (isset($_POST['submit'])){
} */
$nom=htmlspecialchars($_POST['name']);
$prenom=htmlspecialchars($_POST['surname']);
$login=htmlspecialchars($_POST['login']);
$pass=htmlspecialchars($_POST['pass']);
$role=htmlspecialchars($_POST['role']);
$pass=sha1($pass);
try
{
    $connect = new PDO('mysql:host=localhost;dbname=qcm;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

$insert = $connect->prepare("INSERT INTO USER (`NOM_USER`,`PRENOM_USER`,`LOGIN`,`PASSWORD`,`ROLE_USER`) VALUES(?,?,?,?,?)");
$insert->execute(array($nom,$prenom,$login,$pass,$role)) or die(print_r($insert->errorInfo(), true));
header('location:index.php')
?>