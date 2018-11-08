
<html>
<head>
</head>
<body>
<a href="espace-admin.php">Retour à l'espace admin</a>
<div><h1>LISTE DES PROFESSEURS</h1></div>
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
		if(isset($_GET['id_profs']))
		{
			$stmt=$connect->prepare("DELETE FROM USER WHERE ID_USER='".$_GET['id_profs']."'");
			$stmt->execute();
			header("location:liste-profs.php");
			exit();
		}
	}

	$stmt=$connect->prepare("SELECT * FROM USER WHERE ROLE_USER='professeur'");
	if ($stmt->execute()){
		$result=$stmt->fetchAll();
		foreach($result AS $PROFS){
			echo ("Nom : ".$PROFS['NOM_USER']." ___________Prénom : ".$PROFS['PRENOM_USER']."___________Login : ".$PROFS['LOGIN']."<a style='margin-left: 5px;' href=liste-profs.php?id_profs=".$PROFS['ID_USER'].">   delete</a><br>");
		}
		$stmt->closeCursor();
	}


?>
