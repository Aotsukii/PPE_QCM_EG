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

	// On récupère la date annoncée dans le form page précédente.
	$DATE = isset($_POST['date_pour_qcm']) ? $_POST['date_pour_qcm'] : null ;
	// On récupère le QCM annoncé dans le form page précédente.
	$QCM = isset($_POST['choixQCM']) ? $_POST['choixQCM'] : null ;

	// Requête qui va compter le nombre d'utilisateurs 
	$stmt=$connect->prepare("SELECT COUNT(ID_USER) FROM FAIRE WHERE 'ID_QCM'='$QCM' AND 'DATE'=$DATE");
	$stmt->execute();
	$result=$stmt->fetchAll();
	var_dump($result);
	$stmt->closeCursor();
?>