<?php
session_start();

include_once '../../../dao/database.php';

$valide=1;

$pdo = Database::connect();  
$stmt = $pdo->prepare("SELECT * FROM utilisateur, entreprise WHERE utilisateur.id=entreprise.employeur_id AND id=:id AND valide=:valide");
$stmt->execute(array(":id"=>$_SESSION['user_session_docteur'], ":valide"=>$valide));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

if(!isset($_SESSION['user_session_docteur']))
{
  header("Location: ../../../");
}

?>

  <?php 
     $stmt = $pdo->prepare("SELECT * FROM employer, consultation, item_mal, item_syn, item_med WHERE consultation.idcons=item_med.med_idc and consultation.idcons=item_mal.mal_idc and consultation.idcons=item_syn.item_con_idc AND employer.idEmployer=:emp and idcons=:id GROUP BY idcons");
        $stmt->execute(array(":id"=>$_GET['idc'], ":emp"=>$_GET['emp']));
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
   ?>  
   <style type="text/css">
   	.text-center{
   		text-align: center;
   	}
   	.right{
   		float: right;	
   	}
   	.p{
   		padding: 4%;
   	}
    .lab1{
      margin-left: 55%;
    }
    .lab1{
      margin-left: 5%;
    }
   </style>   

   <h3><b> DR <?php echo $userRow['nom']; echo " "; echo $userRow['prenom']; ;?></b></h3>
   <h3><b> DR <?php echo $userRow['raisonSociale'];?></b></h3>
        <label class="lab1">Code employer : <?php echo $row['codeE'];
          $ben = explode(" / ", $row['beneficiaire']);?></label><br> 
        <label class="lab1">Nom : <?php  echo $ben[1]; ?></label><br>  
        <label class="lab1">Prénom : <?php  echo $ben[2]; ?></label><br>  
<!--         <?php 
        if (isset($row['dateNaissanceEpouses'])) {
          ?>
        <label class="lab">Age : <?php echo $row['dateNaissanceEpouses']; ?></label><br>  
         <?php 
              } else {
          ?>
        <label class="lab">Age : <?php echo $row['dateNaissanceEnfants']; ?></label><br>  
         <?php 
        }
 ?> -->
        <label class="lab1">Main consulté: <?php echo $row['main']; ?></label><br>  
        <label class="lab1">Poids : <?php echo $row['poids']; ?></label><br> 
        <label class="lab1">Température : <?php echo $row['temp']; ?></label><br>  
        <label class="lab1">Tension : <?php echo $row['tension']; ?></label><br> 
   <h1 class="text-center">Ordonnance </h1> 
   <h4> Fait à Ziguinchor le : <?php echo date('Y-m-d') ?></h4>
        <?php  
        $stmt1 = $pdo->prepare("SELECT * FROM consultation, item_med WHERE consultation.idcons=item_med.med_idc and idcons=:id");
        $stmt1->execute(array(":id"=>$_GET['idc']));
        $result = $stmt1->fetchAll();
        foreach ($result as $r) { //on cree les lignes du tableau avec chaque valeur retournée
         ?>
        <label class="lab p"><?php echo ($r['med_item_con']);  ?></label><br> <br> 
        <?php 
          } 

?>
<h4 class="right">Code prise en charge : <?php echo $row['codeemployer'] ?></h4>
  <script type="text/javascript">
    window.print();
  </script>	