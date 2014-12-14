<?php
/* Obtenemos Twig */
require_once 'assets/Twig/Autoloader.php';

/* Registramos Twig */
Twig_Autoloader::register();

/* Cargamos la carpeta con los templates */
$loader = new Twig_Loader_Filesystem('assets/html');
$twig = new Twig_Environment($loader);

/* Obtenemos la matricula */
session_start();
$matricula = $_SESSION['username'];

/* Nos conectamos a la base de datos */
include('db_conn.php');

/* Consulta para traer la lista de actividades de este usuario */
$stmt = $conn->prepare("SELECT A.Id, A.Tipo, A.Nombre, A.Descripcion, A.Rol, A.Periodo,
A.AreaImpacto, A.Aprendizajes, A.Competencias FROM Actividades as A, Alumnos
as U WHERE A.Alumno = U.Matricula AND U.Matricula = ?");
$stmt->bind_param('s', $matricula);
$stmt->execute();

/* Guardamos los resultados */
$stmt->store_result();

/* Creamos el array */
$list = array();

/* Si los resultados no estan vacios entonces los agregamos a un array */
if ($stmt->num_rows > 0) {
    
    /* Asignamos los parámetros */
    $stmt->bind_result($id, $tipo, $nombre, $descripcion, $rol, $periodo, $area, $aprendizaje, $competencia);

    /* Agregamos las entradas a la lista */
    while ($stmt->fetch()) {
        $temp_array = array(
            'ID' => $id,
            'Tipo' => $tipo,
            'Nombre' => $nombre,
            'Descripción' => $descripcion,
            'Rol' => $rol,
            'Periodo' => $periodo,
            'Área' => $area,
            'Aprendizaje' => $aprendizaje,
            'Competencia' => $competencia);
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
