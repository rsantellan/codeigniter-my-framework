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

$route['default_controller'] = "celsius";
$route[""] = 'celsius/index';
$route["^(en|es)"] = 'celsius/index/$1';
$route["^(en|es)/categoria/(:num)/(:any).html"] = 'celsius/category/$1/$2/$3';
$route["^(en|es)/category/(:num)/(:any).html"] = 'celsius/category/$1/$2/$3';
$route["^(en|es)/presentacion.html"] = 'celsius/presentacion/$1';
$route["^(en|es)/presentation.html"] = 'celsius/presentacion/$1';
$route["^(en|es)/infraestructura.html"] = 'celsius/infraestructura/$1';
$route["^(en|es)/infrastructure.html"] = 'celsius/infraestructura/$1';
$route["^(en|es)/mercados.html"] = 'celsius/mercados/$1';
$route["^(en|es)/markets.html"] = 'celsius/mercados/$1';
$route["^(en|es)/recursos-humanos.html"] = 'celsius/recursoshumanos/$1';
$route["^(en|es)/human-resources.html"] = 'celsius/recursoshumanos/$1';
$route["^(en|es)/salon-conferencias.html"] = 'celsius/salonconferencias/$1';
$route["^(en|es)/conference-room.html"] = 'celsius/salonconferencias/$1';
$route["^(en|es)/novedades.html"] = 'celsius/novedades/$1';
$route["^(en|es)/news.html"] = 'celsius/novedades/$1';
$route["^(en|es)/novedades-(:num).html"] = 'celsius/novedades/$1/$2';
$route["^(en|es)/news-(:num).html"] = 'celsius/novedades/$1/$2';
$route["^(en|es)/novedad/(:num)/(:any).html"] = 'celsius/novedad/$1/$2/$3';
$route["^(en|es)/new/(:num)/(:any).html"] = 'celsius/novedad/$1/$2/$3';
$route["^(en|es)/casos-estudio.html"] = 'celsius/casoestudio/$1';
$route["^(en|es)/study-case.html"] = 'celsius/casoestudio/$1';
$route["^(en|es)/casos-estudio-(:num).html"] = 'celsius/casoestudio/$1/$2';
$route["^(en|es)/study-case-(:num).html"] = 'celsius/casoestudio/$1/$2';
$route['^(en|es)/casos-estudio/(:num).html'] = 'celsius/downloadFile/$1/$2';
$route['^(en|es)/study-case/(:num).html'] = 'celsius/downloadFile/$1/$2';
$route["^(en|es)/eventos.html"] = 'celsius/eventos/$1';
$route["^(en|es)/events.html"] = 'celsius/eventos/$1';
$route["^(en|es)/eventos-(:num).html"] = 'celsius/eventos/$1/$2';
$route["^(en|es)/events-(:num).html"] = 'celsius/eventos/$1/$2';
$route["^(en|es)/congresos.html"] = 'celsius/congresos/$1';
$route["^(en|es)/congress.html"] = 'celsius/congresos/$1';
$route["^(en|es)/congresos-(:num).html"] = 'celsius/congresos/$1/$2';
$route["^(en|es)/congress-(:num).html"] = 'celsius/congresos/$1/$2';
/*
$route['404_override'] = 'feu/showerror';
$route["historia-que-es-el-raid.html"] = 'feu/historiaraid';
$route["historia-feu.html"] = 'feu/historiafeu';
$route["historia-campeones.html"] = 'feu/historiacampeones';
$route["historia-deportistas.html"] = 'feu/historiadeportistas';
$route["historia-deportistas.html"] = 'feu/historiadeportistas';
$route["historia-presidentes.html"] = 'feu/historiapresidentes';
$route["documentacion.html"] = 'feu/documentacion';
$route['documento/(:num).html'] = 'feu/downloadFile/$1';
$route["jornadas.html"] = 'feu/jornadas';
$route['jornadas-(:num).html'] = 'feu/jornadas/$1';
$route['jornada/(:num).html'] = 'feu/downloadFile/$1';
$route["formularios.html"] = 'feu/formularios';
$route['formulario/(:num).html'] = 'feu/downloadFile/$1';
$route["feu-directiva.html"] = 'feu/directiva';
$route["instituciones.html"] = 'feu/instituciones';
$route["veterinarios.html"] = 'feu/veterinarios';
$route["veterinarios-jefes.html"] = 'feu/veterinariosjefes';
$route["laboratorios.html"] = 'feu/laboratorios';
$route["galerias.html"] = 'feu/galerias';
$route['galerias-(:num).html'] = 'feu/galerias/$1';
$route['galeria/(:num)/(:any).html'] = 'feu/galeria/$1/$2';
$route["promotores.html"] = 'feu/promotores';
$route["radios.html"] = 'feu/radios';
$route["noticias.html"] = 'feu/noticias';
$route['noticias-(:num).html'] = 'feu/noticias/$1';
$route['noticia/(:num)/(:any).html'] = 'feu/noticia/$1/$2';
$route['noticia-descarga/(:num).html'] = 'feu/downloadFile/$1';
$route["noticia-busqueda.html"] = 'feu/noticiasbusqueda';
$route["noticia-busqueda-(:num).html/(:any)"] = 'feu/noticiasbusqueda/$1/$2';
$route["contacto.html"] = 'feu/contacto';
$route["contacto-enviado.html"] = 'feu/contactosuccess';
$route["pruebas-cortas.html"] = 'feu/pruebascortas';
$route["pruebas-largas.html"] = 'feu/pruebaslargas';
$route['prueba-descarga/(:num).html'] = 'feu/downloadFile/$1';
*/
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