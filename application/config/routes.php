<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Inicio';
$route['otro'] = 'Inicio/otro';
$route['nosotros'] = 'Inicio/nosotros';
$route['contacto'] = 'Inicio/contacto';
$route['comercializacion'] = 'Inicio/comercializacion';
$route['terminos'] = 'Inicio/terminos';
$route['registro'] = 'Inicio/registro_view';

/*rutas para lt de usuarios */
$route['nuevo_usuario/save'] = "Usuarios_controller";
$route['usuarios/listado'] = "Usuarios_controller/list_user";
$route['usuarios/listJson'] = "Usuarios_controller/list_us";

/*rutas para bootgrid de usuarios */
$route['bootgrid/fetch_data'] = "Bootgrid/fetch_data";
$route['bootgrid/action'] = 'Bootgrid/action';
$route['bootgrid/fetch_single_data'] = 'Bootgrid/fetch_single_data';
$route['bootgrid/delete_data'] = 'Bootgrid/delete_data';

/*Login/Logout Routes*/
$route['login'] = "Login_controller";
$route['login/login'] = "Login_controller/login";
$route['us_logeado'] =  'Login_controller/us_logeado';
$route['logout'] = "Login_controller/logout";


$route['404_override'] = 'Inicio/error404';
$route['translate_uri_dashes'] = FALSE;
