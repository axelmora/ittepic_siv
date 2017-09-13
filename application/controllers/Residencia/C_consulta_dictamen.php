<?php

/**
 * Description of C_banco_proyectos
 *
 * @author javier
 */
date_default_timezone_set('America/Mazatlan');

class C_consulta_dictamen extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database('local');
        $this->load->model('Residencia/m_dictamen');
        $this->load->model('Residencia/m_banco_proyectos');
        $this->load->model('m_alumnos_pdf');
        $this->load->helper(array('form', 'url'));
    }

    public function index() {
        error_reporting(0);
        if ($this->session->userdata('perfil') == FALSE) {
            redirect(base_url() . 'index.php/logeo');
        }
        $data = array(
            'numero_control' => false,
            'jefe_academico' => false,
            'presidente_academia' => false,
            'subdirector_academico' => false,
            'jefe_oficina_residencia' => false,
            'anteproyecto' => false
        );
        $data['info'] = $this->session->userdata('perfil');
        $data['problema'] = false;
        $data['numero_control'] = false;
        if ($this->session->userdata('perfil') == 'jeferesidencia' || $this->session->userdata('perfil') == 'coordinadorprogac' || $this->session->userdata('perfil') == 'directivo') {
            $this->load->view('Residencia/v_consulta_dictamen', $data);
        } else {
            $this->load->view('notienespermisos');
        }
    }

    public function generar_carta($nc) {
        if (!$this->session->userdata('perfil') == 'jeferesidencia') {
            $this->index();
        }
        $this->load->library('Pdf');
        $resolution = array(216, 279);
        $pdf = new Pdf('P', 'mm', $resolution, true, 'UTF-8', false);

        $pdf->SetAuthor('Jose Antonio');
        $pdf->SetTitle('Instituto Tecnologico de Tepic');
        $pdf->SetSubject('Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        $image_file = 'sinpresentacion.png';

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
        $data['datosjefev'] = $this->m_alumnos_pdf->show_nombreJV();
        foreach ($data['datosjefev'] as $m) {
            $jefevinculacion = $m->nombre_usuariosistema;
            $jvinculacion = mb_strtoupper($jefevinculacion, 'UTF-8');
        }
        $data['dictamen'] = $this->m_dictamen->mostrar_dictamen($nc);
        foreach ($data['dictamen'] as $m) {
            $anteproyecto_pk = $m->anteproyecto;
        }
        $data['alumno'] = $this->m_dictamen->mostrar_alumno($nc);
        foreach ($data['alumno'] as $m) {
            $nombre_alumno = $m->nombre;
            $id_carrera = $m->id_carrera;
        }
        $data['atencion'] = $this->m_dictamen->mostrar_atencion($nc);
        foreach ($data['atencion'] as $m) {
            $atencion_medica = $m->atencion_medica;
            $numero_afiliacion = $m->numero_afiliacion;
        }
        $data['carrera'] = $this->m_dictamen->mostrar_carrera($id_carrera);
        foreach ($data['carrera'] as $m) {
            $nombre_carrera = $m->carrera;
        }
        $data['anteproyecto'] = $this->m_banco_proyectos->obtener_anteproyecto($anteproyecto_pk);
        foreach ($data['anteproyecto'] as $m) {
            $nombre_proyecto = $m->nombre_proyecto;
            $empresa_fk = $m->empresa_fk;
        }
        $data['empresa'] = $this->m_banco_proyectos->obtener_empresa($empresa_fk);
        foreach ($data['empresa'] as $m) {
            $nombre_empresa = $m->nombre_empresa;
            $sector = $m->sector;
            $titular_empresa = $m->titular_empresa;
            $puesto_titular = $m->puesto_titular;
        }

        $imgdata = base64_decode('iVBORw0KGgoAAAANSUhEUgAAABwAAAASCAMAAAB/2U7WAAAABlBMVEUAAAD///+l2Z/dAAAASUlEQVR4XqWQUQoAIAxC2/0vXZDrEX4IJTRkb7lobNUStXsB0jIXIAMSsQnWlsV+wULF4Avk9fLq2r8a5HSE35Q3eO2XP1A1wQkZSgETvDtKdQAAAABJRU5ErkJggg==');


//preparamos y maquetamos el contenido a crear

        $pdf->Image(K_PATH_IMAGES . 'sinpresentacion.png', 15, 0, 180, 40, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);
        $pdf->Image(K_PATH_IMAGES . 'abajopresentacion.png', 15, 230, 180, 40, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);


        $html = '<div align="right">Departamento: GESTION TEC. Y VINC.<br>
            No. de Oficio:' . $this->input->post('oficio') . '<br>
            Asunto:<b>PRESENTACIÓN DEL ESTUDIANTE</b><br>
            <b>Y AGRADECIMIENTO</b></div>
        <div align="right"><b>Tepic, Nayarit a ' . $dia . ' de ' . $mes . ' del ' . $año . ' </b></div>
        <div align="left"><b>' . $titular_empresa . '</b><br/>
           <b>' . $puesto_titular . '</b><br/>
           <b>' . $nombre_empresa . '</b><br/>
           <b>P R E S E N T E</b></div>
        <div style="text-align: justify">El Instituto Tecnológico de Tepic, presenta a sus finas atenciones al (la)  C.  <b>' . $nombre_alumno . '</b>, con número de control <b>' . $nc . '</b> de la carrera de <b>' . $nombre_carrera . '</b>, quien desea desarrollar en esa institución que ud. Dirige, el proyecto de Residencia Profesional, denominado <b>“' . $nombre_proyecto . '”</b>,  en el cual deberá invertir un total de 500 horas, en un período de cuatro a seis meses.</div>
        <div style="text-align: justify">Es importante hacer de su conocimiento que todos los estudiantes que se encuentran inscritos en esta institución cuentan con un seguro contra accidentes personales con la empresa <b>' . $atencion_medica . '</b>, según póliza <b>No.' . $numero_afiliacion . '</b> y servicio médico de instituciones públicas. </div>
        <div style="text-align: justify">Así mismo, hacemos patente nuestro sincero agradecimiento por su buena disposición y colaboración para que nuestros estudiantes, aún estando en proceso de formación, desarrollen un proyecto de trabajo profesional, donde puedan aplicar el conocimiento y el trabajo en el campo de acción en el que se desenvolverán como futuros profesionistas.</div>
        <div style="text-align: justify">Al vernos favorecidos con su participación en nuestro objetivo, sólo nos resta manifestarle la seguridad de nuestra más atenta y distinguida consideración.</div>
        <br><br>
        <div style="text-align: center"><b>A T E N T A M E N T E.</b></div>
        <br><br>
        <div style="text-align: center">________________________________________________________________</div>
        <div style="text-align: center"><b>' . $jvinculacion . '</b><br/>
             <b>JEFE DEL DEPARTAMENTO DE GESTIÓN TECNOLÓGICA Y VINCULACIÓN</b></div>
        <br/><br/><br/>
        <small><b>NTLV</b>.aac</small>
        ';

        $pdf->writeHTML($html, true, false, false, false, '');

// Imprimimos el texto con writeHTMLCell()
//$pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
// ---------------------------------------------------------
// Cerrar el documento PDF y preparamos la salida
// Este método tiene varias opciones, consulte la documentación para más información.
        $nombre_archivo = utf8_decode("Carta de presentacion de $nombre_alumno .pdf");
        ob_end_clean(); //Por si pasa el TCPDF error: some data has already been output
        $pdf->Output($nombre_archivo, 'I');
    }

    public function a_sub($numero) {
        $data['subdirector_academico'] = true;
        $this->m_dictamen->actualiza_dictamen($numero, $data);
        redirect('Residencia/c_autoriza_dictamen');
    }

    public function a_pre($numero) {
        $data['presidente_academia'] = true;
        $this->m_dictamen->actualiza_dictamen($numero, $data);
        redirect('Residencia/c_autoriza_dictamen');
    }

    public function a_jefe($numero) {
        $data['jefe_academico'] = true;
        $this->m_dictamen->actualiza_dictamen($numero, $data);
        redirect('Residencia/c_autoriza_dictamen');
    }

    public function registrar($numero) {
        $data['subdirector_academico'] = true;
        $data['presidente_academia'] = true;
        $data['jefe_academico'] = true;
        $data['jefe_oficina_residencia'] = true;
        $data['inicio_residencia'] = date('Y-m-d H:i:s');
        $d = $this->m_dictamen->actualiza_dictamen($numero, $data);
        $bitacora = array(
            'estado' => 3);
        $b = $this->m_dictamen->actualiza_bitacora($numero, $bitacora);

        if ($d and $b) {
            $this->enviar_correo_a_coordinador_carrera($numero);
        }
        redirect('Residencia/C_consulta_dictamen');
        //$this->index();
    }

    public function buscar() {
        error_reporting(0);
        $result = $this->m_dictamen->mostrar_dictamen($this->input->post('numero_control'));
        if ($result) {
            foreach ($result as $row) {
                $data = array(
                    'numero_control' => $row->numero_control,
                    'jefe_academico' => $row->jefe_academico,
                    'presidente_academia' => $row->presidente_academia,
                    'subdirector_academico' => $row->subdirector_academico,
                    'jefe_oficina_residencia' => $row->jefe_oficina_residencia,
                    'anteproyecto' => $row->anteproyecto
                );
            }
            $data['info'] = $this->session->userdata('perfil');
            $data['problema'] = false;
            $data['numero_control'] = $this->input->post('numero_control');
            $this->load->view('Residencia/v_consulta_dictamen', $data);
        } else {
            $data = array(
                'numero_control' => false,
                'jefe_academico' => false,
                'presidente_academia' => false,
                'subdirector_academico' => false,
                'jefe_oficina_residencia' => false,
                'anteproyecto' => false
            );
            $data['problema'] = 'No hay registros';
            $data['info'] = $this->session->userdata('perfil');
            $data['numero_control'] = false;
            $this->load->view('Residencia/v_consulta_dictamen', $data);
        }
    }
    public function buscar2() {
        error_reporting(0);
        $temporal = $this->m_dictamen->mostrar_alumno3(mb_strtoupper(trim($this->input->post('nombre_alumno'), 'UTF-8')));
        if ($temporal) {
            foreach ($temporal as $row) {
                $nc = $row->numero_control;
            }
        }
        $nc = str_replace(' ', '', $nc);
        $result = $this->m_dictamen->mostrar_dictamen($nc);
        if ($result) {
            foreach ($result as $row) {
                $data = array(
                    'numero_control' => $row->numero_control,
                    'jefe_academico' => $row->jefe_academico,
                    'presidente_academia' => $row->presidente_academia,
                    'subdirector_academico' => $row->subdirector_academico,
                    'jefe_oficina_residencia' => $row->jefe_oficina_residencia,
                    'anteproyecto' => $row->anteproyecto
                );
            }
            $data['info'] = $this->session->userdata('perfil');
            $data['problema'] = false;
            $data['numero_control'] = $nc;
            $this->load->view('Residencia/v_consulta_dictamen', $data);
        } else {
            $data = array(
                'numero_control' => false,
                'jefe_academico' => false,
                'presidente_academia' => false,
                'subdirector_academico' => false,
                'jefe_oficina_residencia' => false,
                'anteproyecto' => false
            );
            $data['problema'] = 'No hay registros';
            $data['info'] = $this->session->userdata('perfil');
            $data['numero_control'] = false;
            $this->load->view('Residencia/v_consulta_dictamen', $data);
        }
    }

    private function enviar_correo_a_coordinador_carrera($nc) {

        $id_carrera_alu = $this->m_dictamen->obtener_id_carrera($nc);

        switch ($id_carrera_alu) {

            case 2:
                $coordi['id_usuario'] = 30;
                break;
            case 3:
                $coordi['id_usuario'] = 29;
                break;
            case 4:
                $coordi['id_usuario'] = 34;
                break;
            case 5:
                $coordi['id_usuario'] = 33;
                break;
            case 6:
                $coordi['id_usuario'] = 32;
                break;
            case 7:
                $coordi['id_usuario'] = 30;
                break;
            case 8:
                $coordi['id_usuario'] = 31;
                break;
            case 9:
                $coordi['id_usuario'] = 31;
                break;
            case 10:
                $coordi['id_usuario'] = 36;
                break;
            case 11:
                $coordi['id_usuario'] = 30;
                break;
            case 13:
                $coordi['id_usuario'] = 33;
                break;
            case 14:
                $coordi['id_usuario'] = 35;
                break;
            case 15:
                $coordi['id_usuario'] = 30;
                break;

            default:
                $coordi['id_usuario'] = 0;
                return;
        }

        $coordi['info'] = $this->m_dictamen->mostrar_jefe($coordi['id_usuario']);
        $correo;
        if ($coordi['info'] != false) {
            foreach ($coordi['info'] as $value) {
                $correo = $value->correo;
            }
            if ($correo != null || $correo != '') {
                $this->enviar_correo($correo, 'Aceptación de residencia profesional.', 'Alumno con número de control ' . $nc . ' pendiente por registrar residencia profesional en el SII.');
            }
        }
    }

    private function enviar_correo($to, $subject, $message) {
        //cargamos la biblioteca email de ci
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
        //var_dump('Se envió');
        //
        //con esto podemos ver el resultado
        //var_dump($this->email->print_debugger());
    }

}
