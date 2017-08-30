<?php

class C_instancias_d extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_instancias_d');
    }

    function show_instancia_idd() {
        $id = $this->uri->segment(3);
        $data['instancias'] = $this->m_instancias_d->show_instancias();
        $data['single_instancia'] = $this->m_instancias_d->show_instancia_idd($id);
        $this->load->view('v_instancias_d', $data);
    }

    function delete_instancia_id() {
        $id = $this->uri->segment(3);
        $this->m_instancias_d->delete_instancia_id($id);
        $this->load->view('v_correctoinstancia_d');
    }

}

?>