<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Alumnos_r extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database('local');
        //cargamos el helper url y el helper form
        $this->load->helper(array('url', 'form'));
        //cargamos la librería form_validation
        $this->load->library(array('form_validation'));

        $this->load->model('m_alumnos');
    }

    //con esta función validamos y protegemos el buscador
    public function validar() {
        $this->form_validation->set_rules('id', 'buscador', 'integer|required|min_length[8]|max_length[8]|trim');
        $this->form_validation->set_message('required', 'El campo no puede ir vacío!');
        $this->form_validation->set_message('min_length', 'El  campo debe tener al menos %s carácteres');
        $this->form_validation->set_message('max_length', 'El campo no puede tener más de %s carácteres');
        if ($this->form_validation->run() == TRUE) {

            $id = $this->input->post('id');

            $result = $this->m_alumnos->show_data_by_id($id);

            if ($result == 0) {

                $data['alumno'] = $result;
                $this->load->view('v_alumnos_r', $data);
            } else {

                $data['alumno'] = $result;

                foreach ($data['alumno'] as $item) {

                    $idsolicitud = $item->id_solicitud;
                }



                $result = $this->m_alumnos->show_actividades_by_id($idsolicitud);
                $data['actividades'] = $result;




                $this->load->view('v_alumnos_r', $data);
            }
        } else {
            //mostramos de nuevo el buscador con los errores
            redirect('c_alumnos');
        }
    }

    public function select_by_id() {

        $id = $this->input->post('id');
        $result = $this->m_alumnos->show_data_by_id($id);
        $data['alumno'] = $result;
        $this->load->view('v_alumnos_r', $data);
    }

    public function index() {

        $buscador = $this->session->userdata('buscando');

        $data["alumnos"] = $this->m_alumnos->total_posts_paginados($buscador, $config['per_page'], $this->uri->segment(3));

        $this->load->view('v_alumnos_r', $data);
    }

//IIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII
}
