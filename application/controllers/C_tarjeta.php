<?php

class C_tarjeta extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('m_tarjeta');
        $this->load->model('m_solicitud');        
        $this->load->model('m_semestre'); 
        $this->load->model('m_alumnos');
    }

    public function index() {

        $id = $this->input->post('idps');

        $data = array(
            'id_programaseleccionado' => $this->input->post('idps'));

        $data['programa'] = $this->m_solicitud->show_programaporid($id);
        $data['tarjeta'] = $this->m_tarjeta->show_tarjeta($id, $data);                             
        $this->load->view('v_tarjeta', $data);
    }

//------------------------------------------------------------------------------------------------------
    function act_solicitud() {
        $idtp = $this->input->post('idt');
        $datap = array('solicitud' => TRUE);
        $this->m_tarjeta->update($idtp, $datap);
        $datap['tarjeta'] = $this->m_tarjeta->show_t($idtp);
        foreach ($datap['tarjeta'] as $item) {
            $id = $item->id_programaseleccionado;
        }
        $datap['programa'] = $this->m_solicitud->show_programaporid($id);
        $this->load->view('v_tarjeta', $datap);
    }

    function des_solicitud() {
        $idtp = $this->input->post('idt');
        $datap = array('solicitud' => FALSE);
        $this->m_tarjeta->update($idtp, $datap);
        $datap['tarjeta'] = $this->m_tarjeta->show_t($idtp);
        foreach ($datap['tarjeta'] as $item) {
            $id = $item->id_programaseleccionado;
        }
        $datap['programa'] = $this->m_solicitud->show_programaporid($id);
        $this->load->view('v_tarjeta', $datap);
    }

//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
    function act_casignacion() {
        $idtp = $this->input->post('idt');
        $datap = array('cartaasignacion' => TRUE);
        $this->m_tarjeta->update($idtp, $datap);
        $datap['tarjeta'] = $this->m_tarjeta->show_t($idtp);
        foreach ($datap['tarjeta'] as $item) {
            $id = $item->id_programaseleccionado;
        }
        $datap['programa'] = $this->m_solicitud->show_programaporid($id);
        $this->load->view('v_tarjeta', $datap);
    }

    function des_casignacion() {
        $idtp = $this->input->post('idt');
        $datap = array('cartaasignacion' => FALSE);
        $this->m_tarjeta->update($idtp, $datap);
        $datap['tarjeta'] = $this->m_tarjeta->show_t($idtp);
        foreach ($datap['tarjeta'] as $item) {
            $id = $item->id_programaseleccionado;
        }
        $datap['programa'] = $this->m_solicitud->show_programaporid($id);
        $this->load->view('v_tarjeta', $datap);
    }

//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
    function act_ccompromiso() {
        $idtp = $this->input->post('idt');
        $datap = array('cartacompromiso' => TRUE);
        $this->m_tarjeta->update($idtp, $datap);
        $datap['tarjeta'] = $this->m_tarjeta->show_t($idtp);
        foreach ($datap['tarjeta'] as $item) {
            $id = $item->id_programaseleccionado;
        }
        $datap['programa'] = $this->m_solicitud->show_programaporid($id);
        $this->load->view('v_tarjeta', $datap);
    }

    function des_ccompromiso() {
        $idtp = $this->input->post('idt');
        $datap = array('cartacompromiso' => FALSE);
        $this->m_tarjeta->update($idtp, $datap);
        $datap['tarjeta'] = $this->m_tarjeta->show_t($idtp);
        foreach ($datap['tarjeta'] as $item) {
            $id = $item->id_programaseleccionado;
        }
        $datap['programa'] = $this->m_solicitud->show_programaporid($id);
        $this->load->view('v_tarjeta', $datap);
    }

//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
    function act_tcontrol() {
        $idtp = $this->input->post('idt');
        $datap = array('tarjetacontrol' => TRUE);
        $this->m_tarjeta->update($idtp, $datap);
        $datap['tarjeta'] = $this->m_tarjeta->show_t($idtp);
        foreach ($datap['tarjeta'] as $item) {
            $id = $item->id_programaseleccionado;
        }
        $datap['programa'] = $this->m_solicitud->show_programaporid($id);
        $this->load->view('v_tarjeta', $datap);
    }

    function des_tcontrol() {
        $idtp = $this->input->post('idt');
        $datap = array('tarjetacontrol' => FALSE);
        $this->m_tarjeta->update($idtp, $datap);
        $datap['tarjeta'] = $this->m_tarjeta->show_t($idtp);
        foreach ($datap['tarjeta'] as $item) {
            $id = $item->id_programaseleccionado;
        }
        $datap['programa'] = $this->m_solicitud->show_programaporid($id);
        $this->load->view('v_tarjeta', $datap);
    }

//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
    function act_cpresentacion() {
        $idtp = $this->input->post('idt');
        $datap = array('cartapresentacion' => TRUE);
        $this->m_tarjeta->update($idtp, $datap);
        $datap['tarjeta'] = $this->m_tarjeta->show_t($idtp);
        foreach ($datap['tarjeta'] as $item) {
            $id = $item->id_programaseleccionado;
        }
        $datap['programa'] = $this->m_solicitud->show_programaporid($id);
        $this->load->view('v_tarjeta', $datap);
    }

    function des_cpresentacion() {
        $idtp = $this->input->post('idt');
        $datap = array('cartapresentacion' => FALSE);
        $this->m_tarjeta->update($idtp, $datap);
        $datap['tarjeta'] = $this->m_tarjeta->show_t($idtp);
        foreach ($datap['tarjeta'] as $item) {
            $id = $item->id_programaseleccionado;
        }
        $datap['programa'] = $this->m_solicitud->show_programaporid($id);
        $this->load->view('v_tarjeta', $datap);
    }

//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
    function act_rb1() {
        $idtp = $this->input->post('idt');
        $datap = array('reporteb1' => TRUE);
        $this->m_tarjeta->update($idtp, $datap);
        $datap['tarjeta'] = $this->m_tarjeta->show_t($idtp);
        foreach ($datap['tarjeta'] as $item) {
            $id = $item->id_programaseleccionado;
        }
        $datap['programa'] = $this->m_solicitud->show_programaporid($id);
        $this->load->view('v_tarjeta', $datap);
    }

    function des_rb1() {
        $idtp = $this->input->post('idt');
        $datap = array('reporteb1' => FALSE);
        $this->m_tarjeta->update($idtp, $datap);
        $datap['tarjeta'] = $this->m_tarjeta->show_t($idtp);
        foreach ($datap['tarjeta'] as $item) {
            $id = $item->id_programaseleccionado;
        }
        $datap['programa'] = $this->m_solicitud->show_programaporid($id);
        $this->load->view('v_tarjeta', $datap);
    }

//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
    function act_rb2() {
        $idtp = $this->input->post('idt');
        $datap = array('reporteb2' => TRUE);
        $this->m_tarjeta->update($idtp, $datap);
        $datap['tarjeta'] = $this->m_tarjeta->show_t($idtp);
        foreach ($datap['tarjeta'] as $item) {
            $id = $item->id_programaseleccionado;
        }
        $datap['programa'] = $this->m_solicitud->show_programaporid($id);
        $this->load->view('v_tarjeta', $datap);
    }

    function des_rb2() {
        $idtp = $this->input->post('idt');
        $datap = array('reporteb2' => FALSE);
        $this->m_tarjeta->update($idtp, $datap);
        $datap['tarjeta'] = $this->m_tarjeta->show_t($idtp);
        foreach ($datap['tarjeta'] as $item) {
            $id = $item->id_programaseleccionado;
        }
        $datap['programa'] = $this->m_solicitud->show_programaporid($id);
        $this->load->view('v_tarjeta', $datap);
    }

//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
    function act_rb3() {
        $idtp = $this->input->post('idt');
        $datap = array('reporteb3' => TRUE);
        $this->m_tarjeta->update($idtp, $datap);
        $datap['tarjeta'] = $this->m_tarjeta->show_t($idtp);
        foreach ($datap['tarjeta'] as $item) {
            $id = $item->id_programaseleccionado;
        }
        $datap['programa'] = $this->m_solicitud->show_programaporid($id);
        $this->load->view('v_tarjeta', $datap);
    }

    function des_rb3() {
        $idtp = $this->input->post('idt');
        $datap = array('reporteb3' => FALSE);
        $this->m_tarjeta->update($idtp, $datap);
        $datap['tarjeta'] = $this->m_tarjeta->show_t($idtp);
        foreach ($datap['tarjeta'] as $item) {
            $id = $item->id_programaseleccionado;
        }
        $datap['programa'] = $this->m_solicitud->show_programaporid($id);
        $this->load->view('v_tarjeta', $datap);
    }

//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
    function act_rf() {
        $idtp = $this->input->post('idt');
        $datap = array('reportefinal' => TRUE);
        $this->m_tarjeta->update($idtp, $datap);
        $datap['tarjeta'] = $this->m_tarjeta->show_t($idtp);
        foreach ($datap['tarjeta'] as $item) {
            $id = $item->id_programaseleccionado;
        }
        $datap['programa'] = $this->m_solicitud->show_programaporid($id);
        $this->load->view('v_tarjeta', $datap);
    }

    function des_rf() {
        $idtp = $this->input->post('idt');
        $datap = array('reportefinal' => FALSE);
        $this->m_tarjeta->update($idtp, $datap);
        $datap['tarjeta'] = $this->m_tarjeta->show_t($idtp);
        foreach ($datap['tarjeta'] as $item) {
            $id = $item->id_programaseleccionado;
        }
        $datap['programa'] = $this->m_solicitud->show_programaporid($id);
        $this->load->view('v_tarjeta', $datap);
    }

//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
    function act_caceptacion() {
        $idtp = $this->input->post('idt');
        $datap = array('cartaaceptacioninstancia' => TRUE);
        $this->m_tarjeta->update($idtp, $datap);
        $datap['tarjeta'] = $this->m_tarjeta->show_t($idtp);
        foreach ($datap['tarjeta'] as $item) {
            $id = $item->id_programaseleccionado;
        }
        $datap['programa'] = $this->m_solicitud->show_programaporid($id);
        $this->load->view('v_tarjeta', $datap);
    }

    function des_caceptacion() {
        $idtp = $this->input->post('idt');
        $datap = array('cartaaceptacioninstancia' => FALSE);
        $this->m_tarjeta->update($idtp, $datap);
        $datap['tarjeta'] = $this->m_tarjeta->show_t($idtp);
        foreach ($datap['tarjeta'] as $item) {
            $id = $item->id_programaseleccionado;
        }
        $datap['programa'] = $this->m_solicitud->show_programaporid($id);
        $this->load->view('v_tarjeta', $datap);
    }

//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
    function act_cterminacion() {
        $idtp = $this->input->post('idt');
        $datap = array('cartaterminacioninstancia' => TRUE);
        $this->m_tarjeta->update($idtp, $datap);
        $datap['tarjeta'] = $this->m_tarjeta->show_t($idtp);
        foreach ($datap['tarjeta'] as $item) {
            $id = $item->id_programaseleccionado;
        }
        $datap['programa'] = $this->m_solicitud->show_programaporid($id);
        $this->load->view('v_tarjeta', $datap);
    }

    function des_cterminacion() {
        $idtp = $this->input->post('idt');
        $datap = array('cartaterminacioninstancia' => FALSE);
        $this->m_tarjeta->update($idtp, $datap);
        $datap['tarjeta'] = $this->m_tarjeta->show_t($idtp);
        foreach ($datap['tarjeta'] as $item) {
            $id = $item->id_programaseleccionado;
        }
        $datap['programa'] = $this->m_solicitud->show_programaporid($id);
        $this->load->view('v_tarjeta', $datap);
    }

//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------
    function act_constancia() {
        $idtp = $this->input->post('idt');
        $datap = array('constanciaoficial' => TRUE);
        $this->m_tarjeta->update($idtp, $datap);
        $datap['tarjeta'] = $this->m_tarjeta->show_t($idtp);
        foreach ($datap['tarjeta'] as $item) {
            $id = $item->id_programaseleccionado;
        }
        $datap['programa'] = $this->m_solicitud->show_programaporid($id);
        
        foreach ($datap['programa'] as $value) {
                    $nc=$value->numero_control;
                }
        
        $semestres =array(
          'id_semestre' =>  0
        );                     
            $this->m_alumnos->actualizar_semestre($nc,$semestres);
        
        $this->load->view('v_tarjeta', $datap);
    }

    function des_constancia() {
        $idtp = $this->input->post('idt');
        $datap = array('constanciaoficial' => FALSE);
        $this->m_tarjeta->update($idtp, $datap);
        $datap['tarjeta'] = $this->m_tarjeta->show_t($idtp);
        foreach ($datap['tarjeta'] as $item) {
            $id = $item->id_programaseleccionado;
        }
        $datap['programa'] = $this->m_solicitud->show_programaporid($id);   
        foreach ($datap['programa'] as $value) {
                    $nc=$value->numero_control;
                }
        $id_sa= $this->m_semestre->show_id_semestre_actual();
        $semestres =array(
          'id_semestre' =>  $id_sa[0]->id_semestre.''
        ); 
        $this->m_alumnos->actualizar_semestre($nc,$semestres);
        $this->load->view('v_tarjeta', $datap);
    }

//------------------------------------------------------------------------------------------------------
}

?>