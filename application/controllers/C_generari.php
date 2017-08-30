<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 */
class C_generari extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
    }

    public function index() {
        if ($this->session->userdata('perfil') == FALSE) {
            redirect(base_url() . 'index.php/logeo');
        }
        if ($this->session->userdata('perfil') == 'jefevinculacion' || $this->session->userdata('perfil') == 'jefeservicio') {

            $this->load->view('v_generari');
        }

        $this->load->view('notienespermisos');




        //--------------------------------------------------------------------------------------------------------------------
    }

}
