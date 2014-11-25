<?php
/* Obtenemos Twig */
require_once 'assets/Twig/Autoloader.php';

/* Registramos Twig */
Twig_Autoloader::register();

/* Cargamos la carpeta con los templates */
$loader = new Twig_Loader_Filesystem('assets/html');
$twig = new Twig_Environment($loader);

/* Nos conectamos a la base de datos */
include('db_conn.php');

/* Consulta para traer la lista de actividades de este usuario */
$sql ='SELECT A.Id, A.Tipo, A.Nombre, A.Descripcion, A.Rol, A.Periodo,
A.AreaImpacto, A.Aprendizajes, A.Competencias FROM Actividades as A, Alumnos
as U WHERE A.Alumno = U.Matricula';

/* Ejecutamos la consulta */
$result = mysqli_query($conn, $sql);

/* Creamos el array */
$list = array();

/* Si los resultados no estan vacios entonces los agregamos a un array */
if (mysqli_num_rows($result) > 0) {
    
    /* Agregamos las entradas a la lista */
    while ($row = mysqli_fetch_array($result)) {
        $temp_array = array(
            'ID' => $row[0],
            'Tipo' => $row[1],
            'Nombre' => $row[2],
            'Descripción' => $row[3],
            'Rol' => $row[4],
            'Periodo' => $row[5],
            'Área' => $row[6],
            'Aprendizaje' => $row[7],
            'Competencia' => $row[8]);
        array_push($list, $temp_array);
    }
}

/* Creamos el array para las categorias */
$parameters = array(
    'categories' => array(
        'grupos' => array(
            'id' => 'grupos',
            'name' => 'Grupos Estudiantiles',
            'message' => 'Registra tu actividad',
            'href' => '#myModalgrupos',
            'types' => array('SALIN', 'SATI', 'SALAE', 'SAIIS','SALEM','SAPREPA','LIDERAZGO','INNOVACION')),
        'difusion' => array(
            'id' => 'difusion',
            'name' => 'Difusión Cultural',
            'message' => 'Registra tu actividad',
            'href' => '#myModaldifusion',
            'types' => array('Hip-Hop', 'Teatro', 'Baile de salón', 'Fotografía','Canto','Batería','Guitarra','Piano','Armonía')),
        'deportes' => array(
            'id' => 'deportes',
            'name' => 'Deportes',
            'message' => 'Registra tu actividad',
            'href' => '#myModaldeportes',
            'types' => array('Basquetbol Varonil', 'Futbol Varonil Mayor', 'Futbol Varonil Juvenil', 'Voleibol Femenil','Gimnasio','Tenis','Kick-boxing','Tae Kwon Do','Cross fit')),
        'prevencion' => array(
            'id' => 'prevencion',
            'name' => 'Prevención social',
            'message' => 'Registra tu actividad',
            'href' => '#myModalprevencion',
            'types' => array('Anorexia', 'Bulimia', 'Alimentación', 'Drogadicción','Tabaquismo','SIDA','Alcoholismo','Baby Care')),
        'formacion' => array(
            'id' => 'formacion',
            'name' => 'Formación social',
            'message' => 'Registra tu actividad',
            'href' => '#myModalformacion',
            'types' => array('Prep@net', 'Fundación Córdoba', 'Patronato Casa Hogar "Córdoba, A.C."', 'Cree','CRIO','Cihuatl')),
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
    'areas' => array('Social', 'Ambiental', 'Económico'),
    'list' => $list
);

/* Cargamos la página */
echo $twig->render('home.twig', $parameters);
