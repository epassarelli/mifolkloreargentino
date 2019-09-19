<!DOCTYPE html>
<html lang="es">

<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="google-site-verification" content="b4e3xgPWj0Fwb1N4ggo93LYs33S1uZ7EAUnyEaIGP90" />
    <meta name="author" content="WebPass" />
    <meta name="description" content="<?php if(isset($description)) echo $description; ?>">
	<meta name="keywords" content="<?php if(isset($keywords)) echo $keywords; ?>">	
	
    <!-- Stylesheets
    ============================================= -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css" defer>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,500italic,400italic,700,700italic%7CRoboto+Condensed:400,700%7CRoboto+Slab' rel='stylesheet' type='text/css' async>

    <!-- end:web fonts -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-social.css" async>
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/font-awesome.min.css" async>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
		
		body {
		  padding-top: 50px;
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
		
		.titulo{
			font-size: 24px;
			font-stretch: 90%;			
		}

		.img-responsive{
			width: 100%;
		}


	</style>


    <link href="<?php echo base_url()?>assets/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />

    <!-- Document Title
    ============================================= -->
    <title><?php echo $title?></title>
    
    <?php if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_head_view"); } ?>

	<?php if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("google_analitycs_view"); } ?>

	<!--<script src='https://www.google.com/recaptcha/api.js' async></script> -->

	
</head>

<body>

<?php //if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("facebook/fb_connect_view"); } ?>

	<!-- NAV
	============================================= -->
    <?php $this->load->view("nav_h_view"); ?>
	
	<!-- Header
	============================================= -->
	<?php if(isset($breadcrumb)): ?>
    <ol class="breadcrumb">
    	<?php 
    	foreach ($breadcrumb as $key => $value) {
    		# code...
    		echo "<li><a href='$value''>$key</a></li>";
    	}; 
    	?>
    	<li class="hidden-xs">
    	 <?php //if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("facebook/fb_like_count_view"); } ?>
    	</li>
	</ol>
	<?php endif; ?>


	<!-- Site Content
	============================================= -->
	<div class="container">
	    
		<div class="col-md-12">		
		
		<?php 
		if(!isset($view)){ 
			echo $output;
			}
			else{
				$this->load->view($view);
				}								
			?>

		</div>

	</div>

    <?php $this->load->view("social_share_view"); ?>
	
	<!-- Footer
	============================================= -->
	<?php $this->load->view("footer_view"); ?>	

    <!-- External JavaScripts
    ============================================= -->
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>	
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js" defer></script>
	<script src="<?php echo base_url();?>assets/js/scripts.js" defer></script>

</body>

</html>

	