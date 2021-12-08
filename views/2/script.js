   $(document).ready(function() {
 
  
  $('#entreprise').DataTable({
        responsive: {
          details: {
            display: $.fn.dataTable.Responsive.display.modal({
              header: function(row) {
                var data = row.data();
                return 'Details for ' + data[0] + ' ' + data[1];
              }
            }),
            renderer: $.fn.dataTable.Responsive.renderer.tableAll({
              tableClass: 'table'
            })
          }
        }
      }); 
  
  $('#employeur').DataTable({
        responsive: {
          details: {
            display: $.fn.dataTable.Responsive.display.modal({
              header: function(row) {
                var data = row.data();
                return 'Details for ' + data[0] + ' ' + data[1];
              }
            }),
            renderer: $.fn.dataTable.Responsive.renderer.tableAll({
              tableClass: 'table'
            })
          }
        }
      }); 
  
   $('.delete_Employeur').click(function(e){
   
   e.preventDefault();
  // alert("dddd");
   var pid = $(this).attr('data-id');
   var parent = $(this).parent("td").parent("tr");   
   bootbox.dialog({
     message: '<div id="modal"><img src="https://ipmiez.com/bootstrap/images/btn-ajax-loader.gif" /><br/>Etes-vous sûr de la suppression ?</div>', 
    title: "<i class='glyphicon glyphicon-trash'></i> Supprimer ! ",
     buttons: {
    success: {
      label: "Non, annuler",
      className: "btn-success",
      callback: function() {
      $('.bootbox').modal('hide');
      }
    },
    danger: {
      label: "Oui, supprimer!",
      className: "btn-danger",
      callback: function() {
       
       
       $.ajax({
        
        type: 'POST',
        url: 'process.php',
        data: 'deleteemployeur='+pid
        
       })
       .done(function(response){
        
        bootbox.alert(response);
        parent.fadeOut('slow');
        
       })
       .fail(function(){
        
        bootbox.alert('Erreur de suppression');
                
       })
              
      }
    }
     }
   });
   
  });

    

  $("#employerform").submit(function( event ) {  
    var data = $("#employerform").serialize(); 
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
            message: '<div id="modal"><img src="https://ipmiez.com/bootstrap/images/btn-ajax-loader1.gif" />Enregistrement en cours ...</div>'});
            setTimeout('window.location.href = "https://ipmiez.com/administrateur/etape3.php"; ',1500);
          }
          else{
              bootbox.dialog({ 
            size: "small",
              message: '<div id="modal"><img id="imgbootbox" src="https://ipmiez.com/bootstrap/images/btn-ajax-loader1.gif" /><br/></div>'+response});
               setTimeout('window.location.href = "https://ipmiez.com/administrateur/etape3.php"; ',2000);

                   }
        },
        error: function() { 
          alert('error');
        }
      });
        return false;


        });   
 /*--------------------------------------------------------------------------------------------------------------*/
 
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
            setTimeout('window.location.href = "https://ipmiez.com/administrateur/etape2.php"; ',2000);
            
          }
          else{
              bootbox.dialog({ 
              size: "small",
              message: '<div id="modal"><img id="imgbootbox" src="https://ipmiez.com/bootstrap/images/waiting.gif" /></div>'+response});
           // setTimeout('window.location.href = "https://ipmiez.com/administrateur/index.php"; ',2000);

                   }
        },
        error: function() { 
          alert('error');
        }
      });
        return false;


        });   
 
 /*--------------------------------------------------------------------------------------------------------------*/

  $("#epouseform").submit(function( event ) {  
    var data = $("#epouseform").serialize(); 
      $.ajax({ 
      type : 'POST',
      url  : 'process1.php',
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
            message: '<div id="modal"><img src="https://ipmiez.com/bootstrap/images/waiting.gif" />Enregistrement en cours ...</div>'+response});
            setTimeout('window.location.href = "https://ipmiez.com/administrateur/etape4.php"; ',1500);
          }
          else{
              bootbox.dialog({ 
            size: "small",
              message: '<div id="modal"><img id="imgbootbox" src="https://ipmiez.com/bootstrap/images/waiting.gif" /><br/></div>'+response});
               setTimeout('window.location.href = "https://ipmiez.com/administrateur/etape4.php"; ',2000);

                   }
        },
        error: function() { 
          alert('error');
        }
      });
        return false;


        });   
  
 /*--------------------------------------------------------------------------------------------------------------*/

  $("#enfantform").submit(function( event ) { 
  //alert("dsdsdsds"); 
    var data = $("#enfantform").serialize(); 
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
            message: '<div id="modal"><img src="https://ipmiez.com/bootstrap/images/btn-ajax-loader2.gif" />Enregistrement en cours, Patientez SVP ...</div>'});
            setTimeout('window.location.href = "https://ipmiez.com/administrateur/etape4.php"; ',1500);
          }
          else{
              bootbox.dialog({ 
            size: "small",
              message: '<div id="modal"><img id="imgbootbox" src="https://ipmiez.com/bootstrap/images/btn-ajax-loader1.gif" /><br/></div>'+response});
               setTimeout('window.location.href = "https://ipmiez.com/administrateur/etape4.php"; ',2000);

                   }
        },
        error: function() { 
          alert('error');
        }
      });
        return false;


        });   

  $(".listeEmployer").click(function(e){
    e.preventDefault(); 
 
   var pid = $(this).attr('data-id');
   var pnom = $(this).attr('data-nom');
   var pprenom = $(this).attr('data-prenom'); 
    $("#nom").val(pnom);
    $("#prenom").val(pprenom);
    alert(pnom);
  });
  
   $("#entrepriseform").submit(function( event ) {  
    var data = $("#entrepriseform").serialize(); 
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
            setTimeout('window.location.href = "https://ipmiez.com/administrateur/etape3.php"; ',2000);
            
          }
          else{
              bootbox.dialog({ 
              size: "small",
              message: '<div id="modal"><img id="imgbootbox" src="https://ipmiez.com/bootstrap/images/waiting.gif" /></div>'+response
            });
           //  setTimeout('window.location.href = "https://ipmiez.com/administrateur/index.php"; ',2000);

                   }
        },
        error: function() { 
          alert('error');
        }
      });
        return false;


        });   

    $('#buttonsuivant').click(function(e){
      e.preventDefault(); 
      bootbox.dialog({ 
      size: "small",
      message: '<div id="modal"><img class="img-cirlce" id="imgbootbox" src="https://ipmiez.com/bootstrap/images/waiting.gif" /></div>'});
      setTimeout('window.location.href = "https://ipmiez.com/administrateur/etape4.php"; ',1500);

    });



    $('.ajoutEpouse').click(function(e){
     e.preventDefault();

     var pid = $(this).attr('data-id');  
    // alert(pid);
    // var parent = $(this).parent("td").parent("tr");  
      $("#idemployer").val(pid);  
 }); 



    $('.ajoutEnfant').click(function(e){
     e.preventDefault();

     var pid = $(this).attr('data-id');  
     //alert(pid);
    // var parent = $(this).parent("td").parent("tr");  
      $("#idemployerenfant").val(pid);  
 }); 

      }); 