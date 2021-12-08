<?php
session_start();
  
if(!isset($_SESSION['user_session_bon']))
{
  // header("Location: ../../");
}

include_once '../../../dao/database.php';
 
// $pdo = Database::connect();  

// $stmt1 = $pdo->prepare("SELECT * FROM employer WHERE idEmployer=:id_bon");
// $stmt1->execute(array(":id_bon"=>$_GET['id']));
// $userRow1=$stmt1->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
<link rel="icon" type="icon" href="../../img/IPMIEZ.png"> 

        <link rel="stylesheet" href="../docs/css/bootstrap-4.5.2.min.css" type="text/css">
        <link rel="stylesheet" href="../docs/css/bootstrap-example.min.css" type="text/css">
        <link rel="stylesheet" href="../docs/css/prettify.min.css" type="text/css">
        <link rel="stylesheet" href="../docs/css/fontawesome-5.15.1-web/all.css" type="text/css">

        <script type="text/javascript" src="../docs/js/jquery-2.1.3.min.js"></script>
        <script type="text/javascript" src="../docs/js/bootstrap.bundle-4.5.2.min.js"></script>
        <script type="text/javascript" src="../docs/js/prettify.min.js"></script>

        <link rel="stylesheet" href="../dist/css/bootstrap-multiselect.css" type="text/css">
        <script type="text/javascript" src="../dist/js/bootstrap-multiselect.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                window.prettyPrint() && prettyPrint();
            });
        </script>

        <style>
            .nav-link.active {
                font-weight: bold;
            }

            .badge {
                font-size: 85%;
            }
            .option{
              font-family: "Times New Rom";
            }
        </style>
  <meta name="author" content="">

  <title>IPM-IEZ</title>

  <!-- Custom fonts for this template-->
  <link href="../../../bootstrap/css/sb-admin-2.min.css" rel="stylesheet">
 
</head>

<body id="page-top">
 
<div class="container">

<div class="" id="id_consultation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-briefcase-medical"> <b>Attributions de médicaments</b></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="../medic/process.php" method="post">
        <div class="modal-body">
        <script type="text/javascript">
               $(document).ready(function() {
                 $('#medic').multiselect({
                    enableFiltering: true,
                     templates: {
                         filter: '<div class="multiselect-filter"><div class="input-group input-group-sm p-1"><div class="input-group-prepend"><i class="input-group-text fas fa-search"></i></div><input class="form-control multiselect-search" type="text" /><div class="input-group-append"><button class="multiselect-clear-filter input-group-text" type="button"><i class="fas fa-times"></i></button></div></div></div>'
                      }
                  });
             });
         </script>
         

        <div class="modal-body row"> 

      <div class="col-md-12">   
           <legend>Choix des médicaments pour ordonnance</legend>
           <select id="medic" name="medic[]" multiple="multiple" class="form-control" required="">
            <?php 
                        include_once 'data.php';
                        foreach ($rows as $row) { //on cree les lignes du tableau avec chaque valeur 
                      ?>
                          <option class="option" value="<?php echo $row['libelle']; ?>"><?php  echo $row['libelle'];?></option> 
                      <?php 
                         }
                     ?> 
           </select><br><br>  
          </div>
          </div>
          <div class="modal-footer bg-primary text-white"> 
            <input type="hidden" class="form-control" name="id_cons" value="<?php echo $_GET['idc'];?>">
            <input type="hidden" class="form-control" name="emp" value="<?php echo $_GET['emp'];?>">
            <a href="./"class="btn btn-danger" >Retour</a>
            <button type="submit" class="btn btn-primary text-white">Suivant  </button>
          </div>
      </form> 
    </div>
  </div>
</div>

        </div>
        <!-- /.container-fluid -->

      </div>
    </div>
    <!-- End of Content Wrapper -->

  </div> 
 
  <!-- Bootstrap core JavaScript-->
  <!-- <script src="../../../bootstrap/vendor/jquery/jquery.min.js"></script> -->

  <!-- Custom scripts for all pages-->
  <!-- <script src="../../../bootstrap/js/sb-admin-2.min.js"></script> -->
  <!-- Page level custom scripts -->
<!-- <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script> -->
 

</body>

</html>
