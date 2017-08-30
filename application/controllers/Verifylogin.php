<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user');
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper(array('url', 'form'));
        $this->load->database('default');
    }

    function index() {
        //This method will have the credentials validation
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Numero de control', 'trim|required');
        $this->form_validation->set_rules('password', 'Contraseña', 'trim|required|callback_check_database');

        if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page
            $this->load->view('milogeo');
        } else {
            //Go to private area
            redirect('inicio', 'refresh');
        }
    }

    function check_database($password) {
        //Field validation succeeded.  Validate against database
        $username = $this->input->post('username');

        //query the database
        $result = $this->user->login($username, $password);

        if ($result) {
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                    'perfil' => 'alumno',
                    'username' => $row->numero_control,
                    'nombre' => $row->nombre,
                    'id_carrera' => $row->id_carrera,
                    'id_semestre' => $row->id_semestre,
                    'plan_estudios' => $row->plan_estudios,
                    'sexo' => $row->sexo,
                    'telefono' => $row->telefono,
                    'domicilio' => $row->domicilio,
                    'semestre_cursado' => $row->semestre_cursado,
                    'creditos' => $row->creditos,
                    'porcentaje_avance' => $row->porcentaje_avance
                );
                $this->session->set_userdata('logged_in', $sess_array);
            }
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', 'usuario o contraseña invalido');
            return false;
        }
    }

}

?>