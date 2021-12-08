
<div class="row">           
  <div class="modal fade" id="ajoutremboursement" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" style="max-width: 750px!important;"  role="document">
    <div class="modal-content">
      <div class="modal-header navbar orange row"> 
      <h3 class="labelh"> Paiement remboursement</h3>       
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 

        </div>
    <form action="actiondue.php" method="post">   
   <div class="modal-body row">         
    <div class="col-md-6">
    <label>Date de remboursement</label>
     <select name="dater" id="dater" class="form-control">
      <?php 
        for ($i=2020; $i < 3000; $i++) { 
       ?>
      <option value="<?php echo $i; ?>"><?php echo $i; ?></option> 
      <?php 

      } ?> 
    </select>
    </div> 
    <div class="col-md-6 ">
    <label>Période ou mois de remboursement</label>
    <input type="text" list="periodecl" name="perioder" id="perioder" placeholder="Période ou mois de remboursement" class="form-control">
    <datalist id="periodecl">
      <!-- <option value="Année">Année</option>  -->
      <option value="Janvier">Janvier</option> 
      <option value="Février">Février</option> 
      <option value="Mars">Mars</option> 
      <option value="Avril">Avril</option> 
      <option value="Mai">Mai</option> 
      <option value="Juin">Juin</option> 
      <option value="Juillet">Juillet</option> 
      <option value="Aout">Aout</option> 
      <option value="Septembre">Septembre</option> 
      <option value="Octobre">Octobre</option> 
      <option value="Novembre">Novembre</option> 
      <option value="Décembre">Décembre</option> <!-- 
      <option value="1Trimestre">1<sup>ère</sup> Trimestre</option> 
      <option value="2Trimestre">2<sup>ème</sup> Trimestre</option> 
      <option value="3Trimestre">3<sup>ème</sup> Trimestre</option> 
      <option value="4Trimestre">4<sup>ème</sup> Trimestre</option>  -->
    </datalist>
    
    </div> 
    <div class="col-md-12">
      <label>Montant de remboursement</label>
      <input type="number" name="remboursement" id="remboursement" class="form-control"  placeholder="Montant de remboursement" required /> 
    </div> 
<!-- 
    <div class="col-md-6">
    <label>Montant à rembourser</label>
    <input type="number" name="remboursement" id="remboursement" class="form-control"  placeholder="Montant à rembourser" required />
    
    </div>  -->
  
   </div>

        <div class="modal-footer row">
          <div class="col-md-5">
          </div>
          <div class="col-md-3">
            <input type="hidden" name="action_type" value="dueadd">
            <input type="hidden" name="idajoutremboursement" id="idajoutremboursement">
            <!-- <input type="hidden" name="iduser" value="<?php// echo $_SESSION['user_session']; ?>"> -->
            <button type="submit" class="btn btn-danger glyphicon glyphicon-save orange1 form-control orange" > Enregister </button> 
          </div>
          <div class="col-md-3">
            <button type="button" class="btn btn-primary glyphicon glyphicon-log-out orange form-control" data-dismiss="modal"> Annuler ! </button>
          </div>
        </div>
    </form>
    </div>
    </div> 
    </div>
    </div>
