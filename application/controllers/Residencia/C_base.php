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

class C_base extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->database('local');
        $this->load->model('m_noticias');
    }

    public function index() {

        //el parametro $destinatario para alumno el numero de control, para docente 
        //su rfc y para administrador su id_usuario(ver si se puede usar el id, si no el usuario)  

        $data['info'] = $this->session->userdata('perfil');
        $data['data'] = $this->m_noticias->mostrar_convenios();
        $this->load->view('Residencia/v_base', $data);
        //$this->load->view('footer');
    }

}
