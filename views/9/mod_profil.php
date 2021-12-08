<div class="row">           
  <div class="modal fade" id="modifierEmployeur" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" style="max-width: 1000px!important;"  role="document">
    <div class="modal-content"> 
      <div class="modal-header navbar orange "> 
      <h3 class="labelh">Modifier mes informations personnelles </h3>       
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
        </div> 
    <form action="processMod.php" method="post">  
     
   <div class="modal-body row">         
    <div class="col-md-6">
    <!-- <label>Image</label> -->
    <!-- <input type="file" name="image" id="image" class="form-control" value="<?php echo $userRow['cni']; ?>" required /> <br/>  -->
    <label>CNI de l'utilisateur</label>
    <input type="number" name="cniemployeurmod" id="cniemployeurmod" class="form-control" value="<?php echo $userRow['cni']; ?>"  placeholder="CNI de l'utilisateur" required /> <br/> 
    <label>Nom de l'utilisateur</label>
    <input type="text" name="nomemployeurmod" id="nomemployeurmod" class="form-control"  value="<?php echo $userRow['nom']; ?>" placeholder="Nom de l'utilisateur" required /> <br/> 
    <label>Prénom de l'utilisateur</label>
    <input type="text" name="prenomemployeurmod" id="prenomemployeurmod" class="form-control"  value="<?php echo $userRow['prenom']; ?>" placeholder="Prénom de l'utilisateur" required /><br/> 
    <label>Tel fixe de l'utilisateur</label>
    <input type="number" name="telfixemployeurmod" id="telfixemployeur"mod class="form-control"  value="<?php echo $userRow['telFixe']; ?>" placeholder="Tel fixe  de l'utilisateur" required /> 
    <label>Tel portable de l'utilisateur</label>
    <input type="number" name="telportemployeurmod" id="telportemployeurmod" class="form-control"  value="<?php echo $userRow['telPortable']; ?>" placeholder="Tel fixe  de l'utilisateur" required /> 
  </div> 
    <div class="col-md-6"> 
    <label>Commune de l'utilisateur</label>
    <input type="text" name="communemod" id="communemod" class="form-control"  value="<?php echo $userRow['adresseCommune']; ?>" placeholder="Commune de l'utilisateur" required /><br>
    <label>Quartier de l'utilisateur</label>
    <input type="text" name="quartiermod" id="quartiermod" class="form-control"  value="<?php echo $userRow['adresse']; ?>" placeholder="Quartier de l'utilisateur" required /> <br/> 
    <label>Email de l'utilisateur</label>
    <input type="email" name="emailmod" id="emailmod" class="form-control"  value="<?php echo $userRow['email']; ?>" placeholder="Email de l'utilisateur" required />  
    <br/>  
    <label>Login de l'utilisateur</label>
    <input type="text" name="loginmod" id="loginmod" class="form-control"  value="<?php echo $userRow['login']; ?>" placeholder="Login de l'utilisateur" required /> <br/> 
    <label>Mot de passe de l'utilisateur</label>
    <input type="text" name="passwordmod" id="passwordmod" class="form-control"  value="<?php echo $userRow['password']; ?>" placeholder="Mot de passe de l'utilisateur" required />  <br/> 
    </div>
   </div> 
        <div class="modal-footer row">
          <div class="col-md-5">
          </div>
          <div class="col-md-3">
            <input type="hidden" id="iduser" name="iduser" value="<?php echo $userRow['id']; ?>">
              <button type="submit" name="modifierProfil" class="btn btn-primary glyphicon glyphicon-save orange1 form-control" > Enregister !</button> 
          </div>
          <div class="col-md-3">
              <button type="button" class="btn btn-danger glyphicon glyphicon-log-out orange1 form-control" data-dismiss="modal"> Annuler</button>
              <!-- <a class="btn btn-danger glyphicon glyphicon-log-out orange1 form-control" href="interompu.php">Retour</a> -->
          </div>
        </div>
    </form>
    </div>
    </div> 
    </div>
    </div>  
 
 <div class="row">           
  <div class="modal fade" id="modifierImage" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" style="max-width: 1000px!important;"  role="document">
    <div class="modal-content"> 
      <div class="modal-header navbar orange "> 
      <h3 class="labelh">Modifier ma photo </h3>       
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
        </div> 
    <form action="processMod.php" method="post" enctype="multipart/form-data">  
     
   <div class="modal-body">         
    <img class="" src="../../img/Profil/<?php echo $userRow['image']; ?>">
    <label for="file-upload" class="custom-file-upload">
    <i class="fa fa-cloud-upload"></i> Télécharger une photo
</label>
<input type="file" id="image" name="image" class="form-control" required/> <br/> 
   </div> 
        <div class="modal-footer row">
          <div class="col-md-5">
          </div>
          <div class="col-md-3">
            <input type="hidden" id="iduser" name="iduser" value="<?php echo $userRow['id']; ?>">
              <button type="submit" name="modifierPhoto" class="btn btn-primary glyphicon glyphicon-save orange1 form-control" > Enregister !</button> 
          </div>
          <div class="col-md-3">
              <button type="button" class="btn btn-danger glyphicon glyphicon-log-out orange1 form-control" data-dismiss="modal"> Annuler</button>
              <!-- <a class="btn btn-danger glyphicon glyphicon-log-out orange1 form-control" href="interompu.php">Retour</a> -->
          </div>
        </div>
    </form>
    </div>
    </div> 
    </div>
    </div>  

    <!-- maladie -->
  <div class="row">           
  <div class="modal fade" id="idMaladieModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" style="max-width: 1000px!important;"  role="document">
    <div class="modal-content"> 
      <div class="modal-header navbar bg-primary text-white"> 
      <h3 class="labelh">Ajouter  une maladie </h3>       
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
        </div> 
    <form action="malad/process.php" method="post" enctype="multipart/form-data">  
     
   <div class="modal-body">         
  <input type="text" id="nom_maladie" name="nom_maladie" class="form-control" required/> <br/> 
   </div> 
    <div class="modal-footer row">
      <div class="col-md-5">
      </div>
      <div class="col-md-3">
          <button type="submit" name="modifierPhoto" class="btn btn-primary glyphicon glyphicon-save orange1 form-control" > Enregister !</button>
      </div>
      <div class="col-md-3">
          <button type="button" class="btn btn-danger glyphicon glyphicon-log-out orange1 form-control" data-dismiss="modal"> Annuler</button>
              <!-- <a class="btn btn-danger glyphicon glyphicon-log-out orange1 form-control" href="interompu.php">Retour</a> -->
      </div>
    </div>
    </form>
    </div>
    </div> 
    </div>
    </div>  

    <!-- maladie -->
  <div class="row">           
  <div class="modal fade" id="idPathoModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" style="max-width: 1000px!important;"  role="document">
    <div class="modal-content"> 
      <div class="modal-header navbar bg-primary text-white"> 
      <h3 class="labelh">Ajouter  un syntome </h3>       
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
        </div> 
    <form action="../syntom/process.php" method="post" enctype="multipart/form-data">  
     
   <div class="modal-body">       
   <label>Libelle syntome</label>  
  <input type="text" id="libelle_sy" name="libelle_sy" class="form-control" required/> <br/> 
   </div> 
    <div class="modal-footer row">
      <div class="col-md-5">
      </div>
      <div class="col-md-3">
          <button type="submit" name="syntome" class="btn btn-primary glyphicon glyphicon-save orange1 form-control" > Enregister !</button>
      </div>
      <div class="col-md-3">
          <button type="button" class="btn btn-danger glyphicon glyphicon-log-out orange1 form-control" data-dismiss="modal"> Annuler</button>
              <!-- <a class="btn btn-danger glyphicon glyphicon-log-out orange1 form-control" href="interompu.php">Retour</a> -->
      </div>
    </div>
    </form>
    </div>
    </div> 
    </div>
    </div>  

    <!-- Medic -->
  <div class="row">           
  <div class="modal fade" id="idMedicModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" style="max-width: 1000px!important;"  role="document">
    <div class="modal-content"> 
      <div class="modal-header navbar bg-primary text-white"> 
      <h3 class="labelh">Ajouter un médicament </h3>       
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
        </div> 
    <form action="../medic/process.php" method="post" enctype="multipart/form-data">  
     
   <div class="modal-body">         
    <label>Libelle du médicament</label>
  <input type="text" id="nom_medic" name="nom_medic" class="form-control" required/> <br/> 
  <label>Pris en charge par l'IPM</label>
  <select name="pris_en" id="pris_en" class="form-control">
    <option value="Oui">Oui</option>
    <option value="Non">Non</option>
  </select>
   </div> 
    <div class="modal-footer row">
      <div class="col-md-5">
      </div>
      <div class="col-md-3">
          <button type="submit" name="modifierPhoto" class="btn btn-primary glyphicon glyphicon-save orange1 form-control" > Enregister !</button>
      </div>
      <div class="col-md-3">
          <button type="button" class="btn btn-danger glyphicon glyphicon-log-out orange1 form-control" data-dismiss="modal"> Annuler</button>
              <!-- <a class="btn btn-danger glyphicon glyphicon-log-out orange1 form-control" href="interompu.php">Retour</a> -->
      </div>
    </div>
    </form>
    </div>
    </div> 
    </div>
    </div>  
 