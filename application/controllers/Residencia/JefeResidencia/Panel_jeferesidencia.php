<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 *
 */
class Panel_jeferesidencia extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->load->model('Residencia/m_solicitudes_anteproyecto');
        $this->load->model('Residencia/JefeAcademico/m_info_docentes');
    }

    public function index() {

        if ($this->session->userdata('perfil') == FALSE) {
            redirect(base_url() . 'index.php/logeo');
        }
        if ($this->session->userdata('perfil') == 'jeferesidencia') {
            $this->load->view('iniciojeferesidencia');
        } else {
            $this->load->view('notienespermisos');
        }
    }

    public function banco_proyecto() {
        redirect('Residencia/c_banco_proyectos');
    }

    public function consulta_dictamen() {
        redirect('Residencia/c_consulta_dictamen');
    }

    public function registrar_documentos() {
        redirect('Residencia/JefeResidencia/c_registrar_documentos');
    }

    public function informacion_procedimiento() {
        $this->load->view('Residencia/v_info_procedimiento');
    }
    public function informe_finalsemestre() {
        $data['alumnos'] = $this->m_info_docentes->consultararchivoalumnos();
        $this->load->view('Residencia/JefeResidencia/v_reportesfinales',$data);
    }
}
