<?php

class M_noticias extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function delete($idnot) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->where('id_noticia', $idnot);
        $DB2->delete('noticias_servicio');
    }

    function mostrar_convenios() {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('convenios');
        $DB2->order_by('fecha', 'desc');
        $query = $DB2->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function shownoticias() {

        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('noticias_servicio');
        $DB2->order_by('fecha_noticia', 'desc');


        $query = $DB2->get();
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function form_insert($data) {
// Inserting in Table(students) of Database(college

        $DB2 = $this->load->database('local', TRUE);
        $DB2->insert('noticias_servicio', $data);
    }

/////////////////////////RESIDENCIA//////////////////////////////////////////////////////////////////
    function deleteResidencia($idnot) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->where('id_noticia', $idnot);
        $DB2->delete('noticias_residencia');
    }

    function shownoticiasResidencia() {

        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('noticias_residencia');
        $DB2->order_by('fecha_noticia', 'desc');


        $query = $DB2->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function form_insert_residencia($data) {
// Inserting in Table(students) of Database(college

        $DB2 = $this->load->database('local', TRUE);

        $DB2->insert('noticias_residencia', $data);
    }

}

?>
