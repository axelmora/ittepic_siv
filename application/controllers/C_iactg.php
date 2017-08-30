<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_iactg extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database('local');
        //cargamos el helper url y el helper form
        $this->load->helper(array('url', 'form'));
        //cargamos la librería form_validation
        $this->load->library(array('form_validation'));

        $this->load->model('m_iactg');
    }

    function show_id() {
        $id = $this->input->post('ids');
        $data['single_id'] = $this->m_iactg->show_id($id);

        foreach ($data['single_id'] as $item) {

            $idsolicitud = $item->id_solicitud;
        }

        $data['actividades'] = $this->m_iactg->show_actividades_by_id($idsolicitud);


        $this->load->view('v_iactg', $data);
    }

    function delete() {

        $idact = $this->input->post('idact');

        $this->m_iactg->delete($idact);

        $id = $this->input->post('ids');
        $data['single_id'] = $this->m_iactg->show_id($id);

        foreach ($data['single_id'] as $item) {

            $idsolicitud = $item->id_solicitud;
        }

        $data['actividades'] = $this->m_iactg->show_actividades_by_id($idsolicitud);
        $this->load->view('v_iactg', $data);
    }

    function index() {



//Including validation library
        $this->load->library('form_validation');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

// obtenemos el array de profesiones y lo preparamos para enviar
//Validating Name Field
        $this->form_validation->set_rules('ids', 'Instancia', 'required|min_length[0]|max_length[80]');

//Validating Name Field
        $this->form_validation->set_message('required', 'Necesitas introducir una actividad');
//Validating Name Field
        $this->form_validation->set_rules('actividadgi', 'Actividad general', 'required|min_length[1]|max_length[100]');


        if ($this->form_validation->run() == FALSE) {

            $idsolicitud = $this->input->post('ids');
            $data['actividades'] = $this->m_iactg->show_actividades_by_id($idsolicitud);
            $this->load->view('v_iactg', $data);
        } else {
//Setting values for tabel columns
            $data = array(
                'id_solicitud' => $this->input->post('ids'),
                'descripcion_act' => $this->input->post('actividadgi'));


//Transfering data to Model
            $this->m_iactg->form_insert($data);
            $data['message'] = 'Los datos se insertaron correctamente';

            $idsolicitud = $this->input->post('ids');
            $data['actividades'] = $this->m_iactg->show_actividades_by_id($idsolicitud);


//Loading View
            $this->load->view('v_iactg', $data);
        }
    }

}

?>