<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Adjuntar_descargar extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->helper(array('form', 'url'));
    $this->load->helper('download');
    $this->load->helper('path');
  }
  public function index() {
    //$this->load->view('upload_form', array('error' => ' '));
  }
  public function do_upload($perfil, $datos) {//recibir el numero de control y perfil para ver donde se guardara el archivo
    ////set_realpath('./uploads/peliculas/'.$idp."/");
    //retorna el directorio en el servidor /var/www/proyecto/[B]uploads/peliculas/10[/B]
    //para dentro de application //set_realpath('./application/uploads/peliculas/'.$idp."/");
    //    /uploads
    //	/residentes
    //		/numero_control
    //	/administrativos
    //		/banco_proyectos
    //		/bases_concertacion
    //	/docentes
    //		/rfc

    switch ($perfil) {
      case 'docentes':
      $dir = set_realpath('./uploads/docentes/' . $datos . '/');//$datos es numero de control

      break;
      case 'jefeacademico':
      $dir = set_realpath('./uploads/administrativos/banco_proyectos/');

      break;
      case 'jefevinculacion':
      $dir = set_realpath('./uploads/administrativos/bases_concertacion/');

      break;
      case 'residentes':
      $dir = set_realpath('./uploads/residentes/' . $datos . '/');//$datos es el rfc

      break;

      default:
      $dir = set_realpath('./uploads/');
      break;
    }
    if (!is_dir($dir)) {
      //mkdir($dir);
      mkdir($dir,0777,true);
    }
    $config['upload_path'] = $dir;
    $config['allowed_types'] = 'doc|docx|pdf';
    $config['max_size'] = 100000;
    $this->load->library('upload', $config);
    if (!$this->upload->do_upload('userfile')) {//userfile es el nombre del form field
      $error = array('error' => $this->upload->display_errors());
      return $error;
      //$this->load->view('upload_form', $error);
    } else {
      //$data = array('upload_data' => $this->upload->data());
      return $dir;
      //$this->load->view('upload_success', $data);
    }
  }
  public function download($ruta_archivo) {
    force_download($ruta_archivo, NULL);
    //force_download('./uploads/Untitled_Untitled_1.docx', NULL);
  }
}
?>
