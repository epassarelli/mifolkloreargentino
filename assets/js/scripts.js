let urlBase = $('#url').val();

$(function(){


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
            
			$.post( 
				urlBase+"admin/localidades/getLocalidadesForm", 
				{ provincia : provincia }, 
				function(data) {
					localidad.disabled = false;
                	$("#localidad").html(data);
            });
			
        });
        
	});
    	
});