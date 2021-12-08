<link rel="stylesheet" type="text/css" href="../../../bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">

<div class="" id="trierMois" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Trier par mois</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                         <form action="trie_mois.php" method="GET">              
 <div class="modal-body">
                <input class="form-control" type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
                <input class="form-control" type="date" name="trie_mois" required="" />
              </div>
              <div class="modal-footer">
                <a href="./" class="btn btn-danger"> Retour</a>
                <button type="submit" class="btn btn-primary">Trier par mois</button>
              </div>
            </form>
            </div>
          </div>
        </div>