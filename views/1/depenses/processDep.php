<?php
   session_start();

if(!isset($_SESSION['user_session_sescretaire']))
{
  // header("Location: ../../pages/auth/index.php");
} 

 
 
include 'DB.php';
$db = new DB();
$tblName = 'depenses';  
   if (isset($_POST['libelle'])) { 
 
                        $datetime=date('Y-m-d');
                        $dateymdY= explode("-", $datetime);
                        $datemois= $dateymdY['1'];
include_once '../../../dao/database.php';
  $pdo =Database::connect(); //on se connecte à la base 
                        $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );  
                        $statement4 = $pdo->prepare("SELECT *, SUM(solde) AS solde FROM depenses WHERE date_mois=:datenow");  
                        $statement4->execute(array(':datenow'=>$datemois));  
                        $userRow4=$statement4->fetch(PDO::FETCH_ASSOC);

                        if ($userRow4) {
                          $_SESSION['depenses_incorrecte']="Le montant du solde disponible dans la caisse est inférieur au montant que vous souhaitez dépenser";
                  header('Location: ./'); 
                        } else {
                           $libelle=$_POST['libelle'];
 $description=$_POST['description'];
 $montant=$_POST['montant'];
    echo $idparent;
      $userData = array(
                    'libelle'=>$libelle,
                    'description'=>$description,
                    'montant'=>$montant,
                'date_annee' => $dateymdY['0'],
                'date_mois' => $dateymdY['1'],
                'date_jour' => $dateymdY['2'], 
              ); 
        $insert = $db->insert($tblName,$userData);
         
                  header('Location: ./'); 
                        }
                        

   }
   if (isset($_POST['solde'])) { 

        $datetime=date('Y-m-d');
        $dateymdY= explode("-", $datetime);

 $solde=$_POST['solde']; 
    echo $idparent;
      $userData = array( 
                    'solde'=>$solde, 
                'date_annee' => $dateymdY['0'],
                'date_mois' => $dateymdY['1'],
                'date_jour' => $dateymdY['2'], 
              ); 
        $insert = $db->insert($tblName,$userData);
         
                  header('Location: ./'); 
   }


  if (isset($_GET['id_re'])) { 
    $gerant=02;
      $userData = array(
                    'gerant'=>$gerant
              ); 
      
   $condition = array('iddep' => $_GET['id_re']); 

   $update = $db->update($tblName,$userData,$condition);
     var_dump($userData); 
     header('Location: ./'); 
   
   }



      if (isset($_GET['id_au'])) { 
    $gerant=01;
      $userData = array(
                    'gerant'=>$gerant
              ); 
      
   $condition = array('iddep' => $_GET['id_au']); 

   $update = $db->update($tblName,$userData,$condition);
     // var_dump($userData); 
     header('Location: ./'); 
   
   }


?>