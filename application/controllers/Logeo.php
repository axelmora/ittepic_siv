<?php
class Logeo extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper(array('url', 'form'));
        $this->load->database('local');
    }
//*****************************************************************************************************
    public function index() {
        switch ($this->session->userdata('perfil')) {
            case '':
                $this->load->view('milogeo');
                break;

            case 'coordinadorprogac':
                redirect(base_url().'index.php/Residencia/CoordinadorCarrera/Panel_coordicarrera');
                break;

            case 'coordinadorresidencia':
                redirect(base_url().'index.php/Residencia/CoordinadorResidencia/Panel_coordiresidencia');
                break;

            case 'presidenteacademia':
                redirect(base_url().'index.php/Residencia/PresidenteAcademico/Panel_presidenteacademico');
                break;
                /*  ERROR DE BASE DE DATOS*/
            case 'presidenteacademia ':
                    redirect(base_url().'index.php/Residencia/PresidenteAcademico/Panel_presidenteacademico');
                break;
                /* errors  */
            case 'jeferesidencia':
                redirect(base_url().'index.php/Residencia/JefeResidencia/Panel_jeferesidencia');
                break;

            case 'jefeservicio':
                redirect(base_url() . 'index.php/panel_servicio');
                break;

            case 'jefevinculacion':
                redirect(base_url() . 'index.php/panel_vinculacion');
                break;

            case 'directivo':
                redirect(base_url() . 'index.php/panel_directivo');
                break;

            case 'jefeacademico':
                redirect(base_url() . 'index.php/panel_academico');
                break;

            case 'administrador':
                redirect(base_url() . 'index.php/panel_administrador');
                break;
            case 'docente':
                redirect(base_url() . 'index.php/Residencia/Docente/Panel_docente');
                break;
            default:
                $this->load->view('milogeo');
                break;
        }
    }

//*****************************************************************************************************
    public function new_user() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('usuario', 'Usuario', 'required|trim|min_length[1]|max_length[150]');
        $this->form_validation->set_rules('pass', 'Contraseña', 'required|trim|min_length[1]|max_length[150]|callback_a');
        if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page
            $this->load->view('milogeo');
        } else {
            //Go to private area
            $this->index();
        }
    }
    public function a() {
        $username = $this->input->post('usuario');
        $password = sha1($this->input->post('pass'));
        $check_user = $this->login_model->login_user($username, $password);
        $perfil=str_replace(" ","", $check_user->perfil);// QUITA los espacios del perfil
        if ($check_user == TRUE) {
            $data = array(
                'is_logued_in' => TRUE,
                'id_usuario' => $check_user->id,
                'perfil' =>$perfil,
                'alias' => $check_user->alias,
                'username' => $check_user->usuario,
                'permisoS' => $check_user->permiso_servicio
            );
           $this->session->set_userdata($data);
          // var_dump($check_user);
          // var_dump($data);
        /* var_dump($check_user->permiso_servicio);*/
           //var_dump('entro');
           // echo $check_user->permiso_servicio;
          return true;
        } else {
            //$this->load->view('notienespermisos');
            $this->form_validation->set_message('a', 'Usuario o contraseña inválida.');
            return false;
        }
    }
    public function logout_ci() {
        $this->session->sess_destroy();
        $this->index();
    }
//*****************************************************************************************************
}
