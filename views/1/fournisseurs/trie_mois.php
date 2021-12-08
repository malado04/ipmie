<?php
   include_once '../../../dao/database.php';

    $pdo =Database::connect(); //on se connecte à la base 
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); 
    // $statement = $pdo->prepare("SELECT *, SUM(montant)AS montantsum, COUNT(idEmployer) AS nombre FROM fournisseur, utilisateur, paiement, employer WHERE fournisseur.idfournisseur=employer.employeur_id AND paiement.entreprise_id=fournisseur.idfournisseur AND paiement.entreprise_id=:id  GROUP by idfournisseur");  
    // $statement->execute(array(":id"=>$_GET['id']));  
    // $userData=$statement->fetch(PDO::FETCH_ASSOC);

    //     $statement1 = $pdo->prepare("SELECT *, SUM(montant)AS montantsum, COUNT(idEmployer) AS nombre FROM fournisseur, employer WHERE fournisseur.idfournisseur=employer.employeur_id AND paiement.entreprise_id=:id  GROUP by idfournisseur");  
    // $statement1->execute(array(":id"=>$_GET['id']));  
    // $userData1=$statement1->fetch(PDO::FETCH_ASSOC);

    $statement = $pdo->prepare("SELECT * FROM fournisseur, bondecommande WHERE fournisseur.idfournisseur=bondecommande.idstructure AND idfournisseur=:id");  
    $statement->execute(array(":id"=>$_GET['id']));  
    $userData=$statement->fetch(PDO::FETCH_ASSOC);
    $createad= $_GET['trie_mois']; 
    $out = explode('-', $createad);
    // $out1= $out[1];
 ?>
<!DOCTYPE html>
<html>
<head>
    <title>Impression de la facture</title>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../../../bootstrap/css/bootstrap.css">
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
 
  .numero{
    width: 7%;
  }
  .prenom{
    width: 23%;
  }
  .visite{
    width: 10%;
  }
  .center{
    text-align: center;
  }
  .left{
    float: left;
  }
  .right {
    float: left;
    margin-left: 5%;
  }
</style> 
</head>
<body>
<div class="row">
  <div class="col-md-4">
    <img class="img-fluid" src="IPMIEZ.png"><br><br>
    <h6 class="text-left padding">INSTITUTION DE PREVOYANCE MALADIE <br>INTER-fournisseurS DE ZIGUINCHOR (IPMIEZ)</h6><br><br>
    <h6><b>Tel :</b>  33 991 51 33 /  77 529 62 66 </h6>
<h6 class="">Rue Générale DEGAULLE X FODE KABA DOUMBOUYA</h6>    

  </div>
  <div class="col-md-8">
    <h2 class="text-center arial" >ETAT MENSUEL<br> COTISATION ET REMBOURSEMENT<br> FRAIS MEDICAUX</h2>
    <!-- <h4 class="text-center arial" >(Facture à déposer le 25 de chaque mois)</h4> -->
  </div>
</div>

<div class="row">
  <h2 class="col-md-12 center"><b><b>REMBOURSEMENT DU <?php  echo $out[1]; echo " "; ?> <sup>ème</sup> MOIS <?php  echo  $out[0]; echo " "; ?></b></b></h2>
  <h2 class="col-md-12 text-center">CLIENT : ---------<?php echo $userData['matriculefournisseur']; echo " / "; echo $userData['raisonSocialefournisseur']; ?></h2>
</div>


<table id="border" class="left padding" style="width:100%">
  <tr> 
    <td class="numero center"><h4>N°</h4></td>
    <td class="prenom center"><h4>PRENOMS ET NOMS</h4></td>
    <td class="visite center"><h4>Visite</h4></td>
    <td class="visite center"><h4>Dentiste</h4></td>
    <td class="visite center"><h4>Ordonn</h4></td>
    <td class="visite center"><h4>Tic</h4></td>
    <td class="visite center"><h4>Autres</h4></td>
    <td class="visite center"><h4>Total</h4></td>
    <td class="visite center"><h4>Retenues</h4></td>
     <?php 

    $statement = $pdo->prepare("SELECT *, SUM(montant)AS montantsum, COUNT(idEmployer) AS nombre FROM fournisseur, entreprise, employer, bondecommande WHERE entreprise.idEntreprise=employer.employeur_id AND bondecommande.id_parent_p=employer.codeemployer  AND idfournisseur=:id AND bondecommande.bon_mois=:bon_mois GROUP by idEntreprise");  
    $statement->execute(array(":id"=>$_GET['id'], ":bon_mois"=>$_GET['trie_mois']));  
    $result = $statement->fetchAll();
                       
    foreach ($result as $row){
    echo '<tr>';
     ?>
    <tr>
      <td class="center">
        <?php if (($row['codeemployer'])) {  echo $row['codeemployer']; echo " / "; echo $row['codeemployer']; } else {  echo " ";}   ?>
      </td>
      <td class="center">
        <?php if (($row['nomEmployer'])) {  echo $row['prenomEmployer']; echo " "; echo $row['nomEmployer']; } else {  echo " ";}   ?>
      </td>
      <td class="center">
        <?php if (($row['nomEmployer'])) {  echo $row['prenomEmployer']; echo " "; echo $row['nomEmployer']; } else {  echo " ";}   ?>
      </td>
      <td class="center">
        <?php if (($row['nomEmployer'])) {  echo $row['prenomEmployer']; echo " "; echo $row['nomEmployer']; } else {  echo " ";}   ?>
      </td>
      <td class="center">
        <?php if (($row['nomEmployer'])) {  echo $row['prenomEmployer']; echo " "; echo $row['nomEmployer']; } else {  echo " ";}   ?>
      </td>
      <td class="center">
        <?php if (($row['montant'])) {  echo $row['montant']; } else {  echo " ";}   ?>
      </td>
    </tr>  
  <?php 
    echo '</tr>'; 
      }
    Database::disconnect();  
?>   
</table>
<script type="text/javascript">
// window.print();

</script>
</body>
</html>