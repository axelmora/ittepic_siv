<?php

class C_instancias_u2 extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_instancias_u2');
    }

    public function search() {
        $this->load->model('m_instancias_u2');
        $data['search'] = $this->m_instancias_u2->get_search();
        $this->load->view('v_instancias_u2', $data);
    }

}

?>