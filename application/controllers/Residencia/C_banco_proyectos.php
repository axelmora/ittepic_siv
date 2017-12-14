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
date_default_timezone_set('America/Mazatlan');
class C_banco_proyectos extends CI_Controller {

    private $error;

    public function __construct() {
        parent::__construct();
        $this->load->database('local');
        $this->load->model('Residencia/m_banco_proyectos');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('download');
        $this->load->helper('path');
    }

    public function index() {
        switch ($this->session->userdata('perfil')) {
            case 'jefevinculacion':
            case 'jeferesidencia':
                $data['info'] = $this->session->userdata('perfil');
                $data['banco'] = $this->m_banco_proyectos->consulta_banco_proyectos();
                break;
            case 'jefeacademico':
                $data['info'] = $this->session->userdata('perfil');
                $departamento = $this->getDepartamento($this->session->userdata('id_usuario'));
                $data['banco'] = $this->m_banco_proyectos->consulta_banco_proyectos_por_departamento($departamento);
                break;
            case 'coordinadorprogac':
                $data['info'] = $this->session->userdata('perfil');
                $departamento = $this->getDepartamento_cordiac($this->session->userdata('id_usuario'));
                $data['banco'] = $this->m_banco_proyectos->consulta_banco_proyectos_por_departamento($departamento);
                break;
            default:
                $data['info'] = $this->session->userdata('perfil');
                $data['banco'] = $this->m_banco_proyectos->consulta_banco_proyectos();
                break;
        }
        $this->load->view('Residencia/v_banco_proyectos', $data);
    }

    public function agregar_anteproyecto() {
        if ($this->session->userdata('perfil') == 'jefeacademico' || $this->session->userdata('perfil') == 'coordinadorresidencia') {
            $data['info'] = $this->session->userdata('perfil');
            $data['empresas'] = $this->m_banco_proyectos->consulta_empresas_por_fecha();
            $data['vacantes'] = $this->m_banco_proyectos->consulta_vacantes_por_fecha();
            $data['asesores'] = $this->m_banco_proyectos->consulta_posible_asesor($this->getDepartamento($this->session->userdata('id_usuario')));
            $data['error_archivo'] = $this->error;
            $this->load->view('Residencia/JefeAcademico/v_agregar_anteproyecto', $data);
        } else {
            $this->load->view('notienespermisos');
        }
    }

    public function bd_agregar_empresa() {
//        $tmp = '';
        $datos_empresa = array(
            'nombre_empresa' => mb_strtoupper($this->input->post('nombre_empresa'),'UTF-8'),
            'telefono' => mb_strtoupper($this->input->post('telefono'),'UTF-8'),
            'sector' => mb_strtoupper($this->input->post('sector'),'UTF-8'),
            'rfc' => mb_strtoupper($this->input->post('rfc'),'UTF-8'),
            'domicilio' => mb_strtoupper($this->input->post('domicilio'),'UTF-8'),
            'colonia' => mb_strtoupper($this->input->post('colonia'),'UTF-8'),
            'ciudad' => mb_strtoupper($this->input->post('ciudad'),'UTF-8'),
            'titular_empresa' => mb_strtoupper($this->input->post('titular'),'UTF-8'),
            'fecha_alta' => date('Y-m-d H:i:s'),
            'puesto_titular' => mb_strtoupper($this->input->post('puesto_titular'),'UTF-8'),
            'codigo_postal' => mb_strtoupper($this->input->post('codigo_postal'),'UTF-8')
        );
        $this->m_banco_proyectos->insertar_empresa($datos_empresa);
//        $id_empresa = $this->m_banco_proyectos->consulta_id_empresa_por_fecha();
//        foreach ($id_empresa as $value) {
//            $tmp = $value->empresa_pk;
//        }
//        $datos_asesorE = array(
//            'empresafk' => $tmp,
//            'nombre' => mb_strtoupper($this->input->post('nombre_asesor_externo'),'UTF-8'),
//            'puesto' => mb_strtoupper($this->input->post('correo'),'UTF-8'),
//            'correo' => $this->input->post('puesto_asesor'),
//            'area' => mb_strtoupper($this->input->post('area'),'UTF-8')
//        );
//        $this->m_banco_proyectos->insertar_asesor_externo($datos_asesorE);
        redirect('Residencia/c_banco_proyectos/agregar_anteproyecto');
    }

    public function bd_agregar_anteproyecto() {
        $respuesta = $this->do_upload_JefeAcademico();
        if (array_key_exists('error', $respuesta)) {
            $this->agregar_anteproyecto();
//$this->agregar_anteproyecto($respuesta);
        } else {
            $datos_anteproyecto = array(
                'nombre_proyecto' => mb_strtoupper($this->input->post('nombre_anteproyecto'),'UTF-8'),
                'empresa_fk' => $this->input->post('id_empresa'),
                'residentes_requeridos' => $this->input->post('residentes_requeridos'),
                'lugares_disponibles' => $this->input->post('residentes_requeridos'),
                'banco' => true,
                'aprobado' => 'A',
                'titulacion' => true,
                'disponible' => true,
                'fecha_alta' => date('Y-m-d H:i:s'),
                'departamento_anteproyecto' => $this->getDepartamento($this->session->userdata('id_usuario')),
                'ruta_archivo' => $respuesta['ruta'],
                'nombre_archivo' => mb_strtoupper($respuesta['nombre_archivo'],'UTF-8'),
                'posible_asesor' => $this->input->post('posible_asesor')
            );
            if ($this->input->post('id_vacante') != '') {
                $datos_anteproyecto['id_vacante'] = $this->input->post('id_vacante');
            }
            else{
                $datos_anteproyecto['id_vacante'] = 0;
            }
            $this->m_banco_proyectos->insertar_anteproyecto($datos_anteproyecto);
            redirect('Residencia/c_banco_proyectos');
        }
    }

    private function getDepartamento($id_usuario) {
        $departamento = 'Sin departamento';
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
            case '13':
                $departamento = 'DEPARTAMENTO DE CIENCIAS ECONOMICO ADMINISTRATIVAS';
                break;
            case '21':
                $departamento = 'DEPARTAMENTO DE CIENCIAS ECONOMICO ADMINISTRATIVAS';
                break;
            case '12':
                $departamento = 'DEPARTAMENTO DE INGENIERIAS';
                break;
            case '20':
                $departamento = 'DEPARTAMENTO DE INGENIERIAS';
                break;
            default:
                break;
        }
        return $departamento;
    }

    private function getDepartamento_cordiac($id_usuario) {
        $departamento = '';
        switch ($id_usuario) {
            case '29':
                $departamento = 'DEPARTAMENTO DE CIENCIAS DE LA TIERRA';
                break;
            case '30':
                $departamento = 'DEPARTAMENTO DE SISTEMAS Y COMPUTACION';
                break;
            case '31':
                $departamento = 'DEPARTAMENTO DE QUIMICA Y BIOQUIMICA';
                break;
            case '32':
                $departamento = 'DEPTO. DE INGENIERIA INDUSTRIAL';
                break;
            case '33':
                $departamento = 'DEPARTAMENTO DE INGENIERIA ELECTRICA Y ELECTRONICA';
                break;
            case '34':
                $departamento = 'DEPARTAMENTO DE QUIMICA Y BIOQUIMICA';
                break;
            case '35':
                $departamento = 'DEPARTAMENTO DE CIENCIAS ECONOMICO ADMINISTRATIVAS';
                break;
            case '36':
                $departamento = 'DEPARTAMENTO DE CIENCIAS ECONOMICO ADMINISTRATIVAS';
                break;
            case '37':
                $departamento = 'DEPARTAMENTO DE INGENIERIAS';
                break;
        }
        return $departamento;
    }

    public function do_upload_JefeAcademico() {//recibir el numero de control y perfil para ver donde se guardara el archivo
////set_realpath('./uploads/peliculas/'.$idp."/");
//retorna el directorio en el servidor /var/www/proyecto/[B]uploads/peliculas/10[/B]
//para dentro de application //set_realpath('./application/uploads/peliculas/'.$idp."/");
//    /uploads
//	/residentes
//		/numero_control
//	/administrativos
//		/banco_proyectos
//		/bases_concertacion
//	/docentes
//		/rfc
//$dir = set_realpath('./uploads/administrativos/banco_proyectos/');
//
//        if (!is_dir($dir)) {
//            mkdir($dir);
//        }
        $config['upload_path'] = './uploads/administrativos/banco_proyectos/';
        $config['allowed_types'] = 'doc|docx|pdf';
        $config['max_size'] = 200000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {//userfile es el nombre del form field
            $this->error = array('error' => $this->upload->display_errors());
            return $this->error;
//$this->load->view('upload_form', $error);
        } else {

            $data = array('ruta' => 'uploads/administrativos/banco_proyectos/' . $this->upload->data('file_name'),
                'nombre_archivo' => $this->upload->data('file_name'));
//$dir = $dir.$_FILES['userfile']['name'];
            return $data;
//$this->load->view('upload_success', $data);
        }
    }

    public function descargar() {
//force_download($this->input->post('ruta_archivo'), NULL);
//force_download('./uploads/Untitled_Untitled_1.docx', NULL);
    }

}
