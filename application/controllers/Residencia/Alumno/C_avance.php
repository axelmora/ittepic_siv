<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/Mazatlan');

class C_avance extends CI_Controller {
    private $error = array('error' => '');
    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
//cargamos la librería form_validation
        $this->load->library(array('form_validation'));
        $this->load->model('Residencia/Alumno/m_avance');
        $this->load->model('Residencia/Alumno/m_propuesta');
        $this->load->model('Residencia/m_dictamen');
        $this->load->model('Residencia/m_historial');
        $this->load->model('Residencia/m_banco_proyectos');
    }

    public function generar() {
        $this->load->library('Pdf');
        $resolution = array(216, 279);
        $pdf = new Pdf('P', 'mm', $resolution, true, 'UTF-8', false);
        $pdf->SetAuthor('Jose Antonio');
        $pdf->SetTitle('Instituto Tecnologico de Tepic');
        $pdf->SetSubject('Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
        $image_file = 'sin2.png';

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
// el data y los models

        $session_data = $this->session->userdata('logged_in');
        $numero_control = $session_data['username'];
        $nombre = utf8_decode($session_data['nombre']);
        $id_carrera = $session_data['id_carrera'];
        $telefono = $session_data['telefono'];
        $domicilio = explode(',', $session_data['domicilio']);

        switch ($id_carrera) {
            case '2':
                $carrera = 'INGENIERIA EN TECNOLOGÍAS DE LA INFORMACIÓN Y COMUNICACIONES';
                $id_coordi = 30;
                break;
            case '3':
                $carrera = 'ARQUITECTURA';
                $id_coordi = 29;
                break;
            case '4':
                $carrera = 'INGENIERIA CIVIL';
                $id_coordi = 34;
                break;
            case '5':
                $carrera = 'INGENIERIA ELECTRICA';
                $id_coordi = 33;
                break;
            case '6':
                $carrera = 'INGENIERIA INDUSTRIAL';
                $id_coordi = 32;
                break;
            case '7':
                $carrera = 'INGENIERIA EN SISTEMAS COMPUTACIONALES';
                $id_coordi = 30;
                break;
            case '8':
                $carrera = 'INGENIERIA BIOQUIMICA';
                $id_coordi = 31;
                break;
            case '9':
                $carrera = 'INGENIERIA QUIMICA';
                $id_coordi = 31;
                break;
            case '10':
                $carrera = 'LICENCIATURA EN ADMINISTRACION';
                $id_coordi = 36;
                break;
            case '13':
                $carrera = 'INGENIERIA MECATRONICA';
                $id_coordi = 33;
                break;
            case '14':
                $carrera = 'INGENIERIA EN GESTION EMPRESARIAL';
                $id_coordi = 35;
                break;
            case '15':
                $carrera = 'INGENIERIA EN TECNOLOGÍAS DE LA INFORMACIÓN Y COMUNICACIONES';
                $id_coordi = 30;
                break;

            default:
                $carrera = 'SIN CARRERA';
                break;
        }

        $data['coordi'] = $this->m_banco_proyectos->obtener_coordi($id_coordi);
        foreach ($data['coordi'] as $m) {
            $nombre_coordi = $m->nombre_usuariosistema;
        }
        $data['dictamen'] = $this->m_dictamen->mostrar_dictamen4($numero_control);
        foreach ($data['dictamen'] as $m) {
            $anteproyecto_pk = $m->anteproyecto;
        }
        $data['atencion'] = $this->m_dictamen->mostrar_atencion2($numero_control);
        foreach ($data['atencion'] as $m) {
            $atencion_medica = $m->atencion_medica;
            $numero_afiliacion = $m->numero_afiliacion;
        }
        $data['alumno'] = $this->m_banco_proyectos->obtener_alumno($numero_control);
        foreach ($data['alumno'] as $m) {
            $correo_alumno = $m->correo;
        }
        $data['anteproyecto'] = $this->m_banco_proyectos->obtener_anteproyecto($anteproyecto_pk);
        foreach ($data['anteproyecto'] as $m) {
            $nombre_proyecto = $m->nombre_proyecto;
            $empresa_fk = $m->empresa_fk;
            $periodo = $m->periodo;
            $residentes_requeridos = $m->residentes_requeridos;
            $banco = $m->banco;
        }
        if ($banco == 't') {
            $banco = 'Banco de Proyectos';
        } else {
            $banco = 'Propuesta propia';
        }

        $data['empresa'] = $this->m_banco_proyectos->obtener_empresa($empresa_fk);
        foreach ($data['empresa'] as $m) {
            $nombre_empresa = $m->nombre_empresa;
            $sector = $m->sector;
            $rfc = $m->rfc;
            $domicilio2 = $m->domicilio;
            $colonia = $m->colonia;
            $codigo_postal = $m->codigo_postal;
            $ciudad = $m->ciudad;
            $titular_empresa = $m->titular_empresa;
            $puesto_titular = $m->puesto_titular;
            $telefono_empresa = $m->telefono;
        }

        $data['externo'] = $this->m_dictamen->mostrar_externo($empresa_fk, $anteproyecto_pk);
        foreach ($data['externo'] as $m) {
            $nombre_externo = $m->nombre;
            $puesto_externo = $m->puesto;
        }

        if ($nombre_externo == '') {
            $nombre_externo = '_________________________';
        }
        if ($puesto_externo == '') {
            $puesto_externo = '_________________________';
        }


        $dia = date("j");
        $mes = date("n");
        $año = date("Y");
        switch ($mes) {
            case 1:
                $mes = 'Enero';
                break;
            case 2:
                $mes = 'Febrero';
                break;
            case 3:
                $mes = 'Marzo';
                break;
            case 4:
                $mes = 'Abril';
                break;
            case 5:
                $mes = 'Mayo';
                break;
            case 6:
                $mes = 'Junio';
                break;
            case 7:
                $mes = 'Julio';
                break;
            case 8:
                $mes = 'Agosto';
                break;
            case 9:
                $mes = 'Septiembre';
                break;
            case 10:
                $mes = 'Octubre';
                break;
            case 11:
                $mes = 'Noviembre';
                break;
            case 12:
                $mes = 'Diciembre';
                break;
        }
        $imgdata = base64_decode('iVBORw0KGgoAAAANSUhEUgAAABwAAAASCAMAAAB/2U7WAAAABlBMVEUAAAD///+l2Z/dAAAASUlEQVR4XqWQUQoAIAxC2/0vXZDrEX4IJTRkb7lobNUStXsB0jIXIAMSsQnWlsV+wULF4Avk9fLq2r8a5HSE35Q3eO2XP1A1wQkZSgETvDtKdQAAAABJRU5ErkJggg==');


//preparamos y maquetamos el contenido a crear

        $pdf->Image(K_PATH_IMAGES . 'sin6.png', 15, 0, 180, 40, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);
        $pdf->Image(K_PATH_IMAGES . 'abajo6.png', 15, 230, 180, 40, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);


        $html = '<div align="center"><b>DIVISIÓN DE ESTUDIOS PROFESIONALES</b></div><br>
        <div align="right"><b>Tepic, Nayarit. A ' . $dia . ' de ' . $mes . ' de ' . $año . '.</b></div>
        <div align="left">M.A.E. Jeshú Marisol Morales Carrillo<br/>
        Jefe(a) de la Div. de Estudios Profesionales</div>
        <div align="right">AT’N: C.  ' . $nombre_coordi . '.<br/>
        Coord. de la carrera de ' . $carrera . '.</div>
        <br><br>
        <div align="left">Por medio de la presente le solicito me sea asignado el proyecto de Residencia Profesional, para lo cual presento a continuación mis datos generales</div>';
        $pdf->writeHTML($html, true, false, false, false, '');

        $tbl = <<<EOD
        <table border="1" align="left">
            <tr nobr="true">
                <td colspan="3">
                    Nombre: <u>$nombre</u>  Carrera: <u>$carrera</u><br>
                    No. de control: <u>$numero_control</u> Correo electronico: <u>$correo_alumno</u><br>
                    Dirección: <u>$domicilio[0]</u><br>
                    Ciudad: <u>$domicilio[1] </u> Teléfono particular: <u>$telefono </u> Teléfono celular: <u>__________________</u><br>
                    Atención médica: <u>$atencion_medica </u>Especificar: <u>____________________</u><br>
                    Número de Afiliación al servicio médico: <u>$numero_afiliacion</u>
                </td>
            </tr>
        </table>
EOD;

        $pdf->writeHTML($tbl, true, false, false, false, '');

        $html = '<div align="left">Me interesa sea asignado a la modalidad de: ' . $banco . ' </div><br>';
        $pdf->writeHTML($html, true, false, false, false, '');

        $tbl = <<<EOD
        <table border="1" align="left" >
            <tr nobr="true">
                <td colspan="3">
                    Nombre del proyecto: <u>$nombre_proyecto</u><br>
                    Periodo proyectado: <u>$periodo </u> Número de residentes: <u>$residentes_requeridos</u>
                </td>
            </tr>
        </table>
EOD;

        $pdf->writeHTML($tbl, true, false, false, false, '');

        $html = ' <div align="left">A desarrollarse en la empresa</div><br>';
        $pdf->writeHTML($html, true, false, false, false, '');

        $tbl = <<<EOD
        <table border="1" align="left" >
            <tr nobr="true">
                <td colspan="3">
                    Nombre: <u>$nombre_empresa</u> Ramo o sector: <u>$sector</u> RFC: <u>$rfc</u><br>
                    Domicilio: <u>$domicilio2</u> Colonia: <u>$colonia</u> C. Postal: <u>$codigo_postal</u><br>
                    Fax: <u>______________</u> Ciudad: <u>$ciudad</u> Teléfono (no celular): <u>$telefono_empresa</u><br>
                    Nombre del titular de la empresa: <u>$titular_empresa</u> Puesto <u>$puesto_titular</u><br>
                    Nombre del asesor externo: <u>$nombre_externo</u> Puesto: <u>$puesto_externo</u><br>
                    Nombre de la persona que firmará el acuerdo de trabajo. <br>
                    Estudiante-Escuela-Empresa: <u>________________________________</u> <br>
                    Puesto: <u>_____________________</u>
                </td>
            </tr>
        </table>
EOD;

        $pdf->writeHTML($tbl, true, false, false, false, '');

        $html = '<br> <div align="center">_________________________</div>
        <div align="center">Firma del estudiante</div>';
        $pdf->writeHTML($html, true, false, false, false, '');





// Imprimimos el texto con writeHTMLCell()
        //$pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
// ---------------------------------------------------------
// Cerrar el documento PDF y preparamos la salida
// Este método tiene varias opciones, consulte la documentación para más información.
        $nombre_archivo = utf8_decode("Documento de .pdf");
        ob_end_clean(); //Por si pasa el TCPDF error: some data has already been output
        $pdf->Output($nombre_archivo, 'I');
    }

    public function index() {
        error_reporting(0);
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['nombre'] = $session_data['nombre'];
            $data['id_carrera'] = $session_data['id_carrera'];
            $data['id_semestre'] = $session_data['id_semestre'];
            $data['plan_estudios'] = $session_data['plan_estudios'];
            $data['sexo'] = $session_data['sexo'];
            $data['telefono'] = $session_data['telefono'];
            $data['domicilio'] = $session_data['domicilio'];
            $data['semestre_cursado'] = $session_data['semestre_cursado'];
            $data['creditos'] = $session_data['creditos'];
            $data['porcentaje_avance'] = $session_data['porcentaje_avance'];

            $nuevo = $this->m_avance->obtener_estado($session_data['username']);
            if ($nuevo) {
                foreach ($nuevo as $value) {
                    $tmp = $value->estado;
                }
                $data['estado'] = $tmp;
            } else {
                $data['estado'] = false;
            }
            $data['proacepjeseasesor']= $this->m_avance->obtener_aceptado($session_data['username']);
            $nuevo2 = $this->m_avance->obtener_titulacion($session_data['username']);
            if ($nuevo2) {
                foreach ($nuevo2 as $value2) {
                    $tmp2 = $value2->titulacion;
                    $tmp3 = $value2->anteproyecto_pk;
                    $tmp4 = $value2->banco;
                    $tmp5 = $value2->lugares_disponibles;
                }
                $data['titulacion'] = $tmp2;
            } else {
                $data['titulacion'] = false;
            }

            $data['archivo_alumno'] = $this->m_avance->obtener_archivo_alumno($session_data['username']);
            $data['archivo_asesor'] = $this->m_avance->obtener_archivo_asesor($session_data['username']);
            $data['clave'] = $tmp3;
            $data['banco'] = $tmp4;
            $data['lugares'] = $tmp5;
            $data['error'] = $this->error['error'];
            //cargamos la vista y el array data
            $this->load->view('Residencia/Alumno/v_avance', $data);
        } else {
            //If no session, redirect to login page
            redirect('logeo', 'refresh');
        }
    }

    public function subir_doc() {
//        if ($this->session->userdata('logged_in')) {
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['nombre'] = $session_data['nombre'];

        $archivo = $this->do_upload_alumno($session_data['username']);
        if (array_key_exists('error', $archivo)) {
            $this->index();
        } else {
            $datax['hoy'] = date("Y-m-d");
            $fecha1 = date('Y-m-d', strtotime($datax['hoy'] . ' + 7 days'));

            $archivo_alumno = array(
                'numero_control_fk' => $data['username'],
                'descripcion_archivo' => mb_strtoupper($this->input->post('descripcion_archivo')),
                'tipo_documento' => $this->input->post('tipo_documento'),
                'estado' => 'ER',
                'fecha_guardado_documento' => date('Y-m-d'),
                'fecha_limite_revision' => $fecha1,
                'ruta_archivo' => $archivo['ruta'],
                'nombre_archivo' => $archivo['nombre_archivo']
            );
            $this->m_propuesta->insertar_archivo_alumno($archivo_alumno);
            $this->correo($session_data['username'],$session_data['nombre']);
            redirect('Residencia/Alumno/c_avance', 'refresh');
        }
    }

    public function do_upload_alumno($nc) {
//    /uploads
//	/residentes
//		/numero_control
//	/administrativos
//		/banco_proyectos
//		/bases_concertacion
//	/docentes
//		/rfc

        $dir = './uploads/residentes/' . $nc;
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        $config['upload_path'] = $dir;
        $config['allowed_types'] = 'doc|docx|pdf';
        $config['max_size'] = 200000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {//userfile es el nombre del form field
            //$this->error = array('error' => $this->upload->display_errors());
            $this->error['error'] = $this->upload->display_errors();
            return $this->error;
        } else {
            $ruta = substr($dir . '/' . $this->upload->data('file_name'), 2); //quita el "./" de al principio de la ruta
            $data = array(
                'ruta' => $ruta,
                'nombre_archivo' => $this->upload->data('file_name'));
            return $data;
        }
    }

    private function correo($nc,$alumno) {
        $consulta_correo_ase = $this->m_historial->consulta_correo_docente2($nc);
        $correoA = '';
        $u = '';
        foreach ($consulta_correo_ase as $value) {
            $correoA = $value->correo;
            $u = $value->rfc;
        }

        if ($correoA != null || $correoA != '') {
            $this->enviar_correo($u, $correoA, 'Actividad de residente.', 'Su asesorado '.$alumno.' ha adjuntado un documento, ingrese a http://siv.ittepic.edu.mx/ para mas información.'); //enviar correo a asesor
        }
    }

    private function enviar_correo($id_usuario, $to, $subject, $message) {
        //cargamos la libreria email de ci
        $this->load->library("email");
        //configuracion para gmail
        $configGmail = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'avisosiv@ittepic.edu.mx',
            'smtp_pass' => 'sivittepic',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        );
        //cargamos la configuración para enviar con gmail
        $this->email->initialize($configGmail);

        $this->email->from('avisosiv@ittepic.edu.mx', 'Sistema Integral de Vinculación');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message('<h2>' . $message . '</h2>');
        $this->email->send();
        $a = array(
            'destinatario' => $id_usuario,
            'asunto' => $subject,
            'fecha' => date('Y-m-d'),
        );
        $this->m_historial->insertar_historial($a);
        //var_dump('Se envió');
        //
        //con esto podemos ver el resultado
        //var_dump($this->email->print_debugger());
    }

}
