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
$stmt=$connect->prepare("SELECT DISTINCT * FROM QCM");
$stmt->execute();
$result=$stmt->fetchAll();
$stmt->closeCursor();

?>
	<!-- form ou l'user choisit à quelle date doit on compter, pour quel QCM -->
	<form method="POST" action="traitment-countusers.php">
		<input type="date" name="date_pour_qcm">
		<select name="choixQCM">
					<option>Choisir le QCM</option>
			<!-- Affichage en menu déroulant des différents qcm -->
			<?php
				if (isset($result)){
					foreach($result AS $q){
						echo "<option value=".$q['ID_QCM'].">" . $q['TITRE_QCM'] . "</option>";
					}
				}
			?>
		</select>
		<button type="submit" name="submit">Voir les résultats</button>
	</form>