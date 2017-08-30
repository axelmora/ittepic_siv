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

class C_bitacora_avance_docente extends CI_Controller {

    private $error;

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->database('local');
        $this->load->model('Residencia/Docente/m_bitacora_avance_docente');
        $this->load->model('Residencia/m_historial');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('download');
        $this->load->helper('path');
    }

    public function consulta_info_asesorado() {

        $data['info_asesorado'] = $this->m_bitacora_avance_docente->consulta_info_asesorado($this->input->post('id_participantes'));
        $tmp = '';
        $tmp2 = '';
        foreach ($data['info_asesorado'] as $value) {
            $tmp = $value->numero_control;
            $tmp2 = $value->anteproyecto_fk;
        }
        $data['dictamen'] = $this->m_bitacora_avance_docente->consulta_dictamen($tmp, $tmp2);
        $data['avance'] = $this->m_bitacora_avance_docente->consulta_tabla_bitacora_avance($tmp);
        foreach ($data['info_asesorado'] as $value) {
            $data['id_asesor'] = $value->asesor;
        }
        $data['archivos_residente'] = $this->m_bitacora_avance_docente->consulta_archivos_alumno($this->input->post('id_participantes'));
        $data['base_url'] = base_url();
        $data['id_participantes'] = $this->input->post('id_participantes');
        $data['archivos_asesor'] = $this->m_bitacora_avance_docente->consulta_archivos_asesor($this->input->post('id_participantes'));
        $data['archivos_revision_asesor'] = $this->m_bitacora_avance_docente->consulta_revisiones_asesor($this->input->post('id_participantes'));

        echo json_encode($data);
    }

    public function actualizar_archivos_residente() {
        $data['archivos_residente'] = $this->m_bitacora_avance_docente->consulta_archivos_alumno($this->input->post('id_participantes'));
        echo json_encode($data);
    }

    public function actualizar_archivos_asesor() {
        $data['archivos_asesor'] = $this->m_bitacora_avance_docente->consulta_archivos_asesor($this->input->post('id_participantes'));
        echo json_encode($data);
    }

    public function actualizar_revisiones_asesor() {
        $data['archivos_revision_asesor'] = $this->m_bitacora_avance_docente->consulta_revisiones_asesor($this->input->post('id_participantes'));
        echo json_encode($data);
    }

    public function actualizar_titulacion() {
        $data = array('titulacion' => $this->input->post('titulacion'));
        $datos = array('titulacion' => $this->m_bitacora_avance_docente->actualizar_titulacion($this->input->post('anteproyecto_id'), $data));
        echo json_encode($datos);
    }

    public function agregar_revision_asesor() {

        $archivo = $this->do_upload_revision($this->input->post('id_asesor'));

        $insert = $this->insertar_tabla_archivo_asesor($archivo);

        if ($insert != false) {
            if ($this->insertar_tabla_observaciones($insert)) {
                $this->actualizar_archivo_y_anteproyecto($this->input->post('ncontrol'), $this->input->post('id_archivo_alu'), $this->input->post('tipo_documento_revision'), $this->input->post('anteproyecto_id2'), $this->input->post('estado_anteproyecto'));
                $consulta_correo = $this->m_historial->consulta_correo_alumno($this->input->post('ncontrol'));
                $correo_dest = '';
                foreach ($consulta_correo as $value) {
                    $correo_dest = $value->correo;
                }
                if ($correo_dest != null || $correo_dest != '') {
                    $this->enviar_correo($this->input->post('ncontrol'), $correo_dest, 'Revisión de asesor', 'Tu asesor ha hecho una revisión en tus documentos, para mas información visita http://siv.ittepic.edu.mx/');
                }
                echo 'Se agregó la revisión correctamente.';
            } else {
                echo 'Error en la inserción de la revisión.';
            }
        } else {
            echo 'Error en la inserción de la revisión.';
        }
    }

    public function insertar_tabla_archivo_asesor($archivo) {
        if (array_key_exists('error', $archivo)) {
            echo $archivo['error'];
        } else {
            $data = array(
                'descripcion_archivo' => mb_strtoupper($this->input->post('descripcion_archivo_revision'), 'UTF-8'),
                'tipo_documento' => $this->input->post('tipo_documento_revision'),
                'asesor_revisor_id' => $this->input->post('id_asesor'),
                'ruta_archivo_asesor' => $archivo['ruta'],
                'nombre_archivo' => mb_strtoupper($archivo['nombre_archivo'], 'UTF-8'),
                'fecha_guardado_documento' => date('Y-m-d')
            );
            //retorna false o el ultimo insertado
            return $this->m_bitacora_avance_docente->insertar_archivo_asesor($data);
        }
    }

    public function insertar_archivo_asesor() {
        $archivo = $this->do_upload_revision($this->input->post('id_asesor_revisor'));
        if (array_key_exists('error', $archivo)) {
            echo $archivo['error'];
        } else {
            $data = array(
                'descripcion_archivo' => mb_strtoupper($this->input->post('descripcion_archivo'), 'UTF-8'),
                'tipo_documento' => $this->input->post('tipo_documento'),
                'asesor_revisor_id' => $this->input->post('id_asesor_revisor'),
                'ruta_archivo_asesor' => $archivo['ruta'],
                'nombre_archivo' => mb_strtoupper($archivo['nombre_archivo'], 'UTF-8'),
                'fecha_guardado_documento' => date('Y-m-d')
            );

            if ($this->m_bitacora_avance_docente->insertar_archivo_asesor($data)) {//retorna false o el ultimo insertado
                $this->bitacora($this->input->post('ncontrol2'), $this->input->post('tipo_documento'));
                $consulta_correo = $this->m_historial->consulta_correo_alumno($this->input->post('ncontrol2'));
                $correo_dest = '';
                foreach ($consulta_correo as $value) {
                    $correo_dest = $value->correo;
                }
                
                    $this->enviar_correo($this->input->post('ncontrol2'), $correo_dest, 'Actividad de asesor', 'Tu asesor ha adjuntado un documento, para mas informacion visita http://siv.ittepic.edu.mx/');
                
                echo 'Archivo adjuntado correctamente.';
            } else {
                echo 'Error al adjuntar archivo.';
            }
        }
    }

    public function insertar_tabla_observaciones($param) {
        $dat = array(
            'id_asesor_revisor' => $this->input->post('id_asesor'),
            'archivo_alumno_id' => $this->input->post('id_archivo_alu'),
            'fecha_observacion' => date('Y-m-d')
        );
        foreach ($param as $value) {
            $dat['archivo_asesor_id'] = $value->id_archivo_asesor;
        }
        return $this->m_bitacora_avance_docente->insertar_observacion_asesor($dat);
    }

    public function do_upload_revision($id_asesor) {
//    /uploads
//	/residentes
//		/numero_control
//	/administrativos
//		/banco_proyectos
//		/bases_concertacion
//	/docentes
//		/rfc	
        $tmp = $this->m_bitacora_avance_docente->consulta_rfc_asesor($id_asesor);
        $rfc = '';
        foreach ($tmp as $value) {
            $rfc = $value->id_docente;
        }
        $dir = './uploads/docentes/' . $rfc;
        if (!is_dir($dir)) {
            mkdir($dir, 0777);
        }
        $config['upload_path'] = $dir; //'./uploads/docentes/'.$rfc;
        $config['allowed_types'] = 'doc|docx|pdf';
        $config['max_size'] = 10240;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {//userfile es el nombre del form field
            //$this->error = array('error' => $this->upload->display_errors());
            return array('error' => $this->upload->display_errors());
        } else {
            $ruta = substr($dir . '/' . $this->upload->data('file_name'), 2);
            $data = array(
                'ruta' => $ruta,
                'nombre_archivo' => $this->upload->data('file_name'));
            return $data;
        }
    }

    public function actualizar_archivo_y_anteproyecto($nc, $id_archivo, $tipo_doc, $id_ante, $estado_a) {

        switch ($tipo_doc) {
            case 'FRA':
                if ($estado_a == 'A  ') {
                    $this->m_bitacora_avance->actualizar_bitacora($nc, array('estado' => '3'));
                    $this->enviar_notificacion_dictamen($nc, $id_ante);
                }
                $this->m_bitacora_avance_docente->actualizar_archivo_asesorado($id_archivo, array('estado' => $estado_a));
                $this->m_bitacora_avance_docente->actualizar_aprobacion_anteproyecto($id_ante, array('aprobado' => $estado_a));
                break;

            case 'R  '://Revisión avance
                $this->m_bitacora_avance_docente->actualizar_archivo_asesorado($id_archivo, array('estado' => 'R  '));
                $this->m_bitacora_avance_docente->actualizar_bitacora($nc, array('estado' => '4'));
                break;

            case 'FER'://Formato de Evalución de Reporte de Residencia                
                $this->m_bitacora_avance_docente->actualizar_archivo_asesorado($id_archivo, array('estado' => 'R  '));
                $this->m_bitacora_avance_docente->actualizar_bitacora($nc, array('estado' => '5'));
                break;
        }
    }

    public function bitacora($nc, $td) {
        if ($td == 'CLR') {
            $this->m_bitacora_avance_docente->actualizar_bitacora($nc, array('estado' => '6'));
        }
    }

    public function recargar_avance() {

        $resultado['bitacora'] = $this->m_bitacora_avance_docente->consulta_tabla_bitacora_avance($this->input->post('numero_control'));
        echo json_encode($resultado);
    }

    private function enviar_notificacion_dictamen($nc, $aid) {
        $registro = $this->m_bitacora_avance_docente->obtener_id_carrera($nc);
        $carrera = '';
        $alumno = '';
        $proyecto = '';
        foreach ($registro as $value) {
            $carrera = $value->id_carrera;
        }

        $destinatarios = $this->getUsuarios($carrera);

        $correoJA = $this->m_historial->consulta_correo_usuario($destinatarios['ja']);
        $correoPA = $this->m_historial->consulta_correo_usuario($destinatarios['pa']);
        $correoSA = $this->m_historial->consulta_correo_usuario('subdirectorac');
        $info = $this->m_historial->NombreAlu_NombreProyecto($nc, $aid);

        foreach ($correoJA as $value) {
            $destinatarios['correo_ja'] = $value->correo;
        }
        foreach ($correoPA as $value) {
            $destinatarios['correo_pa'] = $value->correo;
        }
        foreach ($correoSA as $value) {
            $destinatarios['correo_sa'] = $value->correo;
        }
        foreach ($info as $value) {
            $alumno = $value->nombre;
            $proyecto = $value->nombre_proyecto;
        }
        
            $this->enviar_correo($destinatarios['ja'], $destinatarios['correo_ja'], 'Registro de dictamen', 'Tiene un registro de dictamen pendiente del alumno ' . $alumno . ' para el anteproyecto: ' . $proyecto . ', ingrese a http://siv.ittepic.edu.mx/ para más información.');                
            $this->enviar_correo($destinatarios['pa'], $destinatarios['correo_pa'], 'Registro de dictamen', 'Tiene un registro de dictamen pendiente del alumno ' . $alumno . ' para el anteproyecto: ' . $proyecto . ', ingrese a http://siv.ittepic.edu.mx/ para más información.');        
            $this->enviar_correo('subdirectorac', $destinatarios['correo_sa'], 'Registro de dictamen', 'Tiene un registro de dictamen pendiente del alumno ' . $alumno . ' para el anteproyecto: ' . $proyecto . ', ingrese a http://siv.ittepic.edu.mx/ para más información.');        
    }

    private function enviar_correo($id_usuario, $to, $subject, $message) {
        if ($to != null || $to != '') {
//cargamos la libreria email de ci
            $this->load->library("email");
            //configuracion para gmail
            $configGmail = array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.gmail.com',
                'smtp_port' => 465,
                'smtp_user' => 'avisosiv@ittepic.edu.mx',
                'smtp_pass' => 'sivittepic',
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'newline' => "\r\n"
            );
            //cargamos la configuración para enviar con gmail
            $this->email->initialize($configGmail);

            $this->email->from('avisosiv@ittepic.edu.mx', 'Sistema Integral de Vinculación');
            $this->email->to($to);
            $this->email->subject($subject);
            $this->email->message('<h2>' . $message . '</h2>');
            $this->email->send();
            switch ($id_usuario) {
                case 'subdirectorac':
                case 'presidenteac1':
                case 'presidenteac2':
                case 'presidenteac3':
                case 'presidenteac4':
                case 'presidenteac5':
                case 'presidenteac6':
                case 'presidenteac7':
                case 'presidenteac8':
                case 'presidenteac9':
                case 'presidenteac10':
                case 'presidenteac11':
                    break;
                default:
                    $a = array(
                        'destinatario' => $id_usuario,
                        'asunto' => $subject,
                        'fecha' => date('Y-m-d'),
                    );
                    $this->m_historial->insertar_historial($a);
                    break;
            }

            //var_dump('Se envió');
            //       
            //con esto podemos ver el resultado
            //var_dump($this->email->print_debugger());
        }
    }

    private function getUsuarios($id_carrera) {
        switch ($id_carrera) {
            case '2':
                return array('ja' => 'jacademico2', 'pa' => 'presidenteac3');
            case '3':
                return array('ja' => 'jacademico1', 'pa' => 'presidenteac1');
            case '4':
                return array('ja' => 'jacademico6', 'pa' => 'presidenteac2');
            case '5':
                return array('ja' => 'jacademico5', 'pa' => 'presidenteac8');
            case '6':
                return array('ja' => 'jacademico4', 'pa' => 'presidenteac7');
            case '7':
                return array('ja' => 'jacademico2', 'pa' => 'presidenteac3');
            case '8':
                return array('ja' => 'jacademico3', 'pa' => 'presidenteac6');
            case '9':
                return array('ja' => 'jacademico3', 'pa' => 'presidenteac5');
            case '10':
                return array('ja' => 'jacademico7', 'pa' => 'presidenteac11');
            case '13':
                return array('ja' => 'jacademico5', 'pa' => 'presidenteac9');
            case '14':
                return array('ja' => 'jacademico7', 'pa' => 'presidenteac10');
            case '15':
                return array('ja' => 'jacademico2', 'pa' => 'presidenteac3');

            default:
                return array('ja' => '', 'pa' => '');
        }
    }

}
