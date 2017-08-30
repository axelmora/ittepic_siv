<?php

class M_bitacora_avance_docente extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function consulta_asesorados($rfc) {

        $DB2 = $this->load->database('local', TRUE);
        
        $query = $DB2->query('SELECT PP.ID,PP.NUMERO_CONTROL, AL.NOMBRE FROM PARTICIPANTES_PROYECTO PP, ASESOR_REVISOR AR, BITACORA_AVANCE_ALUMNO BA, ALUMNOS AL
WHERE PP.ASESOR = AR.ASESOR_REVISOR_PK AND AR.ID_DOCENTE = \'' . $rfc . '\' AND PP.NUMERO_CONTROL = BA.NUMERO_CONTROL 
AND BA.ESTADO < 6 AND PP.NUMERO_CONTROL = AL.NUMERO_CONTROL');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function consulta_info_asesorado($id_participantes) {
        $DB2 = $this->load->database('local', TRUE);

        $query = $DB2->query('
            SELECT PP.*,A.*,AP.*,S.SEMESTRE, C.CARRERA, E.EMPRESA_PK, E.NOMBRE_EMPRESA
            FROM PARTICIPANTES_PROYECTO PP,ALUMNOS A, ANTEPROYECTO AP, SEMESTRE S, CARRERAS C, EMPRESA E 
            WHERE PP.ID = ' . $id_participantes . ' AND PP.NUMERO_CONTROL = A.NUMERO_CONTROL AND AP.ANTEPROYECTO_PK = PP.ANTEPROYECTO_FK AND A.ID_SEMESTRE = S.ID_SEMESTRE AND A.ID_CARRERA = C.ID_CARRERA AND E.EMPRESA_PK = AP.EMPRESA_FK');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
        function consulta_tabla_bitacora_avance($nc) {
        $DB2 = $this->load->database('local', TRUE);

        $DB2->select('*');
        $DB2->from('bitacora_avance_alumno');
        $DB2->where('numero_control', $nc);
        $DB2->limit(1);
        $query = $DB2->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function consulta_archivos_alumno($id_participantes) {
        $DB2 = $this->load->database('local', TRUE);

        $query = $DB2->query('
            SELECT AA.* FROM ARCHIVO_ALUMNO AA, PARTICIPANTES_PROYECTO PP
WHERE AA.NUMERO_CONTROL_FK = (SELECT PP.NUMERO_CONTROL FROM PARTICIPANTES_PROYECTO PP WHERE PP.ID =' . $id_participantes . ') GROUP BY AA.ARCHIVOS_PK ORDER BY AA.FECHA_GUARDADO_DOCUMENTO DESC');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function consulta_archivos_asesor($id_participantes) {
        $DB2 = $this->load->database('local', TRUE);

        $query = $DB2->query('
            SELECT AA.* FROM ARCHIVO_ASESOR AA, OBSERVACION O
WHERE AA.ASESOR_REVISOR_ID = (SELECT PP.ASESOR FROM PARTICIPANTES_PROYECTO PP WHERE PP.ID =' . $id_participantes . ') AND AA.ARCHIVO_ASESOR_PK NOT IN(SELECT O.ARCHIVO_ASESOR_ID FROM OBSERVACION O) GROUP BY AA.ARCHIVO_ASESOR_PK ORDER BY AA.FECHA_GUARDADO_DOCUMENTO DESC');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    function consulta_revisiones_asesor($id_participantes) {
        $DB2 = $this->load->database('local', TRUE);
//' . $id_participantes . '
        $query = $DB2->query('
            SELECT AA.*,AAL.NOMBRE_ARCHIVO AS NOMBRE_ARCHIVO_ALUMNO FROM ARCHIVO_ASESOR AA, OBSERVACION O,ARCHIVO_ALUMNO AAL
WHERE AA.ASESOR_REVISOR_ID = (SELECT PP.ASESOR FROM PARTICIPANTES_PROYECTO PP WHERE PP.ID = ' . $id_participantes . ') AND AA.ARCHIVO_ASESOR_PK = O.ARCHIVO_ASESOR_ID
AND O.ARCHIVO_ALUMNO_ID = AAL.ARCHIVOS_PK ORDER BY AA.FECHA_GUARDADO_DOCUMENTO DESC');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    function consulta_dictamen($nc,$aid) {
        $DB2 = $this->load->database('local', TRUE);

        $query = $DB2->query('
            SELECT * FROM DICTAMEN_ANTEPROYECTO DA
WHERE DA.NUMERO_CONTROL = \''.$nc.'\' AND DA.ANTEPROYECTO = '.$aid.'');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
  
    function actualizar_titulacion($aid, $titulacion) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->where('anteproyecto_pk', $aid);
        return $DB2->update('anteproyecto', $titulacion);
    }

    function consulta_rfc_asesor($id_asesor_revisor) {
        $DB2 = $this->load->database('local', TRUE);
        $query = $DB2->query('
            SELECT * FROM ASESOR_REVISOR WHERE ASESOR_REVISOR_PK = ' . $id_asesor_revisor . '');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function insertar_archivo_asesor($datos) {
        $DB2 = $this->load->database('local', TRUE);
        if ($DB2->insert('archivo_asesor', $datos)) {
            
            $DB2->select_max('archivo_asesor_pk','id_archivo_asesor');
            $DB2->from('archivo_asesor');            
            $DB2->limit(1);            
            $query = $DB2->get();
        
            return $query->result();                    
        }
        else{
            return false;
        }
    }
    
    function insertar_observacion_asesor($datos) {
        $DB2 = $this->load->database('local', TRUE);
        return $DB2->insert('observacion', $datos);
    }
    
    function actualizar_aprobacion_anteproyecto($aid,$estado) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->where('anteproyecto_pk', $aid);
        return $DB2->update('anteproyecto', $estado);
    }
    function actualizar_archivo_asesorado($archivo_id,$estado) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->where('archivos_pk', $archivo_id);
        return $DB2->update('archivo_alumno', $estado);
    }
    
    function actualizar_bitacora($nc,$estado){
        $DB2 = $this->load->database('local', TRUE);
        $DB2->where('numero_control', $nc);
        return $DB2->update('bitacora_avance_alumno', $estado);
    }
    
    function insertar_archivo_informe($datos){
        $DB2 = $this->load->database('local', TRUE);
        return $DB2->insert('archivo_informe_semestral', $datos);
    }
    
        function obtener_id_carrera($nc) {
        $DB2 = $this->load->database('local', TRUE);
        $DB2->select('id_carrera');
        $DB2->from('alumnos');
        $DB2->where('numero_control', $nc);
                $query = $DB2->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    //+++++++++++++++++++++++REVISOR++++++++++++++++++++++++++++++
    function consulta_alumnos_revision($rfc) {

        $DB2 = $this->load->database('local', TRUE);
        
        $query = $DB2->query('SELECT PP.ID,PP.NUMERO_CONTROL,AL.NOMBRE FROM PARTICIPANTES_PROYECTO PP, ASESOR_REVISOR AR, ALUMNOS AL 
WHERE PP.NUMERO_CONTROL = AL.NUMERO_CONTROL AND PP.REVISOR1 = AR.ASESOR_REVISOR_PK AND AR.ID_DOCENTE = \'' . $rfc . '\' UNION
SELECT PP.ID,PP.NUMERO_CONTROL,AL.NOMBRE FROM PARTICIPANTES_PROYECTO PP, ASESOR_REVISOR AR, ALUMNOS AL 
WHERE PP.NUMERO_CONTROL = AL.NUMERO_CONTROL AND PP.REVISOR2 = AR.ASESOR_REVISOR_PK AND AR.ID_DOCENTE = \'' . $rfc . '\'');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
        

}
