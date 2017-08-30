<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_generari_pdf extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_generari_pdf');
    }

    //con esta función validamos y protegemos el buscador
    public function validar() {
        $this->form_validation->set_rules('desde', 'Fecha inicial', 'required|min_length[1]|max_length[18]|trim');
        $this->form_validation->set_rules('hasta', 'Fecha final', 'required|min_length[1]|max_length[18]|trim');

        $this->form_validation->set_message('required', 'La fecha no puede ir vacía');
        $this->form_validation->set_message('min_length', 'El  campo debe tener al menos %s carácteres');
        $this->form_validation->set_message('max_length', 'El campo no puede tener más de %s carácteres');

        if ($this->form_validation->run() == TRUE) {



            $this->load->library('Pdf');
            $resolution = array(216, 279);
            $pdf = new Pdf('L', 'mm', $resolution, true, 'UTF-8', false);

            $pdf->SetAuthor('Diego Alberto');
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


            //preparamos y maquetamos el contenido a crear

            $pdf->Image(K_PATH_IMAGES . 'lin.png', 5, 5, 280, 40, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);




            //___________________________________________________________________________________________________________________
            //___________________________________________________________________________________________________________________
            //___________________________________________________________________________________________________________________
            //___________________________________________________________________________________________________________________
            //___________________________________________________________________________________________________________________


            $fecha1 = $this->input->post('desde');
            $fecha2 = $this->input->post('hasta');

            $data = array(
                'fecha1' => $fecha1,
                'fecha2' => $fecha2
            );

            $result = $this->m_generari_pdf->show_data_by_date_range($data);

            $html = '';
            $html .= "<style type=text/css>";
            $html .= "th{color: #fff; font-weight: bold; background-color: #222; border: 1px solid black}";
            $html .= "td{background-color: #FFF; color: #000; border: 1px solid black}";

            $html .= "</style>";

            if ($result == 0) {
                $html .= "No hay instancias registradas entre " . $fecha1 . " y " . $fecha2 . ".";
            } else {

                $html .= "<h2>Instancias registradas entre " . $fecha1 . " y " . $fecha2 . " </h2><h4>Actualmente: " . count($result) . " Instancias</h4>";
                $html .= "<table width='100%'>";
                $html .= "<tr><th>Nombre</th><th>Sector</th><th>Titular</th><th>Fecha de registro</th><th>Domicilio</th><th>Telefono</th></tr>";
                foreach ($result as $item) {
                    $html .= "<tr><td>" . "&nbsp;" . $item->nombre_instancia . "</td><td> " . $item->sector_instancia . "</td><td> " . $item->titular_instancia . "</td><td> " . $item->fecha_registro . "</td><td> " . $item->domicilio_instancia . "</td><td> " . $item->telefono_instancia . "</td></tr>";
                }
                $html .= "</table>";
            }

            //___________________________________________________________________________________________________________________
            //___________________________________________________________________________________________________________________
            //___________________________________________________________________________________________________________________
// Imprimimos el texto con writeHTMLCell()
            $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);

// ---------------------------------------------------------
// Cerrar el documento PDF y preparamos la salida
// Este método tiene varias opciones, consulte la documentación para más información.

            $nombre_archivo = utf8_decode("Resultado.pdf");


            $pdf->Output($nombre_archivo, 'I');
        } else {
            //mostramos de nuevo el buscador con los errores
            redirect('c_generari');
        }
    }

    public function index() {
        
    }

}
