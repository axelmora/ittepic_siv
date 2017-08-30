<?php

class C_instancias_i extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_instancias_i');
    }

    function index() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('nombrei', 'Nombre', 'required|min_length[1]|max_length[50]');
        $this->form_validation->set_rules('sectori', 'Sector', 'required|min_length[2]|max_length[15]');
        $this->form_validation->set_rules('titulari', 'Titular', 'required|min_length[5]|max_length[255]');
        $this->form_validation->set_rules('ptitulari', 'Puesto titular', 'required|min_length[5]|max_length[255]');
        $this->form_validation->set_rules('domicilioi', 'Domicilio', 'required|min_length[2]|max_length[65]');
        $this->form_validation->set_rules('telefonoi', 'Telefono', 'required|min_length[2]|max_length[15]');
        $this->form_validation->set_rules('usuarioi', 'Usuario', 'required|min_length[1]|max_length[50]');
        $this->form_validation->set_rules('passi', 'Contraseña', 'required|min_length[5]|max_length[50]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('v_instancias_i');
        } else {

            $data = array(
                'nombre_instancia' => $this->input->post('nombrei'),
                'sector_instancia' => $this->input->post('sectori'),
                'titular_instancia' => $this->input->post('titulari'),
                'puesto_titular_instancia' => $this->input->post('ptitulari'),
                'domicilio_instancia' => $this->input->post('domicilioi'),
                'telefono_instancia' => $this->input->post('telefonoi'),
                'usuario_instancia' => $this->input->post('usuarioi'),
                'pass_instancia' => sha1($this->input->post('passi')),
                'fecha_registro' => date('Y-m-d H:i:s'));

            $this->m_instancias_i->form_insert($data);
            $data['message'] = 'Los datos se insertaron correctamente';
            $this->load->view('v_instancias_i', $data);
        }
    }

}

?>