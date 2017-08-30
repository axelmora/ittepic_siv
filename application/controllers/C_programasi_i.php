<?php

class C_programasi_i extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_programasi_i');
    }

    function cp() {
        $id = $this->input->post('did');

        $datos['arrInstancias'] = $this->m_programasi_i->get_instancia($id);
        $datos['arrPrograma'] = $this->m_programasi_i->get_tprogramas();

        $this->load->view('v_programasi_i', $datos);
    }

    function index() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('did', 'Instancia', 'required|min_length[1]|max_length[80]');
        $this->form_validation->set_rules('tprogramai', 'Tipo de programa', 'required|numeric|min_length[1]|max_length[5]');
        $this->form_validation->set_rules('departamentoi', 'Departamento', 'required|min_length[1]|max_length[100]');
        $this->form_validation->set_rules('encargadoi', 'Encargado', 'required|min_length[1]|max_length[75]');
        $this->form_validation->set_rules('correoi', 'Correo', 'required|valid_email|min_length[5]|max_length[255]');
        $this->form_validation->set_rules('nombrepi', 'Nombre programa', 'required|min_length[1]|max_length[95]');
        $this->form_validation->set_rules('objetivoi', 'Objetivo', 'required|min_length[2]|max_length[150]');
        $this->form_validation->set_rules('modalidadi', 'Modalidad', 'required|min_length[1]|max_length[50]');
        $this->form_validation->set_rules('tvacantesi', 'Total de vacantes', 'required|numeric|min_length[1]|max_length[50]');
        if ($this->form_validation->run() == FALSE) {

            $id = $this->input->post('did');

            $datos['arrInstancias'] = $this->m_programasi_i->get_instancia($id);
            $datos['arrPrograma'] = $this->m_programasi_i->get_tprogramas();

            $this->load->view('v_programasi_i', $datos);
        } else {

            $data = array(
                'id_instancia' => $this->input->post('did'),
                'departamento' => $this->input->post('departamentoi'),
                'nombre_encargado' => $this->input->post('encargadoi'),
                'correo_encargado' => $this->input->post('correoi'),
                'nombre_programa' => $this->input->post('nombrepi'),
                'objetivo_programa' => $this->input->post('objetivoi'),
                'modalidad' => $this->input->post('modalidadi'),
                'id_tipoprograma' => $this->input->post('tprogramai'),
                'total_solicitudes' => $this->input->post('tvacantesi'));

            $this->m_programasi_i->form_insert($data);
            $data['message'] = 'Los datos se insertaron correctamente';

            $id = $this->input->post('did');

            $data['arrInstancias'] = $this->m_programasi_i->get_instancia($id);
            $data['arrPrograma'] = $this->m_programasi_i->get_tprogramas();
            $this->load->view('v_programasi_i', $data);
        }
    }

}

?>