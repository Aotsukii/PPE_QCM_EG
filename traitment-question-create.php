<?php
		session_start();
		try
		{
		    $connect = new PDO('mysql:host=localhost;dbname=qcm;charset=utf8', 'root', 'root');
		}
		catch (Exception $e)
		{
		    die('Erreur : ' . $e->getMessage());
		}

		$question=htmlspecialchars($_POST['lib_question']);


		$ID_USER=$_SESSION['ID_USER'];

		$insert = $connect->prepare("INSERT INTO QUESTION (`LIB_QUESTION`,`ID_USER`) VALUES(?,?)");
		$insert->execute(array($question,$ID_USER)) or die(print_r($insert->errorInfo(), true));
		$insert->closeCursor();

		$insert = $connect->prepare("SELECT ID_QUESTION FROM QUESTION WHERE LIB_QUESTION='$question' ORDER BY ID_QUESTION desc");
		$insert->execute();
		$ID_QUESTION = $insert->fetchAll();
		$ID_QUESTION = $ID_QUESTION[0]['ID_QUESTION'];
		$insert->closeCursor();

		


for($i = 1; $i <= 4; $i++){
   $r =!empty($_POST['rep'.$i]) ? $_POST['rep'.$i] : '';
   $r_v = !empty($_POST['r'.$i.'_istrue']) ? true : false;
  if($r!=''){
  $insert = $connect->prepare("INSERT INTO REPONSE (`LIB_REPONSE`,`ISTRUE`,`ID_QUESTION`) VALUES(?,?,?)");
		$insert->execute(array($r,$r_v,$ID_QUESTION)) or die(print_r($insert->errorInfo(), true));
		$insert->closeCursor();
	}
}

		header('location:espace-prof.php');
	?>