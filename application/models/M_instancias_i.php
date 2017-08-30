<?php

class M_instancias_i extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function form_insert($data) {
// Inserting in Table(students) of Database(college
        $DB2 = $this->load->database('local', TRUE);
        $DB2->insert('instancia', $data);
    }

}

?>
