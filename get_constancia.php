<?php

include('db_conn.php');

session_start();
$matricula = $_SESSION['username'];

$stmt = $conn->prepare("SELECT Nombre, Apellido FROM Alumnos WHERE Matricula = ?");
$stmt->bind_param('s', $matricula);
$stmt->execute();

$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $row = $result->fetch_array();
    $nombre = $row[0];
    $apellido = $row[1];
}

/* Incluimos la librería para generar PDFs desde php */
require_once('assets/tcpdf/tcpdf.php');

/* Configuración básica para crear un archivo pdf sin header y footer */
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('ITESM CCV');
$pdf->SetTitle('Constancia');
$pdf->SetSubject('Constancia de actividades DAE');
$pdf->SetKeywords('Constancia, dae, itesm, ccv');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

// set auto page breaks
$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// set font
$pdf->SetFont('times', '', 12);

// add a page
$pdf->AddPage();

$html = '
<p align="right">H. Córdoba, Ver. a GET FECHA</p>

<p>A quien corresponda:</p>

<p align="justify">El motivo de la presente, y para los fines del interesado, es hacer constar que el alumno
<strong>'.$nombre. ' '.$apellido.' </strong>, matrícula <strong>'.$matricula.'</strong> -quien se encuentra cursando el
quinto semestre de sus estudios profesionales en el Tecnológico de Monterrey Campus Central de Veracruz- destacándose
como una persona responsable y capaz, no solo en el desempeño de sus actividades académicas sino también a través de
la participación en diferentes actividades extraacadémicas, participando activamente en Difusión Cultural, Deportes y
Grupos Estudiantiles durante toda su estancia.</p>

<p align="justify">Por este motivo y por la determinación que '.$nombre.' '.$apellido.' siempre ha mostrado, me permito
recomendarlo - como Director de Asuntos Estudiantiles – como un alumno que participa activamente en las actividades
extracurriculares, quedando a sus órdenes para corroborar la presente información.</p>

<p>Agradezco de antemano la atención que sirvan prestar a la presente.</p>

<p align="center">Atentamente
<br />Lic. Juan F. Franco Zanatta
<br />Director de Asuntos Estudiantiles
<br />Dirección General
<br />Campus Central de Veracruz
<br />TECNOLÓGICO DE MONTERREY</p>

<p align="center">juan.franco@itesm.mx
<br />http://www.itesm.mx</p>

<p align="center">Tel. +52 (271) 717 0514, ext. 6620</p>
';

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->Output('Constancia', 'I');
