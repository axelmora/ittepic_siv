<?php

class C_programasi_d extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_programasi_d');
    }

    function show_programa_idd() {
        $id = $this->uri->segment(3);
        $data['programa'] = $this->m_programasi_d->show_programas();
        $data['single_programa'] = $this->m_programasi_d->show_programa_idd($id);
        $this->load->view('v_programasi_d', $data);
    }

    function delete_programa_id() {
        $id = $this->uri->segment(3);
        $this->m_programasi_d->delete_programa_id($id);
        $this->load->view('v_correctoprograma_d');
    }

}

?>