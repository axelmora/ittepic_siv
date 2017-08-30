<?php

class M_solicitudes_anteproyecto extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    public function actualizar_anteproyecto($id, $datos) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->where('anteproyecto_pk', $id);
        $DB2->update('anteproyecto', $datos);
    }

    function consulta_solicitudes($id_usuario) {

        $DB2 = $this->load->database('local', TRUE);
        switch ($id_usuario) {
            case '7':
                $tmp = ' AND AL.ID_CARRERA = 3';
                break;
            case '8':
                $tmp = ' AND (AL.ID_CARRERA = 2 OR AL.ID_CARRERA = 7 OR AL.ID_CARRERA = 15 OR AL.ID_CARRERA = 11)';
                break;
            case '9':
                $tmp = ' AND (AL.ID_CARRERA = 8 OR AL.ID_CARRERA = 9)';
                break;
            case '10':
                $tmp = ' AND AL.ID_CARRERA = 6';
                break;
            case '11':
                $tmp = ' AND (AL.ID_CARRERA = 5 OR AL.ID_CARRERA = 13)';
                break;
            case '12':
                $tmp = ' AND AL.ID_CARRERA = 4';
                break;
            case '13':
                $tmp = ' AND (AL.ID_CARRERA = 10 OR AL.ID_CARRERA = 14)';
                break;

            default:
                break;
        }

        $query = $DB2->query('SELECT SP.*,A.NOMBRE_PROYECTO,A.BANCO,A.ID_VACANTE,AL.NOMBRE FROM SOLICITUD_PROYECTO SP,ANTEPROYECTO A, ALUMNOS AL '
                . 'WHERE AL.NUMERO_CONTROL = SP.NUMERO_CONTROL AND A.ANTEPROYECTO_PK = SP.ANTEPROYECTO_ID AND SP.ESTADO_SOLICITUD = \'P\'' . $tmp . ' ORDER BY SP.FECHA_SOLICITUD DESC');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function update_aceptar_solicitud_anteproyecto($nc, $aid, $datos) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->where('numero_control', $nc);
        $DB2->where('anteproyecto_id', $aid);
        $DB2->update('solicitud_proyecto', $datos);
    }

    function insertar_participantes_proyecto($datos) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->insert('participantes_proyecto', $datos);
    }

    function actualizar_bitacora($nc, $estado) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->where('numero_control', $nc);
        return $DB2->update('bitacora_avance_alumno', $estado);
    }

    function consulta_ae($aid) {
        $DB2 = $this->load->database('local', TRUE);
        $query = $DB2->query('SELECT AE.ASESOR_EXTERNOPK FROM ASESOR_EXTERNO AE '
                . 'WHERE AE.ANTEPROYECTO_FK = ' . $aid . ' AND '
                . 'AE.EMPRESAFK = (SELECT A.EMPRESA_FK FROM ANTEPROYECTO A WHERE A.ANTEPROYECTO_PK = ' . $aid . ' )');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    //eliminar registro de solicitud_anteproyecto,dictamen_anteproyecto, bitacora_avance,
    //        anteproyecto(el archivo tambien), asesor externo(cuando no es de banco).y atencion_medica    

    function eliminar_anteproyecto($aid) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->where('anteproyecto_pk', $aid);
        $DB2->delete('anteproyecto');
    }

    function eliminar_archivo_alumno($nc) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->where('numero_control_fk', $nc);
        $DB2->delete('archivo_alumno');
    }

    function eliminar_solicitud($nc) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->where('numero_control', $nc);
        $DB2->delete('solicitud_proyecto');
    }

    function eliminar_bitacora_atencion($nc) {
        $DB2 = $this->load->database('local', TRUE);

        $tables = array('bitacora_avance_alumno', 'atencion_medica');
        $DB2->where('numero_control', $nc);
        $DB2->delete($tables);
    }

    function eliminar_dictamen($nc) {
        $DB2 = $this->load->database('local', TRUE);

        $tables = array('dictamen_anteproyecto', 'solicitud_proyecto');
        $DB2->where('numero_control', $nc);
        $DB2->delete($tables);
    }

    function eliminar_asesor_externo($aid) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->where('anteproyecto_fk', $aid);
        $DB2->delete('asesor_externo');
    }
           
}
