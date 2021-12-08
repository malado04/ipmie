<?php 
session_start();
session_unset();
session_destroy();
 ?>
<!DOCTYPE html><html lang="fr-FR">
      <head>

   <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">         
<meta charset="UTF-8">
 <style type="text/css">
   .img{
    width: 20%;
 }
 body{
  /*background-image: url('IPMIEZ.png');*/
 }
 #bg{
  background-image: url('connexion.png');
 }
 #p{
  background-color: rgba('0.0.0.0,5');
 }
 </style>
  </head>
<body >

    <!-- Outer Row -->
    <div class="container">

      <div class="col-xl-12 col-lg-12 col-md-12">
                  <div class="p-5">
                    <div class="text-center">
                      <h3 class="">MERCI DE VOUS AUTHENTIFIER</h3>
                      <hr>
                      <img class="img" src="IPMIEZ.png">
                      <hr>
                
                    </div>
                    <!-- <form class="user" action="dao/process.php" method="post">  -->
                    <form class="user" id="login-form" method="post"> 
                    <!-- Material input -->
                      <div class="md-form input-with-pre-icon">
                        <i class="fas fa-user input-prefix"></i>
                       <input type="email" class="form-control" name="user_login" id="user_login"require> 
                       <label for="user_login">Entrer votre adresse email </label>
                     </div>
                            <!-- Material input -->
                     <div class="md-form input-with-pre-icon">
                        <i class="fas fa-lock input-prefix"></i>
                       <input type="password" class="form-control" name="user_password" id="user_password"require>
                       <label for="user_password">Entrer votre mot de passe </label>
                     </div> 
                      
                      <button type="submit" class="btn btn-success  btn-rounded btn-user btn-block form-control h-100" name="btn-login" id="btn-login">
                       <span class="glyphicon glyphicon-log-in"></span> &nbsp; M'AUTHENTIFIER !
                      </button>  
                      <hr> 
                    </form>
                    <div class="text-center">
                      <!-- <a class="small" href="forgot-password.html"></a> -->
                    </div>
                    <div class="text-center">
                      <h6><a class="small" href="register.html">J'ai une entreprise mais je n'ai pas encore de compte IPMIEZ</a></h6>
                    </div>
                    <hr>
                  </div>
            </div>
        </div>

      </div>

    </div>

  </div>


        </div><!-- #primary -->
             
</div></aside>    

        </div><!-- #content -->
        </div><!-- content-wrapper-->
            <div class="clearfix"></div>
        <footer id="colophon" class="site-footer" role="contentinfo">
            <div class="footer-wrapper">
                <div class="top-bottom wrapper">
                    <div id="footer-top">
                        <div class="footer-columns">
                                                   </div>
                    </div><!-- #foter-top -->
                    <div class="clearfix"></div>
                 </div><!-- top-bottom-->
                <div class="wrapper footer-copyright border text-center  fixed-bottom">
                    
                    <div class="site-info"><p> Copyright © SYNAPPS-BUSINESS-CONSULTING 77 904 75 54 </p>
                   </div><!-- .site-info -->
                </div>
            </div><!-- footer-wrapper-->
        </footer><!-- #colophon -->
        </div><!-- #page -->
 </div><!-- #page -->
            <!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
<script type="text/javascript" src="bootstrap/js/validation.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap/js/bootbox.min.js"></script>    
<script src="auth.js"></script>  

    </body>
</html>