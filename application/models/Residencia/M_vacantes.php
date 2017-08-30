<?php

class M_vacantes extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function mostrar_vacantes($departamento) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('vacantes_residencia');
        $DB2->where('carreras', $departamento);
        $DB2->where('id_vacante not in(select id_vacante from anteproyecto)');
        $DB2->order_by('fecha_vacante', 'desc');
        $query = $DB2->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    function mostrar_vacantes2($departamento) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('vacantes_residencia');
        $DB2->join('anteproyecto a','a.id_vacante=v.id_vacante');
        $DB2->where('carreras', $departamento);
        $query = $DB2->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    function mostrar_vacantes3() {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('vacantes_residencia');
        $query = $DB2->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    
    function mostrar_vacantes_por_id($idv) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('vacantes_residencia');        
        $DB2->where('id_vacante', $idv);
        $query = $DB2->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function mostrar_empresas() {

        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('empresa');
        $query = $DB2->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function inserta_vacante($data) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->insert('vacantes_residencia', $data);
    }

    function elimina_vacante($idvacante) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->where('id_vacante', $idvacante);
        $DB2->delete('vacantes_residencia');
    }

}
