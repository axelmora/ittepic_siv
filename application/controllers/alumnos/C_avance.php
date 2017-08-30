<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_avance extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        //cargamos la librería form_validation
        $this->load->library(array('form_validation'));

        $this->load->model('m_noticias');
        $this->load->model('m_solicitud');
        $this->load->model('m_tarjeta');
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['nombre'] = $session_data['nombre'];
            $data['id_carrera'] = $session_data['id_carrera'];
            $data['id_semestre'] = $session_data['id_semestre'];
            $data['plan_estudios'] = $session_data['plan_estudios'];
            $data['sexo'] = $session_data['sexo'];
            $data['telefono'] = $session_data['telefono'];
            $data['domicilio'] = $session_data['domicilio'];
            $data['semestre_cursado'] = $session_data['semestre_cursado'];
            $data['creditos'] = $session_data['creditos'];
            $data['porcentaje_avance'] = $session_data['porcentaje_avance'];


            $numero_control = $data['username'];


            $data['programa'] = $this->m_solicitud->show_programa($numero_control);

            foreach ($data['programa'] as $item) {

                $fecha1 = $item->fecha_reporte1;
                $fecha2 = $item->fecha_reporte2;
                $fecha3 = $item->fecha_reporte3;
                $id = $item->id_programa_seleccionado;
                $folio = $item->folio_inicial;
            }


            $data['tarjeta'] = $this->m_tarjeta->show_taralumno($id);

            $d = strtotime($fecha1);
            $data['hoy'] = date("Y-m-d");

            $data['enddate1'] = $fecha1;
            $data['startdate1'] = date('Y-m-d', strtotime($data['enddate1'] . ' - 7 days'));

            $data['enddate2'] = $fecha2;
            $data['startdate2'] = date('Y-m-d', strtotime($data['enddate2'] . ' - 7 days'));

            $data['enddate3'] = $fecha3;
            $data['startdate3'] = date('Y-m-d', strtotime($data['enddate3'] . ' - 7 days'));




            //cargamos la vista y el array data
            $this->load->view('v_avance', $data);
        } else {
            //If no session, redirect to login page
            redirect('logeo', 'refresh');
        }
    }

}
