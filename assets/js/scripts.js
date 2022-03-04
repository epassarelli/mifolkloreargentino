$(document).ready(function() {
  let urlBase = $('#url').val();
  
  // bind change event to select
  $('#interprete').bind('change', function () {
    var url = $(this).val(); // get selected value
    if (url) { // require a URL
        window.location = url; // redirect
    }
    return false;
  });

  // bind change event to select
  $('#provincia-fiesta').bind('change', function () {
    var url = $(this).val(); // get selected value
    if (url) { // require a URL
        window.location = url; // redirect
    }
    return false;
  });

  // bind change event to select
  $('#mes-fiesta').bind('change', function () {
    var url = $(this).val(); // get selected value
    if (url) { // require a URL
        window.location = url; // redirect
    }
    return false;
  });

  //habilitamos el combo en la edicion
  if (localidad.length > 0) {
    localidad.disabled = false;
  }

  // Llena de localidades el combo dependiente
  $("#provincia").change( function() {
    $("#provincia option:selected").each( function() {
            provincia = $('#provincia').val();
      console.log(provincia);      
      $.post( 
        urlBase+"mipanel/localidades/getLocalidadesForm", 
        { provincia : provincia }, 
        function(data) {
          localidad.disabled = false;
                  $("#localidad").html(data);
            });
      
        });
        
  });
      
  // Carga de nueva letra
  $("#send").click(function(){       
   letra = $("#letra").val();
   cancion_id = '<?php if(isset($cancion->canc_id)){ echo $cancion->canc_id; } else { echo "1";}; ?>';
   $.ajax({
       type: "post",
       url: "<?php echo base_url('canciones/sugerirLetra'); ?>", 
       data: {letra: letra, cancion_id: cancion_id},
       dataType: "text",  
       cache:false,
       success: 
            function(devuelto){
              flag = parseInt(devuelto);
              if(flag == 1){
                $( '#error' ).empty();
                $( '#mensaje' ).html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Felicitaciones!</h4>Se sugerido exitosamente la letra de dicha canción.</div>');
              }
              else{
                alert('La letra sugerida no tiene la suficiente cantidad de caracteres');
                $( '#error' ).html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Atención!</h4>La letra sugerida no tiene la suficiente cantidad de caracteres necesarios.</div>');
              }
            }
        });
   return false;
  });


});