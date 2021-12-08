<?php
session_start();
  
if(!isset($_SESSION['user_session']))
{
  header("Location: 192.168.1.155/apps/");
}

?>
<!DOCTYPE>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IPM-IEZ</title> 
<link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="../../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<script type="text/javascript" src="../../bootstrap/js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="../../bootstrap/js/validation.min.js"></script>
<link href="style.css" rel="stylesheet" type="text/css" media="screen">
<script type="text/javascript" src="../../bootstrap/js/script.js"></script>
<style type="text/css">
@charset "utf-8";
#modal{font-family: "Bell MT";font-style: italic;font-size: 125%;width: 100%;border-radius: 50%;}
   #fulid img{position: absolute;z-index: -10;}i{color: white;} p{color: white;}
   .form-signin {max-width: 500px;padding: 19px 29px 29px;margin: 0 auto;margin-top:10%;background-color: rgba(0,0,0,0.1);border: 1px solid #e5e5e5;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);/*-moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);box-shadow: 0 1px 2px rgba(0,0,0,.05);*/font-family:Tahoma, Geneva, sans-serif;color:#990000;font-weight:lighter;
    }
    .form-signin .form-signin-heading{color:#00A2D1;}.form-signin input[type="text"],.form-signin input[type="password"],.form-signin input[type="email"] {font-size: 16px;height: 45px;padding: 7px 9px;}.signin-form, .body-container{margin-top:1%;}.navbar-brand{font-family:"Lucida Handwriting";}#btn-submit{height:45px;}.hideButton:hover{background-color: orange;color: white;font-family:"Times New Roman";font-weight:lighter;font-size: 15px;height: 45px;padding: 7px 9px;}.bttn{background-color: #008080;color: white;font-family:"Times New Roman";font-weight:lighter;font-size: 20px;height: 45px;padding: 7px 9px;}.h2{text-align: center; background-color: #008080; color:white;font-family:"Bell MT";font-weight:lighter;font-size: 65px;font-style: italic;}.h3{text-align: center; color :white;  /*color: #008080;*/font-family:"Bell MT";font-weight:lighter;font-size: 45px;font-style: italic;}.h4{text-align: center; background-color: #008080; color:white;font-family:"Bell MT";font-weight:lighter;font-size: 10px;font-style: italic; position: fixed;left:0px; bottom:0px; height:30px; width:100%; }*{margin: 0%;padding: 0%;}.bttn{background-color: #008080; color: white;font-family:"Times New Roman";
  font-weight:lighter;font-size: 20px;height: 45px;padding: 7px 9px;}.orange1{background-color: #008080;color: white;font-size: 20px; font-family: "Cooper Std Black";border-color:  #008080;}font-family: "times new roman";background-repeat: no-repeat;}.body{position: absolute;z-index: 1000%;}#login-form{ margin-top: 5%;}hr{background-color: white;}#cercle{position: absolute;z-index: 1000%;width: 20%;max-width: 45%;height: 255px;background-color: rgba(0,0,0,0.6);border-radius: 50%;margin-top: 5%;margin-left: 40%;
  margin-right: auto;text-align: center;display: none;}.imgbagnere{position: absolute;z-index: -2000;}

  .orange{background-color: #008080;  font-size: 20px; font-family: "Brush Script MT";border-color:  #008080;}
  .orange:hover{background-color:  orange;  font-size: 20px; font-family: "Brush Script MT";border-color:   #008080;}
  .orange1{background-color: #008080;  font-size: 20px; font-family: "Cooper Std Black";border-color:  #008080;}
  .label{
   
  text-align: center;font-family: "Cooper Black";font-weight:lighter;font-size: 15px;font-style: italic;color: #008080;margin-top: 0%;background-color:  transparent;
}
    body #img{
    position: absolute;
    z-index: -1000%;
    height: 100%;
    width: 100%;
   }
   .bagnereauth{  
    background-color: rgba(0,0,0,0.2);
    position: absolute;
    z-index: 3000%;
    height: 100%;
    width: 95%;
    margin-left: 2.5%; 
   }  
   .bagnereauth2{  
    position: absolute;
    background-color:  #008080;
    z-index: 3000%;
    height: 10%;
    width: 95%;
    margin-left: 2.5%; 
   }
   .bagnereauth1{ 
    position: absolute;
    z-index: 2000%; 
    background-image: url('http://localhost/ipmies/bootstrap/img/bag.jpg');
    background-repeat: no-repeat;
    height: 100%;
    width: 95%;
    margin-left: 2.5%;
   }
   .form-signin{
    }

   #inscription{
    width: 100%; 
    color: white;   
   }

   #fluid{  
    position: absolute;
    z-index: 3000%;
    height: 95%;
    background-repeat: no-repeat;
   }

  
   .img1{
    float: left;
    width: 10%;
    height: 100%;
   }
   .cololor-orange{
    background-color:  #008080;
  }
  #bagnereauth{
    margin-top: 0px;
  }
.h{
  text-align: center;
}
fieldset{
  background-color: white;
  border: 2px solid  #008080;
  max-width: 90%;padding: 10px 10px 10px;margin: 0 auto;margin-top:10%;
  /*background-color: rgba(0,0,0,0.2);*/

  /*border: 1px solid white;*/
  -webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;
  -webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.5);/*-moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);box-shadow: 0 1px 2px rgba(0,0,0,.05);*/font-family:Tahoma, Geneva, sans-serif;color:#990000;font-weight:lighter;
}
legend{
  width: 100%;
  margin-left: 0%;
  height: 50px; /* border: 2px solid  #008080;*/

}
.etape1{   

  padding: 1%;
  width: 25%;
  margin-left: 0%;
  height: 50px;
  background-color:  #008080;
  border: 1px solid white;
  border-radius: 5px;
  font-family: Times New Roman;
  font-size: 25px;
}
.etape2{
  border: 1px solid white;
  padding: 1%;
  width: 25%;
  margin-left: 20%;
  height: 50px;
  background-color:  #008080;
  border-radius: 5px;
  
  font-family: Times New Roman;
  font-size: 25px;
}
.etape3{
  border: 1px solid white;
  padding: 1%;
  width: 25%;
  margin-left: 20%;
  height: 50px;
  background-color:  #008080;
  border-radius: 5px;
  
  font-family: Times New Roman;
  font-size: 25px;
}
.etape4{
  border: 1px solid white;
  padding: 1%;
  width: 25%;
  margin-left: 20%;
  height: 50px;
  background-color:  #008080; 
  
  color: white;
  border-radius: 5px;
  font-family: Times New Roman;
  font-size: 25px;
}
.etape5{
  border: 1px solid white;
  padding: 1%; 
  float: right;
  margin-right: 0%;
  height: 50px;
  background-color:  orange;
  border: 1px solid  orange;
  color: white;
   border-radius: 5px;
   font-family: Times New Roman;
  font-size: 25px;
}
   legend .img{width:100%;height: 100%;border-radius: 5px; }
</style>
 <link rel="shortcut icon" type="image/x-icon" href="http://localhost/ipmies/bootstrap/images/SynApps-Consulting1.png"/>

<script type="text/javascript" src="script.js"></script>
</head> 
<body>        

  <div class="row bagnereauth1">
    <div class="col-md-12 col-sm-12 col-xsl-12">
    </div> 
  </div>
  <div class="row bagnereauth2">
    <div class="col-md-12 col-sm-12 col-xsl-12">
      <h3 class="h3">
    <img class="img1" src="http://localhost/ipmies/bootstrap/images/SynApps-Consulting1.png">IPM-IEZ</h3> 
    </div> 
  </div>
  <div class="bagnereauth" id="fluid">
  <div class="row">
    
 <div class="col-md-12">  
       <fieldset>
          <legend>
            <span class="etape1">1</span>
            <span class="etape2">2</span>
            <span class="etape3">3</span>
            <span class="etape4">4</span>
            <span class="etape5">5</span>
          </legend>      
  <hr>
    <form id="employeurform">   
   <div class="col-md-12">
      <label>Nom de l'épouse</label>
      <input type="text" name="nomepouses" id="nomepouses" class="form-control"  placeholder="Nom de l'épouse" required /> 
      <label>Prénom de l'épouse</label>
      <input type="text" name="prenomepouses" id="prenomepouses" class="form-control"  placeholder="Prénom de l'épouse" required />
      <label>Date de naissance de l'épouse</label>
      <input type="date" name="datenaissepouses" id="datenaissepouses" class="form-control"  placeholder="Date de naissance de l'épouse" required /> 
      <label>Date de mariage</label>
      <input type="date" name="datemariage" id="datemariage" class="form-control"  placeholder="Date de mariage" required /> 
      <label>Numéro acte de mariage de l'épouse</label>
      <input type="number" name="numeroactemariage" id="numeroactemariage" class="form-control"  placeholder="Numéro acte de mariage  de l'épouse" required /> 
    </div>  

        <div class="row">
          <div class="col-md-5">
          </div>
          <div class="col-md-3">
              <button type="submit" class="btn btn glyphicon glyphicon-save orange1 form-control" > Enregister !</button> 
          </div>
          <div class="col-md-3">
              <button type="button" class="btn btn glyphicon glyphicon-log-out orange form-control" data-dismiss="modal">   Annuler
              </button>
          </div>
        </div>
    </form>
      <!-- <span type="button" id="inscription" class="btn form-control hideButton cololor-orange" data-toggle="modal" data-target="#ajoutUtilisateur">Création de compte !!!</span>  -->
      <hr />
       </fieldset>
</div>  
  </div></div> 
 
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<script src="../../bootstrap/js/bootbox.min.js"></script> 
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script> 
</body>
</html>