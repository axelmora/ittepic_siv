<?php

class M_avance extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function obtener_estado($numero_control) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('bitacora_avance_alumno');
        $DB2->where('numero_control', $numero_control);
        $DB2->limit(1);
        $query = $DB2->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function obtener_aceptado($numero_control) {
        $DB2 = $this->load->database('local', TRUE);
        $query = $DB2->query("SELECT DA.jefe_academico, AN.aprobado from DICTAMEN_ANTEPROYECTO DA, ANTEPROYECTO AN where AN.anteproyecto_pk=DA.anteproyecto and  DA.numero_control='".$numero_control."';");
        if ($query->num_rows() > 0) {
            return $query->result();
          } else {
            return false;
          }
    }
    public function obtener_titulacion($numero_control) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('anteproyecto a');
        $DB2->join('solicitud_proyecto s', 's.anteproyecto_id = a.anteproyecto_pk');
        $DB2->where('s.numero_control', $numero_control);
        $DB2->limit(1);
        $query = $DB2->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function obtener_archivo_alumno($numero_control) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('archivo_alumno');
        $DB2->where('numero_control_fk', $numero_control);
        $query = $DB2->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function obtener_archivo_asesor($numero_control) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('archivo_asesor a');
        $DB2->join('participantes_proyecto p','p.asesor=a.asesor_revisor_id');
        $DB2->where('p.numero_control',$numero_control);
        $query = $DB2->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

}
