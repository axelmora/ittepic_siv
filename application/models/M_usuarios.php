<?php

class M_usuarios extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function show_usuarios() {
    $DB2 = $this->load->database('local', TRUE);
    $DB2->select('*');
    $DB2->from('usuarios');
    $DB2->order_by('perfil', 'asc');
    $DB2->order_by('alias', 'asc');
    $query = $DB2->get();
    //|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }

  function show_docentes() {
    $DB2 = $this->load->database('local', TRUE);
    $DB2->select('*');
    $DB2->from('docentes');
    $DB2->order_by('departamento', 'asc');
    $query = $DB2->get();
    //|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }

  function actualizar($id, $data) {
    // Inserting in Table(students) of Database(college
    $DB2 = $this->load->database('local', TRUE);
    $DB2->where('id', $id);
    $DB2->update('usuarios', $data);
  }
  function actualizarcontrasena($id, $data) {
    $DB2 = $this->load->database('local', TRUE);
    $DB2->select('pass');
    $DB2->from('usuarios');
    $DB2->where('id', $id);
    $DB2->where('pass', $data['passactual']);
    $query = $DB2->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row)
      {
        //$test1=$data['passactual'];
        if ($data['passactual']==$row->pass) {
          //echo "SON IGUALES PROCEDO A ACTUALIZAR  $row->pass------- $test1 ";
          return true;
          /*
          $DB2 = $this->load->database('local', TRUE);
          $DB2->where('id', $id);
          $DB2->update('usuarios', $data);*/
        }
        else {
          return false;
        }
      }
    } else {
      return false;
    }
  }
  //*****************************RESIDENCIA******************************************************************
  //DOCENTES
  function consulta_info_docente($rfc) {
    $DB2 = $this->load->database('local', TRUE);
    $DB2->select('nombres,apellidos,correo');
    $DB2->from('docentes');
    $DB2->where('rfc', $rfc);
    $query = $DB2->get();

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }
  function consulta_info_administrativo($id) {
    $DB2 = $this->load->database('local', TRUE);
    $DB2->select('*');
    $DB2->from('usuarios');
    $DB2->where('id', $id);
    $query = $DB2->get();
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }

  function consulta_info_alumno($numero_control) {

    $DB2 = $this->load->database('local', TRUE);
    $DB2->select('correo');
    $DB2->from('alumnos');
    $DB2->where('numero_control', $numero_control);
    $query = $DB2->get();

    if ($query->num_rows() == 1) {
      return $query->result();
    } else {
      return false;
    }
  }

  function actualizar_info_administrativo($id, $data) {
    // Inserting in Table(students) of Database(college

    $DB2 = $this->load->database('local', TRUE);
    $DB2->where('id', $id);
    return $DB2->update('usuarios', $data);
  }

  function actualizar_info_docente($rfc, $data) {
    // Inserting in Table(students) of Database(college

    $DB2 = $this->load->database('local', TRUE);
    $DB2->where('rfc', $rfc);
    return $DB2->update('docentes', $data);
  }

  function actualizar_alumno($id, $data) {
    // Inserting in Table(students) of Database(college

    $DB2 = $this->load->database('local', TRUE);
    $DB2->where('numero_control', $id);
    $DB2->update('alumnos', $data);
  }
}

?>
