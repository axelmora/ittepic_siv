<?php

class M_coordi_res extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function docentes_por_departamento($departamento){
    $DB2 = $this->load->database('local', TRUE);
    $DB2->select('*');
    $DB2->from('docentes');
    $DB2->where('departamento', $departamento);
    $DB2->order_by('nombres', 'asc');
    $query = $DB2->get();
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }
  function docentes_por_departamentocompartido($departamento){
    $rfcdocentescompartidos;
    $DB2 = $this->load->database('local', TRUE);
    $query1 =  $DB2->query("SELECT DISTINCT id_docente FROM ASESOR_REVISOR AR;");
    if ($query1->num_rows() > 0) {
      foreach ($query1->result() as $row)
      {
      //  echo "1<BR>";
      //  echo ":c  ".$row->id_docente;
        $query2 =  $DB2->query("SELECT * FROM DOCENTES WHERE RFC='".$row->id_docente."' AND DEPARTAMENTO !='".$departamento."';");
        if ($query2->num_rows() > 0) {
          foreach ($query2->result() as $row1)
          {
            //echo "string";
            $rfcdocentescompartidos[] =(object) array( "rfc" => $row1->rfc, "nombres" => $row1->nombres, "apellidos" => $row1->apellidos);
          }
        } else {
        //  echo "2<BR>";
        }
      }
        if (count($query1) > 0) {
      //    echo $rfcdocentescompartidos->rfc;
          return $rfcdocentescompartidos;
        }
        else {
        return false;
        }
    } else {
      return false;
    }
  }

  function parti_asesor($rfc,$departamento) {
    $DB2 = $this->load->database('local', TRUE);
    $query = $DB2->query('
    SELECT  D.RFC,PP.ASESOR,A.NOMBRE_PROYECTO
    FROM PARTICIPANTES_PROYECTO PP,BITACORA_AVANCE_ALUMNO BA, ASESOR_REVISOR AR, DOCENTES D,ANTEPROYECTO A
    WHERE PP.NUMERO_CONTROL = BA.NUMERO_CONTROL AND BA.ESTADO != 6 AND PP.ANTEPROYECTO_FK = A.ANTEPROYECTO_PK
    AND AR.ASESOR_REVISOR_PK = PP.ASESOR AND AR.ID_DOCENTE = \''.$rfc.'\' AND AR.ID_DOCENTE = D.RFC '
    . 'AND D.DEPARTAMENTO = \''.$departamento.'\'');

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }

  function parti_revisor1($rfc,$departamento) {
    $DB2 = $this->load->database('local', TRUE);
    $query = $DB2->query('
    SELECT  D.RFC,PP.REVISOR1,A.NOMBRE_PROYECTO
    FROM PARTICIPANTES_PROYECTO PP,BITACORA_AVANCE_ALUMNO BA, ASESOR_REVISOR AR, DOCENTES D,ANTEPROYECTO A
    WHERE PP.NUMERO_CONTROL = BA.NUMERO_CONTROL
    AND BA.ESTADO != 6 AND PP.ANTEPROYECTO_FK = A.ANTEPROYECTO_PK AND AR.ASESOR_REVISOR_PK = PP.REVISOR1
    AND AR.ID_DOCENTE = \''.$rfc.'\' AND AR.ID_DOCENTE = D.RFC AND D.DEPARTAMENTO = \''.$departamento.'\'');

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }

  function parti_revisor2($rfc,$departamento) {
    $DB2 = $this->load->database('local', TRUE);
    $query = $DB2->query('
    SELECT  D.RFC,PP.REVISOR2,A.NOMBRE_PROYECTO
    FROM PARTICIPANTES_PROYECTO PP,BITACORA_AVANCE_ALUMNO BA, ASESOR_REVISOR AR, DOCENTES D,ANTEPROYECTO A
    WHERE PP.NUMERO_CONTROL = BA.NUMERO_CONTROL
    AND BA.ESTADO != 6 AND PP.ANTEPROYECTO_FK = A.ANTEPROYECTO_PK AND AR.ASESOR_REVISOR_PK = PP.REVISOR2
    AND AR.ID_DOCENTE = \''.$rfc.'\' AND AR.ID_DOCENTE = D.RFC AND D.DEPARTAMENTO = \''.$departamento.'\'');

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }
/* docente compartido!*/
  function parti_asesorc($rfc,$departamento) {
    $DB2 = $this->load->database('local', TRUE);
    $query = $DB2->query('
    SELECT  D.RFC,PP.ASESOR,A.NOMBRE_PROYECTO
    FROM PARTICIPANTES_PROYECTO PP,BITACORA_AVANCE_ALUMNO BA, ASESOR_REVISOR AR, DOCENTES D,ANTEPROYECTO A
    WHERE PP.NUMERO_CONTROL = BA.NUMERO_CONTROL AND BA.ESTADO != 6 AND PP.ANTEPROYECTO_FK = A.ANTEPROYECTO_PK
    AND AR.ASESOR_REVISOR_PK = PP.ASESOR AND AR.ID_DOCENTE = \''.$rfc.'\' AND AR.ID_DOCENTE = D.RFC');

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }
  function parti_revisor1c($rfc,$departamento) {
    $DB2 = $this->load->database('local', TRUE);
    $query = $DB2->query('
    SELECT  D.RFC,PP.REVISOR1,A.NOMBRE_PROYECTO
    FROM PARTICIPANTES_PROYECTO PP,BITACORA_AVANCE_ALUMNO BA, ASESOR_REVISOR AR, DOCENTES D,ANTEPROYECTO A
    WHERE PP.NUMERO_CONTROL = BA.NUMERO_CONTROL
    AND BA.ESTADO != 6 AND PP.ANTEPROYECTO_FK = A.ANTEPROYECTO_PK AND AR.ASESOR_REVISOR_PK = PP.REVISOR1
    AND AR.ID_DOCENTE = \''.$rfc.'\' AND AR.ID_DOCENTE = D.RFC');

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }

  function parti_revisor2c($rfc,$departamento) {
    $DB2 = $this->load->database('local', TRUE);
    $query = $DB2->query('
    SELECT  D.RFC,PP.REVISOR2,A.NOMBRE_PROYECTO
    FROM PARTICIPANTES_PROYECTO PP,BITACORA_AVANCE_ALUMNO BA, ASESOR_REVISOR AR, DOCENTES D,ANTEPROYECTO A
    WHERE PP.NUMERO_CONTROL = BA.NUMERO_CONTROL
    AND BA.ESTADO != 6 AND PP.ANTEPROYECTO_FK = A.ANTEPROYECTO_PK AND AR.ASESOR_REVISOR_PK = PP.REVISOR2
    AND AR.ID_DOCENTE = \''.$rfc.'\' AND AR.ID_DOCENTE = D.RFC ');

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }
/* fin docente compartido*/

  //++++++++++++++++borrar+++++++++++++++++++++
  function info_proyectos_jacademico($departamento) {
    $DB2 = $this->load->database('local', TRUE);
    $query = $DB2->query('
    SELECT PP.ID,A.NOMBRE_PROYECTO FROM ANTEPROYECTO A,
    PARTICIPANTES_PROYECTO PP
    WHERE A.ANTEPROYECTO_PK = PP.ANTEPROYECTO_FK
    AND A.DEPARTAMENTO_ANTEPROYECTO = \''.$departamento.'\'');

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }

  function info_proyectos_asesor($rfc) {
    $DB2 = $this->load->database('local', TRUE);
    $query = $DB2->query('
    SELECT PP.ID,A.NOMBRE_PROYECTO FROM ANTEPROYECTO A,
    PARTICIPANTES_PROYECTO PP, ASESOR_REVISOR AR
    WHERE A.ANTEPROYECTO_PK = PP.ANTEPROYECTO_FK
    AND AR.ID_DOCENTE = \''.$rfc.'\' AND AR.ASESOR_REVISOR_PK = PP.ASESOR');

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }
  function info_proyectos_revisor($rfc) {
    $DB2 = $this->load->database('local', TRUE);
    $query = $DB2->query('
    SELECT PP.ID,A.NOMBRE_PROYECTO FROM ANTEPROYECTO A,
    PARTICIPANTES_PROYECTO PP, ASESOR_REVISOR AR
    WHERE A.ANTEPROYECTO_PK = PP.ANTEPROYECTO_FK
    AND AR.ID_DOCENTE = \''.$rfc.'\' AND AR.ASESOR_REVISOR_PK = PP.REVISOR1
    UNION
    SELECT PP.ID,A.NOMBRE_PROYECTO FROM ANTEPROYECTO A,
    PARTICIPANTES_PROYECTO PP, ASESOR_REVISOR AR
    WHERE A.ANTEPROYECTO_PK = PP.ANTEPROYECTO_FK
    AND AR.ID_DOCENTE = \''.$rfc.'\' AND AR.ASESOR_REVISOR_PK = PP.REVISOR2');

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }

  function info_asesor($idp) {
    $DB2 = $this->load->database('local', TRUE);
    $query = $DB2->query('
    SELECT PP.ID,PP.ASESOR,D.NOMBRES, D.APELLIDOS, D.CORREO,AR.TIPO
    FROM PARTICIPANTES_PROYECTO PP, DOCENTES D, ASESOR_REVISOR AR
    WHERE PP.ID = '.$idp.' AND D.RFC = AR.ID_DOCENTE AND AR.ASESOR_REVISOR_PK = PP.ASESOR');

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }
  function info_revisor1($idp) {
    $DB2 = $this->load->database('local', TRUE);
    $query = $DB2->query('
    SELECT PP.ID,PP.REVISOR1,D.NOMBRES, D.APELLIDOS, D.CORREO,AR.TIPO
    FROM PARTICIPANTES_PROYECTO PP, DOCENTES D, ASESOR_REVISOR AR
    WHERE PP.ID = '.$idp.' AND D.RFC = AR.ID_DOCENTE AND AR.ASESOR_REVISOR_PK = PP.REVISOR1');

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }
  function info_revisor2($idp) {
    $DB2 = $this->load->database('local', TRUE);
    $query = $DB2->query('
    SELECT PP.ID,PP.REVISOR2,D.NOMBRES, D.APELLIDOS, D.CORREO,AR.TIPO
    FROM PARTICIPANTES_PROYECTO PP, DOCENTES D, ASESOR_REVISOR AR
    WHERE PP.ID = '.$idp.' AND D.RFC = AR.ID_DOCENTE AND AR.ASESOR_REVISOR_PK = PP.REVISOR2');

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }
  function info_asesor_externo($idp) {
    $DB2 = $this->load->database('local', TRUE);
    $query = $DB2->query('
    SELECT AE.* FROM ASESOR_EXTERNO AE,PARTICIPANTES_PROYECTO PP
    WHERE PP.ID = '.$idp.' AND AE.ASESOR_EXTERNOPK = PP.ASESOR_EXTERNO
    AND AE.ANTEPROYECTO_FK = PP.ANTEPROYECTO_FK');

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }
  function info_residente($idp) {
    $DB2 = $this->load->database('local', TRUE);
    $query = $DB2->query('
    SELECT A.NUMERO_CONTROL,A.NOMBRE,A.CORREO
    FROM ALUMNOS A, PARTICIPANTES_PROYECTO PP
    WHERE PP.ID = '.$idp.' AND A.NUMERO_CONTROL = PP.NUMERO_CONTROL');

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }

  //******************************borrar de aqui para abajo*****************
  function mostrar_vacantes($departamento) {
    $DB2 = $this->load->database('local', TRUE);
    $DB2->select('*');
    $DB2->from('vacantes_residencia');
    $DB2->where('carreras', $departamento);
    $DB2->order_by('fecha_vacante', 'desc');
    $query = $DB2->get();
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }

  function mostrar_empresas() {

    $DB2 = $this->load->database('local', TRUE);
    $DB2->select('*');
    $DB2->from('empresa');
    $query = $DB2->get();

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }

  function inserta_vacante($data) {
    $DB2 = $this->load->database('local', TRUE);
    $DB2->insert('vacantes_residencia', $data);
  }

  function elimina_vacante($idvacante) {
    $DB2 = $this->load->database('local', TRUE);
    $DB2->where('id_vacante', $idvacante);
    $DB2->delete('vacantes_residencia');
  }

}
