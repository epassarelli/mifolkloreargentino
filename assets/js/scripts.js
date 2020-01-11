let urlBase = $('#url').val();

$(document).ready(function () {

	Principal()	

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
	if ($('#localidad').length && localidad.length > 0) {
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

	
    // Funcionalidad al seleccionar el adjunto
    $(document).on('change', '#Imagen',function() {
        name = $(this).val();
        fic = name.split('\\');
        var allowedExtensions = /(.jpg)$/i;
        // Validamos el tipo de archivo
        if (!allowedExtensions.exec(name)) {
            $(this).val('');
			alert('Seleccione solo archivos JPEG')
			$('#IMG').prop('src',urlBase+'assets/img/400x300.jpg').fadeIn();
        }else{
			var fileAdd = nombre(name)
			if (this.files && this.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
					$('#IMG').prop('src',e.target.result).fadeIn();
				}
				reader.readAsDataURL(this.files[0]);
			}
        }
     
	});
	
$('.chosen-select').chosen()


});


//Funcion para obtener nombre del fichero
function nombre(fic) {
	fic = fic.split('\\');
	 return fic[fic.length-1];
  }// fin nombre

function Principal(){
	$(document).on('keyup','#titulo',function(e){
			$('#alias').val(getCleanedString($(this).val()));
	});
}

function getCleanedString(cadena){
	// Definimos los caracteres que queremos eliminar
	var specialChars = "!@#$^&%*()+=-[]\/{}|:<>?,.";
 
	// Los eliminamos todos
	for (var i = 0; i < specialChars.length; i++) {
		cadena= cadena.replace(new RegExp("\\" + specialChars[i], 'gi'), '');
	}   
 
	// Lo queremos devolver limpio en minusculas
	cadena = cadena.toLowerCase().trim();
 
	// Quitamos espacios y los sustituimos por _ porque nos gusta mas asi
	cadena = cadena.replace(/ /g,"-");
 
	// Quitamos acentos y "ñ". Fijate en que va sin comillas el primer parametro
	cadena = cadena.replace(/á/gi,"a");
	cadena = cadena.replace(/é/gi,"e");
	cadena = cadena.replace(/í/gi,"i");
	cadena = cadena.replace(/ó/gi,"o");
	cadena = cadena.replace(/ú/gi,"u");
	cadena = cadena.replace(/ñ/gi,"n");
	return cadena;
 }