<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "sitio";
$route['404_override'] = '';
$route['pre-ventas.html'] = 'sitio/preventa';
$route['quienes-somos.html'] = 'sitio/quienessomos';
$route['obras.html'] = 'sitio/obras';
$route['proyectos.html'] = 'sitio/proyectos';
$route['alquileres'] = 'sitio/alquileres';
$route['ventas'] = 'sitio/ventas';
$route['abusqueda'] = 'sitio/searchAlquiler';
$route['alquiler/(:num)/(:any)'] = 'sitio/alquiler/$1';
$route['venta/(:num)/(:any)'] = 'sitio/venta/$1';
$route['vbusqueda'] = 'sitio/searchVentas';
$route['contacto.html'] = 'contacto';
/*
$route['historia.html'] = 'sitio/historia';
$route['clientes.html'] = 'sitio/clientes';
$route['certificacion.html'] = 'sitio/certificacion';

$route['servicios/(:num)/(:any)'] = 'sitio/servicios/$1';
$route['proyecto/(:num)/(:any)'] = 'sitio/proyecto/$1';
*/
/*
$route['(\w{2})/(.*)'] = '$2';
$route['(\w{2})'] = $route['default_controller'];
*/
/* End of file routes.php */
/* Location: ./application/config/routes.php */
