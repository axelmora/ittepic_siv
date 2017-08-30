<?php

class M_alumnosf_pdf extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function show_data_by_date_range($data) {

        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*,a.*,b.*,c.*,d.*,f.*');
        $DB2->from('programa_seleccionado');
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
        $DB2->join('programa_instancia a', 'a.id_solicitud = programa_seleccionado.id_solicitud');

        $DB2->join('instancia f', 'f.id_instancia = a.id_instancia');
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
        $DB2->join('tipo_programa e', 'e.id = a.id_tipoprograma');
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
        $DB2->join('alumnos b', 'b.numero_control = programa_seleccionado.numero_control');
        $DB2->join('carreras c', 'c.id_carrera = b.id_carrera');
        $DB2->join('semestre d', 'd.id_semestre = b.id_semestre');
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
        $condition = "programa_seleccionado.fecha_inicio2 BETWEEN " . "'" . $data['fecha1q'] . "'" . " AND " . "'" . $data['fecha2q'] . "'";
        $array = array('programa_seleccionado.estado !=' => 'cancelado');

        $DB2->where($condition);
        $DB2->where($array);
        $DB2->order_by('programa_seleccionado.fecha_inicio2', 'asc');
        $query = $DB2->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function show_data_by_carrera($data) {

        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*,a.*,b.*,c.*,d.*,f.*');
        $DB2->from('programa_seleccionado');
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
        $DB2->join('programa_instancia a', 'a.id_solicitud = programa_seleccionado.id_solicitud');

        $DB2->join('instancia f', 'f.id_instancia = a.id_instancia');
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
        $DB2->join('tipo_programa e', 'e.id = a.id_tipoprograma');
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
        $DB2->join('alumnos b', 'b.numero_control = programa_seleccionado.numero_control');
        $DB2->join('carreras c', 'c.id_carrera = b.id_carrera');
        $DB2->join('semestre d', 'd.id_semestre = b.id_semestre');
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||

        $condition = "programa_seleccionado.fecha_inicio2 BETWEEN " . "'" . $data['fecha1q'] . "'" . " AND " . "'" . $data['fecha2q'] . "'";
        $array = array('c.id_carrera' => $data['carrerai'], 'programa_seleccionado.estado !=' => 'cancelado');
        $DB2->where($condition);
        $DB2->where($array);
        $DB2->order_by('programa_seleccionado.fecha_inicio2', 'asc');
        $query = $DB2->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function show_data_by_sexo($data) {

        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*,a.*,b.*,c.*,d.*,f.*');
        $DB2->from('programa_seleccionado');
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
        $DB2->join('programa_instancia a', 'a.id_solicitud = programa_seleccionado.id_solicitud');

        $DB2->join('instancia f', 'f.id_instancia = a.id_instancia');
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
        $DB2->join('tipo_programa e', 'e.id = a.id_tipoprograma');
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
        $DB2->join('alumnos b', 'b.numero_control = programa_seleccionado.numero_control');
        $DB2->join('carreras c', 'c.id_carrera = b.id_carrera');
        $DB2->join('semestre d', 'd.id_semestre = b.id_semestre');
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
        $condition = "programa_seleccionado.fecha_inicio2 BETWEEN " . "'" . $data['fecha1q'] . "'" . " AND " . "'" . $data['fecha2q'] . "'";
        $array = array('b.sexo' => $data['sexoi'], 'programa_seleccionado.estado !=' => 'cancelado');
        $DB2->where($condition);
        $DB2->where($array);
        $DB2->order_by('programa_seleccionado.fecha_inicio2', 'asc');
        $query = $DB2->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

}
