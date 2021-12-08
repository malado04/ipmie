<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../../../bootstrap/cdncss/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../style.css">
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
$stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE id=:id");
$stmt->execute(array(":id"=>$_GET['id']));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

 ?>
<!-- <div class="rgba">sssssssss</div> -->
<!-- <img class="img-fluid" src="../../../img/IPMIEZ.png"> -->
<div class="container">           
  <div class="" id="modifierEmployeur" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" style="max-width: 1000px!important;"  role="document">
    <div class="modal-content"> 
      <div class="modal-header navbar orange "> 
      <h3 class="labelh">Modification d'un employeur </h3>       
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
        </div> 
    <form action="process.php" method="post">  
     
   <div class="modal-body row">         
    <div class="col-md-6">
    <label>CNI de l'employeur</label>
    <input type="number" name="cniemployeur" id="cniemployeurmod" class="form-control" value="<?php echo $userRow['cni']; ?>"  placeholder="CNI de l'employeur" required /> <br/> 
    <label>Nom de l'employeur</label>
    <input type="text" name="nomemployeur" id="nomemployeurmod" class="form-control"  value="<?php echo $userRow['nom']; ?>" placeholder="Nom de l'employeur" required /> <br/> 
    <label>Prénom de l'employeur</label>
    <input type="text" name="prenomemployeur" id="prenomemployeurmod" class="form-control"  value="<?php echo $userRow['prenom']; ?>" placeholder="Prénom de l'employeur" required /><br/> 
    <label>Tel fixe de l'employeur</label>
    <input type="number" name="telfixemployeur" id="telfixemployeur"mod class="form-control"  value="<?php echo $userRow['telFixe']; ?>" placeholder="Tel fixe  de l'employeur" required /> <br/> 
    <label>Tel portable de l'employeur</label>
    <input type="number" name="telportemployeur" id="telportemployeurmod" class="form-control"  value="<?php echo $userRow['telPortable']; ?>" placeholder="Tel fixe  de l'employeur" required /> 
  </div> 
    <div class="col-md-6"> 
    <label>Commune de l'employeur</label>
    <input type="text" name="commune" id="communemod" class="form-control"  value="<?php echo $userRow['adresseCommune']; ?>" placeholder="Commune de l'employeur" required /><br/> 
    <label>Quartier de l'employeur</label>
    <input type="text" name="quartier" id="quartiermod" class="form-control"  value="<?php echo $userRow['adresse']; ?>" placeholder="Quartier de l'employeur" required /> <br/> 
    <label>Email de l'employeur</label>
    <input type="email" name="email" id="emailmod" class="form-control"  value="<?php echo $userRow['email']; ?>" placeholder="Email de l'employeur" required />  
    <br/>  
    <label>Login de l'employeur</label>
    <input type="text" name="login" id="loginmod" class="form-control"  value="<?php echo $userRow['login']; ?>" placeholder="Login de l'employeur" required /> <br/> 
    <label>Mot de passe de l'employeur</label>
    <input type="text" name="password" id="passwordmod" class="form-control"  value="<?php echo $userRow['password']; ?>" placeholder="Mot de passe de l'employeur" required />  <br/> 
    </div>
   </div> 
        <div class="modal-footer row">
          <div class="col-md-5">
          </div>
          <div class="col-md-3">
            <input type="hidden" id="iduser" name="iduser" value="<?php echo $userRow['id']; ?>">
              <button type="submit" name="modifierEmployeur" class="btn btn-primary glyphicon glyphicon-save orange1 form-control" > Enregister !</button> 
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