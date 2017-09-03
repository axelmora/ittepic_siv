<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_reportes extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Residencia/m_reportes');
    }

    public function index() {
        if ($this->session->userdata('perfil') == FALSE) {
            redirect(base_url() . 'index.php/logeo');
        }
        if ($this->session->userdata('perfil') == 'jeferesidencia') {
            $this->load->view('Residencia/JefeResidencia/v_reportes');
        } else {
            $this->load->view('notienespermisos');
        }
    }

    public function reporte1() { //EL GENERAL
        $this->load->library('Pdf');
        $resolution = array(216, 279);
        $pdf = new Pdf('L', 'mm', $resolution, true, 'UTF-8', false);

        $pdf->SetAuthor('Javier Alonso');
        $pdf->SetTitle('Instituto Tecnologico de Tepic');
        $pdf->SetSubject('Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        $image_file = 'sin.png';

        // datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config_alt.php de libraries/config
        $pdf->SetHeaderData($image_file, PDF_HEADER_LOGO_WIDTH, 'Instituto Tecnologico de Tepic', 's');

        // datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

        // se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);

        // se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        //relación utilizada para ajustar la conversión de los píxeles
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // ---------------------------------------------------------
        // establecer el modo de fuente por defecto
        $pdf->setFontSubsetting(true);

        // Establecer el tipo de letra
        //Si tienes que imprimir carácteres ASCII estándar, puede utilizar las fuentes básicas como
        // Helvetica para reducir el tamaño del archivo.
        $pdf->SetFont('helvetica', '', 10);

        // Añadir una página
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);

        // Este método tiene varias opciones, consulta la documentación para más información.
        $resolution = array(279, 216);
        $pdf->AddPage('L', 'mm', $resolution, true, 'UTF-8', false);

        //fijar efecto de sombra en el texto
        $pdf->setTextShadow(array('disabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

        // Establecemos el contenido para imprimir
        $imgdata = base64_decode('iVBORw0KGgoAAAANSUhEUgAAABwAAAASCAMAAAB/2U7WAAAABlBMVEUAAAD///+l2Z/dAAAASUlEQVR4XqWQUQoAIAxC2/0vXZDrEX4IJTRkb7lobNUStXsB0jIXIAMSsQnWlsV+wULF4Avk9fLq2r8a5HSE35Q3eO2XP1A1wQkZSgETvDtKdQAAAABJRU5ErkJggg==');

        $fecha1 = $this->input->post('fecha_inicio');
        $fecha2 = $this->input->post('fecha_fin');
        $carrerai = $this->input->post('carrerai');
        $sector = $this->input->post('sector');
        $generalsi = true;
        $sectorsi = true;
        $carrerasi = true;
        $todosi = true;
        $generalno = true;
        $sectorno = true;
        $carrerano = true;
        $todono = true;
        $data = array(
            'fecha1' => $fecha1,
            'fecha2' => $fecha2,
        );

        if ($this->input->post('residencia')) {
            $generalno = false;
            $sectorno = false;
            $carrerano = false;
            $todono = false;
            if ($carrerai == 1 && $sector == 1) {
                $result = $this->m_reportes->general_si($data);
                $generalsi = true;
                $sectorsi = false;
                $carrerasi = false;
                $todosi = false;
            }
            if ($carrerai == 1 && $sector != 1) {
                $data['sector'] = $sector;
                $result = $this->m_reportes->sector_si($data);
                $generalsi = false;
                $sectorsi = true;
                $carrerasi = false;
                $todosi = false;
            }
            if ($carrerai != 1 && $sector == 1) {
                $data['id_carrera'] = $carrerai;
                $result = $this->m_reportes->carrera_si($data);
                $generalsi = false;
                $sectorsi = false;
                $carrerasi = true;
                $todosi = false;
            }
            if ($carrerai != 1 && $sector != 1) {
                $data['id_carrera'] = $carrerai;
                $data['sector'] = $sector;
                $result = $this->m_reportes->todo_si($data);
                $generalsi = false;
                $sectorsi = false;
                $carrerasi = false;
                $todosi = true;
            }
        } else {
            $generalsi = false;
            $sectorsi = false;
            $carrerasi = false;
            $todosi = false;
            if ($carrerai == 1 && $sector == 1) {
                $result = $this->m_reportes->general_no($data);
                $generalno = true;
                $sectorno = false;
                $carrerano = false;
                $todono = false;
            }
            if ($carrerai == 1 && $sector != 1) {
                $data['sector'] = $sector;
                $result = $this->m_reportes->sector_no($data);
                $generalno = false;
                $sectorno = true;
                $carrerano = false;
                $todono = false;
            }
            if ($carrerai != 1 && $sector == 1) {
                $data['id_carrera'] = $carrerai;
                $result = $this->m_reportes->carrera_no($data);
                $generalno = false;
                $sectorno = false;
                $carrerano = true;
                $todono = false;
            }
            if ($carrerai != 1 && $sector != 1) {
                $data['id_carrera'] = $carrerai;
                $data['sector'] = $sector;
                $result = $this->m_reportes->todo_no($data);
                $generalno = false;
                $sectorno = false;
                $carrerano = false;
                $todono = true;
            }
        }

        //preparamos y maquetamos el contenido a crear
        $pdf->Image(K_PATH_IMAGES . 'lin4.png', 5, 5, 280, 40, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);
        //___________________________________________________________________________________________________________________
        //___________________________________________________________________________________________________________________
        $html = '';
        $html .= "<style type=text/css>";
        $html .= "th{color: #fff; font-weight: bold; background-color: #222; border: 1px solid black}";
        $html .= "td{background-color: #FFF; color: #000; border: 1px solid black}";
        $html .= "</style>";
        if ($result == 0) {
            $html .= "No hay alumnos con residencia profesional registrada con los criterios de busqueda";
        } else {
            foreach ($result as $item) {
                $carrera_n = $item->carrera;
            }
            if ($generalsi) {
                $html .= "<h2>Alumnos con residencia profesional finalizada </h2><h4>Hay: " . count($result) . " Alumnos</h4>";
            }
            if ($generalno) {
                $html .= "<h2>Alumnos realizando residencia profesional </h2><h4>Hay: " . count($result) . " Alumnos</h4>";
            }
            if ($sectorsi) {
                $html .= "<h2>Alumnos con residencia profesional finalizada en el sector: " . $sector . "</h2><h4>Hay: " . count($result) . " Alumnos</h4>";
            }
            if ($sectorno) {
                $html .= "<h2>Alumnos realizando residencia profesional en el sector: " . $sector . "</h2><h4>Hay: " . count($result) . " Alumnos</h4>";
            }
            if ($carrerasi) {
                $html .= "<h2>Alumnos con residencia profesional finalizada en la carrera: " . $carrera_n . "</h2><h4>Hay: " . count($result) . " Alumnos</h4>";
            }
            if ($carrerano) {
                $html .= "<h2>Alumnos realizando residencia profesional en la carrera: " . $carrera_n . "</h2><h4>Hay: " . count($result) . " Alumnos</h4>";
            }
            if ($todosi) {
                $html .= "<h2>Alumnos con residencia profesional finalizada en el sector: " . $sector . " y la carrera: " . $carrera_n . "</h2><h4>Hay: " . count($result) . " Alumnos</h4>";
            }
            if ($todono) {
                $html .= "<h2>Alumnos realizando residencia profesional en el sector: " . $sector . " y la carrera: " . $carrera_n . "</h2><h4>Hay: " . count($result) . " Alumnos</h4>";
            }
            $html .= "<table width='100%'>";
            $html .= "<tr><th>Nombre del alumno</th><th>Correo del alumno</th><th>Carrera</th><th>Nombre del proyecto</th><th>Empresa</th><th>Area</th><th>Domicilio instancia</th><th>Telefono instancia</th></tr>";
            foreach ($result as $item) {
                $html .= "<tr><td>" . "&nbsp;" . $item->nombre . "</td><td> " . $item->correo . "</td><td> " . $item->carrera . "</td><td> " . $item->nombre_proyecto . "</td><td> " . $item->nombre_empresa . "</td><td> " . $item->sector . "</td><td> " . $item->domicilio . "</td><td> " . $item->telefono . "</td></tr>";
            }
            $html .= "</table>";
        }

// Imprimimos el texto con writeHTMLCell()
        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
// ---------------------------------------------------------
// Cerrar el documento PDF y preparamos la salida
// Este método tiene varias opciones, consulte la documentación para más información.
        $nombre_archivo = utf8_decode("Reportes_Residencia.pdf");
        $pdf->Output($nombre_archivo, 'I');
    }

}
