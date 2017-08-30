<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Alumnorb1 extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        //cargamos la librería form_validation
        $this->load->library(array('form_validation'));
        $this->load->model('m_alumnosf_pdf');
        $this->load->model('m_alumnos_pdf');
    }

    //con esta función validamos y protegemos el buscador
    public function validar() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('idps', 'ID', 'required|min_length[1]|max_length[200]|trim');
        $this->form_validation->set_rules('actividadesi', 'Actividades', 'required|min_length[1]|max_length[2000]|trim');
        $this->form_validation->set_rules('totalhb1', 'Horas bimestrales', 'required|min_length[1]|max_length[200]|trim');
        $this->form_validation->set_rules('totalha1', 'Horas acumuladas', 'required|min_length[1]|max_length[200]|trim');

        $this->form_validation->set_message('required', 'Las actividades deben estar descritas');
        $this->form_validation->set_message('min_length', 'El  campo debe tener al menos %s carácteres');
        $this->form_validation->set_message('max_length', 'El campo no puede tener más de %s carácteres');

        if (TRUE == TRUE) {


            $this->load->library('Pdf');
            $resolution = array(216, 279);
            $pdf = new Pdf('P', 'mm', $resolution, true, 'UTF-8', false);

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
            $pdf->SetPrintFooter(true);
// Este método tiene varias opciones, consulta la documentación para más información.
            $pdf->AddPage();

            //fijar efecto de sombra en el texto
            $pdf->setTextShadow(array('disabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

            // Establecemos el contenido para imprimir



            $imgdata = base64_decode('iVBORw0KGgoAAAANSUhEUgAAABwAAAASCAMAAAB/2U7WAAAABlBMVEUAAAD///+l2Z/dAAAASUlEQVR4XqWQUQoAIAxC2/0vXZDrEX4IJTRkb7lobNUStXsB0jIXIAMSsQnWlsV+wULF4Avk9fLq2r8a5HSE35Q3eO2XP1A1wQkZSgETvDtKdQAAAABJRU5ErkJggg==');


            //preparamos y maquetamos el contenido a crear

            $pdf->Image(K_PATH_IMAGES . 'sinreporte.png', 15, 0, 180, 40, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);
            $pdf->Image(K_PATH_IMAGES . 'abajoreporte.png', 15, 230, 180, 40, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);




            //___________________________________________________________________________________________________________________
            //___________________________________________________________________________________________________________________
            //___________________________________________________________________________________________________________________
            //___________________________________________________________________________________________________________________
            //___________________________________________________________________________________________________________________


            $idps = $this->input->post('idps');

            $resumenactividades = $this->input->post('actividadesi');
            $horasacumuladas = $this->input->post('totalha1');
            $horastotales = $this->input->post('totalhb1');

            $result = $this->m_alumnos_pdf->show_data_by_idps($idps);

            $html = '';
            if ($result == 0) {
                $html .= "No esta aceptado tu proceso ";
            } else {
                $data['programa'] = $result;
                foreach ($data['programa'] as $item) {

                    $tbl = <<<EOD
<table border="0" align="right" >
<p style='text-align:right'>Reporte No. 1
</p></table>
EOD;

                    $pdf->writeHTML($tbl, true, false, false, false, '');
                    $tbl = <<<EOD
<table border="0" align="left" >

 <tr nobr="true">
  <td colspan="3" >
                        	<br><b>Datos del alumno:</b><br>
                        	Nombre: <u>$item->nombre</u>
                        	<br>
                        	Carrera: <u>$item->carrera</u>&nbsp;&nbsp;&nbsp;&nbsp; No. de control: <u>$item->numero_control</u><br>
                        	<br><b>Periodo reportado:</b><br>
                        	Del día: <u>$item->fecha_inicio</u> al día: <u>$item->fecha_reporte1</u><br>
                        	<br><b>Datos del programa:</b><br>
                        	Dependencia: <u>$item->nombre_instancia</u><br>
                        	Programa: <u>$item->nombre_programa</u>
                        	<br>
                        	
                            <br><b>Resumen de actividades:</b><br>
                           
                            $resumenactividades
                            <br>
                            <br>
                            <br>
                            <b>Total de horas de este reporte:</b> $horastotales  &nbsp;&nbsp; <b>Total de horas acumuladas:</b> $horasacumuladas
                            
                            
                            
                            <br>
  </td>

 </tr>
</table>
EOD;

                    $pdf->writeHTML($tbl, true, false, false, false, '');


                    $tbl = <<<EOD
<table border="1"  align="center">


 <tr nobr="true">
  <td><br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>_____________________________<br>Nombre, Puesto y Firma del supervisor<br>&nbsp;<br>&nbsp;<br>&nbsp;</td>
  <td><br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;Sello</td>
  <td><table border="1" align="center">
   <tr><td><br>&nbsp;<br>&nbsp;<br>&nbsp;<br>_____________________________<br>Nombre del interesado<br>&nbsp;<br>&nbsp;<br>&nbsp;</td></tr>
   <tr><td><br>&nbsp;<br>&nbsp;<br>&nbsp;<br>_____________________________<br>Vo. Bo. Oficina Servicio Social
Del Instituto Tecnológico
<br>&nbsp;</td></tr>
   </table></td>
 </tr>
 
 
</table>
EOD;


                    $pdf->writeHTML($tbl, true, false, false, false, '');

                    $tbl = <<<EOD
<table border="0" align="justify" ><p style="text-align:justify">
<b>NOTA:</b> ESTE REPORTE DEBERÁ SER GENERADO EN EL SIV, ENTREGADO CADA DOS MESES EN ORIGINAL Y COPIA, DENTRO DE LOS PRIMEROS 5 DÍAS HÁBILES DE LA FECHA DE TÉRMINO DEL MISMO, DE LO CONTRARIO PROCEDERÁ SANCIÓN DE ACUERDO AL REGLAMENTO VIGENTE (No es válido si presenta tachaduras, enmendaduras y/o correcciones).
</p><br>&nbsp;

</table>
EOD;

                    $pdf->writeHTML($tbl, true, false, false, false, '');
                }
            }
            //___________________________________________________________________________________________________________________
            //___________________________________________________________________________________________________________________
            //___________________________________________________________________________________________________________________
// Imprimimos el texto con writeHTMLCell()
            $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);

// ---------------------------------------------------------
// Cerrar el documento PDF y preparamos la salida
// Este método tiene varias opciones, consulte la documentación para más información.

            $nombre_archivo = utf8_decode("Reporte_bimestral_1.pdf");


            $pdf->Output($nombre_archivo, 'I');
        } else {
            //mostramos de nuevo el buscador con los errores
            redirect('alumnos/c_avance');
        }
    }

    public function index() {
        
    }

}
