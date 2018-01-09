<?php
/**
 * Description of C_banco_proyectos
 *
 * @author javier
 */
class C_autoriza_dictamen extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database('local');
        $this->load->model('Residencia/m_dictamen');
        $this->load->helper(array('form', 'url'));
    }
    public function index() {
        if ($this->session->userdata('perfil') == FALSE) {
            redirect(base_url() . 'index.php/logeo');
        }
        switch ($this->session->userdata('id_usuario')) {
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
            case '22':
                $departamento = 'DEPARTAMENTO DE CIENCIAS DE LA TIERRA';
                $carrera = 3;
                break;
            case '23':
                $departamento = 'DEPARTAMENTO DE INGENIERIAS';
                $carrera = 4;
                break;
            case '24':
                $departamento = 'DEPARTAMENTO DE SISTEMAS Y COMPUTACION';
                $carrera = 7;
                break;
            case '25':
                $departamento = 'DEPARTAMENTO DE SISTEMAS Y COMPUTACION';
                $carrera = 2;
                break;
            case '26':
                $departamento = 'DEPARTAMENTO DE QUIMICA Y BIOQUIMICA';
                $carrera = 5;
                break;
            case '27':
                $departamento = 'DEPARTAMENTO DE QUIMICA Y BIOQUIMICA';
                $carrera = 9;
                break;
            case '28':
                $departamento = 'DEPTO. DE INGENIERIA INDUSTRIAL';
                $carrera = 6;
                break;
            case '38':
                $departamento = 'DEPARTAMENTO DE INGENIERIA ELECTRICA Y ELECTRONICA';
                $carrera = 5;
                break;
            case '39':
                $departamento = 'DEPARTAMENTO DE INGENIERIA ELECTRICA Y ELECTRONICA';
                $carrera = 13;
                break;
            case '40':
                $departamento = 'DEPARTAMENTO DE CIENCIAS ECONOMICO ADMINISTRATIVAS';
                $carrera = 14;
                break;
            case '41':
                $departamento = 'DEPARTAMENTO DE CIENCIAS ECONOMICO ADMINISTRATIVAS';
                $carrera = 10;
                break;

            default:
                break;
        }
        $data['info'] = $this->session->userdata('perfil');
        if ($this->session->userdata('perfil') == 'jefeacademico') {
            $data['dictamen'] = $this->m_dictamen->dictamenes2('jefe_academico', $departamento);
            $data['s']=0;
            $this->load->view('Residencia/v_autorizacion_dictamen', $data);
        }else {
          if ($this->session->userdata('perfil') == 'presidenteacademia') {
              $data['dictamen'] = $this->m_dictamen->dictamenes3('presidente_academia', $departamento, $carrera);
              $data['s']=0;
              $this->load->view('Residencia/v_autorizacion_dictamen', $data);
          }else {
            if ($this->session->userdata('perfil') == 'presidenteacademia') {
                $data['dictamen'] = $this->m_dictamen->dictamenes3('presidente_academia', $departamento, $carrera);
                $data['s']=0;
                $this->load->view('Residencia/v_autorizacion_dictamen', $data);
            }else {
              if ($this->session->userdata('perfil') == 'directivo') {
                  $data['dictamen'] = $this->m_dictamen->dictamenes('subdirector_academico');
                  $data['s']=0;
                  $this->load->view('Residencia/v_autorizacion_dictamen', $data);
              }else {
                    $this->load->view('notienespermisos');
              }
            }
          }
        }
    }
}
