<?php

class C_alumnos_ds extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('m_alumnos_ds');
        $this->load->model('m_alumnos');
        $this->load->model('m_semestre');
    }

    function solicitud_alumno() {

        $id = $this->uri->segment(3);
        $data['instancias'] = $this->m_instancias_d->show_instancias();
        $data['single_instancia'] = $this->m_instancias_d->show_instancia_idd($id);
        $this->load->view('v_instancias_d', $data);
    }

    function cambiar_estado() {

        $ids = $this->uri->segment(3);
        $id = $this->input->post('numeroi');
        $datas = array(
            'estado' => $this->input->post('estadoi')
        );                
        
        $this->m_alumnos_ds->cambiar_solicitud($ids, $datas);
        $id_sa= $this->m_semestre->show_id_semestre_actual();
        $semestres =array(
          'id_semestre' =>  $id_sa[0]->id_semestre.''
        ); 
        $semestres2 =array(
          'id_semestre' =>  0
        );         
            if ($this->input->post('estadoi')=='aceptado') {
            $this->m_alumnos->actualizar_semestre($id,$semestres);
            }
            else{
                $this->m_alumnos->actualizar_semestre($id,$semestres2);
            }                                

        $data['alumno'] = $this->m_alumnos->show_data_by_id($id);
        $idsolicitud = $this->input->post('idsolicitudi');
        $data['actividades'] = $this->m_alumnos->show_actividades_by_id($idsolicitud);
        $this->load->view('v_alumnos_r', $data);
    }

    function delete_solicitud() {
        $data = array(
            'solicitudes_ocupadas' => $this->input->post('ns')
        );


        $ids = $this->input->post('ids');

        $this->m_alumnos_ds->insert_soli($ids, $data);

        $id = $this->uri->segment(3);

        $datas = array(
            'estado' => 'cancelado');

        $this->m_alumnos_ds->cancelar_solicitud($id, $datas);


        $this->load->view('v_correctoalumno_ds');
    }

}

?>