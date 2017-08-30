<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/Mazatlan');

class C_banco extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        //cargamos la librería form_validation
        $this->load->library(array('form_validation'));
        $this->load->model('Residencia/Alumno/m_propuesta');
        $this->load->model('Residencia/m_banco_proyectos');
        $this->load->model('Residencia/m_vacantes');
        $this->load->model('m_usuarios');
        $this->load->model('Residencia/m_historial');
    }

    public function sin() {
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

            $departamento = $this->m_banco_proyectos->obtener_departamento($data['id_carrera']);
            $data['vacantes'] = $this->m_vacantes->mostrar_vacantes($departamento);
            $data['solicitud'] = $this->m_propuesta->solicitud($session_data['username']);
            //cargamos la vista y el array data
            $this->load->view('Residencia/Alumno/v_bancoSin', $data);
        } else {
            //If no session, redirect to login page
            redirect('logeo', 'refresh');
        }
    }

    public function postular() {
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

            $anteproyecto = array(
                'lugares_disponibles' => ($this->input->post('lugares_d') - 1),
                'disponible' => $this->input->post('disponible'));
            if ($this->input->post('periodo') == null || $this->input->post('periodo') == '') {
                
            } else {
                $anteproyecto['periodo'] = mb_strtoupper($this->input->post('periodo'), 'UTF-8');
            }
            $this->m_propuesta->actualizar_anteproyecto($this->input->post('anteproyecto_pk'), $anteproyecto);

            $solicitud = array(
                'numero_control' => $session_data['username'],
                'anteproyecto_id' => $this->input->post('anteproyecto_pk'),
                'estado_solicitud' => 'P',
                'fecha_solicitud' => date('Y-m-d'));

            $this->m_propuesta->insertar_solicitud($solicitud);

            $bitacora = array(
                'numero_control' => $session_data['username'],
                'estado' => 1);

            $this->m_propuesta->insertar_bitacora($bitacora);

            $dictamen = array(
                'numero_control' => $session_data['username'],
                'jefe_academico' => false,
                'presidente_academia' => false,
                'subdirector_academico' => false,
                'jefe_oficina_residencia' => false,
                'anteproyecto' => $this->input->post('anteproyecto_pk'),
                'doc_finales' => false,
                'liberacion_interno' => false,
                'liberacion_externo' => false,
                'calificaciones' => false,
                'evidencias' => false);

            $this->m_propuesta->insertar_dictamen($dictamen);

            $atencion = array(
                'numero_control' => $session_data['username'],
                'atencion_medica' => mb_strtoupper($this->input->post('atencion_medica'), 'UTF-8'),
                'numero_afiliacion' => mb_strtoupper($this->input->post('numero_afiliacion'), 'UTF-8'));

            $this->m_propuesta->insertar_atencion_medica($atencion);

            $datax['hoy'] = date("Y-m-d");
            $fecha1 = date('Y-m-d', strtotime($datax['hoy'] . ' + 7 days'));

            $data['anteproyecto'] = $this->m_banco_proyectos->obtener_anteproyecto($this->input->post('anteproyecto_pk'));
            foreach ($data['anteproyecto'] as $m) {
                $ruta_archivo = $m->ruta_archivo;
                $nombre_archivo = $m->nombre_archivo;
            }
            $archivo_alumno = array(
                'numero_control_fk' => $data['username'],
                'descripcion_archivo' => mb_strtoupper('Proyecto previamente autorizado por la academia', 'UTF-8'),
                'tipo_documento' => 'A',
                'estado' => 'ER',
                'fecha_guardado_documento' => date('Y-m-d H:i:s'),
                'fecha_limite_revision' => $fecha1,
                'ruta_archivo' => $ruta_archivo,
                'nombre_archivo' => $nombre_archivo);

            $this->m_propuesta->insertar_archivo_alumno($archivo_alumno);

            $nuevo2 = $this->m_banco_proyectos->obtener_departamento($data['id_carrera']);
            $data['solicitud'] = $this->m_propuesta->solicitud($session_data['username']); //este es nuevo, daba error por que no estaba.
            $data['anteproyectos'] = $this->m_banco_proyectos->consulta_banco_proyectos_por_departamento($nuevo2);

            $this->correo($data['id_carrera']);
            //cargamos la vista y el array data
            $this->load->view('Residencia/Alumno/v_bancoCon', $data);
        } else {
            //If no session, redirect to login page
            redirect('logeo', 'refresh');
        }
    }

    public function esta_disponible() {
        echo json_encode(array('respuesta' => $this->m_banco_proyectos->obtener_anteproyecto2($this->input->post('id_anteproyecto'))));
    }

    public function con() {
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

            $nuevo2 = $this->m_banco_proyectos->obtener_departamento($data['id_carrera']);
            $data['solicitud'] = $this->m_propuesta->solicitud($session_data['username']);
            $data['anteproyectos'] = $this->m_banco_proyectos->consulta_banco_proyectos_por_departamento($nuevo2);
            $data['s'] = 0;
            //cargamos la vista y el array data
            $this->load->view('Residencia/Alumno/v_bancoCon', $data);
        } else {
            //If no session, redirect to login page
            redirect('logeo', 'refresh');
        }
    }

    public function index() {
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

            $otro = $this->m_usuarios->consulta_info_alumno($data['username']);
            foreach ($otro as $value) {
                $tmp = $value->correo;
            }
            if ($tmp == null) {
                redirect('C_info_usuarios/alumno');                
            }

            //cargamos la vista y el array data
            $this->load->view('Residencia/Alumno/v_banco', $data);
            
        } else {
            //If no session, redirect to login page
            redirect('logeo', 'refresh');
        }
    }

    private function correo($id_carrera) {
        $consulta_correo_ja = $this->m_historial->consulta_correo_usuario($this->getJefeA($id_carrera));
        $correoJA = '';
        foreach ($consulta_correo_ja as $value) {
            $correoJA = $value->correo;
        }

        if ($correoJA != null || $correoJA != '') {
            $this->enviar_correo($this->getJefeA($id_carrera), $correoJA, 'Solicitud de residencia pendiente.', 'Tiene una solicitud de residencia pendiente, ingrese a http://siv.ittepic.edu.mx/ para mas información.');
        }
    }

    private function getJefeA($id_carrera) {
        $ja = '';
        switch ($id_carrera) {
            case '3':
                $ja = 'jacademico1'; //ciencias de la tierra
                break;
            case '4':
                $ja = 'jacademico6'; //CIVIL
                break;
            case '2':
                $ja = 'jacademico2'; //sistemas y computacion
                break;
            case '7':
                $ja = 'jacademico2'; //sistemas y computacion
                break;
            case '15':
                $ja = 'jacademico2'; //sistemas y computacion
                break;
            case '11':
                $ja = 'jacademico2'; //sistemas y computacion
                break;
            case '8':
                $ja = 'jacademico3'; //quimica bioquimica
                break;
            case '9':
                $ja = 'jacademico3'; //quimica bioquimica
                break;
            case '6':
                $ja = 'jacademico4'; //industrial
                break;
            case '5':
                $ja = 'jacademico5'; //electrica-mecatronica
                break;
            case '13':
                $ja = 'jacademico5'; //electrica-mecatronica
                break;
            case '10':
                $ja = 'jacademico7'; //admin.ige
                break;
            case '14':
                $ja = 'jacademico7'; //admin.ige
                break;

            default:
                $ja = '';
                break;
        }
        return $ja;
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
