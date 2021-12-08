<?php
   include_once '../../dao/database.php';

    $pdo =Database::connect(); //on se connecte à la base 
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); 
    $statement = $pdo->prepare("SELECT *, SUM(montant)AS montantsum, COUNT(idEmployer) AS nombre FROM entreprise, utilisateur, paiement, employer WHERE entreprise.idEntreprise=employer.employeur_id AND paiement.entreprise_id=entreprise.idEntreprise AND idEntreprise=:id  GROUP by idEntreprise");  
    $statement->execute(array(":id"=>$_GET['id']));  
    $userData=$statement->fetch(PDO::FETCH_ASSOC);

        $statement1 = $pdo->prepare("SELECT *, SUM(montant)AS montantsum, COUNT(idEmployer) AS nombre FROM entreprise, employer WHERE entreprise.idEntreprise=employer.employeur_id AND idEntreprise=:id  GROUP by idEntreprise");  
    $statement1->execute(array(":id"=>$_GET['id']));  
    $userData1=$statement1->fetch(PDO::FETCH_ASSOC);

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
 
  .numero{
    width: 15%;
  }
  .prenom{
    width: 45%;
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
    <h6 class="text-left padding">INSTITUTION DE PREVOYANCE MALADIE <br>INTER-ENTREPRISES DE ZIGUINCHOR (IPMIEZ)</h6><br><br>
    <h6><b>Tel :</b>  33 991 51 33 /  77 529 62 66 </h6>
<h6 class="">Rue Générale DEGAULLE X FODE KABA DOUMBOUYA</h6>    

  </div>
  <div class="col-md-8">
    <h2 class="text-center arial" >ETAT MENSUEL<br> COTISATION ET REMBOURSEMENT<br> FRAIS MEDICAUX</h2>
    <!-- <h4 class="text-center arial" >(Facture à déposer le 25 de chaque mois)</h4> -->
  </div>
</div>

<div class="row">
  <h6 class="col-md-4">Raison sociale et adresse de l'employeur : </h6><h6 class="col-md-8"> <?php  echo $userData['raisonSociale']; echo " "; ?></h6>
  <h6 class="col-md-4">Mois de cotisation : </h6><h6 class="col-md-8"> <?php  echo $userData['periodec']; echo " "; ?></h6>
  <h6 class="col-md-4"><u>NB</u>  : Le salaire mensuel soumis à cotisation est plafoné à 200 000 FCFA</h6>
</div>
<?php 

    $statement = $pdo->prepare("SELECT * FROM entreprise, employer, bondecommande WHERE entreprise.idEntreprise=bondecommande.idstructure or employer.codeemployer=bondecommande.id_parent_p AND codeemployer=:codeemployer");  
    $statement->execute(array(":codeemployer"=>$_GET['id']));  
    $userData=$statement->fetch(PDO::FETCH_ASSOC);
    $struc=$userData['matriculeEntreprise'];
    echo $struc;

     ?>


<table id="border" class="left padding" style="width:100%">
  <tr> 
    <td class="numero center"><h4>N°</h4></td>
    <td class="numero center"><h4>INDICES</h4></td>
    <td class="prenom center"><h4>PRENOMS ET NOMS</h4></td>
    <td class="prenom center"><h4>Montant <br> Factures et <br> Honnoraires</h4></td>
    <td class="prenom center"><h4>Prise en <br>charge <br> IPM</h4></td>
    <td class="prenom center"><h4>Prise en <br>charge <br> participant</h4></td>
     <?php 
     $created_bon=date("Y-m");
    $statement = $pdo->prepare("SELECT * FROM entreprise, employer, bondecommande WHERE entreprise.idEntreprise=employer.employeur_id AND employer.codeemployer=bondecommande.id_parent_p AND codeemployer=:codeemployer");  
    $statement->execute(array(":codeemployer"=>$_GET['id']));  
    $result = $statement->fetchAll();
                       
    foreach ($result as $row){
    echo '<tr>';
     ?>
    <tr>
      <td class="center">
        <?php if (($row['codeemployer'])) {  echo $row['codeemployer_ancien']; echo " / ";  echo $row['codeemployer']; } else {  echo " ";}   ?>
      </td>
      <td class="center">
        <?php if (($row['matriculeEntreprise'])) {  echo $row['matriculeEntreprise'];  } else {  echo " ";}   ?>
      </td>
      <td class="center">
        <?php if (($row['nomEmployer'])) {  echo $row['prenomEmployer']; echo " "; echo $row['nomEmployer']; } else {  echo " ";}   ?>
      </td>
      <td class="center">
        <?php if (($row['total_bon'])) {  echo $row['total_bon'];} else {  echo " ";}   ?>
      </td>
      <td class="center">
        <?php if (($row['total_ipm'])) {  echo $row['total_ipm'];} else {  echo " ";}   ?>
      </td>
      <td class="center">
        <?php if (($row['total_parent'])) { echo $row['total_parent']; } else {  echo " ";}   ?>
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