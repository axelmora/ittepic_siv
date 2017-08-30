<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 */
class Cm_docentes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->load->model('m_usuarios');
    }

    public function index() {
        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador') {
            redirect(base_url() . 'index.php/logeo');
        }
        $data['docentes'] = $this->m_usuarios->show_docentes();
        $data['titulo'] = 'Bienvenido Jefe de servicio';
        $this->load->view('vm_docentes', $data);
    }

    public function actualizar() {
        $rfc = $this->input->post('idu');
        $data = array(
            'contrasena' => $this->input->post('pass')
        );

        $this->m_usuarios->actualizar_info_docente($rfc, $data);
        $this->index();
    }

}
