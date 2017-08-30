<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 */
class Cm_usuarios extends CI_Controller {

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
        $data['usuarios'] = $this->m_usuarios->show_usuarios();
        $data['titulo'] = 'Bienvenido Jefe de servicio';
        $this->load->view('vm_usuarios', $data);
    }

    public function actualizar() {
        $id = $this->input->post('idu');
        $data = array(
            'nombre_usuariosistema' => $this->input->post('nombres'),
            'usuario' => $this->input->post('usuarioi'),
            'pass' => sha1($this->input->post('pass'))
        );


//Transfering data to Model
        $this->m_usuarios->actualizar($id, $data);

        if ($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador') {
            redirect(base_url() . 'index.php/logeo');
        }
        $data['usuarios'] = $this->m_usuarios->show_usuarios();

        $this->load->view('vm_usuarios', $data);
    }

}
