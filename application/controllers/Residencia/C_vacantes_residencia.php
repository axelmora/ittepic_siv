<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_banco_proyectos
 *
 * @author javier
 */
class C_vacantes_residencia extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database('local');
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('form_validation'));
        $this->load->model('Residencia/m_vacantes');
    }

    public function index() {
        switch ($this->session->userdata('perfil')) {
            case 'jefeacademico':
                $data['info'] = $this->session->userdata('perfil');
                $data['vacantes'] = $this->m_vacantes->mostrar_vacantes($this->getDepartamento($this->session->userdata('id_usuario')));
                $this->load->view('Residencia/v_vacantes_residencia', $data);
                break;
            case 'jefevinculacion':
                $data['info'] = $this->session->userdata('perfil');
                $data['vacantes'] = $this->m_vacantes->mostrar_vacantes3();                
                $this->load->view('Residencia/v_vacantes_residencia', $data);
                break;
            
            case 'jeferesidencia':
                $data['info'] = $this->session->userdata('perfil');
                $data['vacantes'] = $this->m_vacantes->mostrar_vacantes3();                
                $this->load->view('Residencia/v_vacantes_residencia', $data);
                break;

            default:
                $this->load->view('notienespermisos');
                break;
        }        
    }

    public function insertar() {

        $vacante = array(
            'nombre_empresa' => $this->input->post('nombre_empresa'),
            'domicilio' => $this->input->post('domicilio'),
            'nombre_contacto' => $this->input->post('contacto'),
            'correo_contacto' => $this->input->post('correo_contacto'),
            'proyecto_a_desarrollar' => $this->input->post('proyecto'),
            'horario_atencion' => $this->input->post('horario'),
            'fecha_vacante' => date('Y-m-d H:i:s')
        );
        if ($this->session->userdata('perfil') == 'jefeacademico') {
            $vacante['carreras'] = $this->getDepartamento($this->session->userdata('id_usuario'));
        } else {
            $vacante['carreras'] = $this->input->post('carreras');
        }
        $this->m_vacantes->inserta_vacante($vacante);
        redirect('Residencia/c_vacantes_residencia');
    }

    public function elimina_vacante($id_vacante) {
        $this->m_vacantes->elimina_vacante($id_vacante);
        redirect('Residencia/c_vacantes_residencia');
    }

    private function getDepartamento($id_usuario) {
        switch ($id_usuario) {
            case '7':
                $departamento = 'DEPARTAMENTO DE CIENCIAS DE LA TIERRA';
                break;
            case '8':
                $departamento = 'DEPARTAMENTO DE SISTEMAS Y COMPUTACION';
                break;
            case '9':
                $departamento = 'DEPARTAMENTO DE QUIMICA Y BIOQUIMICA';
                break;
            case '10':
                $departamento = 'DEPTO. DE INGENIERIA INDUSTRIAL';
                break;
            case '11':
                $departamento = 'DEPARTAMENTO DE INGENIERIA ELECTRICA Y ELECTRONICA';
                break;
            case '12':
                $departamento = 'DEPARTAMENTO DE INGENIERIAS';
                break;
            case '13':
                $departamento = 'DEPARTAMENTO DE CIENCIAS ECONOMICO ADMINISTRATIVAS';
                break;
            default:
                $departamento = 'SIN DEPARTAMENTO';
                break;
        }
        return $departamento;
    }

}
