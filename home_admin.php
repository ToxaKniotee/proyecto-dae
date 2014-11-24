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
            'types' => array('Mesa', 'SATI', 'SALAE', 'SAIIS'),
            'rev_wait' => array(
                array(
                    'id' => '3996226_1',
                    'alumno' => 'Durán',
                    'tipo' => 'Congreso C13',
                    'nombre' => 'El congreso de Ingeniería ...'
                ),
                array(
                    'id' => '3996226_2',
                    'alumno' => 'Aurioles',
                    'tipo' => 'Prevención padres Jóvenes',
                    'nombre' => 'El programa de prevención ...'
                ),
                array(
                    'id' => '3996226_2',
                    'alumno' => 'Franco',
                    'tipo' => 'Congreso C14',
                    'nombre' => 'El congreso de Ingeniería ...'
                ),
                array(
                    'id' => '3996226_3',
                    'alumno' => 'Reyes',
                    'tipo' => 'Fútbol Soccer',
                    'nombre' => 'El equipo representativo ...'
                ),
                array(
                    'id' => '3996226_4',
                    'alumno' => 'Alor',
                    'tipo' => 'SATI',
                    'nombre' => 'La mesa de tecnológías ...'
                ),
                array(
                    'id' => '3996226_5',
                    'alumno' => 'Martínez',
                    'tipo' => 'Mecatrónica',
                    'nombre' => 'El diplomado en mecatrónica ...'
                )
            )
        ),
        'difusion' => array(
            'id' => 'difusion',
            'name' => 'Difusión UUAAAUUU',
            'message' => 'Validar',
            'href' => '#myModaldifusion',
            'types' => array('Mesa', 'SATI', 'SALAE', 'SAIIS'),
            'rev_wait' => array(
                array(
                    'id' => '3996226_1',
                    'alumno' => 'Durán',
                    'tipo' => 'Congreso C13',
                    'nombre' => 'El congreso de Ingeniería ...'
                ),
                array(
                    'id' => '3996226_2',
                    'alumno' => 'Aurioles',
                    'tipo' => 'Prevención padres Jóvenes',
                    'nombre' => 'El programa de prevención ...'
                ),
                array(
                    'id' => '3996226_2',
                    'alumno' => 'Franco',
                    'tipo' => 'Congreso C14',
                    'nombre' => 'El congreso de Ingeniería ...'
                ),
                array(
                    'id' => '3996226_3',
                    'alumno' => 'Reyes',
                    'tipo' => 'Fútbol Soccer',
                    'nombre' => 'El equipo representativo ...'
                ),
                array(
                    'id' => '3996226_4',
                    'alumno' => 'Alor',
                    'tipo' => 'SATI',
                    'nombre' => 'La mesa de tecnológías ...'
                ),
                array(
                    'id' => '3996226_5',
                    'alumno' => 'Martínez',
                    'tipo' => 'Mecatrónica',
                    'nombre' => 'El diplomado en mecatrónica ...'
                )
            )
        ),
        'deportes' => array(
            'id' => 'deportes',
            'name' => 'Deportes',
            'message' => 'Validar',
            'href' => '#myModaldeportes',
            'types' => array('Mesa', 'SATI', 'SALAE', 'SAIIS'),
            'rev_wait' => array(
                array(
                    'id' => '3996226_1',
                    'alumno' => 'Durán',
                    'tipo' => 'Congreso C13',
                    'nombre' => 'El congreso de Ingeniería ...'
                ),
                array(
                    'id' => '3996226_2',
                    'alumno' => 'Aurioles',
                    'tipo' => 'Prevención padres Jóvenes',
                    'nombre' => 'El programa de prevención ...'
                ),
                array(
                    'id' => '3996226_2',
                    'alumno' => 'Franco',
                    'tipo' => 'Congreso C14',
                    'nombre' => 'El congreso de Ingeniería ...'
                ),
                array(
                    'id' => '3996226_3',
                    'alumno' => 'Reyes',
                    'tipo' => 'Fútbol Soccer',
                    'nombre' => 'El equipo representativo ...'
                ),
                array(
                    'id' => '3996226_4',
                    'alumno' => 'Alor',
                    'tipo' => 'SATI',
                    'nombre' => 'La mesa de tecnológías ...'
                ),
                array(
                    'id' => '3996226_5',
                    'alumno' => 'Martínez',
                    'tipo' => 'Mecatrónica',
                    'nombre' => 'El diplomado en mecatrónica ...'
                )
            )
        ),
        'prevencion' => array(
            'id' => 'prevencion',
            'name' => 'Prevención social',
            'message' => 'Validar',
            'href' => '#myModalprevencion',
            'types' => array('Mesa', 'SATI', 'SALAE', 'SAIIS'),
            'rev_wait' => array(
                array(
                    'id' => '3996226_1',
                    'alumno' => 'Durán',
                    'tipo' => 'Congreso C13',
                    'nombre' => 'El congreso de Ingeniería ...'
                ),
                array(
                    'id' => '3996226_2',
                    'alumno' => 'Aurioles',
                    'tipo' => 'Prevención padres Jóvenes',
                    'nombre' => 'El programa de prevención ...'
                ),
                array(
                    'id' => '3996226_2',
                    'alumno' => 'Franco',
                    'tipo' => 'Congreso C14',
                    'nombre' => 'El congreso de Ingeniería ...'
                ),
                array(
                    'id' => '3996226_3',
                    'alumno' => 'Reyes',
                    'tipo' => 'Fútbol Soccer',
                    'nombre' => 'El equipo representativo ...'
                ),
                array(
                    'id' => '3996226_4',
                    'alumno' => 'Alor',
                    'tipo' => 'SATI',
                    'nombre' => 'La mesa de tecnológías ...'
                ),
                array(
                    'id' => '3996226_5',
                    'alumno' => 'Martínez',
                    'tipo' => 'Mecatrónica',
                    'nombre' => 'El diplomado en mecatrónica ...'
                )
            )
        ),
        'formacion' => array(
            'id' => 'formacion',
            'name' => 'Formación social',
            'message' => 'Validar',
            'href' => '#myModalformacion',
            'types' => array('Mesa', 'SATI', 'SALAE', 'SAIIS'),
            'rev_wait' => array(
                array(
                    'id' => '3996226_1',
                    'alumno' => 'Durán',
                    'tipo' => 'Congreso C13',
                    'nombre' => 'El congreso de Ingeniería ...'
                ),
                array(
                    'id' => '3996226_2',
                    'alumno' => 'Aurioles',
                    'tipo' => 'Prevención padres Jóvenes',
                    'nombre' => 'El programa de prevención ...'
                ),
                array(
                    'id' => '3996226_2',
                    'alumno' => 'Franco',
                    'tipo' => 'Congreso C14',
                    'nombre' => 'El congreso de Ingeniería ...'
                ),
                array(
                    'id' => '3996226_3',
                    'alumno' => 'Reyes',
                    'tipo' => 'Fútbol Soccer',
                    'nombre' => 'El equipo representativo ...'
                ),
                array(
                    'id' => '3996226_4',
                    'alumno' => 'Alor',
                    'tipo' => 'SATI',
                    'nombre' => 'La mesa de tecnológías ...'
                ),
                array(
                    'id' => '3996226_5',
                    'alumno' => 'Martínez',
                    'tipo' => 'Mecatrónica',
                    'nombre' => 'El diplomado en mecatrónica ...'
                )
            )
        ),
        'itesm' => array(
            'id' => 'itesm',
            'name' => 'CCV',
            'message' => 'Ir',
            'href' => 'http://www.itesm.mx/wps/wcm/connect/Campus/CCV/',
            'rev_wait' => array(
                array(
                    'id' => '3996226_1',
                    'alumno' => 'Durán',
                    'tipo' => 'Congreso C13',
                    'nombre' => 'El congreso de Ingeniería ...'
                ),
                array(
                    'id' => '3996226_2',
                    'alumno' => 'Aurioles',
                    'tipo' => 'Prevención padres Jóvenes',
                    'nombre' => 'El programa de prevención ...'
                ),
                array(
                    'id' => '3996226_2',
                    'alumno' => 'Franco',
                    'tipo' => 'Congreso C14',
                    'nombre' => 'El congreso de Ingeniería ...'
                ),
                array(
                    'id' => '3996226_3',
                    'alumno' => 'Reyes',
                    'tipo' => 'Fútbol Soccer',
                    'nombre' => 'El equipo representativo ...'
                ),
                array(
                    'id' => '3996226_4',
                    'alumno' => 'Alor',
                    'tipo' => 'SATI',
                    'nombre' => 'La mesa de tecnológías ...'
                ),
                array(
                    'id' => '3996226_5',
                    'alumno' => 'Martínez',
                    'tipo' => 'Mecatrónica',
                    'nombre' => 'El diplomado en mecatrónica ...'
                )
            )
        )
    )
);

/* Cargamos la página */
echo $twig->render('home_admin.twig', $parameters);
