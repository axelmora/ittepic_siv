<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 */
class Panel_directivo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper(array('url', 'form'));
        $this->load->database('local');
    }

    public function index() {
        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'directivo') {
            redirect(base_url() . 'index.php/logeo');
        }
        $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
        $this->load->view('iniciodirectivo1', $data);
    }

}
