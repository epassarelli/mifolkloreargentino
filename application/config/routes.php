<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/* Rutas de Cartelera Folklorica */
$route['cartelera-folklorica/dia/(:num)/(:num)/(:num)'] = 'cartelera/getPorDia/$1/$2/$3';
$route['cartelera-folklorica/mes/(:num)/(:num)'] 		= 'cartelera/getPorMes/$1/$2';
$route['cartelera-folklorica/eventos-de-(:any)'] 		= 'cartelera/getPorInterprete/$1';

$route['cartelera-folklorica/miseventos/editar'] 		= 'cartelera/evento/editar';
$route['cartelera-folklorica/miseventos/nuevo'] 		= 'cartelera/evento/nuevo';
$route['cartelera-folklorica/miseventos'] 				= 'cartelera/evento';

$route['cartelera-folklorica'] 							= 'cartelera';

/* Rutas de Mitos y Leyendas */
$route['penias-folkloricas'] 							= 'penias';
$route['penias-folkloricas-en-(:num)-(:any)'] 			= 'penias';

/* Rutas de Mitos y Leyendas */
$route['mitos-leyendas-y-creencias-con-(:any)'] 		= 'mitos/letra/$1';
$route['mitos-y-leyendas/(:num)-(:any)'] 				= 'mitos/mostrar/$1';
$route['mitos-y-leyendas'] 								= 'mitos';

/* Ruta anterior que esta indexada x Google */
$route['mitos-y-leyendas-del-folklore-argentino/(:num)-(:any)']	= 'mitos/mostrar/$1';

/* Rutas de Comidas Tipicas */        
$route['recetas-de-comidas-tipicas-con-(:any)'] 		= 'comidas/letra/$1';
$route['recetas-de-comidas-tipicas/(:num)-(:any)'] 		= 'comidas/mostrar/$1';
$route['recetas-de-comidas-tipicas'] 					= 'comidas';

/* Ruta anterior que esta indexada x Google */
$route['comidas-tipicas-del-folklore-argentino/(:num)-(:any)'] 	= 'comidas/mostrar/$1';

/* Rutas de grupoas y solistas */
$route['grupos-y-solistas-con-(:any)'] 					= 'interpretes/letra/$1';
$route['grupos-y-solistas/(:num)-(:any)'] 				= 'interpretes/mostrar/$1';
$route['grupos-y-solistas'] 							= 'interpretes';
$route['autores-y-compositores'] 						= 'interpretes';

/* Rutas de Biografias */
$route['biografia-de-(:any)'] 							= 'interpretes/mostrar/$1';
$route['biografias-de-interpretes-con-(:any)'] 			= 'interpretes/letra/$1';
$route['biografias/(:num)-(:any)'] 						= 'interpretes/mostrar/$1';
$route['biografias'] 									= 'interpretes';

/* Rutas de Discografias */
$route['discografia-de-(:any)/(:any)'] 					= 'discografias/mostrar/$1/$2';
$route['discografia-de-(:any)'] 						= 'discografias/artista/$1';
$route['discografias'] 									= 'discografias';

/* Rutas de las Letras de Canciones */
$route['letras-de-canciones-de-(:any)/(:any)'] 			= 'canciones/mostrar/$1/$2';
$route['letras-de-canciones-de-(:any)'] 				= 'canciones/artista/$1';
$route['letras-de-canciones/buscar'] 					= 'canciones/buscar';
$route['letras-de-canciones/sugerir'] 					= 'canciones/sugerir';
$route['letras-de-canciones/sugerida'] 					= 'canciones/sugerida';
$route['letras-de-canciones'] 							= 'canciones';

$route['fotos-de-(:any)'] 								= 'fotos/artista/$1';

$route['videos-de-(:any)/(:any)'] 						= 'videos/mostrar/$1/$2';
$route['videos-de-(:any)'] 								= 'videos/artista/$1';

$route['noticias-de-(:any)/(:any)'] 					= 'noticias/mostrar/$1/$2';
$route['noticias-de-(:any)'] 							= 'noticias/artista/$1';

$route['shows-de-(:any)'] 								= 'cartelera/getPorInterprete/$1';

/* Rutas de Fiestas tradicionales de Argentina */
$route['fiestas-tradicionales-argentina/(:any)/(:any)'] = 'fiestas/detalle_edicion/$1/$2';
$route['fiestas-tradicionales-argentina/(:any)'] 		= 'fiestas/detalle_fiesta/$1';
$route['fiestas-tradicionales-argentina'] 				= 'fiestas';

$route['fiestas-tradicionales-argentina-provincia-(:any)'] 	= 'fiestas/listado_por_provincia/$1';
$route['fiestas-tradicionales-y-festivales-en-(:any)'] 	= 'fiestas/listado_por_mes/$1';

$route['radios-para-escuchar-folklore-argentino'] 		= 'radio';
$route['politicas-de-privacidad'] 		= 'privacidad';

##########################################################################################
###
###    Rutas de BackEnd de Usuarios Administradores

/* Mis Datos */

// Mis datos como usuario
$route['admin/misdatos']					= "mipanel/misdatos";

// Mis artistas administrados
$route['admin/interpretes']				= "mipanel/interpretes";
// Editar los datos de un artista administrado
$route['admin/interpretes/nuevo']				= "mipanel/interpretes/nuevo";
// Editar los datos de un artista administrado
$route['admin/interpretes/editar/(:any)']		= "mipanel/interpretes/editar/$1";
// Mostrar los datos de un artista administrado
$route['admin/interpretes/ver/(:any)']		= "mipanel/interpretes/ver/$1";
// Mostrar los datos de un artista administrado
$route['admin/interpretes/eliminar/(:any)']	= "mipanel/interpretes/eliminar/$1";
// Solicitar administrar un artista
$route['admin/interpretes/solicitar']			= "mipanel/interpretes/solicitar";
// Mostrar los datos de un artista administrado
$route['admin/interpretes/administrar/(:any)']= "mipanel/interpretes/administrar/$1";

// Shows de mis artistas
$route['admin/shows']					= "mipanel/shows";
// Nuevo show de uno de mis artistas
$route['admin/shows/nuevo']			= "mipanel/shows/nuevo";
// Editar un show de uno de mis artistas
$route['admin/shows/editar']			= "mipanel/shows/editar";

// Noticias de mis artistas
$route['admin/misnoticias']				= "mipanel/noticias";
// Nueva noticia de uno de mis artistas
$route['admin/misnoticias/nueva']			= "mipanel/noticias/nueva";
$route['admin/misnoticias/editar/(:any)']	= "mipanel/noticias/editar/$1";


$route['admin/discos']					= "mipanel/discos";
$route['admin/discos/nuevo']			= "mipanel/discos/nuevo";
$route['admin/discos/editar']			= "mipanel/discos/editar";


$route['admin/canciones']				= "mipanel/canciones";
$route['admin/canciones/nueva']		= "mipanel/canciones/nueva";
$route['admin/canciones/editar']		= "mipanel/canciones/editar";

##########################################################################################
###
###    Sugerido por Usuarios

//$route['sugerir-un-interprete']			= "interpretes/sugerir";
//$route['sugerir-una-letra']				= "canciones/sugerir";
//$route['sugerir-una-noticia']			= "noticias/sugerir";
//$route['sugerir-un-show']				= "cartelera/sugerir";
//$route['sugerir-un-disco']				= "discografias/sugerir";
//$route['sugerir-una-radio']				= "radio/create";
//$route['sugerir-una-penia']				= "penias/sugerir";
//$route['sugerir-una-comida']			= "comidas/sugerir";
//$route['sugerir-un-mito']				= "mitos/sugerir";
//$route['sugerir-un-festival']			= "fiestas/sugerir";
//$route['sugerir-un-video']				= "videos/sugerir";
