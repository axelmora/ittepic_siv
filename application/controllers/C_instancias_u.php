<?php

class C_instancias_u extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_instancias_u');
    }

    function show_instancia_id() {
        $id = $this->uri->segment(3);
        $data['single_instancia'] = $this->m_instancias_u->show_instancia_id($id);
        $this->load->view('v_instancias_u', $data);
    }

    function update_instancia_id1() {
        $id = $this->input->post('did');
        $data = array(
            'nombre_instancia' => $this->input->post('nombrei'),
            'sector_instancia' => $this->input->post('sectori'),
            'titular_instancia' => $this->input->post('titulari'),
            'puesto_titular_instancia' => $this->input->post('ptitulari'),
            'domicilio_instancia' => $this->input->post('domicilioi'),
            'telefono_instancia' => $this->input->post('telefonoi'),
            'usuario_instancia' => $this->input->post('usuarioi'),
            'pass_instancia' => sha1($this->input->post('passi'))
        );
        $this->m_instancias_u->update_instancia_id1($id, $data);
        $this->load->view('v_correctoinstancia_u');
    }

}

?>