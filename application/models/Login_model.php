<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 *
 */
class Login_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function login_user($username, $password) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->where('usuario', $username);
        $DB2->where('pass', $password);
        $query = $DB2->get('usuarios');
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }

}
