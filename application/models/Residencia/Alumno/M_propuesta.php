<?php

class M_propuesta extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function obtener_empresapk_agregada() {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('empresa');
        $DB2->where('empresa_pk=(select max(empresa_pk) from empresa)');
        $query = $DB2->get();
        $result = $query->result();
        return $result;
    }

    function solicitud($numero_control) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('solicitud_proyecto');
        $DB2->where('numero_control', $numero_control);
        $query = $DB2->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function elimina_vacante($id_vacante) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->where('id_vacante', $id_vacante);
        $DB2->delete('vacantes_residencia');
    }

    function obtener_anteproyecto_agregado() {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('anteproyecto');
        $DB2->where('anteproyecto_pk=(select max(anteproyecto_pk) from anteproyecto)');
        $query = $DB2->get();
        $result = $query->result();
        return $result;
    }

    public function actualizar_anteproyecto($id, $lugares_requeridos) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->where('anteproyecto_pk', $id);
        $DB2->update('anteproyecto', $lugares_requeridos);
    }
    
    public function eliminar_convenio($id) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->where('id_convenio', $id);
        $DB2->delete('convenios');
    }

    public function obtener_carrera($carrera) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('carreras');
        $DB2->where('id_carrera=' . $carrera);
        $query = $DB2->get();
        $result = $query->result();
        return $result;
    }
    
    public function obtener_convenios() {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('convenios');
        $query = $DB2->get();
        $result = $query->result();
        return $result;
    }
    public function obtener_convenios_por_id($idc) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('*');
        $DB2->from('convenios');
        $DB2->where('id_convenio',$idc);
        $query = $DB2->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }        
    }

    function insertar_bitacora($bitacora) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->insert('bitacora_avance_alumno', $bitacora);
    }

    function insertar_dictamen($dictamen) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->insert('dictamen_anteproyecto', $dictamen);
    }

    function insertar_solicitud($solicitud) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->insert('solicitud_proyecto', $solicitud);
    }

    function insertar_archivo_alumno($archivo_alumno) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->insert('archivo_alumno', $archivo_alumno);
    }

    function insertar_convenio($convenio) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->insert('convenios', $convenio);
    }

    public function insertar_empresa($empresa) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->insert('empresa', $empresa);
    }

    public function insertar_asesor_externo($asesor_externo) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->insert('asesor_externo', $asesor_externo);
    }

    public function insertar_anteproyecto($anteproyecto) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->insert('anteproyecto', $anteproyecto);
    }

    public function insertar_atencion_medica($atencion) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->insert('atencion_medica', $atencion);
    }

}
