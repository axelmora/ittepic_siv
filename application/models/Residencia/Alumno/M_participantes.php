<?php

class M_participantes extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function obtener_asesor($numero_control) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('d.nombres,d.apellidos,d.correo');
        $DB2->from('docentes d, asesor_revisor a, participantes_proyecto p');
        $DB2->where('a.id_docente=d.rfc');
        $DB2->where('p.asesor=a.asesor_revisor_pk');
        $DB2->where('p.numero_control', $numero_control);
        $DB2->limit(1);
        $query = $DB2->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function obtener_revisor1($numero_control) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('d.nombres,d.apellidos,d.correo');
        $DB2->from('docentes d, asesor_revisor a, participantes_proyecto p');
        $DB2->where('a.id_docente=d.rfc');
        $DB2->where('p.revisor1=a.asesor_revisor_pk');
        $DB2->where('p.numero_control', $numero_control);
        $DB2->limit(1);
        $query = $DB2->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function obtener_revisor2($numero_control) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('d.nombres,d.apellidos,d.correo');
        $DB2->from('docentes d, asesor_revisor a, participantes_proyecto p');
        $DB2->where('a.id_docente=d.rfc');
        $DB2->where('p.revisor2=a.asesor_revisor_pk');
        $DB2->where('p.numero_control', $numero_control);
        $DB2->limit(1);
        $query = $DB2->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function obtener_jefe($id) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('nombre_usuariosistema,correo');
        $DB2->from('usuarios');
        $DB2->where('id', $id);
        $DB2->limit(1);
        $query = $DB2->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

}
