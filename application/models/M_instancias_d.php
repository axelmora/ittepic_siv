<?php

class M_instancias_d extends CI_Model {

// Function To Fetch All Students Record
    function show_instancias() {
        $DB2 = $this->load->database('local', TRUE);
        $query = $DB2->get('instancia');
        $query_result = $query->result();
        return $query_result;
    }

// Function To Fetch Selected Student Record
    function show_instancia_idd($data) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('instancia');
        $DB2->where('id_instancia', $data);
        $query = $DB2->get();
        $result = $query->result();
        return $result;
    }

// Update Query For Selected Student
    function delete_instancia_id($id) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->where('id_instancia', $id);
        $DB2->delete('instancia');
    }

}

?>
