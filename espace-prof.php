<?php
	session_start();
	if((isset($_SESSION['ID_USER'])) AND ($_SESSION['ROLE_USER']=="professeur"))
	{
?>
<!DOCTYPE html>
<html>
<head>
	<title>ESPACE PROFESSEUR</title>
	<link rel="stylesheet" href="css/style.css" />
</head>
<header>
    <div class="container">
        <nav>
            <ul class="menu">
                <li><a href="liste-qcm.php">Liste des QCMs</a></li>
                <li><a href="qcm-create.php">Créer un QCM</a></li>
                <li><a href="question-create.php">Créer des questions</a></li>
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