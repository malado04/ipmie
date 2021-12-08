<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
<?php 
include_once('../../dao/database.php');
$pdo = Database::connect();  
$stmt = $pdo->prepare("SELECT * FROM paiement WHERE idpaiement=:id");
$stmt->execute(array(":id"=>$_GET['id']));
$paiementRow=$stmt->fetch(PDO::FETCH_ASSOC);

 ?><style type="text/css">
  form{color: black;
    font-size: 20px;
  }
</style>
<div class="container">           
  <div class="" id="ajoutPaiement" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" style="max-width: 1250px!important;"  role="document">
    <div class="modal-content">
      <div class="modal-header navbar bg-primary row"> 
      <h3 class="labelh"> Paiement des factures</h3>       
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 

        </div>
    <form action="processPaiement.php" method="post">   
   <div class="modal-body row">         
    <div class="col-md-4 ">
      <label>Montant de cotisation</label>
      <input type="number" name="cotisation" id="cotisation" class="form-control"  placeholder="Montant de cotisation" required value="<?php echo $paiementRow['cotisation']; ?>" /> 
    </div> 
    <div class="col-md-4 ">
    <label>Date de cotisation</label>
    <input type="date" name="datec" class="form-control" value="<?php echo $paiementRow['datec']; ?>"><!-- 
     <select name="datec" id="datec" class="form-control">
      <?php 
        for ($i=2016; $i < 3000; $i++) { 
       ?>
      <option value="<?php echo $i; ?>"><?php echo $i; ?></option> 
      <?php 

      } ?> 
    </select> -->
    </div> 
    <div class="col-md-4 ">
    <label>Période ou mois de cotisation</label>
    <input type="text" list="periodecl" name="periodec" id="periodec" class="form-control"  value="<?php echo $paiementRow['periodec']; ?>">
    <datalist id="periodecl">
      <option value="Année">Année</option> 
      <option value="Janvier">Janvier</option> 
      <option value="Février">Février</option> 
      <option value="Mars">Mars</option> 
      <option value="Avril">Avril</option> 
      <option value="Mai">Mai</option> 
      <option value="Juin">Juin</option> 
      <option value="Juillet">Juillet</option> 
      <option value="Aout">Aout</option> 
      <option value="Septembre">Septembre</option> 
      <option value="Octbre">Octbre</option> 
      <option value="Novembre">Novembre</option> 
      <option value="Décembre">Décembre</option> 
      <option value="1Trimestre">1<sup>ère</sup> Trimestre</option> 
      <option value="2Trimestre">2<sup>ème</sup> Trimestre</option> 
      <option value="3Trimestre">3<sup>ème</sup> Trimestre</option> 
      <option value="4Trimestre">4<sup>ème</sup> Trimestre</option> 
    </datalist>
    
    </div> 
    <div class="col-md-4 ">
    <label>Montant à rembourser</label>
    <input type="number" name="remboursement" id="remboursement" class="form-control"  placeholder="Montant à rembourser" required  value="<?php echo $paiementRow['remboursement']; ?>"/>
    
    </div> 
    <div class="col-md-4 ">
    <label>Date de remboursement</label>
    <input type="date" name="dater" class="form-control"  value="<?php echo $paiementRow['dater']; ?>">
    <!--  <select name="dater" id="dater" class="form-control">
      <?php 
        for ($i=2016; $i < 3000; $i++) { 
       ?>
      <option value="<?php echo $i; ?>"><?php echo $i; ?></option> 
      <?php 

      } ?> 
    </select>    --> 
    </div> 
    <div class="col-md-4 ">
    <label>Période ou mois de remboursement</label> 
    <input type="text" list="perioderl" name="perioder" id="perioder" class="form-control"  value="<?php echo $paiementRow['perioder']; ?>">
    <datalist id="perioderl">
      <option value="Année">Année</option> 
      <option value="Janvier">Janvier</option> 
      <option value="Février">Février</option> 
      <option value="Mars">Mars</option> 
      <option value="Avril">Avril</option> 
      <option value="Mai">Mai</option> 
      <option value="Juin">Juin</option> 
      <option value="Juillet">Juillet</option> 
      <option value="Aout">Aout</option> 
      <option value="Septembre">Septembre</option> 
      <option value="Octbre">Octbre</option> 
      <option value="Novembre">Novembre</option> 
      <option value="Décembre">Décembre</option> 
      <option value="1Trimestre">1<sup>ère</sup> Trimestre</option> 
      <option value="2Trimestre">2<sup>ème</sup> Trimestre</option> 
      <option value="3Trimestre">3<sup>ème</sup> Trimestre</option> 
      <option value="4Trimestre">4<sup>ème</sup> Trimestre</option> 
    </datalist>
    
    </div> 
    <div class="col-md-4 ">
    <label>Ref / cheque / espèces / virement</label>
     <select name="refcheque" id="refcheque" class="form-control"  value="<?php echo $paiementRow['refcheque']; ?>">
      <option value="espece">Espéces</option>
      <option value="cheque">Chèque</option>
      <option value="virement">Virement</option>
    </select> 
    
    </div> 
    <div class="col-md-4 ">
    <label>Reférence chèque ou virement</label>
    <input type="text" name="valeurrefcheque" id="valeurrefcheque"  value="<?php echo $paiementRow['valeurrefcheque']; ?>" class="form-control"  placeholder="Reférence chèque ou virement" /> 
    
    </div> 
    <div class="col-md-4 ">
    <label>Banque du client</label>
     <select name="banqueclient" id="banqueclient" class="form-control"  value="<?php echo $paiementRow['banqueclient']; ?>">
      <option value="ECOBANK">ECOBANK</option>
      <option value="CNCAS">CNCAS</option>
      <option value="caisse">Caisse</option>
      <option value="cbao">CBAO</option>
      <option value="banque islamique">Banque islamique</option>
      <option value="boa">BOA</option>
      <option value="bimao">BIMAO</option>
      <option value="sgbs">SGBS</option>
      <option value="bnde">BNDE</option>
      <option value="bhs">BHS</option>
      <option value="orabank">ORABANK</option>
      <option value="banque atlantique">Banque atlantique</option>
      <option value="banque de l'hâbitat">Banque de l'hâbitat</option>
      <option value="autres">Autres</option>
    </select>

    
    </div> 
   </div>

        <div class="modal-footer bg-primary row">
          <div class="col-md-5">
          </div>
          <div class="col-md-3">
            <input type="hidden" name="action_type" value="update">
            <input type="hidden" name="idpaiement" id="idpaiement" value="<?php echo $_GET['id']; ?>">
            <input type="hidden" name="idEntreprise" id="idEntreprise" value="<?php echo $_GET['ide']; ?>">
            <input type="hidden" name="iduser" value="<?php echo $_SESSION['user_session_ipmie']; ?>">
            <button type="submit" class="btn btn-primary   glyphicon glyphicon-save orange1 form-control" > Enregister et Imprimer reçu ! </button> 
          </div>
          <div class="col-md-3">
            <a href="listepaiement.php" class="btn btn-danger glyphicon glyphicon-log-out form-control">Retour</a>
          </div>
        </div>
    </form>
    </div>
    </div> 
    </div>
    </div>
