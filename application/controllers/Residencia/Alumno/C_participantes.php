<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_participantes extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        //cargamos la librería form_validation
        $this->load->library(array('form_validation'));

        $this->load->model('Residencia/Alumno/m_participantes');
        $this->load->model('Residencia/m_banco_proyectos');
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

            $nuevo = $this->m_participantes->obtener_asesor($session_data['username']);
            if ($nuevo) {
                foreach ($nuevo as $value) {
                    $tmp = $value->nombres;
                    $tmp2 = $value->apellidos;
                    $tmp3 = $value->correo;
                }
                $data['asesor'] = true;
                $data['asesor_nombre'] = utf8_decode($tmp);
                $data['asesor_apellido'] = utf8_decode($tmp2);
                $data['asesor_correo'] = $tmp3;
            } else {
                $data['asesor'] = $nuevo;
            }

            $nuevo2 = $this->m_participantes->obtener_revisor1($session_data['username']);
            if ($nuevo2) {
                foreach ($nuevo2 as $value2) {
                    $tmp = $value2->nombres;
                    $tmp2 = $value2->apellidos;
                    $tmp3 = $value2->correo;
                }
                $data['revisor1'] = true;
                $data['revisor1_nombre'] = utf8_decode($tmp);
                $data['revisor1_apellido'] = utf8_decode($tmp2);
                $data['revisor1_correo'] = $tmp3;
            } else {
                $data['revisor1'] = $nuevo2;
            }

            $nuevo3 = $this->m_participantes->obtener_revisor2($session_data['username']);
            if ($nuevo3) {
                foreach ($nuevo3 as $value3) {
                    $tmp = $value3->nombres;
                    $tmp2 = $value3->apellidos;
                    $tmp3 = $value3->correo;
                }
                $data['revisor2'] = true;
                $data['revisor2_nombre'] = utf8_decode($tmp);
                $data['revisor2_apellido'] = utf8_decode($tmp2);
                $data['revisor2_correo'] = $tmp3;
            } else {
                $data['revisor2'] = $nuevo3;
            }

            $departamento = $this->m_banco_proyectos->obtener_departamento($data['id_carrera']);
            if ($departamento == 'DEPARTAMENTO DE CIENCIAS DE LA TIERRA') {
                $nuevo4 = $this->m_participantes->obtener_jefe(7);
            }
            if ($departamento == 'DEPARTAMENTO DE INGENIERIAS') {
                $nuevo4 = $this->m_participantes->obtener_jefe(12);
            }
            if ($departamento == 'DEPARTAMENTO DE SISTEMAS Y COMPUTACION') {
                $nuevo4 = $this->m_participantes->obtener_jefe(8);
            }
            if ($departamento == 'DEPARTAMENTO DE QUIMICA Y BIOQUIMICA') {
                $nuevo4 = $this->m_participantes->obtener_jefe(9);
            }
            if ($departamento == 'DEPTO. DE INGENIERIA INDUSTRIAL') {
                $nuevo4 = $this->m_participantes->obtener_jefe(10);
            }
            if ($departamento == 'DEPARTAMENTO DE INGENIERIA ELECTRICA Y ELECTRONICA') {
                $nuevo4 = $this->m_participantes->obtener_jefe(11);
            }
            if ($departamento == 'DEPARTAMENTO DE CIENCIAS ECONOMICO ADMINISTRATIVAS') {
                $nuevo4 = $this->m_participantes->obtener_jefe(13);
            }
            if ($nuevo4) {
                foreach ($nuevo4 as $value4) {
                    $tmp = $value4->nombre_usuariosistema;
                    $tmp2 = $value4->correo;
                }
                $data['jefe'] = true;
                $data['jefe_nombre'] = $tmp;
                $data['jefe_correo'] = $tmp2;
            } else {
                $data['jefe'] = $nuevo4;
            }
            //cargamos la vista y el array data
            $this->load->view('Residencia/Alumno/v_participantes', $data);
        } else {
            //If no session, redirect to login page
            redirect('logeo', 'refresh');
        }
    }

}
