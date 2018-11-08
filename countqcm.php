<?php
	session_start();

	//Connexion à la base de données
	try
	{
	    $connect = new PDO('mysql:host=localhost;dbname=PPE;charset=utf8', 'root', 'password');
	}
	catch (Exception $e)
	{
	    die('Erreur : ' . $e->getMessage());
	}

	//Récupération des infos QCM
	$stmt=$connect->prepare("SELECT DISTINCT * FROM USER");
	$stmt->execute();
	$result=$stmt->fetchAll();
	$stmt->closeCursor();
?>

<form method="POST" action="traitment-countqcm.php">
		<select name="choixuser">
					<option>Choisir l'utilisateur</option>
			<!-- Affichage en menu déroulant des différents qcm -->
			<?php
				if (isset($result)){
					foreach($result AS $q){
						echo "<option value=".$q['NOM_USER'].">" . $q['PRENOM_USER'] . "</option>";
					}
				}
			?>
		</select>
		<br><br>
		<input type="text" id="NB_QCM" name="NB_QCM" placeholder="Nombre de QCM faits"><br><br>
		<button type="submit" name="submit">Voir les résultats</button>
	</form>