<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 */
class Panel_vinculacion extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper(array('url', 'form'));
        $this->load->database('local');
        
        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'jefevinculacion') {
            redirect(base_url() . 'index.php/logeo');
        }        
    }

    public function index() {    
            $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
            $this->load->view('iniciojefevinculacion', $data);    
    }
    
    public function residencia(){
        redirect('Residencia/JefeVinculacion/panel_jefevinculacion');
    }
    

}
