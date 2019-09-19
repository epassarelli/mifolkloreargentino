<div class="row">
    
    <div class="col-md-9">

        <h1>Mis datos</h1>
        <?php if(isset($fila)): ?>
        <table class="table table-hover">

            <tr>
            <td>Usuario:</td>
            <td><?php echo $fila->username;?></td>
            </tr>

            <tr>
            <td>Correo:</td>
            <td><?php echo $fila->email;?></td>
            </tr>

        </table>
        <?php else: ?>

        <p>No hemos encontrado en nuestra Base de Datos lo solicitado</p>

    <?php endif; ?>
    
    </div>

    <div class="col-md-3">

        <h2>Preguntas Frecuentes</h2>

    </div>

</div>