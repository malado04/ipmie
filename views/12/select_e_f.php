<!DOCTYPE html>
<html>
<head>
  <title></title>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
<link rel="icon" type="icon" href="../../img/IPMIEZ.png">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> 
<link rel="stylesheet" type="text/css" href="../../bootstrap/cdncss/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../../bootstrap/cdncss/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="../../bootstrap/cdncss/responsive.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="../../bootstrap/cdnjs/jquery-3.3.1.js"></script>
<style type="text/css">
  .photo{
    width: 70%;
    height: 100%;
    background-color: gray;
  }
</style> 
</head>
<body>
<?php

include_once '../../dao/database.php';
$pdo = Database::connect();  

if (isset($_POST['id_beneficiaire_enf'])) {

   $id_beneficiaire_enf=$_POST['id_beneficiaire_enf'];
   $id_beneficiaire_fem="";

$stmt1 = $pdo->prepare("SELECT * FROM enfants WHERE idEnfants=:id_beneficiaire_enf");
$stmt1->execute(array(":id_beneficiaire_enf"=>$id_beneficiaire_enf));
$userRow1=$stmt1->fetch(PDO::FETCH_ASSOC);
 ?>

  <form action="process.php" method="post" class="">  
   <fieldset class="container " ><legend>Médicaments pour son enfant</legend>
    <input type="text" readonly="" class="form-control" name="id_beneficiaire_lui" value="<?php echo $_POST['id_beneficiaire_lui']; ?>">
    <input type="text" readonly="" class="form-control" name="id_beneficiaire_enf" value="<?php echo $userRow1['nomEnfants']; echo " "; echo $userRow1['prenomEnfants']; ?>">
    <input type="hidden" readonly="" class="form-control" name="id_fournisseur" value="<?php echo $_POST['id_fournisseur']; ?>">
<div class="row">
    <div class="col-md-5">
      <input list="medicament1" class="form-control"  placeholder="Médicament" name="medicament1">
      <datalist id="medicament1">
         <?php  $pdo =Database::connect();
                         $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); 
                         $statement = $pdo->prepare("SELECT * FROM medicament");  
                        $statement->execute(array());  
                        $result = $statement->fetchAll();
                        foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur 
                      ?>
            <option value="<?php echo $row['libelle'] ?>"><?php echo $row['libelle'] ?></option>
                      <?php 
                        }
                        Database::disconnect();  
                     ?> 
        </datalist>  <br>
        <input list="medicament2" class="form-control"  placeholder="Médicament" name="medicament2">
      <datalist id="medicament2">
         <?php  
                        foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur 
                      ?>
            <option value="<?php echo $row['libelle'] ?>"><?php echo $row['libelle'] ?></option>
                      <?php 
                        }
                        Database::disconnect();  
                     ?> 
      </datalist>  <br>
      <input list="medicament3" class="form-control"  placeholder="Médicament" name="medicament3">
      <datalist id="medicament3">
         <?php   
                        foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur 
                      ?>
            <option value="<?php echo $row['libelle'] ?>"><?php echo $row['libelle'] ?></option>
                      <?php 
                        }
                        Database::disconnect();  
                     ?> 
      </datalist>  <br>
      <input list="medicament4" class="form-control"  placeholder="Médicament" name="medicament4">
      <datalist id="medicament4">
         <?php   
                        foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur 
                      ?>
            <option value="<?php echo $row['libelle'] ?>"><?php echo $row['libelle'] ?></option>
                      <?php 
                        }
                      ?> 
      </datalist>  <br>
      <input list="medicament5" class="form-control"  placeholder="Médicament" name="medicament5">
      <datalist id="medicament5">
         <?php   
                        foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur 
                      ?>
            <option value="<?php echo $row['libelle'] ?>"><?php echo $row['libelle'] ?></option>
                      <?php 
                        }
                         
                     ?> 
      </datalist> 
    </div>
    <div class="col-md-5"> 
      <input list="medicament6" class="form-control"  placeholder="Médicament" name="medicament6">
      <datalist id="medicament6">
         <?php  
                        foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur 
                      ?>
            <option value="<?php echo $row['libelle'] ?>"><?php echo $row['libelle'] ?></option>
                      <?php 
                        }
                      ?> 
      </datalist>  <br>
      <input list="medicament7" class="form-control"  placeholder="Médicament" name="medicament7">
      <datalist id="medicament7">
         <?php  
                        foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur 
                      ?>
            <option value="<?php echo $row['libelle'] ?>"><?php echo $row['libelle'] ?></option>
                      <?php 
                        }
                      ?> 
      </datalist>  <br>
      <input list="medicament8" class="form-control"  placeholder="Médicament" name="medicament8">
      <datalist id="medicament8">
         <?php   
                        foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur 
                      ?>
            <option value="<?php echo $row['libelle'] ?>"><?php echo $row['libelle'] ?></option>
                      <?php 
                        }
                      ?> 
      </datalist>  <br>
      <input list="medicament9" class="form-control"  placeholder="Médicament" name="medicament9">
      <datalist id="medicament9">
         <?php   
                        foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur 
                      ?>
            <option value="<?php echo $row['libelle'] ?>"><?php echo $row['libelle'] ?></option>
                      <?php 
                        }
                      ?> 
      </datalist>  <br>
      <input list="medicament10" class="form-control"  placeholder="Médicament" name="medicament10">
      <datalist id="medicament10">
         <?php  
                        foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur 
                      ?>
            <option value="<?php echo $row['libelle'] ?>"><?php echo $row['libelle'] ?></option>
                      <?php 
                        }
                      ?> 
      </datalist> 

    </div><div class="col-md-2 photo">
      <img class="rounded-circle img1" src="../../img/enfant/<?php echo $userRow1['image']; ?>" alt="Photo de profil"><br><br> 
    </div>  </div>  

    <div class="modal-footer row">
            <div class="col-md-3">
              </div>
            <div class="col-md-4">
            <button type="submit" name="valide_e" class="btn btn-primary glyphicon glyphicon-save orange1 form-control" > Enregister !</button> 
          </div>
            <div class="col-md-4">
              <a href="./" class="btn btn-danger glyphicon glyphicon-log-out orange1 form-control" >Annuler</a>
          </div>
          </div>
    </form>
 <?php 

} else {

   $id_beneficiaire_enf= "";
   $id_beneficiaire_fem= $_POST['id_beneficiaire_fem'];
  $stmt1 = $pdo->prepare("SELECT * FROM epouses WHERE idEpouses=:id_beneficiaire_fem");
  $stmt1->execute(array(":id_beneficiaire_fem"=>$id_beneficiaire_fem));
  $userRow1=$stmt1->fetch(PDO::FETCH_ASSOC);


?>

  <form action="process.php" method="post" class="">   
   <fieldset class="container " ><legend>Médicaments pous sa femme</legend>
    <input type="text" readonly="" class="form-control" name="id_beneficiaire_lui" value="<?php echo $_POST['id_beneficiaire_lui']; ?>">
    <input type="text" readonly="" class="form-control" name="id_beneficiaire_fem" value="<?php echo $userRow1['nomEpouses']; echo " "; echo $userRow1['prenomEpouses']; ?>">

    <input type="text" readonly="" class="form-control" name="id_fournisseur" value="<?php echo $_POST['id_fournisseur']; ?>">
<div class="row">
<div class="row">
    <div class="col-md-5">
      <input list="medicament1" class="form-control"  placeholder="Médicament" name="medicament1">
      <datalist id="medicament1">
         <?php  $pdo =Database::connect();
                         $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); 
                         $statement = $pdo->prepare("SELECT * FROM medicament");  
                        $statement->execute(array());  
                        $result = $statement->fetchAll();
                        foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur 
                      ?>
            <option value="<?php echo $row['libelle'] ?>"><?php echo $row['libelle'] ?></option>
                      <?php 
                        }
                        Database::disconnect();  
                     ?> 
        </datalist>  <br>
        <input list="medicament2" class="form-control"  placeholder="Médicament" name="medicament2">
      <datalist id="medicament2">
         <?php  
                        foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur 
                      ?>
            <option value="<?php echo $row['libelle'] ?>"><?php echo $row['libelle'] ?></option>
                      <?php 
                        }
                        Database::disconnect();  
                     ?> 
      </datalist>  <br>
      <input list="medicament3" class="form-control"  placeholder="Médicament" name="medicament3">
      <datalist id="medicament3">
         <?php   
                        foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur 
                      ?>
            <option value="<?php echo $row['libelle'] ?>"><?php echo $row['libelle'] ?></option>
                      <?php 
                        }
                        Database::disconnect();  
                     ?> 
      </datalist>  <br>
      <input list="medicament4" class="form-control"  placeholder="Médicament" name="medicament4">
      <datalist id="medicament4">
         <?php   
                        foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur 
                      ?>
            <option value="<?php echo $row['libelle'] ?>"><?php echo $row['libelle'] ?></option>
                      <?php 
                        }
                      ?> 
      </datalist>  <br>
      <input list="medicament5" class="form-control"  placeholder="Médicament" name="medicament5">
      <datalist id="medicament5">
         <?php   
                        foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur 
                      ?>
            <option value="<?php echo $row['libelle'] ?>"><?php echo $row['libelle'] ?></option>
                      <?php 
                        }
                         
                     ?> 
      </datalist> 
    </div>
    <div class="col-md-5"> 
      <input list="medicament6" class="form-control"  placeholder="Médicament" name="medicament6">
      <datalist id="medicament6">
         <?php  
                        foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur 
                      ?>
            <option value="<?php echo $row['libelle'] ?>"><?php echo $row['libelle'] ?></option>
                      <?php 
                        }
                      ?> 
      </datalist>  <br>
      <input list="medicament7" class="form-control"  placeholder="Médicament" name="medicament7">
      <datalist id="medicament7">
         <?php  
                        foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur 
                      ?>
            <option value="<?php echo $row['libelle'] ?>"><?php echo $row['libelle'] ?></option>
                      <?php 
                        }
                      ?> 
      </datalist>  <br>
      <input list="medicament8" class="form-control"  placeholder="Médicament" name="medicament8">
      <datalist id="medicament8">
         <?php   
                        foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur 
                      ?>
            <option value="<?php echo $row['libelle'] ?>"><?php echo $row['libelle'] ?></option>
                      <?php 
                        }
                      ?> 
      </datalist>  <br>
      <input list="medicament9" class="form-control"  placeholder="Médicament" name="medicament9">
      <datalist id="medicament9">
         <?php   
                        foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur 
                      ?>
            <option value="<?php echo $row['libelle'] ?>"><?php echo $row['libelle'] ?></option>
                      <?php 
                        }
                      ?> 
      </datalist>  <br>
      <input list="medicament10" class="form-control"  placeholder="Médicament" name="medicament10">
      <datalist id="medicament10">
         <?php  
                        foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur 
                      ?>
            <option value="<?php echo $row['libelle'] ?>"><?php echo $row['libelle'] ?></option>
                      <?php 
                        }
                      ?> 
      </datalist> 

    </div> <div class="col-md-2 photo">
      <img class="rounded-circle img1" src="../../img/epouse/<?php echo $userRow1['image']; ?>" alt="Photo de profil"><br><br> 
    </div>  </div> 


    <div class="modal-footer row">
            <div class="col-md-3">
              </div>
            <div class="col-md-4">
            <button type="submit" name="valide_f" class="btn btn-primary glyphicon glyphicon-save orange1 form-control" > Enregister !</button> 
          </div>
            <div class="col-md-4">
              <a href="./" class="btn btn-danger glyphicon glyphicon-log-out orange1 form-control" >Annuler</a>
          </div>
          </div>
    </form>
 <?php 

  # code...
}

 ?>



</body>
</html>