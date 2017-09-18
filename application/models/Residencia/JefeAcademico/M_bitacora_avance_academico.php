<?php

class M_bitacora_avance_academico extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function consulta_residentes($departamento) {
    $DB2 = $this->load->database('local', TRUE);
    $query = $DB2->query('SELECT PP.*,AL.NOMBRE FROM PARTICIPANTES_PROYECTO PP, ANTEPROYECTO A, BITACORA_AVANCE_ALUMNO BA, ALUMNOS AL
      WHERE PP.ANTEPROYECTO_FK = A.ANTEPROYECTO_PK AND A.DEPARTAMENTO_ANTEPROYECTO = \'' . $departamento . '\' AND PP.NUMERO_CONTROL = BA.NUMERO_CONTROL AND BA.ESTADO < 6 AND PP.NUMERO_CONTROL = AL.NUMERO_CONTROL');

      if ($query->num_rows() > 0) {
        return $query->result();
      } else {
        return false;
      }
    }
    function consulta_bitacora_residente($id_participantes) {
      $DB2 = $this->load->database('local', TRUE);
      $query = $DB2->query('
      SELECT PP.*,A.*,AP.*,S.SEMESTRE, C.CARRERA, E.EMPRESA_PK, E.NOMBRE_EMPRESA
      FROM PARTICIPANTES_PROYECTO PP,ALUMNOS A, ANTEPROYECTO AP, SEMESTRE S, CARRERAS C, EMPRESA E
      WHERE PP.ID ='. $id_participantes .' AND PP.NUMERO_CONTROL = A.NUMERO_CONTROL AND AP.ANTEPROYECTO_PK = PP.ANTEPROYECTO_FK AND A.ID_SEMESTRE = S.ID_SEMESTRE AND A.ID_CARRERA = C.ID_CARRERA AND E.EMPRESA_PK = AP.EMPRESA_FK');
      if ($query->num_rows() > 0) {
        return $query->result();
      } else {
        return false;
      }
    }
    function consulta_bitacora_residente_control($id_participantes) {
      $DB2 = $this->load->database('local', TRUE);
      $query = $DB2->query("
      Select PP.ID from ALUMNOS A,PARTICIPANTES_PROYECTO PP where
      A.NUMERO_CONTROL=PP.NUMERO_CONTROL AND PP.NUMERO_CONTROL='".$id_participantes."  ' ;
      ");
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

    function consulta_archivos_residente($id_participantes) {
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
      //
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

    function consulta_dictamen($id_participantes) {
      $DB2 = $this->load->database('local', TRUE);

      $query = $DB2->query('
      SELECT D.* FROM DICTAMEN_ANTEPROYECTO D, PARTICIPANTES_PROYECTO PP
      WHERE D.NUMERO_CONTROL = PP.NUMERO_CONTROL AND D.ANTEPROYECTO = PP.ANTEPROYECTO_FK AND PP.ID = ' . $id_participantes . '');

      if ($query->num_rows() > 0) {
        return $query->result();
      } else {
        return false;
      }
    }

    function actualizar_dictamen($aid, $nc, $data) {
      $DB2 = $this->load->database('local', TRUE);
      $DB2->where('anteproyecto', $aid);
      $DB2->where('numero_control', $nc);
      return $DB2->update('dictamen_anteproyecto', $data);
    }

    //++++++++++++++cancelar residencia++++++++++++++++++++++++++++
    function cr_dictamen_anteproyecto($nc, $aid) {
      $DB2 = $this->load->database('local', TRUE);
      $DB2->where('numero_control', $nc);
      $DB2->where('anteproyecto', $aid);
      $DB2->delete('dictamen_anteproyecto');
    }

    function cr_solicitud_proyecto($nc, $aid) {
      $DB2 = $this->load->database('local', TRUE);
      $DB2->where('numero_control', $nc);
      $DB2->where('anteproyecto_id', $aid);
      $DB2->delete('solicitud_proyecto');
    }

    function cr_bitacora($nc) {
      $DB2 = $this->load->database('local', TRUE);
      $DB2->where('numero_control', $nc);
      $DB2->delete('bitacora_avance_alumno');
    }
    function cr_atencion($nc) {
      $DB2 = $this->load->database('local', TRUE);
      $DB2->where('numero_control', $nc);
      $DB2->delete('atencion_medica');
    }

    function cr_archivo_alumno($nc) {//elimiar archivos antes de eliminar la tabla
      $DB2 = $this->load->database('local', TRUE);
      $DB2->where('numero_control_fk', $nc);
      $DB2->delete('archivo_alumno');
    }

    function cr_archivo_asesor($asesor_revisor_id) {//elimiar archivos antes de eliminar la tabla
      $DB2 = $this->load->database('local', TRUE);
      $DB2->where('asesor_revisor_id', $asesor_revisor_id);
      $DB2->delete('archivo_asesor');
    }

    function cr_observacion($asesor_revisor_id) {
      $DB2 = $this->load->database('local', TRUE);
      $DB2->where('id_asesor_revisor', $asesor_revisor_id);
      $DB2->delete('observacion');
    }

    function cr_asesor_revisor($asesor_revisor_id) {
      $DB2 = $this->load->database('local', TRUE);
      $DB2->where('asesor_revisor_pk', $asesor_revisor_id);
      $DB2->delete('asesor_revisor');
    }

    function cr_asesor_externo($aseore_id) {
      $DB2 = $this->load->database('local', TRUE);
      $DB2->where('asesor_externopk', $aseore_id);
      $DB2->delete('asesor_externo');
    }

    function cr_participantes_proyecto($pp) {
      $DB2 = $this->load->database('local', TRUE);
      $DB2->where('id', $pp);
      $DB2->delete('participantes_proyecto');
    }

    function cr_anteproyecto($aid) {
      $DB2 = $this->load->database('local', TRUE);
      $DB2->where('anteproyecto_pk', $aid);
      $DB2->delete('anteproyecto');
    }
    function cr_update_anteproyecto($aid,$datos) {
      $DB2 = $this->load->database('local', TRUE);
      $DB2->where('anteproyecto_pk', $aid);
      $DB2->update('anteproyecto',$datos);
    }

    function archivos_docente_rutas($id_asesor) {
      $DB2 = $this->load->database('local', TRUE);
      $DB2->select('ruta_archivo_asesor');
      $DB2->from('archivo_asesor');
      $DB2->where('asesor_revisor_id', $id_asesor);
      $query = $DB2->get();
      if ($query->num_rows() > 0) {
        return $query->result();
      } else {
        return false;
      }
    }

    function consulta_banco($ida) {
      $DB2 = $this->load->database('local', TRUE);
      $DB2->select('banco,lugares_disponibles,residentes_requeridos');
      $DB2->from('anteproyecto');
      $DB2->where('anteproyecto_pk', $ida);
      $query = $DB2->get();
      if ($query->num_rows() > 0) {
        return $query->result();
      } else {
        return false;
      }
    }
    function consulta_archivos_viejos_alumno($fecha) {
      $DB2 = $this->load->database('local', TRUE);
      $DB2->select('ruta_archivo');
      $DB2->from('archivo_alumno');
      $DB2->where('fecha_guardado_documento <',$fecha);

      $query = $DB2->get();
      if ($query->num_rows() > 0) {
        return $query->result();
      } else {
        return false;
      }
    }

    function consulta_archivos_viejos_docente($fecha) {
      $DB2 = $this->load->database('local', TRUE);
      $DB2->select('ruta_archivo_asesor');
      $DB2->from('archivo_asesor');
      $DB2->where('fecha_guardado_documento <',$fecha);

      $query = $DB2->get();
      if ($query->num_rows() > 0) {
        return $query->result();
      } else {
        return false;
      }
    }
  }
