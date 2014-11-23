<?php
/* Obtenemos Twig */
require_once 'assets/Twig/Autoloader.php';

/* Registramos Twig */
Twig_Autoloader::register();

/* Cargamos la carpeta con los templates */
$loader = new Twig_Loader_Filesystem('assets/html');
$twig = new Twig_Environment($loader);

/* Creamos el array para las categorias */
$parameters = array(
    'categories' => array(
        'grupos' => array(
            'id' => 'grupos',
            'name' => 'Grupos Estudiantiles',
            'message' => 'Validar',
            'href' => '#myModalgrupos',
            'types' => array('Mesa', 'SATI', 'SALAE', 'SAIIS')),
        'difusion' => array(
            'id' => 'difusion',
            'name' => 'Difusión UUAAAUUU',
            'message' => 'Validar',
            'href' => '#myModaldifusion',
            'types' => array('Mesa', 'SATI', 'SALAE', 'SAIIS')),
        'deportes' => array(
            'id' => 'deportes',
            'name' => 'Deportes',
            'message' => 'Validar',
            'href' => '#myModaldeportes',
            'types' => array('Mesa', 'SATI', 'SALAE', 'SAIIS')),
        'prevencion' => array(
            'id' => 'prevencion',
            'name' => 'Prevención social',
            'message' => 'Validar',
            'href' => '#myModalprevencion',
            'types' => array('Mesa', 'SATI', 'SALAE', 'SAIIS')),
        'formacion' => array(
            'id' => 'formacion',
            'name' => 'Formación social',
            'message' => 'Validar',
            'href' => '#myModalformacion',
            'types' => array('Mesa', 'SATI', 'SALAE', 'SAIIS')),
        'itesm' => array(
            'id' => 'itesm',
            'name' => 'CCV',
            'message' => 'Ir',
            'href' => 'http://www.itesm.mx/wps/wcm/connect/Campus/CCV/'))
);

/* Cargamos la página */
echo $twig->render('home_admin.twig', $parameters);
