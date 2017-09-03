﻿<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_informacion extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        //cargamos la librería form_validation
        $this->load->library(array('form_validation'));

        $this->load->model('m_noticias');
        $this->load->model('m_solicitud');
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


            $numero_control = $data['username'];

            $data['programa'] = $this->m_solicitud->show_programa($numero_control);

            //cargamos la vista y el array data
            $this->load->view('Residencia/Alumno/v_informacion_proceso', $data);
        } else {
            //If no session, redirect to login page
            redirect('logeo', 'refresh');
        }
    }

}