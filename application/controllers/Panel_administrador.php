<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 */
class Panel_administrador extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
    }

    public function index() {
        if ($this->session->userdata('perfil') == FALSE) {
            redirect(base_url() . 'index.php/logeo');
        }
        if ($this->session->userdata('perfil') == 'administrador') {
            $data['titulo'] = 'Bienvenido Jefe de servicio';
            $this->load->view('inicioadministrador', $data);
        } else {
            $this->load->view('notienespermisos');
        }
    }

}
