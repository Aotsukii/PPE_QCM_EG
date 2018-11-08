<?php
session_start();
try
{
    $connect = new PDO('mysql:host=localhost;dbname=PPE;', 'root', 'password');
    $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
/**
 * @param $ID_QCM
 * @return array
 */
function getQuestionnaire($ID_QCM)
        {
try
{
    $connect = new PDO('mysql:host=localhost;dbname=PPE;', 'root', 'password');
    $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

            $result = array();

            $stmt = $connect->prepare("SELECT DISTINCT * FROM QCM WHERE ID_QCM='$ID_QCM'");
            $stmt->execute();
            array_push($result, $stmt->fetchAll());
            if($stmt->rowCount() == 0) return array();
            $stmt->closeCursor();

            $stmt = $connect->prepare("SELECT DISTINCT QUESTION.* FROM QUESTION INNER JOIN COMPOSE ON COMPOSE.ID_QCM='$ID_QCM'");
           	$stmt->execute();
            array_push($result, $stmt->fetchAll());
            if($stmt->rowCount() == 0) return array();
            $stmt->closeCursor();

            $stmt = $connect->prepare("SELECT DISTINCT REPONSE.* FROM REPONSE INNER JOIN COMPOSE ON COMPOSE.ID_QCM='$ID_QCM' AND COMPOSE.ID_QUESTION=REPONSE.ID_QUESTION");
            $stmt->execute();
            array_push($result, $stmt->fetchAll());
            if($stmt->rowCount() == 0) return array();
            $stmt->closeCursor();

            return $result;
        }
$ID_QCM = isset($_GET['QCM']) ? $_GET['QCM'] : null ;
$QCM = getQuestionnaire($ID_QCM);

?>


<form method="post" action="verif-qcm.php">
                <?php
                echo ("<a href='choix-qcm.php'>Retour au choix du QCM</a>");
                echo "<h2 class='title'>".$QCM[0][0]['TITRE_QCM']."</h2>";
                echo "<p>".$QCM[0][0]['DESC_QCM']."</p>";
                echo "<p>Durée maximum de l'épreuve : ".$QCM[0][0]['DUREE_MAX']." min</p>";
                echo "<hr>";
                for($i = 0; $i < sizeof($QCM[1]); $i++){
                    $num_q = $i+1;
                    echo "<div class='item-question'><span class='question'>$num_q. ".$QCM[1][$i]['LIB_QUESTION']."</span>";
                    $id_q = $QCM[1][$i]['ID_QUESTION'];
                    echo "<div class='reponses'>";
                    $first = true;
                    for($j = 0; $j < sizeof($QCM[2]); $j++) {
                        $id_r = $QCM[2][$j]['ID_REPONSE'];
                        if ($id_q == $QCM[2][$j]['ID_QUESTION']) {
                            if($first){
                                echo "<label class='reponse'>".$QCM[2][$j]['LIB_REPONSE'].
                                    "<input type='checkbox' name='q".$id_q."_r".$id_r."' checked></label>";
                                $first = false;
                            } else {
                                echo "<label class='reponse'>".$QCM[2][$j]['LIB_REPONSE'].
                                    "<input type='checkbox' name='q".$id_q."_r".$id_r."'></label>";
                            }
                        }
                    }
                    echo "</div>";
                    echo "</div>";
                }

				
                ?>
                <button type="submit">Valider le questionnaire</button>
                </form>









<!--/*// Récupération de la table QUESTION
$ID_QCM = isset($_GET['QCM']) ? $_GET['QCM'] : null ;
$stmt = $connect->prepare("SELECT DISTINCT QUESTION.* FROM QUESTION INNER JOIN COMPOSE ON COMPOSE.ID_QCM='$ID_QCM'");
$stmt->execute();
$LIB_QUESTION = $stmt->fetchAll();
$stmt->closeCursor();

// Récupération de la table REPONSE
$stmt = $connect->prepare("SELECT DISTINCT REPONSE.* FROM REPONSE INNER JOIN COMPOSE ON COMPOSE.ID_QCM='$ID_QCM' AND COMPOSE.ID_QUESTION=REPONSE.ID_QUESTION");
$stmt->execute();
$REP1 = $stmt->fetchAll();
var_dump($REP1);
$stmt-> closeCursor();*/
-->

