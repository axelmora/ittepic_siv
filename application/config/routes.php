<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'logeo';
$route['404_override'] = 'W_error_control';
$route['translate_uri_dashes'] = FALSE;
$route['instancias_r/pagina/(:num)'] = 'instancia';//cuando no sea la primera página
$route['instancias_r/pagina'] = 'instancia';//cuando sea la primera página
$route['controller_inicio'] = 'inicio';
