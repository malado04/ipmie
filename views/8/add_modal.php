 
<div class="row">           
  <div class="modal fade" id="ajoutPaiement" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" style="max-width: 950px!important;"  role="document">
    <div class="modal-content">
      <div class="modal-header navbar orange row"> 
      <h3 class="labelh"> Paiement des factures</h3>       
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 

        </div>
    <form action="processpp.php" method="post">   
   <div class="modal-body row">         
    <div class="col-md-4 alert-danger">
      <label>Montant de cotisation</label>
      <input type="number" name="cotisation" id="cotisation" class="form-control"  placeholder="Montant de cotisation" required /> 
    </div> 
    <div class="col-md-4 alert-danger">
    <label>Date de cotisation</label>
     <select name="periodec" id="periodec" class="form-control">
      <?php 
        for ($i=2020; $i < 3000; $i++) { 
       ?>
      <option value="<?php echo $i; ?>"><?php echo $i; ?></option> 
      <?php 

      } ?> 
    </select>
    </div> 
    <div class="col-md-4 alert-danger">
    <label>Période ou mois de cotisation</label>
     <select name="periodec" id="periodec" class="form-control">
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
    </select>
    
    </div> 
    <div class="col-md-4 alert-success">
    <label>Montant à rembourser</label>
    <input type="number" name="remboursement" id="remboursement" class="form-control"  placeholder="Montant à rembourser" required />
    
    </div> 
    <div class="col-md-4 alert-success">
    <label>Date de remboursement</label>
    <input type="date" name="dateremboursement" id="dateremboursement" class="form-control"  placeholder="Date de  remboursement" required /> 
    
    </div> 
    <div class="col-md-4 alert-success">
    <label>Période ou mois de remboursement</label> 
     <select name="periode" id="periode" class="form-control">
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
    </select>
    
    </div> 
    <div class="col-md-4 alert-info">
    <label>Ref / cheque / espèces / virement</label>
     <select name="refcheque" id="refcheque" class="form-control">
      <option value="espece">Espéces</option>
      <option value="cheque">Chèque</option>
      <option value="virement">Virement</option>
    </select> 
    
    </div> 
    <div class="col-md-4 alert-info">
    <label>Reférence chèque ou virement</label>
    <input type="text" name="valeurrefcheque" id="valeurrefcheque" class="form-control"  placeholder="Reférence chèque ou virement" /> 
    
    </div> 
    <div class="col-md-4 alert-info">
    <label>Banque du client</label>
     <select name="banqueclient" id="banqueclient" class="form-control">
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

        <div class="modal-footer row">
          <div class="col-md-5">
          </div>
          <div class="col-md-3">
            <input type="hidden" name="action_type" value="add">
            <input type="hidden" name="idpaiement" id="idpaiement">
            <input type="hidden" name="iduser" value="<?php echo $_SESSION['user_session']; ?>">
            <button type="submit" class="btn btn glyphicon glyphicon-save orange1 form-control orange1" > Enregister et Imprimer reçu ! </button> 
          </div>
          <div class="col-md-3">
            <button type="button" class="btn btn-danger glyphicon glyphicon-log-out orange form-control" data-dismiss="modal"> Annuler ! </button>
          </div>
        </div>
    </form>
    </div>
    </div> 
    </div>
    </div>
