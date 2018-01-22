<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 *
 */
class C_reportesservicioda extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
    }
    public function index() {
        if ($this->session->userdata('perfil') == FALSE) {
            redirect(base_url() . 'index.php/logeo');
        }
        if ($this->session->userdata('perfil') == 'directivo' || $this->session->userdata('perfil') == 'jefeacademico') {
            $this->load->view('v_reportesservicioda');
        }
        else{
            $this->load->view('notienespermisos');
        }
        //--------------------------------------------------------------------------------------------------------------------
    }
}
