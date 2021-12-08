<?php
   include_once '../../dao/database.php';

    $pdo =Database::connect(); //on se connecte à la base 
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); 
   
 

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
    <h2 class="text-center arial" >ETAT TRIMESTRIEL<br> COTISATION ET REMBOURSEMENT<br> FRAIS MEDICAUX</h2>
    <!-- <h4 class="text-center arial" >(Facture à déposer le 25 de chaque mois)</h4> -->
  </div>
</div>

<?php
   include_once '../../dao/database.php';
   $pdo =Database::connect(); //on se connecte à la base 

 

        $statement1 = $pdo->prepare("SELECT *, SUM(montant)AS montantsum, COUNT(idEmployer) AS nombre FROM entreprise, employer,  paiement WHERE entreprise.idEntreprise=employer.employeur_id AND idEntreprise=:id  GROUP by idEntreprise");  
    $statement1->execute(array(":id"=>$_GET['id']));  
    $userData1=$statement1->fetch(PDO::FETCH_ASSOC);

 ?>
<div class="row">
  <h6 class="col-md-4">Raison sociale et adresse de l'employeur : </h6><h4 class="col-md-8"> <b><i><?php  echo $userData1['raisonSociale']; echo " "; ?></i></b></h4>
  <h6 class="col-md-4">Période de cotisation : </h6><h6 class="col-md-8"> <?php  echo "Trimestre";  echo " / ";   echo "...................."; ?></h6>
  <h6 class="col-md-4"><u>NB</u>  : Le salaire mensuel soumis à cotisation est plafoné à 200 000 FCFA</h6>
</div>


<table id="border" class="left padding" style="width:70%">
  <tr> 
    <td class="numero center"><h4>N°</h4></td>
    <td class="prenom center"><h4>PRENOMS ET NOMS</h4></td>
    <td class="center"><h4>SALAIRE BRUT <br> SOUMIS à <br> COTISATION</h4></td> 
     <?php 
    $statement = $pdo->prepare("SELECT * FROM entreprise, employer WHERE entreprise.idEntreprise=employer.employeur_id  AND idEntreprise=:id  GROUP by idEmployer");  
    $statement->execute(array(":id"=>$_GET['id']));  
    $result = $statement->fetchAll();
                       
    foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur retournée
    echo '<tr>';
     ?>
  <tr> 
    <td class="center"><br><?php if (($row['codeemployer'])) {  echo $row['matriculeEntreprise']; echo " / "; echo $row['codeemployer']; } else {  echo " ";}   ?></td>
    <td class="center"><br><?php if (($row['nomEmployer'])) {  echo $row['prenomEmployer']; echo " "; echo $row['nomEmployer']; } else {  echo " ";}   ?></td>
    <td class="center"><br><?php if (($row['montant'])) {  echo $row['montant']; } else {  echo " ";}   ?></td>

  </tr>  
  <?php 
        echo '</tr>'; 
                        }
                        Database::disconnect();  
                     ?>  
  <tr> 
    <td colspan="2"><b><br>Total salaire soumis à cotisation</b></td>
    <td class="center"><br><?php echo $userData1['montantsum']*3; ?></td>
  </tr>  
  <tr> 
    <td colspan="2"><b><br><br>Par employeur 3,5 % </b> </td>
    <td class="center"><br><br><?php echo ($userData1['montantsum']*3.5/100)*3; ?></td>
   </tr>    
  <tr> 
    <td colspan="2"><b><br><br>Par salariés 3,5 % </b> </td>
    <td class="center"><br><br><?php echo ($userData1['montantsum']*3.5/100)*3; ?></td>
  </tr>    
  <tr> 
    <td colspan="2"><b><br><br>Taux de cotisations dues 7 % </b> </td>
    <td class="center"><br><br><?php echo ($userData1['montantsum']*7/100)*3; ?></td>
  </tr>  
  <tr> 
    <td colspan="2"><b><br><br>Total </b> </td>
    <td class="center"><br><br><?php echo ($userData1['montantsum']*7/100)*3; ?></td>
  </tr>    
<!--   <tr> 
    <td colspan="2"><b><br><br>Réglé cotisations </b> </td>
    <td class="center"><br><br><?php //echo $userData1['montantsum']*7/100 ?></td>
  </tr>   
  <tr> 
    <td colspan="2"><b><br><br>Du cotisations</b> </td>
    <td class="center"><br><br><?php echo $userData1['montantsum']*7/100 ?></td>
  </tr>  
    <td colspan="2"><b><br><br>TOTAL DU</b> </td>
    <td class="center"><br><br><?php echo $userData1['montantsum']*7/100 ?></td>
  </tr>   -->
</table>


<table id="border" class="right padding" style="width:25%">
  <tr>  
    <td><h4><br><br>N° Employeur :  <?php echo " "; echo $userData1['matriculeEntreprise'] ?></h4> <br><br><br><br><br> Nombre de cotisants : <?php if (($userData1['nombre'])) {  echo $userData1['nombre']; } else {  echo " ";}    ?> 
   <br><br><br> Mode de paiement  :<br><br> <?php if (($userData1['banqueclient'])) {  echo $userData1['banqueclient']; echo "  / "; echo $userData1['valeurrefcheque']; } else {  echo " ";}    ?> 
  <br><br><br> Décharge certifiée par: (IPM-IEZ)  : <?php if (($userData1['banqueclient'])) {  echo $userData1['banqueclient']; echo "  / "; echo $userData1['valeurrefcheque']; } else {  echo " ";}    ?>
  <br><br><br><br><br> <br>Du :
  <br><br><br><br><br> <br>Signature et chachet employeur 
  <br><br><br><br><br> <br><h6 >Ziguinchor le : <?php echo date('d / m / Y ') ?></h6>
</td>
  </tr>  
</table>
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