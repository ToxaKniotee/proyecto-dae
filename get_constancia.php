<?php

include('db_conn.php');

session_start();
$matricula = $_SESSION['username'];

$sql = "SELECT Nombre, Apellido FROM Alumnos WHERE Matricula = '$matricula'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    $nombre = $row[0];
    $apellido = $row[1];
}

/* Creamos un archivo tex */
$tex_file = fopen('/toxa/constancia.tex', 'w');
fwrite(
    $tex_file,
    "\\documentclass{letter}

\\textheight    = 20cm
\\textwidth     = 18cm
\\topmargin     = -2cm
\\oddsidemargin = -1cm
\\parindent     =  0mm

\\usepackage{amsmath, amssymb, amsfonts, latexsym}
\\usepackage[T1]{fontenc}
\\usepackage[utf8]{inputenc}
\\usepackage[spanish]{babel}
\\usepackage{graphicx}


\\begin{document}
\\pagestyle{empty}
\\begin{center}
\\hspace{-14.5cm}\includegraphics[width=2cm]{images/dae.jpg}

\\hspace{10.5cm}H. Córdoba, Ver. a 23 de septiembre de 2014




\\end{center}

\\vspace{1.2cm}A quien corresponda

\\vspace{1.5cm}El motivo de la presente, y para los fines del interesado, es hacer constar que el alumno {\\bf $nombre $apellido}, matrícula {\\bf $matricula} -quien se encuentra cursando el quinto semestre de sus estudios profesionales en el Tecnológico de Monterrey Campus Central de Veracruz- destacándose como una persona responsable y capaz, no solo en el desempeño de sus actividades académicas sino también a través de la participación en diferentes actividades extraacadémicas, participando activamente en Difusión Cultural, Deportes y Grupos Estudiantiles durante toda su estancia. 

Por este motivo y por la determinación que $nombre $apellido siempre ha mostrado, me permito recomendarlo - como Director de Asuntos Estudiantiles – como un alumno que participa activamente en las actividades extracurriculares, quedando a sus órdenes para corroborar la presente información. 

Agradezco de antemano la atención que sirvan prestar a la presente. 

\\begin{center}

\\vspace{1.2cm}Atentamente.

Lic. Juan F. Franco Zanatta

\\includegraphics[width=2cm]{images/firma.jpg}

Director de Asuntos Estudiantiles

Dirección General

Campus Central de Veracruz

TECNOLÓGICO DE MONTERREY

juan.franco@itesm.mx

http://www.itesm.mx

Tel. +52 (271) 717 0514, ext. 6620
\\end{center}


\\end{document}"
);
fclose($tex_file);

/* Compilamos el latex */
system('cd /toxa; pdflatex constancia.tex', $var);

/* Obtenemos el archivo generado */
$file = fopen('/toxa/constancia.pdf', 'r');

/* Regresamos el archivo */
$file = '/toxa/constancia.pdf';
if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
    exit;
}
