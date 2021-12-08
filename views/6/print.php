<!DOCTYPE html>
<html>
<head>
    <title>Impression de la facture</title>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../../apps/bootstrap/css/bootstrap.css">
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
    float: left;
    width: 5%;
  }
  .table{
    padding: 1%;
  }
  #border{
    border: none;
  }

  .border{

      background: transparent;
      border: none; 
       } 

  table > tr > td >.border{

      background: transparent;
      border: none; 
       } 
    .table, input
  {
      background: transparent;
      border: none;
  }
  .text-center{
    text-align: center;
  }
  hr{
    border: solid 1px;
  }
</style> 
</head>
<body>
  <?php
include 'DB.php';
 $db = new DB();
$userData = $db->getRows('paiement, entreprise',array('where'=>array('paiement.entreprise_id=entreprise.idEntreprise AND idpaiement'=>$_GET['id']),'return_type'=>'single'));
if(!empty($userData)){
?>
<div  style="padding: 5px; margin-left: 3px ; width: 100%; margin-right: 2px">
              
<h4 class="text-center" style="width: 100%;"> RECEPISSE D'UN REGLEMENT</h4>
<table id="border" class="padding" style="width:100%">
   <tr> <td><img src="IPMIEZ.png"></td>
  </tr>
  <tr><td></td></tr>
</table><br>
<table class="padding" style="width:100%">

  <tr>
    <td>   <h6 class="text-left padding">INSTITUTION DE PREVOYANCE MALADIE <br>INTER-ENTREPRISES DE ZIGUINCHOR (IPMIEZ)</h6>
</td> 
  </tr>
  <tr>
    <td>   <h5><b>Tel :</b>  33 991 51 33 /  77 529 62 66 </h5>
</td> 
  </tr>
  <tr>
    <td>   Rue Générale DEGAULLE X FODE KABA DOUMBOUYA
</td>
</tr>
<tr> 
<td  style=" width: 100%;"> <h5 class="text-left"> ESE <br>Matricule : <?php echo $userData['matriculeEntreprise']; echo "<br/> "; echo "Raison sociale: "; echo $userData['raisonSociale']; echo "<br/> "; echo "Sigle Entreprise: ";  echo $userData['sigleEntreprise']; ?> </h5>
</td></tr>
<tr>
  <td style="width: 100%;">  
    <h5 class="text-left" style="margin-left: 15%;"> Date réglement :
          <input type="text" value="<?php echo $userData['createad']; ?>"></h5>

  <h5 class="text-left" style="margin-left: 15%;"> Numéro reçu : <input type="text" value="<?php echo $userData['recu']; ?>"></h5>
</td></tr>
<tr></tr>
<tr></tr>
<tr></tr>  
</table>  
  
<table id="entreprise" class=" table-bordered" style="padding: 0%; text-align: left;width: 100%;">
   <thead style="width: 100%;">
    <tr style="width: 100% !important;">
      <th >Payements</th>
      <th >Période </th>
      <th>Montant </th>
      <th >Reférence cheque </th>
      <th >Timbre </th>
  </tr>
    </thead>
    <tbody>
      <tr>
        <td>Cotisation</td>
        <td> 
            <input type="text" value="<?php echo $userData['periodec'];  echo " ";  echo $userData['datec']; ?>"> 
        </td>
        <td> 
            <input type="text"  value="<?php echo $userData['cotisation']; ?>">
        </td>
        <td> 
            <input type="text"  value="<?php echo $userData['banqueclient']; ?>">
          
         </td>   
        <td> 
         </td>  
      </tr>
      <tr>
      <td>Remboursement</td> 
        <td> 
            <input type="text" value="<?php echo $userData['perioder'];   echo " ";  echo $userData['dater'];?>"> 
        </td>
        <td> 
            <input type="text" value="<?php echo $userData['remboursement']; ?>">
        </td>
        <td> 
            <input type="text"  value="<?php echo $userData['refcheque']; echo " "; echo $userData['valeurrefcheque']; ?>">
          
         </td> 
        <td> 
         </td> 
    </tr>
      <tr>
      <td>Total payé</td> 
        <td> 
         </td>
        <td> 
            <input type="text"  value="<?php echo $userData['cotisation']+$userData['remboursement']; ?>">
        </td>
        <td> 
         </td> 
        <td> 
         </td> 
    </tr> 
    </tbody>
  </table>
  <table id="border" class="padding" style="width:100%">
    <tr><td></td></tr>
    <tr> <td class="text-right"><u >Signature IPM-IEZ</u></td>
  </tr>
 
</table>
    

           <br><br><br><br><br><br> 
--------------------------------------------------------------------------------------------------------------------------------------------------------------

<div  style="padding: 5px; margin-left: 3px ; width: 100%; margin-right: 2px">
              
<h4 class="text-center" style="width: 100%;"> RECEPISSE D'UN REGLEMENT</h4>
<table id="border" class="padding" style="width:100%">
   <tr> <td><img src="IPMIEZ.png"></td>
  </tr>
  <tr><td></td></tr>
</table><br>
<table class="padding" style="width:100%">

  <tr>
    <td>   <h6 class="text-left padding">INSTITUTION DE PREVOYANCE MALADIE <br>INTER-ENTREPRISES DE ZIGUINCHOR (IPMIEZ)</h6>
</td> 
  </tr>
  <tr>
    <td>   <h5><b>Tel :</b>  33 991 51 33 /  77 529 62 66 </h5>
</td> 
  </tr>
  <tr>
    <td>   Rue Générale DEGAULLE X FODE KABA DOUMBOUYA
</td>
</tr>
<tr> 
<td  style=" width: 100%;"> <h5 class="text-left"> ESE <br>Matricule : <?php echo $userData['matriculeEntreprise']; echo "<br/> "; echo "Raison sociale: "; echo $userData['raisonSociale']; echo "<br/> "; echo "Sigle Entreprise: ";  echo $userData['sigleEntreprise']; ?> </h5>
</td></tr>
<tr>
  <td style="width: 100%;">  
    <h5 class="text-left" style="margin-left: 15%;"> Date réglement :
          <input type="text" value="<?php echo $userData['createad']; ?>"></h5>

  <h5 class="text-left" style="margin-left: 15%;"> Numéro reçu : <input type="text" value="<?php echo $userData['recu']; ?>"></h5>
</td></tr>
<tr></tr>
<tr></tr>
<tr></tr>  
</table> 
  
<table id="entreprise" class=" table-bordered" style="padding: 0%; text-align: left;width: 100%;">
   <thead style="width: 100%;">
    <tr style="width: 100% !important;">
      <th >Payements</th>
      <th >Période </th>
      <th>Montant </th>
      <th >Reférence cheque </th>
      <th >Timbre </th>
  </tr>
    </thead>
    <tbody>
      <tr>
        <td>Cotisation</td>
        <td> 
            <input type="text" value="<?php echo $userData['periodec'];  echo $userData['datec']; ?>"> 
        </td>
        <td> 
            <input type="text"  value="<?php echo $userData['cotisation']; ?>">
        </td>
        <td> 
            <input type="text"  value="<?php echo $userData['banqueclient']; ?>">
          
         </td>   
        <td> 
         </td>  
      </tr>
      <tr>
      <td>Remboursement</td> 
        <td> 
            <input type="text" value="<?php echo $userData['perioder']; echo $userData['dater'];   ?>"> 
        </td>
        <td> 
            <input type="text" value="<?php echo $userData['remboursement']; ?>">
        </td>
        <td> 
            <input type="text"  value="<?php echo $userData['refcheque']; echo " "; echo $userData['valeurrefcheque']; ?>">
          
         </td> 
        <td> 
         </td> 
    </tr>
      <tr>
      <td>Total payé</td> 
        <td> 
         </td>
        <td> 
            <input type="text"  value="<?php echo $userData['cotisation']+$userData['remboursement']; ?>">
        </td>
        <td> 
         </td> 
        <td> 
         </td> 
    </tr> 
    </tbody>
  </table>
  <table id="border" class="padding" style="width:100%">
    <tr><td></td></tr>
    <tr> <td class="text-right"><u >Signature IPM-IEZ</u></td>
  </tr>
 
</table>

<?php } ?>
</div>
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