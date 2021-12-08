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
    <label>Libelle du dépense</label>
    <input type="text" name="libelle" id="libelle" class="form-control"  placeholder="Libelle du dépense" required />  
    <label>Description du dépense</label>
    <textarea name="description" id="description" class="form-control"  placeholder="Description du dépense" required rows="10" ></textarea>
   </div>
</div>
        <div class="modal-footer  btn-primary row">
          <div class="col-md-5">
          </div>
          <div class="col-md-3">
              <button type="submit" class="btn btn-success glyphicon glyphicon-save orange1 form-control orange1" > Enregister !</button> 
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