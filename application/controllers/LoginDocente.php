<?php

class LoginDocente extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Login_modeld');
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper(array('url', 'form'));
        $this->load->database('local');
    }

    function index() {
        //This method will have the credentials validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('rfc', 'RFC', 'required|trim|min_length[1]|max_length[150]');
        $this->form_validation->set_rules('contrasena', 'Contrasena', 'required|trim|min_length[1]|max_length[150]|callback_check_database');

        if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page
            $this->load->view('milogeo');
        } else {
            //Go to private area
            redirect(base_url() . 'index.php/Residencia/Docente/Panel_docente');
        }
    }

    function check_database() {

        log_message('info', 'The purpose of some variable is to provide some value.');
        //Field validation succeeded.  Validate against database
        $username = $this->input->post('rfc');
        //$password = sha1($this->input->post('contrasena'));DESCOMENTAR CUANDO SE HAGA LA VISTA PARA CAMBIAR LAS CONTRASEÑAS DE DOCENTES
        //EN ADMINISTRADOR.
        $password = $this->input->post('contrasena');
        //query the database
        $check_user = $this->Login_modeld->login_user($username, $password);
        if ($check_user == TRUE) {
            $data = array(
                'is_logued_in' => TRUE,
                'perfil' => 'docente',
                'nombres' => $check_user->nombres,
                'departamento' => $check_user->departamento,
                'correo' => $check_user->correo,
                'apellidos' => $check_user->apellidos,
                'rfc'=> $check_user->rfc,
                //'contrasena'=> $check_user->contrasena,
                'especialidad' => $check_user->especialidad,
                'disponible' => $check_user->disponible
            );
            $this->session->set_userdata($data);
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', 'usuario o contraseña invalido');
            return false;
        }
    }

    public function logout_ci() {
        $this->session->sess_destroy();
        $this->index();
    }

}

?>