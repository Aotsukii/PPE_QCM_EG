<?php
	session_start();

	//Connexion à la base de données
	try
	{
	    $connect = new PDO('mysql:host=localhost;dbname=qcm;charset=utf8', 'root', 'root');
	}
	catch (Exception $e)
	{
	    die('Erreur : ' . $e->getMessage());
	}
	//récupération de l'id user choisie
	$USER=isset($_POST['choixuser']) ? $_POST['choixuser'] : null;
	$NB_QCM=isset($_POST['NB_QCM']) ? $_POST['NB_QCM'] : null;
	//Récupération des nom/prénom si ils ont fait plus de QCM que le nombre choisi
	$stmt=$connect->prepare("SELECT NOM_USER,PRENOM_USER FROM USER INNER JOIN FAIRE WHERE 'ID_USER'=$USER AND 'ID_USER'='FAIRE.ID_USER' AND (COUNT(NOTE))>$NB_QCM ");
	$stmt->execute();
	$result=$stmt->fetchAll();
	foreach($result AS $ELEVE){
			echo ("Nom : ".$ELEVE['NOM_USER']." ___________Prénom : ".$ELEVE['PRENOM_USER']);
		}
	$stmt->closeCursor();
?>