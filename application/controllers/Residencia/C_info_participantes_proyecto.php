<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_info_participantes_proyecto
 *
 * @author javier
 */
class C_info_participantes_proyecto extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database('local');
        $this->load->model('Residencia/m_info_participantes_proyecto');
    }

    public function index() {
        if ($this->session->userdata('perfil') == 'docente') {
            $data['perfil'] = $this->session->userdata('perfil');
            $data['info'] = $this->session->userdata('nombres') . ' ' . $this->session->userdata('apellidos');
            $data['proyectos'] = $this->m_info_participantes_proyecto->info_proyectos_asesor($this->session->userdata('rfc'));
        } else if ($this->session->userdata('perfil') == 'jefeacademico') {
            $data['info'] = $this->session->userdata('perfil');
            $data['perfil'] = $this->session->userdata('perfil');
            $data['proyectos'] = $this->m_info_participantes_proyecto->info_proyectos_jacademico($this->getDepartamento($this->session->userdata('id_usuario')));
            $data['docentes'] = $this->m_info_participantes_proyecto->consulta_docentes($this->getDepartamento($this->session->userdata('id_usuario')));
            $data['docentes_otros'] = $this->m_info_participantes_proyecto->consulta_docentes_otros_departamentos();
        }
        $this->load->view('Residencia/v_info_participantes_proyecto', $data);
    }

    public function proyectos_asesor_revisor() {
        if ($this->input->post('asesor_revisor') == 'TRUE') {//true revisor
            $data['proyectos'] = $this->m_info_participantes_proyecto->info_proyectos_revisor($this->session->userdata('rfc'));
        } else {
            $data['proyectos'] = $this->m_info_participantes_proyecto->info_proyectos_asesor($this->session->userdata('rfc'));
        }
        echo json_encode($data);
    }

    public function participantes_proyecto() {

        $data['base_url'] = base_url();
        $data['user'] = $this->session->userdata('perfil');
        $data['asesor'] = $this->m_info_participantes_proyecto->info_asesor($this->input->post('ppid'));
        $data['revisor1'] = $this->m_info_participantes_proyecto->info_revisor1($this->input->post('ppid'));
        $data['revisor2'] = $this->m_info_participantes_proyecto->info_revisor2($this->input->post('ppid'));
        $data['asesore'] = $this->m_info_participantes_proyecto->info_asesor_externo($this->input->post('ppid'));
        $data['residente'] = $this->m_info_participantes_proyecto->info_residente($this->input->post('ppid'));
        echo json_encode($data);
    }
    public function cambiar_asesor_revisor() {
        //$asesor_revisor;
        switch ($this->input->post('puesto')) {
            case 'asesor':
                $asesor_revisor = array('id_docente' => $this->input->post('rfc'), 'tipo' => 'A');
                break;
            default :
                $asesor_revisor = array('id_docente' => $this->input->post('rfc'), 'tipo' => 'R');
                break;
        }
        $ar = $this->m_info_participantes_proyecto->insertar_asesor_revisor($asesor_revisor);


        $tmp;
        foreach ($ar as $value) {
            $tmp = $value->ultimo;
        }
        $this->m_info_participantes_proyecto->actualizar_participantes_proyecto($this->input->post('ppid'),array($this->input->post('puesto')=>$tmp));
        //ppid,rfc,puesto
        $this->participantes_proyecto();
    }

    private function getDepartamento($id_usuario) {
        $departamento = 'SIN DEPARTAMENTO';
        switch ($id_usuario) {
            case '7':
                $departamento = 'DEPARTAMENTO DE CIENCIAS DE LA TIERRA';
                break;
            case '15':
                $departamento = 'DEPARTAMENTO DE CIENCIAS DE LA TIERRA';
                break;
            case '8':
                $departamento = 'DEPARTAMENTO DE SISTEMAS Y COMPUTACION';
                break;
            case '16':
                $departamento = 'DEPARTAMENTO DE SISTEMAS Y COMPUTACION';
                break;
            case '9':
                $departamento = 'DEPARTAMENTO DE QUIMICA Y BIOQUIMICA';
                break;
            case '17':
                $departamento = 'DEPARTAMENTO DE QUIMICA Y BIOQUIMICA';
                break;
            case '10':
                $departamento = 'DEPTO. DE INGENIERIA INDUSTRIAL';
                break;
            case '18':
                $departamento = 'DEPTO. DE INGENIERIA INDUSTRIAL';
                break;
            case '11':
                $departamento = 'DEPARTAMENTO DE INGENIERIA ELECTRICA Y ELECTRONICA';
                break;
            case '19':
                $departamento = 'DEPARTAMENTO DE INGENIERIA ELECTRICA Y ELECTRONICA';
                break;
            case '12':
                $departamento = 'DEPARTAMENTO DE INGENIERIAS';
                break;
            case '20':
                $departamento = 'DEPARTAMENTO DE INGENIERIAS';
                break;
            case '13':
                $departamento = 'DEPARTAMENTO DE CIENCIAS ECONOMICO ADMINISTRATIVAS';
                break;
            case '21':
                $departamento = 'DEPARTAMENTO DE CIENCIAS ECONOMICO ADMINISTRATIVAS';
                break;
            default:
                break;
        }
        return $departamento;
    }
    public function editarasesorexternofun()
    {
      $id = $this->input->post('idasesorexterno');
      $nombre = $this->input->post('nombreasesorexternoactual');
      $resultado=$this->m_info_participantes_proyecto->actualizardatosasesorexterno($id,$nombre);
      return $resultado;
    }
}
