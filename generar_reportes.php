<?php

/* Obtenemos los valores */
$type = $_GET['tipo'];

/* Incluimos la librería para generar archivos de Excel */
require_once 'assets/PHPExcel/PHPExcel.php';

/* Nos conectamos a la base de datos */
include('db_conn.php');

/* switch para diferenciar el tipo de reporte que se quiera */
switch ($type) {
    /* Por alumno */
    case 1:
        $columns = array('Alumno', 'Id', 'Estado', 'Nombre', 'Descripción', 'Categoría', 'Tipo', 'Rol', 'Periodo', 'Area de impacto', 'Aprendizajes', 'Competencias', 'Puntaje', 'Observaciones');
        $sql = 'SELECT Alumno, Id, Estado, Nombre, Descripcion, Categoria, Tipo, Rol, Periodo, AreaImpacto, Aprendizajes, Competencias, Puntaje, Observaciones FROM Actividades ORDER BY Alumno';
        break;

    /* Por generación */
    case 2:
        $columns = array('Generación', 'Id', 'Estado', 'Descripción', 'Alumno', 'Categoría', 'Tipo', 'Rol', 'Periodo', 'Area de impacto', 'Aprendizajes', 'Competencias', 'Puntaje', 'Observaciones');
        $sql = 'SELECT U.Generacion, A.Id, A.Estado, A.Descripcion, A.Alumno, A.Categoria, A.Tipo, A.Rol, A.Periodo, A.AreaImpacto, A.Aprendizajes, A.Competencias, A.Puntaje, A.Observaciones FROM Actividades AS A, Alumnos AS U WHERE A.Alumno = U.Matricula ORDER BY U.Generacion';
        break;

    /* Por Estatus */
    case 3:
        $columns = array('Estado', 'Id', 'Nombre', 'Descripción', 'Alumno', 'Categoría', 'Tipo', 'Rol', 'Periodo', 'Areade impacto', 'Aprendizajes', 'Competencias', 'Puntaje', 'Observaciones');
        $sql = 'SELECT Estado, Id, Nombre, Descripcion, Alumno, Categoria, Tipo, Rol, Periodo, AreaImpacto, Aprendizajes, Competencias, Puntaje, Observaciones FROM Actividades ORDER BY Estado';
        break;

    /* Por actividad */
    case 4:
        $columns = array('Nombre', 'Id', 'Estado', 'Descripción', 'Alumno', 'Categoría', 'Tipo', 'Rol', 'Periodo', 'Area de impacto', 'Aprendizajes', 'Competencias', 'Puntaje', 'Observaciones');
        $sql = 'SELECT Nombre, Id, Estado, Descripcion, Alumno, Categoria, Tipo, Rol, Periodo, AreaImpacto, Aprendizajes, Competencias, Puntaje, Observaciones FROM Actividades ORDER BY Nombre';
        break;

    /* Por periodo */
    case 5:
        $columns = array('Periodo', 'Id', 'Nombre', 'Estado', 'Descripción', 'Alumno', 'Categoría', 'Tipo', 'Rol', 'Area de impacto', 'Aprendizajes', 'Competencias', 'Puntaje', 'Observaciones');
        $sql = 'SELECT Periodo, Id, Nombre, Estado, Descripcion, Alumno, Categoria, Tipo, Rol, AreaImpacto, Aprendizajes, Competencias, Puntaje, Observaciones FROM Actividades ORDER BY Periodo';
        break;

    /* Por rango puntaje */
    case 6:
        $columns = array('Puntaje', 'Id', 'Estado', 'Nombre', 'Descripción', 'Alumno', 'Categoría', 'Tipo', 'Rol', 'Periodo', 'Area de impacto', 'Aprendizajes', 'Competencias', 'Observaciones');
        $sql = 'SELECT Puntaje, Id, Estado, Nombre, Descripcion, Alumno, Categoria, Tipo, Rol, Periodo, AreaImpacto, Aprendizajes, Competencias, Observaciones FROM Actividades ORDER BY Puntaje';
        break;
    default:
        echo ('Error');
        exit;
}

/* Creamos el objeto encargado de escribir los datos en la base de datos */
$excelWriter = new PhpExcel();

/* Establecemos las propiedades del documento */
$excelWriter->getProperties()->setCreator('DAE CCV')->setLastModifiedBy('DAE CCV')->setTitle('Reporte');

/* Creamos el index que servira para saber que columna es la que hay que escribir */
$column_char = 'A';

/* Llenamos los titulos */
for ($i = 0; $i < count($columns); $i++) {
    $excelWriter->setActiveSheetIndex(0)->setCellValue($column_char.'1', $columns[$i]);
    $column_char++;
}

/* Obtenelos los datos de la base de datos */
$result = mysqli_query($conn, $sql);

/* Checamos si obtuvimos resultados, en caso de que así sea nos ponemos a llenarlos a excel */
if (mysqli_num_rows($result) > 0) {

    /* Creamos desde que fila empezamos a llenar el excel */
    $row_num = 2;

    /* Recorremos las filas y vamos llenando los archivos */
    while ($row = mysqli_fetch_array($result)) {
        /* Volvemos a empezar desde la primera columna */
        $column_char = 'A';

        for ($i = 0; $i < count($columns); $i++) {
            $excelWriter->setActiveSheetIndex(0)->setCellValue($column_char.$row_num, $row[$i]);
            $column_char++;
        }

        /* Actualizamos la fila */
        $row_num++;
    }
}

$column_char = 'A';

/* Asignamos el tamaño por default */
for ($i = 0; $i <= count($columns); $i++) {
    $excelWriter->setActiveSheetIndex(0)->getColumnDimension($column_char)->setAutoSize(true);
    $column_char++;
}

/* Asignamos nombre a la pestaña */
$excelWriter->getActiveSheet()->setTitle('Alumnos');
 
/* Activamos la pestaña principal */
$excelWriter->setActiveSheetIndex(0);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Reportedealumnos.xlsx"');
header('Cache-Control: max-age=0');
 
$objWriter = PHPExcel_IOFactory::createWriter($excelWriter, 'Excel2007');
$objWriter->save('php://output');
exit;
