<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 *
 */
date_default_timezone_set('America/Mazatlan');

class Panel_jefeacademico extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->load->helper('file');
        $this->load->model('Residencia/m_historial');
        $this->load->model('Residencia/m_vacantes');
        $this->load->model('Residencia/m_dictamen');
        $this->load->model('Residencia/m_banco_proyectos');
        $this->load->model('Residencia/m_solicitudes_anteproyecto');
        $this->load->model('Residencia/JefeAcademico/m_info_docentes');
        $this->load->model('Residencia/JefeAcademico/m_bitacora_avance_academico');
        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'jefeacademico') {
            redirect(base_url() . 'index.php/logeo');
        }
    }

    public function index() {
        $this->load->view('Residencia/JefeAcademico/inicio_residencia_academico');
    }

    public function solicitudes_anteproyecto() {
        $data['info'] = $this->session->userdata('perfil');
        $data['solicitudes'] = $this->m_solicitudes_anteproyecto->consulta_solicitudes($this->session->userdata('id_usuario'));
        $data['base'] = base_url();
        $this->load->view('Residencia/JefeAcademico/v_solicitudes_anteproyecto', $data);
    }

    public function aceptar_cancelar_solicitud() {
        $correo_msj = '';
        $correo_msj_coordi_res = '';
        if ($this->input->post('estado') == 'A') {
            $estado = array('estado_solicitud' => $this->input->post('estado'));
            $this->m_solicitudes_anteproyecto->update_aceptar_solicitud_anteproyecto($this->input->post('nc'), $this->input->post('id_anteproyecto'), $estado);
            $datos = array('numero_control' => $this->input->post('nc'), 'anteproyecto_fk' => $this->input->post('id_anteproyecto'));
            //agrega el asesor externo a participantes
            if ($this->input->post('banco') == 'f') {
                $ae = $this->m_solicitudes_anteproyecto->consulta_ae($this->input->post('id_anteproyecto'));
                $tmp = '';
                foreach ($ae as $value) {
                    $tmp = $value->asesor_externopk;
                }
                $datos['asesor_externo'] = $tmp;
            }
            $this->m_solicitudes_anteproyecto->insertar_participantes_proyecto($datos);
            $this->m_solicitudes_anteproyecto->actualizar_bitacora($this->input->post('nc'), array('estado' => '2'));

            $consulta_correo_cordires = $this->m_historial->consulta_correo_usuario($this->getUsuario_coordi_res($this->session->userdata('id_usuario')));
            $correo_dest_coordi = '';
            foreach ($consulta_correo_cordires as $value) {
                $correo_dest_coordi = $value->correo;
            }
            $info = $this->m_historial->NombreAlu_NombreProyecto($this->input->post('nc'), $this->input->post('id_anteproyecto'));
            $nombreAlu = '';
            $proyecto = '';
            foreach ($info as $value) {
                $nombreAlu = $value->nombre;
                $proyecto = $value->nombre_proyecto;
            }

            $correo_msj = 'Tu solicitud de residencia ha sido aceptada.';
            $correo_msj_coordi_res = 'Tiene asignación de asesor y revisores pendiente del alumno ' . $nombreAlu . ' para el anteproyecto: ' . $proyecto . ', ingrese a http://siv.ittepic.edu.mx/ para más información.';

            $this->enviar_correo($this->getUsuario_coordi_res($this->session->userdata('id_usuario')), $correo_dest_coordi, 'Asignación de asesores y revisores', $correo_msj_coordi_res);
        } else {
            $this->m_solicitudes_anteproyecto->eliminar_bitacora_atencion($this->input->post('nc'));
            $this->m_solicitudes_anteproyecto->eliminar_dictamen($this->input->post('nc'));
            $this->m_solicitudes_anteproyecto->eliminar_archivo_alumno($this->input->post('nc'));
            $this->m_solicitudes_anteproyecto->eliminar_solicitud($this->input->post('nc'));

            $temporal = $this->m_banco_proyectos->obtener_anteproyecto($this->input->post('id_anteproyecto'));
            foreach ($temporal as $m) {
                $lugares_disponibles = $m->lugares_disponibles;
                $residentes_requeridos = $m->residentes_requeridos;
            }

            if ($this->input->post('banco') == 't') {
                $this->m_solicitudes_anteproyecto->eliminar_asesor_externo($this->input->post('id_anteproyecto'));
                $anteproyecto = array(
                    'disponible' => TRUE,
                    'lugares_disponibles' => ($lugares_disponibles + 1));

                if (($lugares_disponibles + 1) == $residentes_requeridos) {
                    $anteproyecto ['periodo'] = null;
                }

                $this->m_solicitudes_anteproyecto->actualizar_anteproyecto($this->input->post('id_anteproyecto'), $anteproyecto);
            } else {
                if (($lugares_disponibles + 1) == $residentes_requeridos) {
                    $this->m_solicitudes_anteproyecto->eliminar_anteproyecto($this->input->post('id_anteproyecto'));
                } else {
                    $anteproyecto = array(
                        'disponible' => TRUE,
                        'lugares_disponibles' => ($lugares_disponibles + 1));
                    $this->m_solicitudes_anteproyecto->actualizar_anteproyecto($this->input->post('id_anteproyecto'), $anteproyecto);
                }
            }

            delete_files('./uploads/residentes/' . $this->input->post('nc') . '/', TRUE);
            $correo_msj = 'Tu solicitud de residencia ha sido rechazada.';
        }
        //enviar correo, insertar en tabla historial notificaciones

        $consulta_correo = $this->m_historial->consulta_correo_alumno($this->input->post('nc'));
        $correo_dest = '';
        foreach ($consulta_correo as $value) {
            $correo_dest = $value->correo;
        }

        $this->enviar_correo($this->input->post('nc'), $correo_dest, 'Actividad de solicitud de residencia profesional', $correo_msj);

        redirect('Residencia/JefeAcademico/panel_jefeacademico/solicitudes_anteproyecto');
    }

    public function info_vacante() {
        $a = $this->m_vacantes->mostrar_vacantes_por_id($this->input->post('idv'));
        if ($a) {
            echo json_encode($a);
        } else {
            echo json_encode('false');
        }
    }

    public function banco_proyecto() {
        $this->load->view('Residencia/v_consulta_banco_proyecto');
    }

    public function bitacoras_avance() {
        $data['info'] = $this->session->userdata('perfil');
        switch ($this->session->userdata('id_usuario')) {
            case '7':
                $departamento = 'DEPARTAMENTO DE CIENCIAS DE LA TIERRA';
                break;
            case '8':
                $departamento = 'DEPARTAMENTO DE SISTEMAS Y COMPUTACION';
                break;
            case '9':
                $departamento = 'DEPARTAMENTO DE QUIMICA Y BIOQUIMICA';
                break;
            case '10':
                $departamento = 'DEPTO. DE INGENIERIA INDUSTRIAL';
                break;
            case '11':
                $departamento = 'DEPARTAMENTO DE INGENIERIA ELECTRICA Y ELECTRONICA';
                break;
            case '12':
                $departamento = 'DEPARTAMENTO DE INGENIERIAS';
                break;
            case '13':
                $departamento = 'DEPARTAMENTO DE CIENCIAS ECONOMICO ADMINISTRATIVAS';
                break;
            default:
                break;
        }
        $data['residentes'] = $this->m_bitacora_avance_academico->consulta_residentes($departamento);
        $this->load->view('Residencia/JefeAcademico/v_bitacora_avance_jefe_academico', $data);
    }

    public function informacion_procedimiento() {
        $data['info'] = $this->session->userdata('perfil');
        $this->load->view('Residencia//v_info_procedimiento', $data);
    }

    public function info_participantes() {
        redirect('Residencia/C_info_participantes_proyecto');
    }

    public function eliminar_procesos() {
        $data['info'] = $this->session->userdata('perfil');
        $data['elim'] = false;
        $this->load->view('Residencia/JefeAcademico/v_elim_procesos_terminados', $data);
    }

    public function eliminar_archivos() {

        $fecha_2_atras = date_create(date('Y-m-d'));
        $fecha_2_atras->sub(new DateInterval('P2Y'));


        $rutas['a_alumno'] = $this->m_bitacora_avance_academico->consulta_archivos_viejos_alumno($fecha_2_atras->format('Y-m-d') . '');
        $rutas['a_docente'] = $this->m_bitacora_avance_academico->consulta_archivos_viejos_docente($fecha_2_atras->format('Y-m-d') . '');

        if ($rutas['a_alumno']) {
            foreach ($rutas['a_alumno'] as $value) {

                unlink('./' . $value->ruta_archivo);
            }
        }

        if ($rutas['a_docente']) {
            foreach ($rutas['a_docente'] as $value) {

                unlink('./' . $value->ruta_archivo_asesor);
            }
        }

        $data['info'] = $this->session->userdata('perfil');
        $data['elim'] = true;

        $this->load->view('Residencia/JefeAcademico/v_elim_procesos_terminados', $data);
    }

    public function vacantes() {
        redirect('Residencia/c_vacantes_residencia');
    }

    public function docentes() {
        $data['info'] = $this->session->userdata('perfil');
        switch ($this->session->userdata('id_usuario')) {
            case '7':
                $departamento = 'DEPARTAMENTO DE CIENCIAS DE LA TIERRA';
                break;
            case '8':
                $departamento = 'DEPARTAMENTO DE SISTEMAS Y COMPUTACION';
                break;
            case '9':
                $departamento = 'DEPARTAMENTO DE QUIMICA Y BIOQUIMICA';
                break;
            case '10':
                $departamento = 'DEPTO. DE INGENIERIA INDUSTRIAL';
                break;
            case '11':
                $departamento = 'DEPARTAMENTO DE INGENIERIA ELECTRICA Y ELECTRONICA';
                break;
            case '12':
                $departamento = 'DEPARTAMENTO DE INGENIERIAS';
                break;
            case '13':
                $departamento = 'DEPARTAMENTO DE CIENCIAS ECONOMICO ADMINISTRATIVAS';
                break;
            default:
                $departamento = 'SIN DEPARTAMENTO';
                break;
        }
        $data['dep_jefe'] = $departamento;
        $data['info_docentes'] = $this->m_info_docentes->consulta_docentes($departamento);
        $this->load->view('Residencia/JefeAcademico/v_cambiar_info_docentes', $data);
    }

    public function docente_prestado() {
        $data['docente_prestado'] = $this->m_info_docentes->consulta_docente_prestado($this->input->post('RFC'));
        if ($data['docente_prestado'] == false) {
            $data['exito'] = false;
            echo json_encode($data);
        } else {
            $data['exito'] = true;
            echo json_encode($data);
        }
    }

    public function prestar_docente() {

        $res = $this->m_info_docentes->consulta_docente_prestamos($this->input->post('rfc_prestar'), $this->input->post('dep'));
        if ($res) {
            echo 'El docente ya ha sido compartido con este departamento';
        } else {
            $data = array(
                'rfc' => $this->input->post('rfc_prestar'),
                'departamento_origen' => $this->input->post('doc_origen'),
                'departamento_destino' => $this->input->post('dep')
            );
            if ($this->m_info_docentes->inserar_docente_prestado($data)) {
                echo 'Docente compartido correctamente';
            } else {
                echo 'Error al compartir';
            }
        }
    }

    public function quitar_docente() {

        $res = $this->m_info_docentes->borrar_docente_prestado($this->input->post('ID'));
        if ($res === false) {
            $data['exito'] = false;
            echo json_encode($data);
        } else {
            $data['exito'] = true;
            echo json_encode($data);
        }
    }

    public function actualizar_docentes() {
        if ($this->input->post('especialidad') == '') {
            $datos = array('especialidad' => NULL);
        } else {
            $datos = array('especialidad' => $this->input->post('especialidad'));
        }

        if ($this->input->post('disponible') == NULL) {
            $datos['disponible'] = false;
        } else {
            $datos['disponible'] = true;
        }

        $this->m_info_docentes->actualizar_info_docentes($this->input->post('rfc'), $datos);
        redirect('Residencia/JefeAcademico/panel_jefeacademico/docentes', 'refresh');
    }

    private function enviar_correo($id_usuario, $to, $subject, $message) {
        if ($to != null || $to != '') {
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

    private function getUsuario_coordi_res($id_usuario_jefeac) {
        $cr = '';
        switch ($id_usuario_jefeac) {
            case '7':
                $cr = 'coorresidencia1';
                break;
            case '8':
                $cr = 'coorresidencia2';
                break;
            case '9':
                $cr = 'coorresidencia3';
                break;
            case '10':
                $cr = 'coorresidencia4';
                break;
            case '11':
                $cr = 'coorresidencia5';
                break;
            case '12':
                $cr = 'coorresidencia6';
                break;
            case '13':
                $cr = 'coorresidencia7';
                break;
        }
        return $cr;
    }

    public function generar() {
        $this->load->library('Pdf');
        $resolution = array(216, 279);
        $pdf = new Pdf('P', 'mm', $resolution, true, 'UTF-8', false);

        $pdf->SetAuthor('Jose Antonio');
        $pdf->SetTitle('Instituto Tecnologico de Tepic');
        $pdf->SetSubject('Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
        $image_file = 'sinasesor.png';
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

        switch ($this->session->userdata('id_usuario')) {
            case '7':
                $departamento = 'DEPARTAMENTO DE CIENCIAS DE LA TIERRA';
                break;
            case '8':
                $departamento = 'DEPARTAMENTO DE SISTEMAS Y COMPUTACION';
                break;
            case '9':
                $departamento = 'DEPARTAMENTO DE QUIMICA Y BIOQUIMICA';
                break;
            case '10':
                $departamento = 'DEPTO. DE INGENIERIA INDUSTRIAL';
                break;
            case '11':
                $departamento = 'DEPARTAMENTO DE INGENIERIA ELECTRICA Y ELECTRONICA';
                break;
            case '12':
                $departamento = 'DEPARTAMENTO DE INGENIERIAS';
                break;
            case '13':
                $departamento = 'DEPARTAMENTO DE CIENCIAS ECONOMICO ADMINISTRATIVAS';
                break;
            default:
                break;
        }

        $data['jefe'] = $this->m_dictamen->mostrar_jefe($this->session->userdata('id_usuario'));
        foreach ($data['jefe'] as $m) {
            $nombre_jefe = $m->nombre_usuariosistema;
            $depa_jefe = $m->alias;
        }

        $id_participantes = $this->input->post('id_participantes');
        $data['participantes'] = $this->m_dictamen->mostrar_participantes2($id_participantes);
        foreach ($data['participantes'] as $m) {
            $anteproyecto_pk = $m->anteproyecto_fk;
            $nc = $m->numero_control;
            $asesor = $m->asesor;
            $revisor1 = $m->revisor1;
            $revisor2 = $m->revisor2;
        }
        $data['anteproyecto'] = $this->m_banco_proyectos->obtener_anteproyecto($anteproyecto_pk);
        foreach ($data['anteproyecto'] as $m) {
            $nombre_proyecto = $m->nombre_proyecto;
            $empresa_fk = $m->empresa_fk;
            $periodo = $m->periodo;
        }
        $data['empresa'] = $this->m_banco_proyectos->obtener_empresa($empresa_fk);
        foreach ($data['empresa'] as $m) {
            $nombre_empresa = $m->nombre_empresa;
        }
        $data['alumno'] = $this->m_dictamen->mostrar_alumno2($nc);
        foreach ($data['alumno'] as $m) {
            $nombre_alumno = utf8_decode($m->nombre);
            $id_carrera = $m->id_carrera;
        }
        $data['carrera'] = $this->m_dictamen->mostrar_carrera($id_carrera);
        foreach ($data['carrera'] as $m) {
            $nombre_carrera = utf8_decode($m->carrera);
        }
        $data['asesor'] = $this->m_dictamen->mostrar_nombre_docente($asesor);
        foreach ($data['asesor'] as $m) {
            $nombre_asesor = $m->nombres;
            $apellido_asesor = $m->apellidos;
        }
        if ($revisor1!="") {
          $data['revisor1'] = $this->m_dictamen->mostrar_nombre_docente($revisor1);
          foreach ($data['revisor1'] as $m) {
              $nombre_revisor1 = $m->nombres;
              $apellido_revisor1 = $m->apellidos;
          }
        }
        if ($revisor2!="") {
          $data['revisor2'] = $this->m_dictamen->mostrar_nombre_docente($revisor2);
          foreach ($data['revisor2'] as $m) {
              $nombre_revisor2 = $m->nombres;
              $apellido_revisor2 = $m->apellidos;
          }
        }


        $nombre_asesor = utf8_decode($nombre_asesor);
        $apellido_asesor = utf8_decode($apellido_asesor);
        $nombre_revisor1 = utf8_decode($nombre_revisor1);
        $apellido_revisor1 = utf8_decode($apellido_revisor1);
        $nombre_revisor2 = utf8_decode($nombre_revisor2);
        $apellido_revisor2 = utf8_decode($apellido_revisor2);


        $imgdata = base64_decode('iVBORw0KGgoAAAANSUhEUgAAABwAAAASCAMAAAB/2U7WAAAABlBMVEUAAAD///+l2Z/dAAAASUlEQVR4XqWQUQoAIAxC2/0vXZDrEX4IJTRkb7lobNUStXsB0jIXIAMSsQnWlsV+wULF4Avk9fLq2r8a5HSE35Q3eO2XP1A1wQkZSgETvDtKdQAAAABJRU5ErkJggg==');

//preparamos y maquetamos el contenido a crear

        $pdf->Image(K_PATH_IMAGES . 'sinasesor.png', 15, 0, 180, 40, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);
        $pdf->Image(K_PATH_IMAGES . 'abajoasesor.png', 15, 230, 180, 40, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);


        $html = '<div align="right">Departamento: ' . $departamento . '<br>
            No. de Oficio: ' . $this->input->post('oficio_asesor') . '<br>
            Asunto:<b>Asesor interno de</b><br>
            <b>Residencias Profesionales</b></div>
        <div align="right"><b>Tepic, Nayarit a ' . $dia . ' de ' . $mes . ' del ' . $año . '</b></div>
        <div style="text-align: justify"><b>' . $nombre_asesor . ' ' . $apellido_asesor . '</b><br/>
        <b>CATEDRATICO DEL I.T. DE TEPIC</b><br/>
        <b>P R E S E N T E</b></div>
        <div style="text-align: justify">Por este conducto informo a usted que ha sido asignado para fungir como Asesor Interno del Proyecto de Residencias Profesionales que a continuación se describe:</div><br>';

        $pdf->writeHTML($html, true, false, false, false, '');

        $tbl = <<<EOD
        <table border="1" align="left" >
            <tr nobr="true">
                <td colspan="3">
                    <br>
                    Nombre del Residente: <u> $nombre_alumno </u><br>
                    Carrera: <u>$nombre_carrera</u><br>
                    Nombre del proyecto: <u>$nombre_proyecto</u><br>
                    Periodo de realización: <u>$periodo</u><br>
                    Empresa: <u>$nombre_empresa</u>
                </td>
            </tr>
        </table>
EOD;

        $pdf->writeHTML($tbl, true, false, false, false, '');

        $html = '<br><br>
        <div style="text-align: justify">Así mismo, le solicito dar el seguimiento pertinente a la realización del proyecto aplicando los lineamientos establecidos para ello, en el procedimiento del SGC para Residencias Profesionales (ITTEPIC-AC-PO-007).</div>
        <div style="text-align: justify">Agradezco de antemano su valioso apoyo en esta importante actividad para la formación profesional de nuestros estudiantes.</div>
        <br><br>
        <div align="center"><b>A t e n t a m e n t e.</b></div>
        <br><br>
        <div align="center">_________________________</div>
        <div align="center"><b>' . $nombre_jefe . '</b><br>
             <b>' . $depa_jefe . '</b></div>
        <br><br>
        <br><br>
        <small>c.c.p. Coordinación de Carrera</small>
        <br>
        <small>c.c.p. Expediente</small>';

        $pdf->writeHTML($html, true, false, false, false, '');

////////////////////////            ////////////////////////
////////////////////////SEGUNDA HOJA////////////////////////
////////////////////////            ////////////////////////
////////////////////////            ////////////////////////
if ($revisor1!="") {
  $pdf->AddPage();

//fijar efecto de sombra en el texto
  $pdf->setTextShadow(array('disabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

// Establecemos el contenido para imprimir
// el data y los models
  $datax['hoy'] = date("Y-m-d");
  $fecha1 = date('Y-m-d', strtotime($datax['hoy'] . ' + 7 days'));
  $uno = explode("-", $fecha1);
  switch ($uno[1]) {
      case 1:
          $uno[1] = 'Enero';
          break;
      case 2:
          $uno[1] = 'Febrero';
          break;
      case 3:
          $uno[1] = 'Marzo';
          break;
      case 4:
          $uno[1] = 'Abril';
          break;
      case 5:
          $uno[1] = 'Mayo';
          break;
      case 6:
          $uno[1] = 'Junio';
          break;
      case 7:
          $uno[1] = 'Julio';
          break;
      case 8:
          $uno[1] = 'Agosto';
          break;
      case 9:
          $uno[1] = 'Septiembre';
          break;
      case 10:
          $uno[1] = 'Octubre';
          break;
      case 11:
          $uno[1] = 'Noviembre';
          break;
      case 12:
          $uno[1] = 'Diciembre';
          break;
  }


  $imgdata = base64_decode('iVBORw0KGgoAAAANSUhEUgAAABwAAAASCAMAAAB/2U7WAAAABlBMVEUAAAD///+l2Z/dAAAASUlEQVR4XqWQUQoAIAxC2/0vXZDrEX4IJTRkb7lobNUStXsB0jIXIAMSsQnWlsV+wULF4Avk9fLq2r8a5HSE35Q3eO2XP1A1wQkZSgETvDtKdQAAAABJRU5ErkJggg==');


//preparamos y maquetamos el contenido a crear

  $pdf->Image(K_PATH_IMAGES . 'sinrevisor.png', 15, 0, 180, 40, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);
  $pdf->Image(K_PATH_IMAGES . 'abajorevisor.png', 15, 230, 180, 40, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);


  $html = '<div align="right">Departamento: ' . $departamento . ' <br>
      No. de Oficio: ' . $this->input->post('oficio_revisor1') . '<br>
      Asunto:<b>Revisor de Residencias</b><br>
      <b>Profesionales</b></div>
  <div align="right"><b>Tepic, Nayarit a ' . $dia . ' de ' . $mes . ' del ' . $año . ' </b></div>
  <div style="text-align: justify"><b>' . $nombre_revisor1 . ' ' . $apellido_revisor1 . '</b><br/>
     <b>CATEDRATICO DEL I.T. DE TEPIC</b><br/>
     <b>P R E S E N T E</b></div>
  <div style="text-align: justify">Por este conducto solicito a usted  revisar el informe técnico de Residencia Profesional adjunto, emitiendo su aprobación o bien, señalando las observaciones que considere pertinentes para mejorar la calidad del mismo.  Asimismo, le informo que la fecha límite para la entrega de dicha revisión es el día <b>' . $uno[2] . ' de ' . $uno[1] . ' del presente año.</b></div><br>';

  $pdf->writeHTML($html, true, false, false, false, '');

  $tbl = <<<EOD
  <table border="1" align="left" >
      <tr nobr="true">
          <td colspan="3">
              <br>
              Nombre del Residente: <u>$nombre_alumno</u><br>
              Carrera: <u>$nombre_carrera</u><br>
              Nombre del proyecto: <u>$nombre_proyecto</u><br>
              Asesor y Revisor: <u> $nombre_asesor  $apellido_asesor <br> $nombre_revisor2 $apellido_revisor2 </u>
          </td>
      </tr>
  </table>
EOD;

  $pdf->writeHTML($tbl, true, false, false, false, '');

  $html = '<br><br>
  <div align=style="text-align: justify">Agradeciendo de antemano su valiosa aportación a esta importante actividad para la formación profesional de nuestros estudiantes.</div>
  <br><br>
  <div align="center"><b>A t e n t a m e n t e.</b></div>
  <br><br>
  <div align="center">_________________________</div>
  <div align="center"><b>' . $nombre_jefe . '</b><br>
       <b>' . $depa_jefe . '</b></div>
  <br><br>
  <br><br>
  <small>c.c.p. Coordinación de Carrera</small>
  <br>
  <small>c.c.p. Expediente</small>';

  $pdf->writeHTML($html, true, false, false, false, '');

}

////////////////////////            ////////////////////////
////////////////////////TERCERA HOJA////////////////////////
////////////////////////            ////////////////////////
////////////////////////            ////////////////////////
if ($revisor2!="") {
  $pdf->AddPage();
//fijar efecto de sombra en el texto
  $pdf->setTextShadow(array('disabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));
// Establecemos el contenido para imprimir
// el data y los models
  $imgdata = base64_decode('iVBORw0KGgoAAAANSUhEUgAAABwAAAASCAMAAAB/2U7WAAAABlBMVEUAAAD///+l2Z/dAAAASUlEQVR4XqWQUQoAIAxC2/0vXZDrEX4IJTRkb7lobNUStXsB0jIXIAMSsQnWlsV+wULF4Avk9fLq2r8a5HSE35Q3eO2XP1A1wQkZSgETvDtKdQAAAABJRU5ErkJggg==');
//preparamos y maquetamos el contenido a crear
  $pdf->Image(K_PATH_IMAGES . 'sinrevisor.png', 15, 0, 180, 40, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);
  $pdf->Image(K_PATH_IMAGES . 'abajorevisor.png', 15, 230, 180, 40, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);
  $html = '<div align="right">Departamento: ' . $departamento . ' <br>
      No. de Oficio: ' . $this->input->post('oficio_revisor2') . ' <br>
      Asunto:<b>Revisor de Residencias</b><br>
      <b>Profesionales</b></div>
  <div align="right"><b>Tepic, Nayarit a ' . $dia . ' de ' . $mes . ' del ' . $año . ' </b></div>
  <div style="text-align: justify"><b>' . $nombre_revisor2 . ' ' . $apellido_revisor2 . '</b><br/>
     <b>CATEDRATICO DEL I.T. DE TEPIC</b><br/>
     <b>P R E S E N T E</b></div>
  <div style="text-align: justify">Por este conducto solicito a usted  revisar el informe técnico de Residencia Profesional adjunto, emitiendo su aprobación o bien, señalando las observaciones que considere pertinentes para mejorar la calidad del mismo.  Asimismo, le informo que la fecha límite para la entrega de dicha revisión es el día <b>' . $uno[2] . ' de ' . $uno[1] . ' del presente año.</b></div><br>';

  $pdf->writeHTML($html, true, false, false, false, '');

  $tbl = <<<EOD
  <table border="1" align="left" >
      <tr nobr="true">
          <td colspan="3">
              <br>
              Nombre del Residente: <u>$nombre_alumno</u><br>
              Carrera: <u>$nombre_carrera</u><br>
              Nombre del proyecto: <u>$nombre_proyecto</u><br>
              Asesor y Revisor: <u> $nombre_asesor $apellido_asesor <br> $nombre_revisor1 $apellido_revisor1 </u>
          </td>
      </tr>
  </table>
EOD;

  $pdf->writeHTML($tbl, true, false, false, false, '');

  $html = '<br><br>
  <div style="text-align: justify">Agradeciendo de antemano su valiosa aportación a esta importante actividad para la formación profesional de nuestros estudiantes.</div>
  <br><br>
  <div align="center"><b>A t e n t a m e n t e.</b></div>
  <br><br>
  <div align="center">_________________________</div>
  <div align="center"><b>' . $nombre_jefe . '</b><br>
       <b>' . $depa_jefe . '</b></div>
  <br><br>
  <br><br>
  <small>c.c.p. Coordinación de Carrera</small>
  <br>
  <small>c.c.p. Expediente</small>';

  $pdf->writeHTML($html, true, false, false, false, '');
}


// Imprimimos el texto con writeHTMLCell()
        //$pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
// ---------------------------------------------------------
// Cerrar el documento PDF y preparamos la salida
// Este método tiene varias opciones, consulte la documentación para más información.
        $nombre_archivo = utf8_decode("Documento de .pdf");
        ob_end_clean(); //Por si pasa el TCPDF error: some data has already been output
        $pdf->Output($nombre_archivo, 'I');
    }

}
