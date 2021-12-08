<div class="row">           
  <div class="modal fade" id="ajouterDep" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" style="max-width: 750px!important;"  role="document">
    <div class="modal-content">
      <div class="modal-header navbar btn-primary row"> 
      <h3 class="labelh">Nouvelle dépense</h3>       
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 

        </div> 
    <form action="processDep.php" method="post">   
   <div class="modal-body row">         
    <div class="col-md-12">
    <label>Libelle dépense</label>
    <input type="text" name="libelle" id="libelle" class="form-control"  placeholder="Libelle  dépense" required />  
    <label>Montant dépense</label>
    <input type="number" name="montant" id="montant" class="form-control"  placeholder="Montant  dépense" required />  
    <label>Description dépense</label>
    <textarea name="description" id="description" class="form-control"  placeholder="Description  dépense" required rows="10" ></textarea>
   </div>
</div>
        <div class="modal-footer  btn-primary row">
          <div class="col-md-5">
          </div>
          <div class="col-md-3">
              <button type="submit" class="btn btn-success glyphicon glyphicon-save  form-control " > Enregister !</button> 
          </div>
          <div class="col-md-3">
              <button type="button" class="btn btn-danger glyphicon glyphicon-log-out orange form-control" data-dismiss="modal">   Annuler
              </button>
          </div>
        </div>

    </form>
    </div>
    </div> 
    </div>
    </div>

    <div class="row">           
  <div class="modal fade" id="ajouterSolde" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" style="max-width: 750px!important;"  role="document">
    <div class="modal-content">
      <div class="modal-header navbar btn-primary row"> 
      <h3 class="labelh">Nouveau solde</h3>       
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 

        </div> 
    <form action="processDep.php" method="post">   
   <div class="modal-body row">         
    <div class="col-md-12">
    <label>Montant solde</label>
    <input type="number" name="solde" id="solde" class="form-control"  placeholder="Montant  dépense" required />  
    <label>Date solde</label>
    <input type="date" name="datemois_solde" id="datemois_solde" class="form-control"  placeholder="Date  dépense" required />   
   </div>
</div>
        <div class="modal-footer  btn-primary row">
          <div class="col-md-5">
          </div>
          <div class="col-md-3">
              <button type="submit" class="btn btn-success glyphicon glyphicon-save form-control " > Enregister !</button> 
          </div>
          <div class="col-md-3">
              <button type="button" class="btn btn-danger glyphicon glyphicon-log-out orange form-control" data-dismiss="modal">   Annuler
              </button>
          </div>
        </div>

    </form>
    </div>
    </div> 
    </div>
    </div>