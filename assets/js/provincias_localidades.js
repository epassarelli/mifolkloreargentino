$(document).ready(function() {
  
  let urlBase = $('#url').val();

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

}); 
