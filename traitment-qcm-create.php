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

		$nom_qcm=htmlspecialchars($_POST['nom_qcm']);
		$desc_qcm=htmlspecialchars($_POST['desc']);
		$duree=htmlspecialchars($_POST['duree']);
		$ID_USER=$_SESSION['ID_USER'];

		$insert = $connect->prepare("INSERT INTO QCM (`TITRE_QCM`,`DESC_QCM`,`DUREE_MAX`, `ID_USER`) VALUES(?,?,?,?)");
		$insert->execute(array($nom_qcm,$desc_qcm,$duree,$ID_USER)) or die(print_r($insert->errorInfo(), true));
		$insert->closeCursor();

		$insert = $connect->prepare("SELECT ID_QCM FROM QCM WHERE TITRE_QCM='$nom_qcm' AND ID_USER='$ID_USER' ORDER BY ID_QCM DESC");
		$insert->execute();
		$ID_QCM = $insert->fetchAll();
		$ID_QCM = $ID_QCM[0]['ID_QCM'];

		$insert->closeCursor();

		for($i=1; $i<=10; $i++){
			$question = isset($_POST['question'.$i]) && $_POST['question'.$i] != "" ? $_POST['question'.$i] : "null";
			if($question != "null"){
				$insert = $connect->prepare("INSERT INTO COMPOSE (`ID_QCM`,`ID_QUESTION`) VALUES(?,?)");
				$insert->execute(array($ID_QCM, $question)) or die(print_r($insert->errorInfo(), true));
				$insert->closeCursor();
			}
		}
		header('location:espace-prof.php')
	?>