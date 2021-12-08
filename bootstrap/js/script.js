$('document').ready(function()
{ 
	 $("#login-form").validate({submitHandler: submitForm });   

	   function submitForm()
	   {		
			var data = $("#login-form").serialize(); 
			$.ajax({ 
			type : 'POST',
			url  : 'https://ipmiez.com/dao/process.php',
			data : data,
			beforeSend: function()
			{	 
				$("#btn-cni").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Patientez SVP ...'); 
			},
			success :  function(response) 
			   {		   
			   	if (response==1) {
						
						$("#btn-cni").html('Authentification en cours ...');

            bootbox.dialog({size: "small", message: '<center><b>Gestion IPMIEZ</b></center><br><center><img class="img img-circle" src="https://ipmiez.com/bootstrap/images/waiting.gif" /></center><br/><label id="label"><center><h4>Authentification en cours...</h4></center></label>'});
						setTimeout('window.location.href = "https://ipmiez.com/views/1/"; ',3000);
					}
			   	else if (response==2) {
						
						$("#btn-cni").html('Authentification en cours ...');
						bootbox.dialog({size: "small", message: '<img class="img img-circle" src="https://ipmiez.com/bootstrap/images/waiting.gif" /><label><center>Authentification en cours...</center></label>'});
						setTimeout('window.location.href = "https://ipmiez.com/views/2/"; ',3000);
					}
			   	else if (response==3) {
						
						$("#btn-cni").html('Authentification en  cours...');
						bootbox.dialog({size: "small", message: '<img class="img img-circle" src="https://ipmiez.com/bootstrap/images/waiting.gif" /><label><center>Authentification en cours...</center></label>'});
						setTimeout('window.location.href = "https://ipmiez.com/views/3/"; ',3000);
						} 
			   	else if (response==4) {
						
						$("#btn-cni").html('Authentification en  cours...');
						bootbox.dialog({size: "small", message: '<img class="img img-circle" src="https://ipmiez.com/bootstrap/images/waiting.gif" /><label><center>Authentification en cours...</center></label>'});
						setTimeout('window.location.href = "https://ipmiez.com/views/4/"; ',3000);
						} 
			   	else {
						bootbox.dialog({size: "small", message: '<img class="img img-circle" src="https://ipmiez.com/bootstrap/images/waiting.gif" /><label><center>'+response});
			  			setTimeout('window.location.href = "index.php"; ',2500);

 } 
			  }
			});
				return false;
		} ;

  $("#employeurform").submit(function( event ) {  
    var data = $("#employeurform").serialize(); 
      $.ajax({ 
      type : 'POST',
      url  : 'process.php',
      data : data,
      beforeSend: function()
      {    
        $("#btncni").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Patientez SVP ...'); 
      },
      success :  function(response)
         {            
          if(response==1){  
           bootbox.dialog({ 
            size: "small",
            message: '<div id="modal"><img class="img-cirlce" src="https://ipmiez.com/bootstrap/images/waiting.gif" /><br/>Enregistrement en cours ...</div>'});
            setTimeout('window.location.href = "https://ipmiez.com/views/administrateur/etape2.php"; ',2000);
            
          }
          else{
              bootbox.dialog({ 
              size: "small",
              message: '<div id="modal"><img id="imgbootbox" src="https://ipmiez.com/bootstrap/images/waiting.gif" /></div>'});
            setTimeout('window.location.href = "https://ipmiez.com/views/administrateur/index.php"; ',2000);

                   }
        },
        error: function() { 
          alert('error');
        }
      });
        return false;


        });   
   
  });
