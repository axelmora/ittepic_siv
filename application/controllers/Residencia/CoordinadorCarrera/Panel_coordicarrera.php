<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 */
class Panel_coordicarrera extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        
        if ($this->session->userdata('perfil') == FALSE) {
            redirect(base_url() . 'index.php/logeo');
        }
        if ($this->session->userdata('perfil') != 'coordinadorprogac') {            
            $this->load->view('notienespermisos');            
        }
    }

    public function index() {

        $this->load->view('iniciocoordicarrera');
    }

    public function noticias_residencia() {
        redirect('C_noticias/indexR');        
    }

    public function informacion_procedimiento() {        
        $data['info'] = $this->session->userdata('perfil');
        $this->load->view('Residencia/v_info_procedimiento',$data);
    }
    public function consulta_banco_proyectos() {        
        redirect('Residencia/C_banco_proyectos');
    }
    public function verifica_dictamen(){
        redirect('Residencia/c_consulta_dictamen');
    }

}
