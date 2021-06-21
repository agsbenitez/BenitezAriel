<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Inicio';
$route['otro'] = 'Inicio/otro';
$route['nosotros'] = 'Inicio/nosotros';
$route['contacto'] = 'Inicio/contacto';
$route['comercializacion'] = 'Inicio/comercializacion';
$route['terminos'] = 'Inicio/terminos';
$route['registro'] = 'Inicio/registro_view';

/*rutas para lt de usuarios */
$route['nuevo_usuario/save'] = "Usuarios_controller/action";
$route['usuarios/listado'] = "Usuarios_controller/list_user";
$route['usuarios/fetch_data'] = "Usuarios_controller/fetch_data";
$route['usuarios/delete_data'] = "Usuarios_controller/delete_data";
$route['usuarios/mis_compras'] = "Usuarios_controller/mis_compras";
$route['usuarios/ver_mis_compras'] = "Usuarios_controller/ver_mis_compras";
$route['usuarios/ver_mis_compras_detail'] = "Usuarios_controller/ver_mis_compras_detail";

/*rutas para bootgrid de usuarios */
//$route['bootgrid/fetch_data'] = "Bootgrid/fetch_data";
$route['bootgrid/action'] = 'Bootgrid/action';
$route['bootgrid/fetch_single_data'] = 'Bootgrid/fetch_single_data';
$route['bootgrid/delete_data'] = 'Bootgrid/delete_data';

/*Categorias Routes */
$route['categorias/fetch_data'] = "Categorias_controller/fetch_data";

/*Produc Routes */
$route['productos/produc'] = "Produc_controller";
$route['productos/fetch_data'] = "Produc_controller/fetch_data";
$route['productos/action'] = "Produc_controller/action";
$route['productos/fetch_single_data'] = "Produc_controller/fetch_single_data";
$route['productos/delete_data'] = "Produc_controller/delete_data";
$route['productos/ver'] = "Produc_controller/ver";


/*Carrito*/
$route['cart/add'] = "Cart_controller/add";
$route['carrito_items'] = "Cart_controller/ver";
$route['carrito'] = "Cart_controller/carrito_list";
$route['carrito/delete'] = "Cart_controller/delete_item";
$route['carrito/modificar'] = "Cart_controller/modificar_item";
$route['carrito/carrito_total'] = "Cart_controller/carrito_total";
$route['carrito/save'] = "Cart_controller/save_purchase";


/*Login/Logout Routes*/
$route['login'] = "Login_controller";
$route['login/login'] = "Login_controller/login";
$route['us_logeado'] =  'Login_controller/us_logeado';
$route['logout'] = "Login_controller/logout";

/*Perfiles*/
$route['perfil/fecth_data'] = "Perfil_controller/fetch_data";


$route['404_override'] = 'Inicio/error404';
$route['translate_uri_dashes'] = FALSE;
$route['info'] = 'Inicio/info';
