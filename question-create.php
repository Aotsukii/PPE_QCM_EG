<?php session_start();
		try
		{
		    $connect = new PDO('mysql:host=localhost;dbname=PPE;charset=utf8', 'root', 'password');
		}
		catch (Exception $e)
		{
		    die('Erreur : ' . $e->getMessage());
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
		<div><h1>CREATION DE QUESTIONS</h1></div>
		<br><br>
		<form method="POST" action="traitment-question-create.php" class="form">
			<table>
				<tr>
					<td>
						<p>Intitulé de la question</p>
						<input type="text" name="lib_question" id="lib_question" placeholder="Question" required data-error="Entrez votre question">
					</td>
				</tr>
				<tr>
					<td>
						<p><br>Réponse 1:</p>
						<input type="text" name="rep1" id="rep1" placeholder="Reponse 1" required data-error="Réponse 1">
						<input type="checkbox" id="r1_istrue" name="r1_istrue" checked>est juste</td>
						
					</td>
				</tr>
				<tr>
					<td>
						<p><br>Réponse 2:</p>
						<input type="text" name="rep2" id="rep2" placeholder="Réponse 2" required data-error="Réponse 2">
						<input type="checkbox" id="r2_istrue" name="r2_istrue">est juste</td>

					</td>
				</tr>
				<tr>
					<td>
						<p><br>Réponse 3:</p>
						<input type="text" name="rep3" id="rep3" placeholder="Réponse 3" required data-error="Réponse 3">
						<input type="checkbox" id="r3_istrue" name="r3_istrue">est juste</td>

					</td>
				</tr>
				<tr>
					<td>
						<p><br>Réponse 4:</p>
						<input type="text" name="rep4" id="rep4" placeholder="Réponse 4" required data-error="Réponse 4">
						<input type="checkbox" id="r4_istrue" name="r4_istrue">est juste</td>

					</td>
				</tr>
				<tr>
					<td>
						<br>
						<button id="submit" type="submit" name="submit">Création de la question</button>
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>
<?php 
	} else { header('location:login.php?error=Vous n\'avez pas accès à cette page');} 
?>