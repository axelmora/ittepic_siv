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

class C_bitacora_avance_academico extends CI_Controller {

    private $error;

    public function __construct() {
        parent::__construct();

        $this->load->database('local');
        $this->load->model('Residencia/JefeAcademico/m_bitacora_avance_academico');
        $this->load->model('Residencia/m_historial');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('download');
        $this->load->helper('path');
        $this->load->helper('file');
    }

    public function consulta_bitacora_residente() {
        //$data['info'] = $this->session->userdata('perfil');
        $data['info_residente'] = $this->m_bitacora_avance_academico->consulta_bitacora_residente($this->input->post('id_participantes'));
        $tmp = '';
        foreach ($data['info_residente'] as $value) {
            $tmp = $value->numero_control;
        }
        $data['avance'] = $this->m_bitacora_avance_academico->consulta_tabla_bitacora_avance($tmp);
        //$data['id_participantes'] = $this->input->post('id_participantes');
        //$data['info_asesorado'] = $this->m_bitacora_avance_docente->consulta_info_asesorado($this->input->post('id_participantes'));
//        foreach ($data['info_asesorado'] as $value) {
//            $data['id_asesor'] = $value->asesor;
//        }
        $data['archivos_residente'] = $this->m_bitacora_avance_academico->consulta_archivos_residente($this->input->post('id_participantes'));
        $data['archivos_asesor'] = $this->m_bitacora_avance_academico->consulta_archivos_asesor($this->input->post('id_participantes'));
        $data['archivos_revision_asesor'] = $this->m_bitacora_avance_academico->consulta_revisiones_asesor($this->input->post('id_participantes'));
        $data['dictamen'] = $this->m_bitacora_avance_academico->consulta_dictamen($this->input->post('id_participantes'));
        $data['base_url'] = base_url();
        //$this->load->view('Residencia/Docente/v_bitacora_avance_asesor', $data);
        echo json_encode($data);
    }

    public function actualizar_dictamen() {
        $autorizacion = array('jefe_academico' => $this->input->post('autorizacion'));
        if ($this->m_bitacora_avance_academico->actualizar_dictamen($this->input->post('anteproyecto_id'), $this->input->post('numero_control'), $autorizacion)) {
            echo json_encode(array('msj' => 'Se actualizó la opción de dictamen.'));
        } else {
            echo json_encode(array('msj' => 'Error en actualización'));
        }
    }
/*         BUSCAR PRO NUMERO DE CONTROL   07/09/2017                             */
public function consulta_bitacora_residente_nocontrol() {
    //$data['info'] = $this->session->userdata('perfil');
    $data1['info_residente1'] = $this->m_bitacora_avance_academico->consulta_bitacora_residente_control($this->input->post('numero_control'));
    $aa=$this->input->post('numero_control');
    $tmp1 = '';
    foreach ($data1['info_residente1'] as $value) {
        $tmp1 = $value->id;
    }
    $data['info_residente'] = $this->m_bitacora_avance_academico->consulta_bitacora_residente($tmp1);
    $tmp = '';
    foreach ($data['info_residente'] as $value) {
        $tmp = $value->numero_control;
    }
    $data['avance'] = $this->m_bitacora_avance_academico->consulta_tabla_bitacora_avance($tmp);
    $data['archivos_residente'] = $this->m_bitacora_avance_academico->consulta_archivos_residente($tmp1);
    $data['archivos_asesor'] = $this->m_bitacora_avance_academico->consulta_archivos_asesor($tmp1);
    $data['archivos_revision_asesor'] = $this->m_bitacora_avance_academico->consulta_revisiones_asesor($tmp1);
    $data['dictamen'] = $this->m_bitacora_avance_academico->consulta_dictamen($tmp1);
    $data['base_url'] = base_url();
    echo json_encode($data);
}

//****************************ASESOR************************************************
    public function consulta_info_asesorados() {
        $data['info'] = $this->session->userdata('perfil');
        $data['asesorados'] = $this->m_bitacora_avance_docente->consulta_asesorados($this->session->userdata('rfc'));
        $data['id_participantes'] = $this->input->post('id_participantes');
        $data['info_asesorado'] = $this->m_bitacora_avance_docente->consulta_info_asesorado($this->input->post('id_participantes'));
        foreach ($data['info_asesorado'] as $value) {
            $data['id_asesor'] = $value->asesor;
        }
        $data['archivos_alumno'] = $this->m_bitacora_avance_docente->consulta_archivos_alumno($this->input->post('id_participantes'));
        $data['archivos_asesor'] = $this->m_bitacora_avance_docente->consulta_archivos_asesor($this->input->post('id_participantes'));
        $this->load->view('Residencia/Docente/v_bitacora_avance_asesor', $data);
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
                'fecha_guardado_documento' => date('Y-m-d'),
            );
            //retorna false o el ultimo insertado
            return $this->m_bitacora_avance_docente->insertar_archivo_asesor($data);
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

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    public function index() {

        redirect('panel_academico/residencia');
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
                break;
        }
        return $departamento;
    }

    public function cancelar_residencia() {

        $this->m_bitacora_avance_academico->cr_dictamen_anteproyecto($this->input->post('nc'), $this->input->post('anteproyecto_id'));
        $this->m_bitacora_avance_academico->cr_solicitud_proyecto($this->input->post('nc'), $this->input->post('anteproyecto_id'));
        $this->m_bitacora_avance_academico->cr_bitacora($this->input->post('nc'));
        $this->m_bitacora_avance_academico->cr_atencion($this->input->post('nc'));

        if ($this->input->post('asesor_id') == '' || $this->input->post('asesor_id') == null || $this->input->post('asesor_id') == false || $this->input->post('asesor_id') == 'undefinided') {

        } else {
            $this->m_bitacora_avance_academico->cr_observacion($this->input->post('asesor_id'));
            //eliminar archivos de asesor
            $this->eliminar_archivos_asesor($this->input->post('asesor_id'));
            $this->m_bitacora_avance_academico->cr_archivo_asesor($this->input->post('asesor_id'));
        }
        //eliminar archivos de alumno
        delete_files('./uploads/residentes/' . $this->input->post('nc'), TRUE);
        $this->m_bitacora_avance_academico->cr_archivo_alumno($this->input->post('nc'));

        //
        $this->m_bitacora_avance_academico->cr_participantes_proyecto($this->input->post('participantes_id'));
        //elimina registros de asignacion de asesores y revisores.
        if ($this->input->post('asesor_id') == '' || $this->input->post('asesor_id') == null || $this->input->post('asesor_id') == false || $this->input->post('asesor_id') == 'undefinided') {

        } else {
            $this->m_bitacora_avance_academico->cr_asesor_revisor($this->input->post('asesor_id'));
            $this->m_bitacora_avance_academico->cr_asesor_revisor($this->input->post('revisor1_id'));
            $this->m_bitacora_avance_academico->cr_asesor_revisor($this->input->post('revisor2_id'));
            $banco = $this->m_bitacora_avance_academico->consulta_banco($this->input->post('anteproyecto_id'));
            foreach ($banco as $value) {
                $tmp = $value->residentes_requeridos;
                $tmp2 = $value->lugares_disponibles;
            }
            if ($tmp == ($tmp2 + 1)) {
                $this->m_bitacora_avance_academico->cr_asesor_externo($this->input->post('asesore_id'));
            }
        }

        $this->eliminar_anteproyecto($this->input->post('anteproyecto_id'));

        //enviar correo
        $correoA = $this->m_historial->consulta_correo_alumno($this->input->post('nc'));
        $tmp = '';
        foreach ($correoA as $value) {
            $tmp = $value->correo;
        }
        if ($correoA != null || $correoA != '') {
            $this->enviar_correo($this->input->post('nc'), $tmp, 'Cancelación de residencia profesional', 'Tu residencia profesional ha sido cancelada, consulta a tu asesor y Jefe Académico para más información.');
        }
        redirect('Residencia/JefeAcademico/panel_jefeacademico/bitacoras_avance');
    }

    private function eliminar_archivos_asesor($asesor_id) {
        $rutas_archivos = $this->m_bitacora_avance_academico->archivos_docente_rutas($asesor_id);
        if ($rutas_archivos) {
            foreach ($rutas_archivos as $value) {
                unlink('./' . $value->ruta_archivo_asesor);
            }
        }
    }

    private function eliminar_anteproyecto($aid) {
        $banco = $this->m_bitacora_avance_academico->consulta_banco($aid);

        $tmp = '';
        $tmp2 = '';
        foreach ($banco as $value) {
            $tmp = $value->banco;
            $tmp2 = $value->lugares_disponibles;
            $tmp3 = $value->residentes_requeridos;
        }

        if ($tmp == 't') {//si es de banco, poner disponible el anteproyecto.
            $data = array('disponible' => true,
                'aprobado' => 'A  ',
                'lugares_disponibles' => ($tmp2 + 1));

            $this->m_bitacora_avance_academico->cr_update_anteproyecto($aid, $data);
        } else {
            if ($tmp3 == ($tmp2 + 1)) {
                $this->m_bitacora_avance_academico->cr_anteproyecto($aid);
            } else {
                $data = array('disponible' => true,
                    //'aprobado' => 'A  ',
                    'lugares_disponibles' => ($tmp2 + 1));
                $this->m_bitacora_avance_academico->cr_update_anteproyecto($aid, $data);
            }
        }
    }

    private function enviar_correo($id_usuario, $to, $subject, $message) {
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

        $a = array(
            'destinatario' => $id_usuario,
            'asunto' => $subject,
            'fecha' => date('Y-m-d'),
        );
        $this->m_historial->insertar_historial($a);

        //var_dump('Se envió');
        //
        //con esto podemos ver el resultado
        //var_dump($this->email->print_debugger());
    }

}
