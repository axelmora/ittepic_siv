<?php

class M_programasi_i extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_instancia($id) {

        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('instancia');
        $DB2->where('id_instancia', $id);
        $query = $DB2->get();


        $result = $query->result();
        return $result;
    }

    function get_tprogramas() {


        $query = $this->db->query('SELECT id,nombre_tipoprograma FROM tipo_programa');

        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row)
                $arrDatosp[$row->id] = $row;

            $query->free_result();
            return $arrDatosp;
        }
    }

    function form_insert($data) {

        $DB2 = $this->load->database('local', TRUE);

        $DB2->insert('programa_instancia', $data);
    }

}

?>
