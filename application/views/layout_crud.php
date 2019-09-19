<!DOCTYPE html>
<head>
	<meta charset="utf-8" />
    <!-- Stylesheets
    ============================================= -->
	<!-- start:web fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,500italic,400italic,700,700italic%7CRoboto+Condensed:400,700%7CRoboto+Slab' rel='stylesheet' type='text/css'>
    <!-- end:web fonts -->

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/estilos.css">	
	<?php 
	foreach($css_files as $file): ?>
		<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php endforeach; ?>
	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
		
		body {
		  padding-top: 70px;
		  padding-bottom: 0px;
		  /*background-color: #683914;*/
		}
		
		#page-footer{
			background: #000;
			bottom: 0px;
			margin: 20px 0 0 0;
			padding: 20px;
			color: #fff;
		}  

		#page-footer a{
			color: red;
		} 

		#page-footer a:hover{
			color: white;
		} 
		/* Media */

		.media{
		    margin: 0;
		    padding: 10px 0;
		    border-top: 1px dashed #ccc;
		}

		.media img{
		    width: 64px;
		    height: 64px;
		    padding: 3px;
		    border: 1px solid #ccc;
		}

		.ad-responsive{
			margin: 10px 0;
		}

	</style>

</head>
<body>
<nav> 
	<?php $this->load->view("nav_h_view"); ?> 
</nav>
	


<section class="container-fluid">
<div class="row">		
	<div class="col-md-2"><?php $this->load->view("nav_v_view"); ?> </div>
	<div class="col-md-10"><?php echo $output; ?></div>	
</div>		
</section>	

<footer class="footer"> 
	<?php $this->load->view("footer_view"); ?> 
</footer>
		
    <!-- External JavaScripts
    ============================================= -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>	
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>  
	<script src="<?php echo base_url();?>assets/js/scripts.js"></script> 
	<?php foreach($js_files as $file): ?>
		<script src="<?php echo $file; ?>"></script>
	<?php endforeach; ?>
</body>
</html>