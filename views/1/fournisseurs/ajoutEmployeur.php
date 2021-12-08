<?php
session_start();
  
if(!isset($_SESSION['user_session_ipmie']))
{
  header("Location : ../../../");
}

include_once '../../../dao/database.php';
 
$pdo = Database::connect();  
$stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE id=:id");
$stmt->execute(array(":id"=>$_SESSION['user_session_ipmie']));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);


 
$pdo = Database::connect();  
$stmt1 = $pdo->prepare("SELECT * FROM employeur, utilisateur WHERE employeur.utilisateur_idEmployeur=utilisateur.id AND id=:id");
$stmt1->execute(array(":id"=>$_SESSION['user_session_ipmie']));
$userRow1=$stmt1->fetch(PDO::FETCH_ASSOC);

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
<link rel="stylesheet" type="text/css" href="../../../bootstrap/cdncss/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../../../bootstrap/cdncss/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="../../../bootstrap/cdncss/responsive.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="../../../bootstrap/cdnjs/jquery-3.3.1.js"></script> 
  <meta name="author" content="">

  <title>IPM-IEZ</title>

  <!-- Custom fonts for this template-->
  <link href="../../../bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../../bootstrap/css/sb-admin-2.min.css" rel="stylesheet">
<style type="text/css">
  .wrapper #img{ 
    width: 100%;
    top: 5%;
  }
  body{
    background-color: rgba(0,0,0,0.5);
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
   }   footer{
position:absolute;   
background-color:  #008080; 

    width:100%;
    bottom:0px;  
  }
  #accordionSidebar, #content1, #content2, .orange{
   background-color:  #008080; 
   color: white;
  }
</style>
</head>

<body id="page-top">
 
 
<!-- Ajouter une entrprise --><br><br><br>
<div class="container">
<div class="row">           
<!-- Ajouter un utilisateur -->
  <div class="col-md-12" id="ajoutEmployeur" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class=" modal-lg" style="max-width: 1850px!important;"  role="document">
    <div class="modal-content">
      <div class="modal-header navbar orange row"> 
      <h3 class="labelh">Créer un nouveau utilisateur </h3>       
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>  
        </div> 
    <!-- <form id="employeurform">    -->
    <form action="process.php" method="post">    
   <div class="modal-body row">         
    <div class="col-md-6">
    <label>CNI de l'utilisateur</label>
    <input type="number" name="cniemployeur" id="cniemployeur" class="form-control"  placeholder="CNI de l'utilisateur" required /> <br/> 
    <label>Nom de l'utilisateur</label>
    <input type="text" name="nomemployeur" id="nomemployeur" class="form-control"  placeholder="Nom de l'utilisateur" required /> <br/> 
    <label>Prénom de l'utilisateur</label>
    <input type="text" name="prenomemployeur" id="prenomemployeur" class="form-control"  placeholder="Prénom de l'utilisateur" required /><br/> 
    <label>Tel fixe de l'utilisateur</label>
    <input type="number" name="telfixemployeur" id="telfixemployeur" class="form-control"  placeholder="Tel fixe  de l'utilisateur" required /> <br>
    <label>Tel portable de l'utilisateur</label>
    <input type="number" name="telportemployeur" id="telportemployeur" class="form-control"  placeholder="Tel fixe  de l'utilisateur" required />  <!-- <br>
    <label>Ville ou commune de l'utilisateur</label>
    <input type="number" name="telportemployeur" id="telportemployeur" class="form-control"  placeholder="Tel fixe  de l'utilisateur" required />  -->
  </div> 
    <div class="col-md-6">  
      <label>Profil utilisateur</label>
      <select class="form-control" name="profil">
        <option value="Docteur">Docteur</option>
      </select><br>
    <label>Spécialité de l'utilisateur</label>
    <select name="specialite" id="specialite" class="form-control"  placeholder="Spécialité de l'utilisateur" required >
      <option value=""></option>
      <option value=""></option>
      <option value=""></option>
      <option value=""></option>
      <option value=""></option>
      <option value=""></option>
      <option value=""></option>
    </select>
    <br/>  
    <label>Email de l'utilisateur</label>
    <input type="email" name="email" id="email" class="form-control"  placeholder="Email de l'utilisateur" required />  
    <br/>  
    <label>Login de l'utilisateur</label>
    <input type="text" name="login" id="login" class="form-control"  placeholder="Login de l'utilisateur" required /> <br/> 
    <label>Mot de passe de l'utilisateur</label>
    <input type="text" name="password" id="password" class="form-control"  placeholder="Mot de passe de l'utilisateur" required />  <br/> 
    </div>
   </div> 
          <div class="modal-footer orange row">
            <div class="col-md-5">
              </div>
            <div class="col-md-3">
              <input type="hidden" name="idf" value="<?php echo $_GET['id']; ?>">
            <button type="submit" name="ajoutEmployeur" class="btn btn-primary glyphicon glyphicon-save orange1 form-control" > Enregister !</button> 
          </div>
            <div class="col-md-3">
              <a class="btn btn-danger glyphicon glyphicon-log-out orange1 form-control" href="./">Retour !</a>
          </div>
          </div>
    </form>
    </div>
    </div> 
    </div>
    </div>  
      </div>
        <!-- /.container-fluid -->

      </div>      <!-- Footer -->
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
  <script src="../../../bootstrap/vendor/jquery/jquery.min.js"></script>
  <script src="../../../bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../../bootstrap/js/sb-admin-2.min.js"></script>

  <!-- Custom scripts for all pages-->
  <!-- Page level plugins -->
  <script src="../../../bootstrap/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../../../bootstrap/js/demo/chart-area-demo.js"></script>
  <script src="../../../bootstrap/js/demo/chart-pie-demo.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
<script type="text/javascript" src="../../../bootstrap/cdnjs/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../../../bootstrap/cdnjs/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="../../../bootstrap/cdnjs/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="../../../bootstrap/cdnjs/responsive.bootstrap4.min.js"></script>
<script src="../../../bootstrap/js/bootstrap.min.js"></script>
<script src="../../../bootstrap/js/bootbox.min.js"></script>
<script type="text/javascript" src="script.js"></script>  
 

</body>

</html>
