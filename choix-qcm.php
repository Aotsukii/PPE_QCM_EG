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

$stmt=$connect->prepare("SELECT DISTINCT * FROM QCM");
if ($stmt->execute())
{
	$result=$stmt->fetchAll();
	$stmt->closeCursor();
}

?>
<a href="espace-eleve.php">Retour à l'espace élève</a>
<form method="GET" action="qcm.php" class="form">
		<select name="QCM">
			<option>Choisir un QCM</option>
			<?php
				if (isset($result)){
					foreach($result AS $q){
						echo "<option value=".$q['ID_QCM'].">" . $q['TITRE_QCM'] . "</option>";

					}
				}
			?>
		</select>
		<button id="submit" type="submit" name="submit">Choisir ce QCM</button>
</form>