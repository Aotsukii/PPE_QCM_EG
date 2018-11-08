<?php
	session_start();
	if(isset($_SESSION[id]))
	{
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>
<?php 
	} else { header('location:login.php?error=Vous devez vous connecter pour accéder au site');} 
?>