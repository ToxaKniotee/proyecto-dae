<?php
/* Obtenemos Twig */
require_once 'assets/Twig/Autoloader.php';

/* Registramos Twig */
Twig_Autoloader::register();

/* Cargamos la carpeta con los templates */
$loader = new Twig_Loader_Filesystem('assets/html');
$twig = new Twig_Environment($loader);

/* Nos conoctamos a la base de datos */
include('db_conn.php');

/* Creamos un array para cada una de las categorías, de esta forma podemos automatizar la búsqueda*/
$categories = array('grupos', 'difusion', 'deportes', 'prevencion');

/* Creamos un array general en donde vamos a poner cada una de las categorías que fatan por aprovar*/
$rev_wait = array();

/* Para cada una de las categorías traemos las actividades que no han sido aprovadas o rechazadas */
for ($i = 0; $i < count($categories); $i++) {
    /* Nombre de la categoría a buscar actividades sin registarar */
    $category_name = $categories[$i];

    /* Creamos el arreglo para esta categoría */
    $category = array();

    /* Creamos la sentencia */
    $sql = "SELECT A.Id, U.Nombre, A.Tipo, A.Nombre FROM Alumnos AS U, Actividades AS A WHERE A.Alumno = U.Matricula AND
    A.Categoria = '$category_name' AND A.Estado = 0";

    /* Ejecutamos la sentencia */
    $result = mysqli_query($conn, $sql);

    /* Si encontramos resultados entonces los guardamos en un arreglo y lo agregamos a la lista de esta categoría */
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $temp_array = array(
                'id' => $row[0],
                'alumno' => $row[1],
                'tipo' => $row[2],
                'nombre' => $row[3]);
            array_push($category, $temp_array);
        }
    }

    /* Finalmente agregamos la categoría al arreglo rev_wait */
    array_push($rev_wait, $category);
}

/* Creamos el array para las categorias */
$parameters = array(
    'categories' => array(
        'grupos' => array(
            'id' => 'grupos',
            'name' => 'Grupos Estudiantiles',
            'message' => 'Validar',
            'href' => '#myModalgrupos',
            'rev_wait' => $rev_wait[0]
        ),
        'difusion' => array(
            'id' => 'difusion',
            'name' => 'Difusión UUAAAUUU',
            'message' => 'Validar',
            'href' => '#myModaldifusion',
            'rev_wait' => $rev_wait[1]
        ),
        'deportes' => array(
            'id' => 'deportes',
            'name' => 'Deportes',
            'message' => 'Validar',
            'href' => '#myModaldeportes',
            'rev_wait' => $rev_wait[2]
        ),
        'prevencion' => array(
            'id' => 'prevencion',
            'name' => 'Prevención social',
            'message' => 'Validar',
            'href' => '#myModalprevencion',
            'rev_wait' => $rev_wait[3]
        ),
        'formacion' => array(
            'id' => 'formacion',
            'name' => 'Formación social',
            'message' => 'Validar',
            'href' => '#myModalformacion',
            'rev_wait' => $rev_wait[4]
        ),
        'itesm' => array(
            'id' => 'itesm',
            'name' => 'CCV',
            'message' => 'Ir',
            'href' => 'http://www.itesm.mx/wps/wcm/connect/Campus/CCV/'
        )
    )
);

/* Cargamos la página */
echo $twig->render('home_admin.twig', $parameters);
