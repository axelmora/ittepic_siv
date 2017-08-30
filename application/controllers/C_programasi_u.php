<?php

class C_programasi_u extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_programasi_u');
    }

    function show_programa_id() {
        $id = $this->uri->segment(3);
        $data['single_programa'] = $this->m_programasi_u->show_programa_id($id);

        $data['arrPrograma'] = $this->m_programasi_u->get_tprogramas();

        $this->load->view('v_programasi_u', $data);
    }

    function update_programa_id1() {
        $id = $this->input->post('did');
        $data = array(
            'id_instancia' => $this->input->post('idinstanciai'),
            'departamento' => $this->input->post('departamentoi'),
            'nombre_encargado' => $this->input->post('encargadoi'),
            'correo_encargado' => $this->input->post('correoi'),
            'nombre_programa' => $this->input->post('nombrepi'),
            'objetivo_programa' => $this->input->post('objetivoi'),
            'modalidad' => $this->input->post('modalidadi'),
            'id_tipoprograma' => $this->input->post('tprogramai'),
            'total_solicitudes' => $this->input->post('tvacantesi')
        );
        $this->m_programasi_u->update_programa_id1($id, $data);
        $this->load->view('v_correctoprograma_u');
    }

}

?>