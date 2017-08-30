<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 */
class Panel_docente extends CI_Controller {
private $error='';
    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->load->database('local');
        $this->load->model('Residencia/Docente/m_bitacora_avance_docente');
        
        if ($this->session->userdata('rfc') == FALSE) {
            redirect(base_url() . 'index.php/logeo');
        }
    }

    public function index() {
        $data['nombres'] = utf8_decode($this->session->userdata('nombres'));
        $data['apellidos'] = utf8_decode($this->session->userdata('apellidos'));
        $this->load->view('iniciodocente',$data);
    }

//    public function bitacora() {
//        $data['nombres'] = $this->session->userdata('nombres');
//        $data['apellidos'] = $this->session->userdata('apellidos');
//        $data['asesorados'] = $this->m_bitacora_avance_docente->consulta_asesorados($this->session->userdata('rfc'));        
//        $this->load->view('Residencia/Docente/v_bitacora_avance_asesor',$data);
//    }
    public function asesorados() {
        $data['nombres'] = utf8_decode($this->session->userdata('nombres'));
        $data['apellidos'] = utf8_decode($this->session->userdata('apellidos'));
        $data['asesorados'] = $this->m_bitacora_avance_docente->consulta_asesorados($this->session->userdata('rfc'));        
        $this->load->view('Residencia/Docente/v_bitacora_avance_asesor',$data);
    }
    //+++++++++++++++revisor+++++++++++++++++++++++++++++++++++++++++++++++++++
    public function revisiones() {
        $data['nombres'] = utf8_decode($this->session->userdata('nombres'));
        $data['apellidos'] = utf8_decode($this->session->userdata('apellidos'));
        $data['alu_revisiones'] = $this->m_bitacora_avance_docente->consulta_alumnos_revision($this->session->userdata('rfc'));
        $this->load->view('Residencia/Docente/v_consultar_proyectos',$data);
//        $data['nombres'] = $this->session->userdata('nombres');
//        $data['apellidos'] = $this->session->userdata('apellidos');
//        $this->load->view('Residencia/Docente/v_iniciorevisor',$data);
    }
    public function revisiones_alumnos() {
        $data['alu_info'] = $this->m_bitacora_avance_docente->consulta_info_asesorado($this->input->post('id_participantes'));
        $data['alu_archivos'] = $this->m_bitacora_avance_docente->consulta_archivos_alumno($this->input->post('id_participantes'));
        $data['base_url'] = base_url();
        
        echo json_encode($data);
    }
//    public function consultar_proyectos() {
//        $data['nombres'] = $this->session->userdata('nombres');
//        $data['apellidos'] = $this->session->userdata('apellidos');
//        $this->load->view('Residencia/Docente/v_consultar_proyectos',$data);
//    }
    
    //-------------------------------------------------------------------------
    public function participantes_proyectos() {
        redirect('Residencia/C_info_participantes_proyecto');
    }
    public function observaciones() {
        $data['nombres'] = utf8_decode($this->session->userdata('nombres'));
        $data['apellidos'] = utf8_decode($this->session->userdata('apellidos'));
        $this->load->view('Residencia/Docente/v_docente_observaciones',$data);
    }
    public function registro_aprobacion_anteproyecto() {
        $data['nombres'] = utf8_decode($this->session->userdata('nombres'));
        $data['apellidos'] = utf8_decode($this->session->userdata('apellidos'));
        $this->load->view('Residencia/Docente/v_docente_registro_aprobacion_anteproyecto',$data);
    }
    
    public function informe() {
        $data['nombres'] = utf8_decode($this->session->userdata('nombres'));
        $data['apellidos'] = utf8_decode($this->session->userdata('apellidos'));
        $data['rfc'] = $this->session->userdata('rfc');
        $data['error'] = $this->error;
        $this->load->view('Residencia/Docente/v_adjuntar_informe',$data);
    }
    public function adjuntar_informe() {
        $archivo = $this->do_upload_informe($this->input->post('rfc'));
        if (array_key_exists('error', $archivo)) {
             $this->informe();
        } else {
            $data = array(                
                'rfc' => $this->input->post('rfc'),
                'nombre_archivo' => mb_strtoupper($archivo['nombre_archivo'],'UTF-8'),
                'fecha_guardado' => date('Y-m-d'),
                'ruta_archivo' => $archivo['ruta']                              
            );

            if ($this->m_bitacora_avance_docente->insertar_archivo_informe($data)) {                
                redirect('Residencia/Docente/panel_docente');
            } else {
                $this->error['error'] = 'Error al guardar informacion de informe.';
                $this->informe();
            }
        
        //$this->load->view('Residencia/Docente/v_adjuntar_informe',$data);
    }
    }
    
    private function do_upload_informe($rfc) {
//    /uploads
//	/residentes
//		/numero_control
//	/administrativos
//		/banco_proyectos
//		/bases_concertacion
//	/docentes
//		/rfc	
       
        $dir = './uploads/docentes/' . $rfc;
        if (!is_dir($dir)) {
            mkdir($dir,0777);
        }
        $config['upload_path'] = $dir; //'./uploads/docentes/'.$rfc;
        $config['allowed_types'] = 'doc|docx|pdf';
        $config['max_size'] = 10240;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {//userfile es el nombre del form field
            $this->error = array('error' => $this->upload->display_errors());
            return $this->error;
        } else {
            $ruta = substr($dir . '/' . $this->upload->data('file_name'), 2);
            $data = array(
                'ruta' => $ruta,
                'nombre_archivo' => $this->upload->data('file_name'));
            return $data;
        }
    }
    
    public function info_procedimiento() {        
        $this->load->view('Residencia/v_info_procedimiento');
    }
    
    

}
