<div class="row">           
  <div class="modal fade" id="ajoutEmployer" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" style="max-width: 750px!important;"  role="document">
 <div class="modal-content">
      <div class="modal-header navbar orange row"> 
      <h3 class="labelh">Ajouter un nouveau employer </h3>       
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 

        </div>
    <div class="etape row">
          <label class="col-md-3 label1">Etape 1 / 5</label>   
          <label class="col-md-2 label1">Etape 2 / 5</label>   
          <label class="col-md-3 label">Etape 3 / 5</label>  
          <label class="col-md-2 label1">Etape 4 / 5</label>  
          <label class="col-md-2 label1">Etape 5 / 5</label>    
    </div>  
    <form action="processEmployeur.php" method="post">  
   <div class="modal-body row">         
    
    <div class="col-md-6">
    <label>CNI de l'employer</label>
    <input type="number" name="cniemployer" id="cniemployer" class="form-control"  placeholder="CNI de l'employer" required />
    <br/><label>Nom de l'employer</label>
    <input type="text" name="nomemployer" id="nomemployer" class="form-control"  placeholder="Nom de l'employer" required /><br/>
    <label>Prénom de l'employer</label>
    <input type="text" name="prenomemployer" id="prenomemployer" class="form-control"  placeholder="Prénom de l'employer" required />
    <br/><label>Téléphone de l'employer</label>
    <input type="number" name="telemployer" id="telemployer" class="form-control"  placeholder="Téléphone de l'employer" required />  
  </div>   
    <div class="col-md-6">
    <label>Email de l'employer</label>
    <input type="email" name="emailemployer" id="emailemployer" class="form-control"  placeholder="Email de l'employer" required />  
    <br/><label>Nombre d'enfants de l'employer</label>
    <input type="number" name="nombredenfantemployer" id="nombredenfantemployer" class="form-control"  placeholder="Nombre d'enfants de l'employer" required /> 
    <br/><label>Nombre d'épouses de l'employer</label>
    <input type="number" name="nombredepouseemployer" id="nombredepouseemployer" class="form-control"  placeholder="Nombre d'épouses de l'employer" required />
    <br/><label>Montant salaire</label>
    <input type="number" name="salaire" id="salaire" class="form-control"  placeholder="Montant salaire" required /> 
    </div>
   </div> 
        <div class="modal-footer row">
          <div class="col-md-5">
          </div>
          <div class="col-md-3">

            <input type="hidden" name="ajoutEmployerp" id="ajoutEmployerp">
            <input type="text" name="idemployeur_id" id="idemployeur_id" value="<?php echo $_SESSION['user_session_employeur']; ?>">
              <button type="submit" class="btn btn-primary glyphicon glyphicon-save orange1 form-control" > Enregister !</button> 
          </div>
          <div class="col-md-3">
              <!-- <button type="button" class="btn btn-danger glyphicon glyphicon-log-out orange1 form-control" data-dismiss="modal"> Annuler</button> -->
              <a class="btn btn-danger glyphicon glyphicon-log-out orange1 form-control" href="https://ipmiez.com/views/1/">Suivant</a>
          </div>
        </div>
    </form>
    </div>
    </div> 
    </div>
    </div>  