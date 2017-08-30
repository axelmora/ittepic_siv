
<?php

Class User extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function login($username, $password) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->where('numero_control', $username . '  ');
        $DB2->where('contrasena', $password);
        $DB2->limit(1);
        $query = $DB2->get('alumnos');
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

}

