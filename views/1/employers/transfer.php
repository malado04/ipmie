<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../../../bootstrap/cdncss/bootstrap.css">
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="../../../bootstrap/cdnjs/jquery-3.3.1.js"></script> 
<style type="text/css">
 
  body{
    background-color: rgba(0,0,0,0.5);
  }
</style>
</head>
<body>
<?php 
include_once('../../../dao/database.php');
$pdo = Database::connect();  
$stmt = $pdo->prepare("SELECT * FROM employer WHERE idEmployer=:id");
$stmt->execute(array(":id"=>$_GET['id']));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC); 

 ?>
<!-- <div class="rgba">sssssssss</div> -->
<!-- <img class="img-fluid" src="../../../img/IPMIEZ.png"> -->
<div class="container">           
  <div class="" id="transferEmployer" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" style="max-width: 1000px!important;"  role="document">
    <div class="modal-content"> 
      <div class="modal-header navbar bg-primary text-white "> 
      <h3 class="labelh">Modification d'un employer </h3>       
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
        </div> 
    <form action="process.php" method="post">  
     
   <div class="modal-body row">    
  <div class="col-md-12">
      <input list="id_parentliste" type="text" class="form-control" name="identreprise" id="identreprise" placeholder="Choisir une entreprise pour le transfer" required="">
      <datalist id="id_parentliste">
      <?php  
      include_once '../../dao/database.php';
      $pdo =Database::connect();
      $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); 
      $statement = $pdo->prepare("SELECT * FROM entreprise ORDER BY idEntreprise DESC");  
      $statement->execute(array());  
      $result = $statement->fetchAll();
      foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur 
      ?>
      <option value="<?php echo $row['idEntreprise']; ?>">
        <?php  echo $row['matriculeEntreprise']; " /  "; echo $row['raisonSociale']; ?></option>
      <?php 
      }
      Database::disconnect();  
      ?> 
      </datalist>  <br>
  </div>     
    <div class="col-md-6">
    <label>CNI de l'employer</label>
    <input type="number" name="cniemployermod" id="cniemployermod" class="form-control" value="<?php echo $userRow['cniemployer']; ?>"  placeholder="CNI de l'employer" required /> <br/> 
    <label>Nom de l'employer</label>
    <input type="text" name="nomemployermod" id="nomemployermod" class="form-control"  value="<?php echo $userRow['nomEmployer']; ?>" placeholder="Nom de l'employer" required /> <br/> 
    <label>Prénom de l'employer</label>
    <input type="text" name="prenomemployermod" id="prenomemployermod" class="form-control"  value="<?php echo $userRow['prenomEmployer']; ?>" placeholder="Prénom de l'employer" required /><br/> 
    <label>Tel fixe de l'employer</label>
    <input type="number" name="telEmployermod" id="telEmployer"mod class="form-control"  value="<?php echo $userRow['telEmployer']; ?>" placeholder="Tel fixe  de l'employer" required /> 
    </div>    
    <div class="col-md-6">
    <label>Email de l'employer</label>
    <input type="email" name="email" id="emailmod" class="form-control"  value="<?php echo $userRow['emailEmployer']; ?>" placeholder="Email de l'employer" required />  
    <br/>  
    <label>Nombre d'enfant de l'employer</label>
    <input type="text" name="nombreEnfantEmployermod" id="nombreEnfantEmployer" class="form-control"  value="<?php echo $userRow['nombreEnfantEmployer']; ?>" placeholder="Nombre d'enfant de l'employer" required /> <br/> 
    <label>Nombre d'épouses de l'employer</label>
    <input type="text" name="nombreEpousesEmployermod" id="nombreEpousesEmployer" class="form-control"  value="<?php echo $userRow['nombreEpousesEmployer']; ?>" placeholder="Nombre d'épouses de l'employer" required /> <br/> 
    <label>Salaire</label>
    <input type="text" name="montant" id="montant" class="form-control"  value="<?php echo $userRow['montant']; ?>" placeholder="Salaire de l'employer" required />  <br/> 
    </div>
   </div> 
        <div class="modal-footer row  bg-primary text-white">
          <div class="col-md-5">
          </div>
          <div class="col-md-3">
            <input type="hidden" id="iduser" name="iduser" value="<?php echo $userRow['idEmployer']; ?>">
              <button type="submit" name="transferEmployer" class="btn btn-primary glyphicon glyphicon-save orange1 form-control" > Enregister !</button> 
          </div>
          <div class="col-md-3">
              <!-- <button type="button" class="btn btn-danger glyphicon glyphicon-log-out orange1 form-control" data-dismiss="modal"> Annuler</button> -->
              <a class="btn btn-danger glyphicon glyphicon-log-out orange1 form-control" href="./">Retour</a>
          </div>
        </div>
    </form>
    </div>
    </div> 
    </div>
    </div>  
 

</body>
</html>