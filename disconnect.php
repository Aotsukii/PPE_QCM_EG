<?php
session_start();
session_destroy();
header('location:login.php?error=Vous êtes bien déconnecté.');
exit;
?>