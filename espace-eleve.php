<?php
	session_start();
	if((isset($_SESSION['ID_USER'])) AND ($_SESSION['ROLE_USER']=="eleve"))
	{
?>
<!DOCTYPE html>
<html>
<head>
	<title>ESPACE ELEVE</title>
	<link rel="stylesheet" href="css/style.css" />
</head>
<header>
    <div class="container">
        <nav>
            <ul class="menu">
                <li><a href="choix-qcm.php">LES QCMS</a></li>
                <li><a href="resultats.php">MES RESULTATS</a></li>
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