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

	// Llena de localidades el combo dependiente
	$("#provincia").change( function() {
                
		$("#provincia option:selected").each( function() {
            provincia = $('#provincia').val();
            
			$.post( 
				"../admin/localidades/getLocalidadesForm", 
				{ provincia : provincia }, 
				function(data) {
                	$("#localidad").html(data);
            });
			
        });
        
	});
    	
});