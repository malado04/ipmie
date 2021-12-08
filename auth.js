   $(document).ready(function() {
    $("#login-form").validate({submitHandler: submitForm });   

     function submitForm()
     {    
      var data = $("#login-form").serialize(); 
      $.ajax({ 
      type : 'POST',
      url  : 'dao/process.php',
      data : data,
      beforeSend: function()
      {  
        $("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Patientez SVP ...'); 
      },
      success :  function(response)
         {       
          if (response==1) {
            
            $("#btn-login").html('Authentification en cours ...');

            bootbox.dialog({size: "small", 
              message: '<center><b>IPM IEZ</b><br><img class="img img-circle" src="img/btn-ajax-loader.gif" /><br/><label id="label"><center><h4>Authentification en cours...</h4></center></label>'});
            setTimeout('window.location.href = "views/1/"; ',700);
          } 
          else if (response==2) {
            
            $("#btn-login").html('Authentification en cours ...'); 
            bootbox.dialog({size: "small", 
              message: '<center><b>IPM IEZ</b><br><img class="img img-circle" src="img/btn-ajax-loader.gif" /><br/><label id="label"><center><h4>Authentification en cours...</h4></center></label>'});
            setTimeout('window.location.href = "views/2/"; ',700);//
          } 
          else if (response==3) {
            $("#btn-login").html('Authentification en cours ...');
            bootbox.dialog({size: "small", 
              message: '<center><b>IPM IEZ</b><br><img class="img img-circle" src="img/btn-ajax-loader.gif" /><br/><label id="label"><center><h4>Authentification en cours...</h4></center></label>'});
            setTimeout('window.location.href = "views/3/"; ',700);//Employeur
          }   
          else if (response==4) {
            
            $("#btn-login").html('Authentification en cours ...');

            bootbox.dialog({size: "small", 
              message: '<center><b>IPM IEZ</b><br><img class="img img-circle" src="img/btn-ajax-loader.gif" /><br/><label id="label"><center><h4>Authentification en cours...</h4></center></label>'});
            setTimeout('window.location.href = "views/4/"; ',700);//Inspecteur
          } 
          else if (response==5) {
            
            $("#btn-login").html('Authentification en cours ...');
            bootbox.dialog({size: "small", 
              message: '<center><b>IPM IEZ</b><br><img class="img img-circle" src="img/btn-ajax-loader.gif" /><br/><label id="label"><center><h4>Authentification en cours...</h4></center></label>'});
            setTimeout('window.location.href = "views/5/"; ',700); //SECRETAIRE
          }  
          else if (response==6) {
            
            $("#btn-login").html('Authentification en cours ...');

            bootbox.dialog({size: "small", 
              message: '<center><b>IPM IEZ</b><br><img class="img img-circle" src="img/btn-ajax-loader.gif" /><br/><label id="label"><center><h4>Authentification en cours...</h4></center></label>'});
            setTimeout('window.location.href = "views/6/"; ',700);//
          } 
          else if (response==7) {//Pour le recouvrement
            
            $("#btn-login").html('Authentification en cours ...');
            bootbox.dialog({size: "small", 
              message: '<center><b>IPM IEZ</b><br><img class="img img-circle" src="img/btn-ajax-loader.gif" /><br/><label id="label"><center><h4>Authentification en cours...</h4></center></label>'});
            setTimeout('window.location.href = "views/7/"; ',700);//Recouvrement
          }   
          else if (response==8) {//Pour le recouvrement
            
            $("#btn-login").html('Authentification en cours ...');
            bootbox.dialog({size: "small", 
              message: '<center><b>IPM IEZ</b><br><img class="img img-circle" src="img/btn-ajax-loader.gif" /><br/><label id="label"><center><h4>Authentification en cours...</h4></center></label>'});
            setTimeout('window.location.href = "views/8/"; ',700);//Recouvrement
          }   
          else if (response==9) {//Pour le recouvrement
            
            $("#btn-login").html('Authentification en cours ...');
            bootbox.dialog({size: "small", 
              message: '<center><b>IPM IEZ</b><br><img class="img img-circle" src="img/btn-ajax-loader.gif" /><br/><label id="label"><center><h4>Authentification en cours...</h4></center></label>'});
            setTimeout('window.location.href = "views/9/"; ',700);//Recouvrement
          }   
          else if (response==12) {//Pour le recouvrement
            
            $("#btn-login").html('Authentification en cours ...');
            bootbox.dialog({size: "small", 
              message: '<center><b>IPM IEZ</b><br><img class="img img-circle" src="img/btn-ajax-loader.gif" /><br/><label id="label"><center><h4>Authentification en cours...</h4></center></label>'});
            setTimeout('window.location.href = "views/12/"; ',700);//Recouvrement
          }   
          else if (response==13) {//Pour le recouvrement
            
            $("#btn-login").html('Authentification en cours ...');
            bootbox.dialog({size: "small", 
              message: '<center><b>IPM IEZ</b><br><img class="img img-circle" src="img/btn-ajax-loader.gif" /><br/><label id="label"><center><h4>Authentification en cours...</h4></center></label>'});
            setTimeout('window.location.href = "views/13/"; ',700);//Recouvrement
          } 
          else if (response==14) {//Pour le recouvrement
            
            $("#btn-login").html('Authentification en cours ...');
            bootbox.dialog({size: "small", 
              message: '<center><b>IPM IEZ</b><br><img class="img img-circle" src="img/btn-ajax-loader.gif" /><br/><label id="label"><center><h4>Authentification en cours...</h4></center></label>'});
            setTimeout('window.location.href = "views/14/"; ',700);//Recouvrement
          }else {
            bootbox.dialog({size: "small", 
              message: '<center><b>IPM IEZ</b><br><img class="img img-circle" src="img/btn-ajax-loader.gif" /><br/><label id="label">Paramètres d authentification invalides<center>'});
            
         
 } 
        }
      });
        return false;
    } ; 

  }); 
         