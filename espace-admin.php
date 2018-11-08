<?php
	session_start();
	if((isset($_SESSION['ID_USER'])) AND ($_SESSION['ROLE_USER']=="administrateur"))
	{
?>
<!DOCTYPE html>
<html>
<head>
	<title>ESPACE ADMINISTRATEUR</title>
	<link rel="stylesheet" href="css/style.css" />
</head>
<header>
    <div class="container">
        <nav>
            <ul class="menu">
                <li><a href="liste-eleves.php">Liste des éleves</a></li>
                <li><a href="liste-profs.php">Liste des professeurs</a></li>
                <li><a href="disconnect.php">Déconnexion</a></li>
            </ul>
        </nav>
    </div>
</header>
<body>

</body>
</html>
<?php 
	} else { header('location:login.php?error=Vous n\'avez pas accès à cette page');} 
?>