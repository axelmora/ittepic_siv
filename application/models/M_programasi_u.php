<?php

class M_programasi_u extends CI_Model {

// Function To Fetch All Students Record
// Function To Fetch Selected Student Record
    function show_programa_id($data) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('programa_instancia');
        $DB2->where('id_solicitud', $data);
        $DB2->join('instancia f', 'f.id_instancia = programa_instancia.id_instancia');
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
        $DB2->join('tipo_programa e', 'e.id = programa_instancia.id_tipoprograma');

        $query = $DB2->get();
        $result = $query->result();
        return $result;
    }

// Update Query For Selected Student
    function update_programa_id1($id, $data) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->where('id_solicitud', $id);
        $DB2->update('programa_instancia', $data);
    }

    function get_tprogramas() {

        // armamos la consulta
        $query = $this->db->query('SELECT id,nombre_tipoprograma FROM tipo_programa');

        // si hay resultados
        if ($query->num_rows() > 0) {
            // almacenamos en una matriz bidimensional
            foreach ($query->result() as $row)
                $arrDatosp[$row->id] = $row;

            $query->free_result();
            return $arrDatosp;
        }
    }

}

?>
