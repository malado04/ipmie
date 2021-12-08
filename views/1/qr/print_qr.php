<?php 
	include_once '../../../dao/database.php';
 
?>
                        	 
<!DOCTYPE html>
<html>
<head>
	<title></title>

<link rel="stylesheet" type="text/css" href="../../../bootstrap/cdncss/bootstrap.css">
<style type="text/css">
	.img{
		width: 35%;
	}
	.imgqr{
		float: right;
		width:100%;
	}
	 
	.text-left{
		text-align: left;
	}
	#container-fluid{
		width: 30%;
		height: 357px;
		/*margin-left: 25%;*/
		/*background-color: rgba(72, 114, 229, 1);*/
	} 
	.row{
		width: 70%;
		margin-left: 15%;
	}
</style>
<script type="text/javascript">
	window.print();
</script>
</head>
<body>
	<div id="container-fluid" class="container">
	<?php 

  $pdo = Database::connect();  
  $stmt = $pdo->prepare("SELECT * FROM employer, entreprise WHERE entreprise.idEntreprise=employer.employeur_id AND idEntreprise=:id");
  $stmt->execute(array(":id"=>$_GET['id']));
  $result = $stmt->fetchAll();
	foreach ($result as $row) {
 ?>	
 
	<div class="row">
		<div class="col-md-3"><br>
		</div>
		<div class="col-md-6"><br>
		</div>
		<div class="col-md-3"><br>
    	</div> 
		<div class="col-md-6">
			<img class="img" src="../../../IPMIEZ.png">  
    		<h6><b>Nom : </b><br><?php echo $row['nomEmployer'];?></h6>
    		<h6><b>Prénom : </b><br><?php echo $row['prenomEmployer']; ?></h6> 
    		<h5><b>QR code : </b><?php  echo $row['codeemployer'];?></h5><br>
		</div>
		<div class="col-md-6">
			<img class="imgqr" src="images/<?php echo $row['codeemployer'];?>.png">
		</div>  
	
	<h6 class="col-md-6"><i>Retrouvez-nous sur internet  </i><b> : ipmiez.com</b></h6>
	<h6 class="col-md-4">Tel : 33 991 51 33</h6>
	</div>----------------------------------------------------------------
<?php } 
?>

	</div>


</body>
</html>