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

		$stmt=$connect->prepare("SELECT DISTINCT * FROM QUESTION");
		if ($stmt->execute()){
			$result=$stmt->fetchAll();
			$stmt->closeCursor();
		}
	if((isset($_SESSION['ID_USER'])) AND ($_SESSION['ROLE_USER']=="professeur"))
	{
?>
<html>
	<head>
		<link rel="stylesheet" href="css/style.css" />
	</head>
	<header>
	</header>
	<body>
		<a href="espace-prof.php">Retour à l'espace professeur</a>
		<div><h1>CREATION DE QCM</h1></div>
		<br><br>
		<form method="POST" action="traitment-qcm-create.php" class="form">
			<table>
				<tr>
					<td>
						<p>Nom du QCM</p>
						<input type="text" name="nom_qcm" id="nom_qcm" placeholder="Nom" required data-error="Entrez un nom.">
					</td>
				</tr>
				<tr>
					<td>
						<p>Durée maximum du QCM (en min)</p>
						<input type="int" name="duree" id="duree" placeholder="Durée" required data-error="Veuillez saisir une Durée">
					</td>
				</tr>
				<tr>
					<td>
						<p>Description du QCM</p>
						<textarea type="text" name="desc" id="desc" required="required" rows="7" cols="50" placeholder="Description de votre QCM"></textarea>
					</td>
				</tr>
				<tr>
					<td>
						<select name="question1">
							<option>Choisir une question</option>
							<?php
								if (isset($result)){
									foreach($result AS $q){
										echo "<option value=".$q['ID_QUESTION'].">" . $q['LIB_QUESTION'] . "</option>";
									}
								}
							?>
						</select>

						<select name="question2">
							<option value="">Choisir une question</option>
							<?php
								if (isset($result)){
									foreach($result AS $q){
										echo "<option value=".$q['ID_QUESTION'].">" . $q['LIB_QUESTION'] . "</option>";
									}
								}
							?>
						</select>
						<p></p>
						<select name="question3">
							<option value="">Choisir une question</option>
							<?php
								if (isset($result)){
									foreach($result AS $q){
										echo "<option value=".$q['ID_QUESTION'].">" . $q['LIB_QUESTION'] . "</option>";
									}
								}
							?>
						</select>
						<select name="question4">
							<option value="">Choisir une question</option>
							<?php
								if (isset($result)){
									foreach($result AS $q){
										echo "<option value=".$q['ID_QUESTION'].">" . $q['LIB_QUESTION'] . "</option>";
									}
								}
							?>
						</select>
						<p></p>
						<select name="question5">
							<option value="">Choisir une question</option>
							<?php
								if (isset($result)){
									foreach($result AS $q){
										echo "<option value=".$q['ID_QUESTION'].">" . $q['LIB_QUESTION'] . "</option>";
									}
								}
							?>
						</select>
						<select name="question6">
							<option value="">Choisir une question</option>
							<?php
								if (isset($result)){
									foreach($result AS $q){
										echo "<option value=".$q['ID_QUESTION'].">" . $q['LIB_QUESTION'] . "</option>";
									}
								}
							?>
						</select>
						<p></p>
						<select name="question7">
							<option value="">Choisir une question</option>
							<?php
								if (isset($result)){
									foreach($result AS $q){
										echo "<option value=".$q['ID_QUESTION'].">" . $q['LIB_QUESTION'] . "</option>";
									}
								}
							?>
						</select>
						<select name="question8">
							<option value="">Choisir une question</option>
							<?php
								if (isset($result)){
									foreach($result AS $q){
										echo "<option value=".$q['ID_QUESTION'].">" . $q['LIB_QUESTION'] . "</option>";
									}
								}
							?>
						</select>
						<p></p>
						<select name="question9">
							<option value="">Choisir une question</option>
							<?php
								if (isset($result)){
									foreach($result AS $q){
										echo "<option value=".$q['ID_QUESTION'].">" . $q['LIB_QUESTION'] . "</option>";
									}
								}
							?>
						</select>
						<select name="question10">
							<option value="">Choisir une question</option>
							<?php
								if (isset($result)){
									foreach($result AS $q){
										echo "<option value=".$q['ID_QUESTION'].">" . $q['LIB_QUESTION'] . "</option>";
									}
								}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						<button id="submit" type="submit" name="submit">Création du QCM</button>
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>

<?php 
	} else { header('location:login.php?error=Vous n\'avez pas accès à cette page');} 
?>