<html>
<head>
</head>
<body>
	<a href="espace-admin.php">Retour à l'espace admin</a>
	<div><h1>LISTE DES ELEVES</h1></div>
</body>
<footer>
</footer>
</html>
<?php
	session_start();
	try
	{
	    $connect = new PDO('mysql:host=localhost;dbname=PPE;charset=utf8', 'root', 'password');
	}
	catch (Exception $e)
	{
	    die('Erreur : ' . $e->getMessage());
	}

	if($_GET)
	{
		if(isset($_GET['id_eleve']))
		{
			$stmt=$connect->prepare("DELETE FROM USER WHERE ID_USER='".$_GET['id_eleve']."'");
			$stmt->execute();
			header("location:liste-eleves.php");
			exit();
		}
	}

	$stmt=$connect->prepare("SELECT * FROM USER WHERE ROLE_USER='eleve'");
	if ($stmt->execute()){
		$result=$stmt->fetchAll();
		foreach($result AS $ELEVE){
			echo ("Nom : ".$ELEVE['NOM_USER']." ___________ Prénom : ".$ELEVE['PRENOM_USER']."___________ Login : ".$ELEVE['LOGIN']."<a style='margin-left: 5px;' href=liste-eleves.php?id_eleve=".$ELEVE['ID_USER'].">   delete</a><br>");
		}
		$stmt->closeCursor();
	}


?>