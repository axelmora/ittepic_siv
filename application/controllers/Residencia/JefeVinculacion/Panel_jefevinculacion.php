<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 *
 */
class Panel_jefevinculacion extends CI_Controller {
    private $error='';
    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->load->model('Residencia/Alumno/m_propuesta');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('download');
        $this->load->helper('path');
        if ($this->session->userdata('perfil') == FALSE) {
            redirect(base_url() . 'index.php/logeo');
        }
        if ($this->session->userdata('perfil') == 'jefevinculacion') {

        } else {
            $this->load->view('notienespermisos');
        }
    }

    public function index() {
        if ($this->session->userdata('perfil') == FALSE) {
            redirect(base_url() . 'index.php/logeo');
        }
        if ($this->session->userdata('perfil') == 'jefevinculacion') {
            $data['titulo'] = 'Bienvenido de nuevo ' . $this->session->userdata('perfil');
            $this->load->view('Residencia/JefeVinculacion/inicio_residencia_vinculacion', $data);
        } else {

            $this->load->view('notienespermisos');
        }
    }

    public function banco_proyectos() {
        redirect('Residencia/C_banco_proyectos');
    }

    public function informacion_procedimiento() {
        $data['info'] = $this->session->userdata('perfil');
        $this->load->view('Residencia/v_info_procedimiento', $data);
    }

    public function vacantes() {
        redirect('Residencia/C_vacantes_residencia');
    }

    public function base_concertacion() {
        $data['info'] = $this->session->userdata('perfil');
        $data['convenios']=$this->m_propuesta->obtener_convenios();
        $data['error']=$this->error;
        $this->load->view('Residencia/JefeVinculacion/v_base_concertacion', $data);
    }
    public function eliminar($id_convenio) {
        $r = $this->m_propuesta->obtener_convenios_por_id($id_convenio);
        if ($r) {
            foreach ($r as $value) {
                unlink('./' . $value->ruta_archivo_convenio);
            }
        }
        $this->m_propuesta->eliminar_convenio($id_convenio);

        redirect('Residencia/JefeVinculacion/Panel_jefevinculacion/base_concertacion');
    }

    public function subir() {
        $respuesta = $this->do_upload_Vinculacion();
        if (array_key_exists('error', $respuesta)) {
            $this->error = $respuesta['error'];
            $this->base_concertacion();
        } else {
            $convenio = array(
                'nombre_empresa' => mb_strtoupper($this->input->post('nombre_empresa'),'UTF-8'),
                'fecha' => date('Y-m-d H:i:s'),
                'ruta_archivo_convenio' => $respuesta['ruta'],
                'nombre_archivo_convenio' => mb_strtoupper($respuesta['nombre_archivo'],'UTF-8'));

            $this->m_propuesta->insertar_convenio($convenio);
            redirect('Residencia/JefeVinculacion/Panel_jefevinculacion/base_concertacion');
        }

//        $this->base_concertacion();
    }

    function do_upload_Vinculacion() {
//    /uploads
//	/residentes
//		/numero_control
//	/administrativos
//		/banco_proyectos
//		/bases_concertacion
//	/docentes
//		/rfc
//        $session_data = $this->session->userdata('logged_in');
        $dir = set_realpath('./uploads/administrativos/bases_concertacion/');

        if (!is_dir($dir)) {
            mkdir($dir, 0777, true); // el segundo parametro es para el permiso de mas amplio acceso posible
        }
        $config['upload_path'] = $dir;
        $config['allowed_types'] = 'doc|docx|pdf';
        $config['max_size'] = 200000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {//userfile es el nombre del form field
            //return $data = array('ruta' => 'hay error');
            $this->error = array('error' => $this->upload->display_errors());
            return $this->error;
            //$this->load->view('upload_form', $error);
        } else {
            $data = array(
                'ruta' => 'uploads/administrativos/bases_concertacion/' . $this->upload->data('file_name'),
                'nombre_archivo' => $this->upload->data('file_name')
            );

//$data = array('ruta' => 'uploads/residentes/10400312/'. $this->upload->data('file_name'));
            return $data;
            //$this->load->view('upload_success', $data);
        }
    }

}
