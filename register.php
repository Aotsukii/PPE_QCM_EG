<html>
	<head>
		<title>Inscription</title>
		<link rel="stylesheet" href="css/style.css" />
	</head>
	<body>
		<a href="index.php">Retour à la page d'accueil</a>
		<h1>INSCRIPTION</h1>
		<br><br>
		<form method="POST" action="traitment-register.php" class="form">
			<table>
				<tr>
					<td>
						<p>Entrez votre nom</p>
						<input type="text" name="name" id="name" placeholder="NOM" required data-error="Entrez votre nom.">
					</td>
				</tr>
				<tr>
					<td>
						<p>Entrez votre prénom</p>
						<input type="text" name="surname" id="surname" placeholder="Prénom" required data-error="Entrez votre prénom.">
					</td>
				</tr>
				<tr>
					<td>
						<p>Choisissez votre login</p>
						<input type="text" name="login" id="login" placeholder="Login" required data-error="Entrez votre login.">
					</td>
				</tr>
				<tr>
					<td>
						<p>Choisissez votre mot de passe</p>
						<input type="password" name="pass" id="pass" placeholder="Mot de passe" required data-error="Entrez votre mdp.">
					</td>
				</tr>
				<tr>
					<td>
						<label for="role">Êtes-vous un</label><br>
						<input type="radio" name="role" id="professeur" value="professeur">
						<label for="professeur">Professeur</label>
						<input type="radio" name="role" id="eleve" value="eleve" checked="checked">
						<label for="eleve">Eleve</label>
						
					</td>
				</tr>
				<tr>
					<td>
						<button id="submit" type="submit" name="submit">INSCRIPTION</button>
					</td>
				</tr>
			</table>
		</form>
	</body>
	<footer>
	</footer>
</html>