<?php

class M_alumnos_pdf extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function show_actividades_by_id($idsolicitud) {

        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('actividades_g');
        $DB2->where('id_solicitud', $idsolicitud);
        $query = $DB2->get();
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function show_nombreJV() {

        $DB2 = $this->load->database('local', TRUE);




        $DB2->select('*');
        $DB2->from('usuarios');
        $array = array('perfil' => 'jefevinculacion');
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
        $DB2->where($array);
        $DB2->limit(1);
        $query = $DB2->get();
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||

        if ($query->num_rows() == 1) {

            return $query->result();
        } else {
            return false;
        }
    }

    public function show_nombreSP() {

        $DB2 = $this->load->database('local', TRUE);




        $DB2->select('*');
        $DB2->from('usuarios');
        $array = array('usuario' => 'subdirectorpv');
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
        $DB2->where($array);
        $DB2->limit(1);
        $query = $DB2->get();
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||

        if ($query->num_rows() == 1) {

            return $query->result();
        } else {
            return false;
        }
    }

    public function show_data_by_id($id) {

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
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
        $array = array('programa_seleccionado.numero_control' => $id, 'programa_seleccionado.estado !=' => 'cancelado');
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
        $DB2->where($array);
        $DB2->order_by('programa_seleccionado.numero_control', 'asc');
        $DB2->limit(1);
        $query = $DB2->get();
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||

        if ($query->num_rows() == 1) {

            return $query->result();
        } else {
            return false;
        }
    }

    public function show_semestre() {
        $DB2 = $this->load->database('local', TRUE);

        $query = 'select semestre from semestre order by id_semestre desc limit 1';

        if ($query->num_rows() == 1) {

            return $query->result();
        } else {
            return false;
        }
    }

    public function show_data_by_idps($idps) {

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
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
        $array = array('programa_seleccionado.id_programa_seleccionado' => $idps, 'programa_seleccionado.estado !=' => 'cancelado');
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
        $DB2->where($array);
        $DB2->order_by('programa_seleccionado.numero_control', 'asc');
        $DB2->limit(1);
        $query = $DB2->get();
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||

        if ($query->num_rows() == 1) {

            return $query->result();
        } else {
            return false;
        }
    }

}
