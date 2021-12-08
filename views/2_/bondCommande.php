<style type="text/css">
 
</style>
<div class="container">           
  <div class="modal fade" id="boncommande" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" style="max-width: 1150px!important;"  role="document">
    <div class="modal-content">
      <div class="modal-header navbar bg-primary row"> 
      <h3 class="labelh">Bon de commande</h3>       
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 

        </div> 
   <form action="processBon.php" method="POST" id="" class="container">
   <div class="modal-body row">

 <br>
  <div class="col-md-4">
      <input list="id_parentliste" type="text" class="form-control" name="idparent" id="idparent" placeholder="Parent prenant en charge le patient">
      <datalist id="id_parentliste">
      <?php  
      include_once '../../dao/database.php';
      $pdo =Database::connect();
      $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); 
      $statement = $pdo->prepare("SELECT * FROM entreprise, employer WHERE employer.employeur_id=entreprise.idEntreprise ORDER BY idEmployer DESC");  
      $statement->execute(array());  
      $result = $statement->fetchAll();
      foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur 
      ?>
      <option value="<?php echo $row['codeemployer']; ?>">
        <?php  echo $row['matriculeEntreprise']; echo " / ";  echo $row['codeemployer']; echo " "; echo $row['prenomEmployer']; echo " "; echo $row['nomEmployer']; ?></option>
      <?php 
      }
      Database::disconnect();  
      ?> 
      </datalist>  
  </div>
  <div class="col-md-4">
      <input list="idstructureliste" type="text" class="form-control" name="idstructure" id="idstructure" placeholder="Structure de santé de consultation / du labo d'analyse">
      <datalist id="idstructureliste">
      <?php  
      $statement1 = $pdo->prepare("SELECT * FROM entreprise ORDER BY idEntreprise DESC");  
      $statement1->execute(array());  
      $result1 = $statement1->fetchAll();
      foreach ($result1 as $row1) { 
      //on cree les lignes du tableau avec chaque valeur 
      ?>
      <option value="<?php echo $row1['matriculeEntreprise']; ?>"><?php echo $row1['raisonSociale']; echo " "; echo $row1['raisonSociale']; ?></option>
      <?php 
      }
      Database::disconnect();  
      ?> 
      </datalist>  
  </div>
  <div class="col-md-4">
      <select class="form-control" name="nature_bon" id="nature_bon" placeholder="Nature du bon">
        <option value="Visite">Visite</option>
        <option value="Dentiste">Dentiste</option>
        <option value="Ordonnance">Ordonnance</option>
        <option value="TIC">TIC</option>
        <option value="Autres">Autres</option>
      </select>
  </div>
  <div class="form-group col-md-3">
      <input list="liste_medicament1" class="form-control"  placeholder="Médicament 1" name="medicament1" required="">
      <datalist id="liste_medicament1">
         <?php  
         $pdo =Database::connect();
                         $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); 
                         $statement = $pdo->prepare("SELECT * FROM medicament");  
                        $statement->execute(array());  
                        $result = $statement->fetchAll();
                        foreach ($result as $row) { 
                        //on cree les lignes du tableau avec chaque valeur 
                      ?>
            <option value="<?php echo $row['libelle'];  echo " / "; echo $row['ipm']; ?>"><?php echo $row['libelle'] ?></option>
                      <?php 
                        }
                        Database::disconnect();  
                     ?> 
        </datalist> 
  </div>
  <div class="form-group col-md-3">      
    <input class="form-control"  placeholder="Prix médicament 1"type="number"  name="prixmedi1">
  </div>
  <div class="form-group col-md-3">

      <input list="medicament2" class="form-control"  placeholder="Médicament 2" name="medicament2">
      <datalist id="medicament2">
         <?php   
                        foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur 
                      ?>
      <option value="<?php echo $row['libelle'];  echo " / "; echo $row['ipm']; ?>">
        <?php echo $row['libelle']; ?> 
        <!-- <input type="hidden" name="ipm_medic1" name="<?php echo $row['libelle']; ?>"> -->
      </option>
                      <?php 
                        }
                        Database::disconnect();  
                     ?> 
      </datalist>     </div>
  <div class="form-group col-md-3"> 
        <input class="form-control"  placeholder="Prix médicament 2"type="number"  name="prixmedi2"> 
     
  </div>
  <div class="form-group col-md-3">

      <input list="medicament3" class="form-control"  placeholder="Médicament 3" name="medicament3">
      <datalist id="medicament3">
         <?php   
                        foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur 
                      ?>
            <option value="<?php echo $row['libelle'];  echo " / "; echo $row['ipm']; ?>"><?php echo $row['libelle'] ?></option>
                      <?php 
                        }
                        Database::disconnect();  
                     ?> 
      </datalist>     </div>
  <div class="form-group col-md-3">  
        <input class="form-control"  placeholder="Prix médicament 3 "type="number"  name="prixmedi3">
  </div>
  <div class="form-group col-md-3">

      <input list="medicament4" class="form-control"  placeholder="Médicament 4" name="medicament4">
      <datalist id="medicament4">
         <?php   
                        foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur 
                      ?>
            <option value="<?php echo $row['libelle'];  echo " / "; echo $row['ipm']; ?>"><?php echo $row['libelle'] ?></option>
                      <?php 
                        }
                        Database::disconnect();  
                     ?> 
      </datalist>     </div>
  <div class="form-group col-md-3"> 
    <input class="form-control"  placeholder="Prix médicament 4"type="number"  name="prixmedi4">
  </div>
  <div class="form-group col-md-3">

      <input list="medicament5" class="form-control"  placeholder="Médicament 5" name="medicament5">
      <datalist id="medicament5">
         <?php   
                        foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur 
                      ?>
            <option value="<?php echo $row['libelle'];  echo " / "; echo $row['ipm']; ?>"><?php echo $row['libelle'] ?></option>
                      <?php 
                        }
                        Database::disconnect();  
                     ?> 
      </datalist>     </div>
  <div class="form-group col-md-3">     
    <input class="form-control"  placeholder="Prix médicament 5"type="number"  name="prixmedi5">
  </div>
  <div class="form-group col-md-3">

      <input list="medicament6" class="form-control"  placeholder="Médicament" name="medicament6">
      <datalist id="medicament6">
         <?php   
                        foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur 
                      ?>
            <option value="<?php echo $row['libelle'];  echo " / "; echo $row['ipm']; ?>"><?php echo $row['libelle'] ?></option>
                      <?php 
                        }
                        Database::disconnect();  
                     ?> 
      </datalist>     </div>
  <div class="form-group col-md-3">      
      <input class="form-control"  placeholder="Prix médicament 6"type="number"  name="prixmedi6">
  </div>
  <div class="form-group col-md-3">

      <input list="medicament7" class="form-control"  placeholder="Médicament 7" name="medicament7">
      <datalist id="medicament7">
         <?php   
                        foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur 
                      ?>
            <option value="<?php echo $row['libelle'];  echo " / "; echo $row['ipm']; ?>"><?php echo $row['libelle'] ?></option>
                      <?php 
                        }
                        Database::disconnect();  
                     ?> 
      </datalist>     </div>
  <div class="form-group col-md-3">     
<input class="form-control"  placeholder="Prix médicament 7"type="number"  name="prixmedi7">   
  </div>
  <div class="form-group col-md-3">

      <input list="medicament8" class="form-control"  placeholder="Médicament 8" name="medicament8">
      <datalist id="medicament8">
         <?php   
                        foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur 
                      ?>
            <option value="<?php echo $row['libelle'];  echo " / "; echo $row['ipm']; ?>"><?php echo $row['libelle'] ?></option>
                      <?php 
                        }
                        Database::disconnect();  
                     ?> 
      </datalist>     </div>
  <div class="form-group col-md-3">   
 <input class="form-control"  placeholder="Prix médicament 8"type="number"  name="prixmedi8">
  </div>
  <div class="form-group col-md-3">

      <input list="medicament9" class="form-control"  placeholder="Médicament 9" name="medicament9">
      <datalist id="medicament9">
         <?php   
                        foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur 
                      ?>
            <option value="<?php echo $row['libelle'];  echo " / "; echo $row['ipm']; ?>"><?php echo $row['libelle'] ?></option>
                      <?php 
                        }
                        Database::disconnect();  
                     ?> 
      </datalist>     </div>
  <div class="form-group col-md-3">    
 <input class="form-control"  placeholder="Prix médicament 9"type="number"  name="prixmedi9">
  </div>
  <div class="form-group col-md-3">

      <input list="medicament10" class="form-control"  placeholder="Médicament" name="medicament10">
      <datalist id="medicament10">
         <?php   
                        foreach ($result as $row) { //on cree les lignes du tableau avec chaque valeur 
                      ?>
            <option value="<?php echo $row['libelle'];  echo " / "; echo $row['ipm']; ?>"><?php echo $row['libelle'] ?></option>
                      <?php 
                        }
                        Database::disconnect();  
                     ?> 
      </datalist>     </div>
  <div class="form-group col-md-3">      
      <input class="form-control"  placeholder="Prix médicament 10 "type="number"  name="prixmedi10">
  </div>
 
</div>    
  
<div class="col-md-12">
 <div class="modal-footer bg-primary row">
          <div class="col-md-5">
            <input type="hidden" name="id_parent" value="<?php echo($_GET['id']) ?>">
          </div>
          <div class="form-group col-md-3">
              <button type="submit" class="btn btn-primary glyphicon glyphicon-save orange1 form-control orange1" > Enregister !</button> 
          </div>
          <div class="form-group col-md-3">
              <button type="button" class="btn btn-danger glyphicon glyphicon-log-out orange form-control" data-dismiss="modal">   Annuler
              </button>
          </div>
        </div>

      </div> 
      </div>
 </form> 