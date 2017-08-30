<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of c_historial_notificacion
 *
 * @author javier
 */ if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_historial_notificacion extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->database('local');
        $this->load->model('Residencia/m_historial');
    }

    public function index() {

        //el parametro $destinatario para alumno el numero de control, para docente 
        //su rfc y para administrador su id_usuario(ver si se puede usar el id, si no el usuario)  
        switch ($this->session->userdata('perfil')) {
            case 'docente':
                $data['info'] = $this->session->userdata('perfil');
                $destinatario = $this->session->userdata('rfc');//rfc

                break;
            case 'jefeacademico':
                $data['info'] = $this->session->userdata('perfil');
                $destinatario = $this->session->userdata('usuario');//usuario de tabla usuarios

                break;
            case 'coordinadorresidencia':
                $data['info'] = $this->session->userdata('perfil');
                $destinatario = $this->session->userdata('usuario');//usuario de tabla usuarios

                break;
            default:
                $this->load->view('notienespermisos');
                break;
        }        

        $data['data'] = $this->m_historial->mostrar_historial($destinatario);
        $this->load->view('Residencia/v_historial_notificacion', $data);
        //$this->load->view('footer');
    }

}
