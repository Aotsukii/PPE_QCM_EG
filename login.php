<html>
	<head>
		<title>Connexion</title>
		<link rel="stylesheet" href="css/style.css" />
	</head>
	<body>
		<a href="index.php">Retour à la page d'accueil</a>
		<div><h1>CONNEXION</h1></div>
		<br><br>
		<form method="POST" action="traitment-login.php" class="form">
			<table>
				<tr>
					<td>
						<p>Entrez votre login</p>
						<input type="text" name="login" id="login" placeholder="Login" required data-error="Entrez votre login.">
					</td>
				</tr>
				<tr>
					<td>
						<p>Entrez votre mot de passe</p>
						<input type="password" name="pass" id="pass" placeholder="Mot de passe" required data-error="Entrez votre mdp.">
					</td>
				</tr>

				<tr>
					<td>
						<button id="submit" type="submit" name="submit">CONNEXION</button>
					</td>
				</tr>
			</table>
		</form>
		<div id="error"><?php if(isset($_GET['error'])) { echo $_GET['error'];} ?></div>
	</body>
	<footer>
	</footer>
</html>