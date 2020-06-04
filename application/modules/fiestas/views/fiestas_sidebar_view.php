<div class="row">

	<div class="col-xs-12 col-sm-4">
	<h3 class="alert alert-warning">Buscar Festival por mes</h3>
		<form role="form" action="<?php echo base_url();?>" method="post">
		  <div class="form-group">
		    <select name="mes-fiesta" id="mes-fiesta" class="form-control">
			<option value="">Seleccione el mes</option>
			<option value="<?php echo base_url();?>fiestas-tradicionales-y-festivales-en-enero">Fiestas y Festivales en Enero</a></option>
			<option value="<?php echo base_url();?>fiestas-tradicionales-y-festivales-en-febrero">Fiestas y Festivales en Febrero</a></option>
			<option value="<?php echo base_url();?>fiestas-tradicionales-y-festivales-en-marzo">Fiestas y Festivales en Marzo</a></option>
			<option value="<?php echo base_url();?>fiestas-tradicionales-y-festivales-en-abril">Fiestas y Festivales en Abril</a></option>
			<option value="<?php echo base_url();?>fiestas-tradicionales-y-festivales-en-mayo">Fiestas y Festivales en Mayo</a></option>
			<option value="<?php echo base_url();?>fiestas-tradicionales-y-festivales-en-junio">Fiestas y Festivales en Junio</a></option>
			<option value="<?php echo base_url();?>fiestas-tradicionales-y-festivales-en-julio">Fiestas y Festivales en Julio</a></option>
			<option value="<?php echo base_url();?>fiestas-tradicionales-y-festivales-en-agosto">Fiestas y Festivales en Agosto</a></option>
			<option value="<?php echo base_url();?>fiestas-tradicionales-y-festivales-en-septiembre">Fiestas y Festivales en Septiembre</a></option>
			<option value="<?php echo base_url();?>fiestas-tradicionales-y-festivales-en-octubre">Fiestas y Festivales en Octubre</a></option>
			<option value="<?php echo base_url();?>fiestas-tradicionales-y-festivales-en-noviembre">Fiestas y Festivales en Noviembre</a></option>
			<option value="<?php echo base_url();?>fiestas-tradicionales-y-festivales-en-diciembre">Fiestas y Festivales en Diciembre</a></option>
			</select>
		  </div>
		</form>
	</div>

	

	<div class="col-xs-12 col-sm-4">
	
	<h3 class="alert alert-warning">Buscar Festival por provincia</h3>
	<form role="form" action="<?php echo base_url();?>" method="get">
	  <div class="form-group">
	    <select name="provincia-fiesta" id="provincia-fiesta" class="form-control">
		<option value="">Seleccione la provincia</option>
		<option value="<?php echo base_url();?>fiestas-tradicionales-argentina-provincia-buenos-aires">Fiestas Tradicionales en Buenos Aires</a></option>
		<option value="<?php echo base_url();?>fiestas-tradicionales-argentina-provincia-catamarca">Fiestas Tradicionales en Catamarca</a></option>
		<option value="<?php echo base_url();?>fiestas-tradicionales-argentina-provincia-chaco">Fiestas Tradicionales en Chaco</a></option>
		<option value="<?php echo base_url();?>fiestas-tradicionales-argentina-provincia-chubut">Fiestas Tradicionales en Chubut</a></option>
		<option value="<?php echo base_url();?>fiestas-tradicionales-argentina-provincia-cordoba">Fiestas Tradicionales en C&oacute;rdoba</a></option>
		<option value="<?php echo base_url();?>fiestas-tradicionales-argentina-provincia-corrientes">Fiestas Tradicionales en Corrientes</a></option>
		<option value="<?php echo base_url();?>fiestas-tradicionales-argentina-provincia-entre-rios">Fiestas Tradicionales en Entre R&iacute;os</a></option>
		<option value="<?php echo base_url();?>fiestas-tradicionales-argentina-provincia-formosa">Fiestas Tradicionales en Formosa</a></option>
		<option value="<?php echo base_url();?>fiestas-tradicionales-argentina-provincia-jujuy">Fiestas Tradicionales en Jujuy</a></option>
		<option value="<?php echo base_url();?>fiestas-tradicionales-argentina-provincia-la-pampa">Fiestas Tradicionales en La Pampa</a></option>
		<option value="<?php echo base_url();?>fiestas-tradicionales-argentina-provincia-la-rioja">Fiestas Tradicionales en La Rioja</a></option>
		<option value="<?php echo base_url();?>fiestas-tradicionales-argentina-provincia-mendoza">Fiestas Tradicionales en Mendoza</a></option>
		<option value="<?php echo base_url();?>fiestas-tradicionales-argentina-provincia-misiones">Fiestas Tradicionales en Misiones</a></option>
		<option value="<?php echo base_url();?>fiestas-tradicionales-argentina-provincia-neuquen">Fiestas Tradicionales en Neuqu&eacute;n</a></option>
		<option value="<?php echo base_url();?>fiestas-tradicionales-argentina-provincia-rio-negro">Fiestas Tradicionales en R&iacute;o Negro</a></option>
		<option value="<?php echo base_url();?>fiestas-tradicionales-argentina-provincia-salta">Fiestas Tradicionales en Salta</a></option>
		<option value="<?php echo base_url();?>fiestas-tradicionales-argentina-provincia-san-juan">Fiestas Tradicionales en San Juan</a></option>
		<option value="<?php echo base_url();?>fiestas-tradicionales-argentina-provincia-san-luis">Fiestas Tradicionales en San Luis</a></option>
		<option value="<?php echo base_url();?>fiestas-tradicionales-argentina-provincia-santa-cruz">Fiestas Tradicionales en Santa Cruz</a></option>
		<option value="<?php echo base_url();?>fiestas-tradicionales-argentina-provincia-santa-fe">Fiestas Tradicionales en Santa F&eacute;</a></option>
		<option value="<?php echo base_url();?>fiestas-tradicionales-argentina-provincia-santiago-del-estero">Fiestas Tradicionales en Santiago del Estero</a></option>
		<option value="<?php echo base_url();?>fiestas-tradicionales-argentina-provincia-tierra-del-fuego">Fiestas Tradicionales en Tierra del Fuego</a></option>
		<option value="<?php echo base_url();?>fiestas-tradicionales-argentina-provincia-tucuman">Fiestas Tradicionales en Tucum&aacute;n</a></option>
		</select>
	  </div>
	</form>
	</div>



	<div class="col-xs-12 col-sm-4">
		 
		<h3 class="alert alert-warning">Sugerinos un Festival</h3>
				<a class="btn btn-success btn-block" href="<?php echo site_url('admin/festivales/index/add');?>" role="button">
		  <i class="fa fa-plus"></i> Agregar un festival
		</a>

		<br>
	
	</div>

  </div>