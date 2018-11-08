<html>
<head>
	<a href="espace-prof.php">Retour à l'espace professeur</a>
	<div><h1>LISTE DES QCMs</h1></div>
</head>
<body>

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

		$stmt=$connect->prepare("SELECT * FROM QCM");
		if ($stmt->execute()){
			$result=$stmt->fetchAll();
			foreach($result AS $QCM){
				echo ("Titre:".$QCM['TITRE_QCM']."___________"."Description: ".$QCM['DESC_QCM']."______Durée max : ".$QCM['DUREE_MAX']."<br>");
			}
			$stmt->closeCursor();
		}


?>