<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 */
date_default_timezone_set('America/Mazatlan');

class C_registrar_documentos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->load->model('Residencia/m_dictamen');
        $this->load->model('Residencia/m_historial');
    }

    public function index() {

        if ($this->session->userdata('perfil') == FALSE) {
            redirect(base_url() . 'index.php/logeo');
        }
        if ($this->session->userdata('perfil') == 'jeferesidencia') {
            $data['dictamen'] = $this->m_dictamen->mostrar_dictamenes();
            $this->load->view('Residencia/JefeResidencia/v_registrar_documentos', $data);
        } else {
            $this->load->view('notienespermisos');
        }
    }

    public function entregas() {
        switch ($this->input->post('c')) {//el campo que se actualizará
            case 1:
                $entregas = array('liberacion_interno' => $this->input->post('v'));
                break;
            case 2:
                $entregas = array('liberacion_externo' => $this->input->post('v'));
                break;
            case 3:
                $entregas = array('calificaciones' => $this->input->post('v'));
                break;
            case 4:
                $entregas = array('evidencias' => $this->input->post('v'));
                break;
        }
        $r = $this->m_dictamen->actualiza_dictamen($this->input->post('numero_control'), $entregas); //actualizo las entregas
        $r2 = $this->m_dictamen->mostrar_dictamen($this->input->post('numero_control'));
        $a;
        $b;
        $c;
        $d;
        foreach ($r2 as $value) {
            $a = $value->liberacion_interno;
            $b = $value->liberacion_externo;
            $c = $value->calificaciones;
            $d = $value->evidencias;
            if (($a == 't' and $b == 't' and $c == 't' and $d == 't')) {//si entregó todo actualizo campo doc_finales
                $this->m_dictamen->actualiza_dictamen($this->input->post('numero_control'), array('doc_finales' => true,'fin_residencia' => date('Y-m-d')));
            } else {
                $this->m_dictamen->actualiza_dictamen($this->input->post('numero_control'), array('doc_finales' => false));
            }
        }

        echo json_encode(array('a' => $r));
    }

}
