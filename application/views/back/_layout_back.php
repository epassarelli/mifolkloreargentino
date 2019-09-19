<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  
  <?php 
  if(isset($css_files)):
    foreach($css_files as $file): ?>
  	 <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
    <?php 
    endforeach; 
  endif; 
  ?>

</head>
<body>

  <!-- NAV
  ============================================= -->
  <?php $this->load->view("back/nav_h_back_view"); ?>

	<div style='height:60px;'></div>  
    <div class="container">

      <?php 
        if(isset($output)){
          echo $output; 
        }else{
          $this->load->view("admin_home_view");
        }
           
      ?>

    </div>

  <div style='height:20px;'></div>  
  
  <footer>
    <p>2018 - Derechos reservados</p>
  </footer>

</body>

  <?php 
  if(isset($js_files)):
    foreach($js_files as $file): ?>
    <script src="<?php echo $file; ?>"></script>
  <?php 
    endforeach; 
  else:
    ?>
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
    <?php
  endif; 
  ?>    
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>  

</html>


odk collect
forms en xml
y luego se puede acceder al servicio