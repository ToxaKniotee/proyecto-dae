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
            'message' => 'Registra tu actividad',
            'href' => '#myModalgrupos',
            'types' => array('Mesa', 'SATI', 'SALAE', 'SAIIS')),
        'difusion' => array(
            'id' => 'difusion',
            'name' => 'Difusión UUAAAUUU',
            'message' => 'Registra tu actividad',
            'href' => '#myModaldifusion',
            'types' => array('Mesa', 'SATI', 'SALAE', 'SAIIS')),
        'deportes' => array(
            'id' => 'deportes',
            'name' => 'Deportes',
            'message' => 'Registra tu actividad',
            'href' => '#myModaldeportes',
            'types' => array('Mesa', 'SATI', 'SALAE', 'SAIIS')),
        'prevencion' => array(
            'id' => 'prevencion',
            'name' => 'Prevención social',
            'message' => 'Registra tu actividad',
            'href' => '#myModalprevencion',
            'types' => array('Mesa', 'SATI', 'SALAE', 'SAIIS')),
        'formacion' => array(
            'id' => 'formacion',
            'name' => 'Formación social',
            'message' => 'Registra tu actividad',
            'href' => '#myModalformacion',
            'types' => array('Mesa', 'SATI', 'SALAE', 'SAIIS')),
        'itesm' => array(
            'id' => 'itesm',
            'name' => 'ITESM',
            'message' => 'Visitar',
            'href' => 'http://www.itesm.mx/wps/wcm/connect/Campus/CCV/Central+de+Veracruz')),
    'roles' => array('Organizador','Colaborador', 'Participante'),
    'periodos' => array(
        'Bimestral Sep - Nov de 2014',
        'Marzo - Noviembre de 2014',
        'Semestral  Ago - Dic de 2014',
        'Semestral Ene - May de 2015',
        'Septiembre 2014 - Marzo 2015',
        'Tetramestral May - Ago 2014',
        'Tetramestral Sep - Dic 2014',
        'Ttramestre Sep-Dic 2014',
        'Trimestral Ene - Abr de 2015',
        'Trimestral Sep - Dic de 2014'),
    'areas' => array('Social', 'Ambiental', 'Económico')
);

/* Cargamos la página */
echo $twig->render('home.twig', $parameters);
