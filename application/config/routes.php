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

$route['default_controller'] = "feu";
$route['404_override'] = '';
$route[""] = 'feu/index';
/*
$route["inicio.html"] = 'feu/index';
$route["buscar.html"] = 'roche/buscar';
$route["busqueda"] = 'roche/aBuscar';
$route['ficha/(:num).html'] = 'roche/ficha/$1';
$route['editar/(:num).html'] = 'roche/editar/$1';
$route['imprimir/(:num).html'] = 'roche/imprimir/$1';
$route['agregar/certificado/(:num).html'] = 'roche/agregarCertificado/$1';
$route["ingresar.html"] = 'roche/ingresar';
$route['eliminar/(:num).html'] = 'roche/eliminar/$1';
$route['eliminarCertificado/(:num).html'] = 'roche/eliminarCertificado/$1';

 Metalurgica
$route['default_controller'] = "sitio";
$route['404_override'] = '';
$route['historia.html'] = 'sitio/historia';
$route['clientes.html'] = 'sitio/clientes';
$route['certificacion.html'] = 'sitio/certificacion';
$route['contacto.html'] = 'contacto';
$route['servicios/(:num)/(:any)'] = 'sitio/servicios/$1';
$route['proyecto/(:num)/(:any)'] = 'sitio/proyecto/$1';
*/
/*
$route['(\w{2})/(.*)'] = '$2';
$route['(\w{2})'] = $route['default_controller'];
*/
/* End of file routes.php */
/* Location: ./application/config/routes.php */