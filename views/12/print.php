<?php

include 'DB.php';

$db = new DB();
$userData = $db->getRows('bon_, entreprise, employer, utilisateur',array('where'=>array('bon_.id_ipmbon=utilisateur.id AND bon_.id_parent=employer.idEmployer AND bon_.id_structure=entreprise.idEntreprise AND idbon'=>$_GET['id_bon']),'return_type'=>'single'));

$userData1 = $db->getRows('bon_, entreprise',array('where'=>array('bon_.id_beneficiaire=entreprise.idEntreprise AND  idbon'=>$_GET['id_bon']),'return_type'=>'single'));

 ?>
<!DOCTYPE html>
<html>
<head>
    <title>Impression de la facture</title>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.css">
<style type="text/css">
 .text-right{
    float: right;
  }
  .text-left{
    float: left;
  }
  body{
    padding: 5%;
    font-family: Times New Roman;
  }
  img{ 
    width: 25%;
  }
  table{
    padding: 2%;
  }
  #border{
  border: 1px solid black;
  }
  table, tr, td{
      border: 1px solid black;

  }
  td{
      height: 30px;

  }
   .text-center{
    text-align: center;
  }
  hr{
    border: solid 1px;
  }
  .arial{
    font-family: arial black;
  }
  .medi{
    width: 50%;
  }
</style> 
</head>
<body>
<div class="row">
  <div class="col-md-4">
    <img class="img-fluid" src="IPMIEZ.png"><br><br>
    <h6 class="text-left padding">INSTITUTION DE PREVOYANCE MALADIE <br>INTER-ENTREPRISES DE ZIGUINCHOR (IPMIEZ)</h6><br><br><br>
    <h6><b>Tel :</b>  33 991 51 33 /  77 529 62 66 </h6>
<h6 class="container">Rue Générale DEGAULLE X FODE KABA DOUMBOUYA</h6>    
<h6>Délivré par :  <?php  echo $userData1['raisonSociale']; echo " "; ?>

  </div>
  <div class="col-md-8">
    <h2 class="text-center arial" > BON DE COMMANDE</h2>
    <h4 class="text-center arial" >(Facture à déposer le 25 de chaque mois)</h4>
    <h3>M. / Mm. : <?php echo "Prénom  : "; echo $userData['prenomEmployer']; echo " "; echo " Nom : "; echo $userData['nomEmployer']; echo " | Code  : "; echo $userData['codeemployer']; ?></h6>
    <h6>A  <?php echo "Prénom  : "; echo $userData['prenomEmployer']; echo " "; echo " Nom : "; echo $userData['nomEmployer']; echo " | Code  : "; echo $userData['codeemployer']; ?>
    </h6>
  </div>
</div>




<table id="border" class="padding" style="width:100%">
  <tr> 
    <td></td>
    <td class="medi"><?php if (($userData['med1'])) {  echo $userData['med1']; } else {  echo " ";}   ?></td>
    <td></td>
  </tr> 
  <tr> 
    <td></td>
    <td class="medi"><?php if (($userData['med2'])) {  echo $userData['med2']; } else {  echo " ";}   ?></td>
    <td></td>
  </tr> 
  <tr> 
    <td></td>
    <td class="medi"><?php if (($userData['med3'])) {  echo $userData['med3']; } else {  echo " ";}?></td>
    <td></td>
  </tr> 
  <tr> 
    <td></td>
    <td class="medi"><?php if (($userData['med4'])) {  echo $userData['med4']; } else {  echo " ";} ?></td>
    <td></td>
  </tr> 
  <tr> 
    <td></td>
    <td class="medi"><?php if (($userData['med5'])) {  echo $userData['med5']; } else {  echo "SS ";} ?></td>
    <td></td>
  </tr> 
  <tr> 
    <td></td>
    <td class="medi"><?php if (($userData['med6'])) {  echo $userData['med6']; } else {  echo " ";} ?></td>
    <td></td>
  </tr> 
  <tr> 
    <td></td>
    <td class="medi"><?php if (($userData['med7'])) {  echo $userData['med7']; } else {  echo " ";} ?></td>
    <td></td>
  </tr> 
  <tr> 
    <td></td>
    <td class="medi"><?php if (($userData['med8'])) {  echo $userData['med8']; } else {  echo " ";}?></td>
    <td></td>
  </tr> 
  <tr> 
    <td></td>
    <td class="medi"><?php if (($userData['med9'])) {  echo $userData['med9']; } else {  echo " ";}?></td>
    <td></td>
  </tr> 
  <tr> 
    <td></td>
    <td class="medi"><?php if (($userData['med10'])) {  echo $userData['med10']; } else {  echo " ";}?></td>
    <td></td>
  </tr> 
</table>

<h6 >Ziguinchor le : <?php echo $userData['bon_datecreated']; ?></h6> 
<h6 class="row"><span class="col-md-4 "> <?php echo "Raison sociale: "; echo $userData['raisonSociale'];   ?></span> <span class="col-md-4 arial text-center"> Signature et cachet IPMIEZ</span>
<span class="col-md-4 arial text-right">Le réceptionneiste</span></h6>  
           <br> 
           <br> 
           <br> 
           <br> 

-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- 
<!-- <br><br><br>  
 --><div class="row">
  <div class="col-md-4">
    <img class="img-fluid" src="IPMIEZ.png"><br><br>
    <h6 class="text-left padding">INSTITUTION DE PREVOYANCE MALADIE <br>INTER-ENTREPRISES DE ZIGUINCHOR (IPMIEZ)</h6><br><br><br>
    <h6><b>Tel :</b>  33 991 51 33 /  77 529 62 66 </h6>
<h6 class="container">Rue Générale DEGAULLE X FODE KABA DOUMBOUYA</h6>    
<h6>Délivré par :  <?php  echo $userData1['raisonSociale']; echo " "; ?>

  </div>
  <div class="col-md-8">
    <h2 class="text-center arial" > BON DE COMMANDE</h2>
    <h4 class="text-center arial" >(Facture à déposer le 25 de chaque mois)</h4>
    <h3>M. / Mm. : <?php echo "Prénom  : "; echo $userData['prenomEmployer']; echo " "; echo " Nom : "; echo $userData['nomEmployer']; echo " | Code  : "; echo $userData['codeemployer']; ?></h6>
    <h6>A  <?php echo "Prénom  : "; echo $userData['prenomEmployer']; echo " "; echo " Nom : "; echo $userData['nomEmployer']; echo " | Code  : "; echo $userData['codeemployer']; ?>
    </h6>
  </div>
</div>




<table id="border" class="padding" style="width:100%">
  <tr> 
    <td></td>
    <td class="medi"><?php if (($userData['med1'])) {  echo $userData['med1']; } else {  echo " ";}   ?></td>
    <td></td>
  </tr> 
  <tr> 
    <td></td>
    <td class="medi"><?php if (($userData['med2'])) {  echo $userData['med2']; } else {  echo " ";}   ?></td>
    <td></td>
  </tr> 
  <tr> 
    <td></td>
    <td class="medi"><?php if (($userData['med3'])) {  echo $userData['med3']; } else {  echo " ";}?></td>
    <td></td>
  </tr> 
  <tr> 
    <td></td>
    <td class="medi"><?php if (($userData['med4'])) {  echo $userData['med4']; } else {  echo " ";} ?></td>
    <td></td>
  </tr> 
  <tr> 
    <td></td>
    <td class="medi"><?php if (($userData['med5'])) {  echo $userData['med5']; } else {  echo "SS ";} ?></td>
    <td></td>
  </tr> 
  <tr> 
    <td></td>
    <td class="medi"><?php if (($userData['med6'])) {  echo $userData['med6']; } else {  echo " ";} ?></td>
    <td></td>
  </tr> 
  <tr> 
    <td></td>
    <td class="medi"><?php if (($userData['med7'])) {  echo $userData['med7']; } else {  echo " ";} ?></td>
    <td></td>
  </tr> 
  <tr> 
    <td></td>
    <td class="medi"><?php if (($userData['med8'])) {  echo $userData['med8']; } else {  echo " ";}?></td>
    <td></td>
  </tr> 
  <tr> 
    <td></td>
    <td class="medi"><?php if (($userData['med9'])) {  echo $userData['med9']; } else {  echo " ";}?></td>
    <td></td>
  </tr> 
  <tr> 
    <td></td>
    <td class="medi"><?php if (($userData['med10'])) {  echo $userData['med10']; } else {  echo " ";}?></td>
    <td></td>
  </tr> 
</table>
<h6 >Ziguinchor le : <?php echo $userData['bon_datecreated']; ?></h6> 
<h6 class="row"><span class="col-md-4 "> <?php echo "Raison sociale: "; echo $userData['raisonSociale'];   ?></span> <span class="col-md-4 arial text-center"> Signature et cachet IPMIEZ</span>
<span class="col-md-4 arial text-right">Le réceptionneiste</span></h6>         
<script type="text/javascript">
    window.print();
// function closeWindow() {
//     setTimeout(function() {
//     window.close();
//     }, 500);
//     }

//     window.onload = closeWindow();

</script>
</body>
</html>