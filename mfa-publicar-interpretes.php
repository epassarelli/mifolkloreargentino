<?php
/* vars for export */
// database record to be exported
$db_record = 'mfa-publicar-interpretes';
// optional where query
$where = 'WHERE 1 ORDER BY 1';
// filename for export
$csv_filename = 'db_export_'.$db_record.'_'.date('Y-m-d').'.csv';
// database variables
$hostname = "localhost";
$user     = "lalo0471_mfa";
$password = "Flor12Pitu19";
$database = "lalo0471_mfa";
// Database connecten voor alle services
mysql_connect($hostname, $user, $password)
or die('Could not connect: ' . mysql_error());
					
mysql_select_db($database)
or die ('Could not select database ' . mysql_error());
// create empty variable to be filled with export data
$csv_export = '';
// query to get data from database
//$query = mysql_query("SELECT * FROM ".$db_record." ".$where);
$query = mysql_query("SELECT inte_nombre, inte_foto, inte_alias FROM interprete WHERE inte_habilitado=1");

$field = mysql_num_fields($query);


// create line with field names
for($i = 0; $i < $field; $i++) {
  $csv_export.= mysql_field_name($query,$i).';';
}
// newline (seems to work both on Linux & Windows servers)
$csv_export.= '
';
// loop through database query and fill export variable
while($row = mysql_fetch_array($query)) {
  // create line with field values
  for($i = 0; $i < $field; $i++) {
    
  	//Agrego urls a las fotos y links
  	switch ($i) {
  		case 0: # code...
  			$csv_export.= 'Biografia de '.$row[mysql_field_name($query,$i)].';';	 
  			break;
  		case 1: # code...
  			if($row[mysql_field_name($query,$i)] == ''){
  				$csv_export.= '"http://www.mifolkloreargentino.com.ar/assets/img/mfa.jpg";'; 
  			  }
  				else{
					  $csv_export.= '"http://www.mifolkloreargentino.com.ar/assets/upload/interpretes/'.$row[mysql_field_name($query,$i)].'";'; 
  				  }  			 			
  			break;
  		case 2: # code...
  			$csv_export.= '"http://www.mifolkloreargentino.com.ar/biografia-de-'.$row[mysql_field_name($query,$i)].'";';
  			break;  			  		
  		default: # code...
  			break;
  	}
  }	
  $csv_export.= '
  ';	
}

// Export the data and prompt a csv file for download
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=".$csv_filename."");
echo($csv_export);
?>