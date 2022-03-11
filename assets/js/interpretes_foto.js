$(document).ready(function () {
    
    // url dinamica
    var url = $('#url').val();
    
    $('.iconoTipo').hide()

    //////////////////////////////////////////////////
    ///////// Funcionalidad de File  ////////////
    /////////////////////////////////////////////////

    // $('.fileIcon').hide();

    // Mostrando segun sea el caso: Editar/Insertar
    if ($('#nameFoto').val()) {
        $('.botonFile').hide()
        $('.botonDelete').show()
        userfile.required = false;
    }else{
        $('.botonFile').show()
        $('.botonDelete').hide()
    }

    //////////////////////////////////////////////////
    //
    // Validación de formato al seleccionar el adjunto
    //
    /////////////////////////////////////////////////

    $(document).on('change', '#userfile',function() {
      
        name = $(this).val();
        fic = name.split('\\');
        var allowedExtensions = /(.jpg)$/i;
        console.log(fic);
        // Validamos el tipo de archivo
        if (!allowedExtensions.exec(name)) {
            $(this).val('');
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: `El archivo ${fic[fic.length-1]} es invalido !`,
                footer: '<div class="txt-alimentos">Solo se permiten archivos .jpg</div>'
              })
              $('.fileIcon').fadeOut('slow');
        }else{
            if (name) {
                $('.fileIcon').fadeIn('slow');
                $('.titleAd').text(' '+fic[fic.length-1]);
            
            }else{
                $('.fileIcon').fadeOut('slow');
            }
        }

        
    });



    //Funcionalidad de boton eliminar
    $(document).on('click','.Eliminar',function () {
        var nameFile = $('#nameFoto').val(),
            id = $('#id').val()
            userfile.required = true;
            //console.log(nameFile + ' - ' + id);

        $.ajax({
            type: "POST",
            url: url+"mipanel/interpretes/deleteFile",
            data: {NameFile : nameFile, Id: id},
            success: function (response) {
                //console.log(response);
                if (response) {
                    $('.botonDelete').hide()
                    $('.botonFile').fadeIn('slow')
                    $('#nameFoto').val(null)
                    $('.close').trigger('click');                    
                    userfile.required = true;
                }
            }
        });
        
    });




});