<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 */
class Panel_presidenteacademico extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
    }

    public function index() {

        if ($this->session->userdata('perfil') == FALSE) {
            redirect(base_url() . 'index.php/logeo');
        }
        if ($this->session->userdata('perfil') == 'presidenteacademia') {
            $this->load->view('iniciopresidenteacademico');
        } else {

            $this->load->view('notienespermisos');
        }
    }

    public function informacion_procedimiento() {
        $this->load->view('Residencia/v_info_procedimiento');
    }

    public function autorizar_dictamen() {
        redirect('Residencia/c_autoriza_dictamen');
    }

}
