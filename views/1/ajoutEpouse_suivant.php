<?php
session_start();
 
include_once '../../dao/database.php';
 
$pdo = Database::connect();  
$stmt = $pdo->prepare("SELECT idEmployer, cniemployer FROM employer WHERE cniemployer=:cniemployer");
$stmt->execute(array(":cniemployer"=>$_SESSION['session_employer']));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);


 
// $pdo = Database::connect();  
// $stmt1 = $pdo->prepare("SELECT * FROM employeur, utilisateur WHERE employeur.utilisateur_idEmployeur=utilisateur.id AND id=:id");
// $stmt1->execute(array(":id"=>$_SESSION['user_session_ipmie']));
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
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> 
<link rel="stylesheet" type="text/css" href="../../bootstrap/cdncss/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../../bootstrap/cdncss/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="../../bootstrap/cdncss/responsive.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="../../bootstrap/cdnjs/jquery-3.3.1.js"></script> 
  <meta name="author" content="">

  <title>IPM-IEZ</title>

  <!-- Custom fonts for this template-->
  <link href="../../bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../bootstrap/css/sb-admin-2.min.css" rel="stylesheet">
<style type="text/css">
  .wrapper #img{ 
    width: 100%;
    top: 5%;
  }
.h{
text-align: left; color :orange;  /*color: #008080;*/font-family:"Cooper Black";font-weight:lighter;font-size: 43px;}
  h1{
    text-align: center;font-family: "Cooper Black";font-weight:lighter;font-size: 35px;color: #008080; 
  }
  #accordionSidebar, #content1, #content2{
   background-color:  #008080; 
   color: white;
  }
  .img1{
    padding: 6%;
    width: 100%;
  }
   .span{
    color: white;
   } 
  body{
    background-color: rgba(0,0,0,0.5);
  }
  footer{
position:absolute;   
background-color:  #008080; 

    width:100%;
    bottom:0px;  
  }
</style>
</head>

<body id="page-top">


<!-- Ajouter une entrprise --><br>
<div class="container">
<div class="row">         
<!-- Ajouter un utilisateur -->
  <div class="col-md-12" id="ajoutEpouse" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" style="max-width: 1800px!important;"  role="document">
    <div class="modal-content">
      <div class="modal-header navbar orange row"> 
      <h3 class="labelh">Ajouter une nouvelle épouse </h3>       
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 

        </div>
    <div class="etape row">
          <label class="col-md-3 label1">Etape 1 / 5</label>   
          <label class="col-md-2 label1">Etape 2 / 5</label>   
          <label class="col-md-2 label1">Etape 3 / 5</label>  
          <label class="col-md-3 label"> Etape 4 / 5</label>  
          <label class="col-md-2 label1">Etape 5 / 5</label>    
    </div> 
   <div class="modal-body">         
    <form  action="process.php"method="post" class="row" enctype="multipart/form-data">   
    <div class="col-md-12">
    <label>Choisir une photo</label>
    <input type="file" name="image" id="image" class="form-control"  placeholder="Choisir une photo" />
      <label>Nom de l'épouse</label>
      <input type="text" name="nomepouses" id="nomepouses" class="form-control"  placeholder="Nom de l'épouse" required /> <br/> 
      <label>Prénom de l'épouse</label>
      <input type="text" name="prenomepouses" id="prenomepouses" class="form-control"  placeholder="Prénom de l'épouse" required /><br/> 
      <label>Date de naissance de l'épouse</label>
      <input type="date" name="datenaissepouses" id="datenaissepouses" class="form-control"  placeholder="Date de naissance de l'épouse" required /> <br/> 
      <label>Date de mariage</label>
      <input type="date" name="datemariage" id="datemariage" class="form-control"  placeholder="Date de mariage" required /> <br/> 
      <label>Numéro acte de mariage de l'épouse</label>
      <input type="number" name="numeroactemariage" id="numeroactemariage" class="form-control"  placeholder="Numéro acte de mariage  de l'épouse" required /> <br/>  
    </div>  
   </div> 
    <div class="modal-footer row">
            <div class="col-md-5">
              </div>
           <div class="col-md-3">
              <input type="hidden" name="idEmployer" value="<?php echo $userRow['idEmployer']; ?>">
              <input type="hidden" name="ajoutEpouse" value="ajoutEpouse" >
            <button type="submit" class="btn btn-primary glyphicon glyphicon-save orange1 form-control" > Enregister !</button> 
          </div>
            <div class="col-md-3">
              <a href="ajoutEnfant.php" class="btn btn-danger glyphicon glyphicon-log-out orange1 form-control">Ajouter des enfants</a>
            <!-- <button type="button"  data-dismiss="modal"> Annuler</button> -->
          </div>
          </div>
    </form>
    </div>
    </div> 
    </div>
    </div>  

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white alert-danger">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span> <a href="https://synapps-consulting.com">Copyright &copy; SynApps-Business-Consulting</a></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div> 
 
  <!-- Bootstrap core JavaScript-->
  <script src="../../bootstrap/vendor/jquery/jquery.min.js"></script>
  <script src="../../bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../bootstrap/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../bootstrap/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../../bootstrap/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../../bootstrap/js/demo/chart-area-demo.js"></script>
  <script src="../../bootstrap/js/demo/chart-pie-demo.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
<script type="text/javascript" src="../../bootstrap/cdnjs/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../../bootstrap/cdnjs/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="../../bootstrap/cdnjs/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="../../bootstrap/cdnjs/responsive.bootstrap4.min.js"></script>
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<script src="../../bootstrap/js/bootbox.min.js"></script>
<script type="text/javascript" src="script.js"></script>  
 

</body>

</html>
