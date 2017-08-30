<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 */
class Panel_coordiresidencia extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->load->model('Residencia/CoordinadorResidencia/m_coordi_res');
    }

    public function index() {
        

          if($this->session->userdata('perfil') == FALSE)
          {
          redirect(base_url().'index.php/logeo');
          }
          if($this->session->userdata('perfil') == 'coordinadorresidencia')
          {
          $this->load->view('iniciocoordiresidencia');
          }
          else{

          $this->load->view('notienespermisos');
          }
         
    }

    public function asignacion() {
        redirect(base_url().'index.php/Residencia/C_asignar_asesor');
    }
    
    public function info_procedimiento() {
        $data['info'] = $this->session->userdata('perfil');
        $this->load->view('Residencia/v_info_procedimiento',$data);
    }
    
    public function consulta() {
        $data['info'] = $this->session->userdata('perfil');        
        $data['proyectos'] = $this->m_coordi_res->docentes_por_departamento($this->getDepartamento($this->session->userdata('id_usuario')));
        $this->load->view('Residencia/CoordinadorResidencia/v_consulta_asesor_revisor',$data);
    }
    
    public function participaciones_docente() {//para v_consulta_asesor_revisor
        $data['parti_asesor'] = $this->m_coordi_res->parti_asesor($this->input->post('rfc_docente'),$this->getDepartamento($this->session->userdata('id_usuario')));
        $data['parti_revisor1'] = $this->m_coordi_res->parti_revisor1($this->input->post('rfc_docente'),$this->getDepartamento($this->session->userdata('id_usuario')));
        $data['parti_revisor2'] = $this->m_coordi_res->parti_revisor2($this->input->post('rfc_docente'),$this->getDepartamento($this->session->userdata('id_usuario')));
        echo json_encode($data);
    }

    private function getDepartamento($id_usuario) {
        $departamento ='SIN DEPARTAMENTO';
        switch ($id_usuario) {            
                case '15':
                    $departamento = 'DEPARTAMENTO DE CIENCIAS DE LA TIERRA';
                    break;                
                case '16':
                    $departamento = 'DEPARTAMENTO DE SISTEMAS Y COMPUTACION';
                    break;                
                case '17':
                    $departamento = 'DEPARTAMENTO DE QUIMICA Y BIOQUIMICA';
                    break;                
                case '18':
                    $departamento = 'DEPTO. DE INGENIERIA INDUSTRIAL';
                    break;                
                case '19':
                    $departamento = 'DEPARTAMENTO DE INGENIERIA ELECTRICA Y ELECTRONICA';
                    break;                                
                case '20':
                    $departamento = 'DEPARTAMENTO DE INGENIERIAS';
                    break;                                
                case '21':
                    $departamento = 'DEPARTAMENTO DE CIENCIAS ECONOMICO ADMINISTRATIVAS';
                    break;
            default:
                break;
        }
        return $departamento;
    }

}
