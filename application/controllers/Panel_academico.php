<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 */
class Panel_academico extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper(array('url', 'form'));
        $this->load->database('local');
        
        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'jefeacademico') {
            redirect(base_url() . 'index.php/logeo');
        }
    }

    public function index() {
        
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('inicioacademico1', $data);
    }
    
    public function residencia(){
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('Residencia/JefeAcademico/inicio_residencia_academico', $data);
    }
}
