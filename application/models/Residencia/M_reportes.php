<?php

class M_reportes extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function general_si($data) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('a.nombre,a.correo,c.carrera,an.nombre_proyecto,e.nombre_empresa,e.telefono,e.sector,e.domicilio');
        $DB2->from('alumnos a');
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
        $DB2->join('dictamen_anteproyecto d', 'a.numero_control = d.numero_control');
        $DB2->join('anteproyecto an', 'an.anteproyecto_pk = d.anteproyecto');
        $DB2->join('empresa e', 'e.empresa_pk = an.empresa_fk');
        $DB2->join('carreras c', 'c.id_carrera = a.id_carrera');
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
        $condition = "d.fin_residencia BETWEEN " . "'" . $data['fecha1'] . "'" . " AND " . "'" . $data['fecha2'] . "'";
        $DB2->where($condition);
        $DB2->order_by('d.fin_residencia', 'asc');
        $query = $DB2->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function sector_si($data) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('a.nombre,a.correo,c.carrera,an.nombre_proyecto,e.nombre_empresa,e.telefono,e.sector,e.domicilio');
        $DB2->from('alumnos a');
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
        $DB2->join('dictamen_anteproyecto d', 'a.numero_control = d.numero_control');
        $DB2->join('anteproyecto an', 'an.anteproyecto_pk = d.anteproyecto');
        $DB2->join('empresa e', 'e.empresa_pk = an.empresa_fk');
        $DB2->join('carreras c', 'c.id_carrera = a.id_carrera');
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
        $condition = "d.fin_residencia BETWEEN " . "'" . $data['fecha1'] . "'" . " AND " . "'" . $data['fecha2'] . "'";
        $DB2->where($condition);
        $DB2->where('e.sector', $data['sector']);
        $DB2->order_by('d.fin_residencia', 'asc');
        $query = $DB2->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function carrera_si($data) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('a.nombre,a.correo,c.carrera,an.nombre_proyecto,e.nombre_empresa,e.telefono,e.sector,e.domicilio');
        $DB2->from('alumnos a');
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
        $DB2->join('dictamen_anteproyecto d', 'a.numero_control = d.numero_control');
        $DB2->join('anteproyecto an', 'an.anteproyecto_pk = d.anteproyecto');
        $DB2->join('empresa e', 'e.empresa_pk = an.empresa_fk');
        $DB2->join('carreras c', 'c.id_carrera = a.id_carrera');
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
        $condition = "d.fin_residencia BETWEEN " . "'" . $data['fecha1'] . "'" . " AND " . "'" . $data['fecha2'] . "'";
        $DB2->where($condition);
        $DB2->where('a.id_carrera', $data['id_carrera']);
        $DB2->order_by('d.fin_residencia', 'asc');
        $query = $DB2->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function todo_si($data) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('a.nombre,a.correo,c.carrera,an.nombre_proyecto,e.nombre_empresa,e.telefono,e.sector,e.domicilio');
        $DB2->from('alumnos a');
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
        $DB2->join('dictamen_anteproyecto d', 'a.numero_control = d.numero_control');
        $DB2->join('anteproyecto an', 'an.anteproyecto_pk = d.anteproyecto');
        $DB2->join('empresa e', 'e.empresa_pk = an.empresa_fk');
        $DB2->join('carreras c', 'c.id_carrera = a.id_carrera');
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
        $condition = "d.fin_residencia BETWEEN " . "'" . $data['fecha1'] . "'" . " AND " . "'" . $data['fecha2'] . "'";
        $DB2->where($condition);
        $DB2->where('e.sector', $data['sector']);
        $DB2->where('a.id_carrera', $data['id_carrera']);
        $DB2->order_by('d.fin_residencia', 'asc');
        $query = $DB2->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function general_no($data) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('a.nombre,a.correo,c.carrera,an.nombre_proyecto,e.nombre_empresa,e.telefono,e.sector,e.domicilio');
        $DB2->from('alumnos a');
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
        $DB2->join('dictamen_anteproyecto d', 'a.numero_control = d.numero_control');
        $DB2->join('anteproyecto an', 'an.anteproyecto_pk = d.anteproyecto');
        $DB2->join('empresa e', 'e.empresa_pk = an.empresa_fk');
        $DB2->join('carreras c', 'c.id_carrera = a.id_carrera');
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
        $condition = "d.fin_residencia is null";
        $DB2->where($condition);
        $condition2 = "d.inicio_residencia is not null";
        $DB2->where($condition2);
        $DB2->order_by('d.inicio_residencia', 'asc');
        $query = $DB2->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function sector_no($data) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('a.nombre,a.correo,c.carrera,an.nombre_proyecto,e.nombre_empresa,e.telefono,e.sector,e.domicilio');
        $DB2->from('alumnos a');
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
        $DB2->join('dictamen_anteproyecto d', 'a.numero_control = d.numero_control');
        $DB2->join('anteproyecto an', 'an.anteproyecto_pk = d.anteproyecto');
        $DB2->join('empresa e', 'e.empresa_pk = an.empresa_fk');
        $DB2->join('carreras c', 'c.id_carrera = a.id_carrera');
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
        $condition = "d.fin_residencia is null";
        $DB2->where($condition);
        $condition2 = "d.inicio_residencia is not null";
        $DB2->where($condition2);
        $DB2->where('e.sector', $data['sector']);
        $DB2->order_by('d.inicio_residencia', 'asc');
        $query = $DB2->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function carrera_no($data) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('a.nombre,a.correo,c.carrera,an.nombre_proyecto,e.nombre_empresa,e.telefono,e.sector,e.domicilio');
        $DB2->from('alumnos a');
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
        $DB2->join('dictamen_anteproyecto d', 'a.numero_control = d.numero_control');
        $DB2->join('anteproyecto an', 'an.anteproyecto_pk = d.anteproyecto');
        $DB2->join('empresa e', 'e.empresa_pk = an.empresa_fk');
        $DB2->join('carreras c', 'c.id_carrera = a.id_carrera');
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
        $condition = "d.fin_residencia is null";
        $DB2->where($condition);
        $condition2 = "d.inicio_residencia is not null";
        $DB2->where($condition2);
        $DB2->where('a.id_carrera', $data['id_carrera']);
        $DB2->order_by('d.inicio_residencia', 'asc');
        $query = $DB2->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function todo_no($data) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('a.nombre,a.correo,c.carrera,an.nombre_proyecto,e.nombre_empresa,e.telefono,e.sector,e.domicilio');
        $DB2->from('alumnos a');
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
        $DB2->join('dictamen_anteproyecto d', 'a.numero_control = d.numero_control');
        $DB2->join('anteproyecto an', 'an.anteproyecto_pk = d.anteproyecto');
        $DB2->join('empresa e', 'e.empresa_pk = an.empresa_fk');
        $DB2->join('carreras c', 'c.id_carrera = a.id_carrera');
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
        $condition = "d.fin_residencia is null";
        $DB2->where($condition);
        $condition2 = "d.inicio_residencia is not null";
        $DB2->where($condition2);
        $DB2->where('e.sector', $data['sector']);
        $DB2->where('a.id_carrera', $data['id_carrera']);
        $DB2->order_by('d.inicio_residencia', 'asc');
        $query = $DB2->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

}
