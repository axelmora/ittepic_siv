<?php
class Logeo extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('login_model');
    $this->load->library(array('session', 'form_validation'));
    $this->load->helper(array('url', 'form'));
    $this->load->database('local');
  }
  //*****************************************************************************************************
  public function index() {
    switch ($this->session->userdata('perfil')) {
      case '':
      $this->load->view('milogeo');
      break;

      case 'coordinadorprogac':
      redirect(base_url().'index.php/Residencia/CoordinadorCarrera/Panel_coordicarrera');
      break;

      case 'coordinadorresidencia':
      redirect(base_url().'index.php/Residencia/CoordinadorResidencia/Panel_coordiresidencia');
      break;

      case 'presidenteacademia':
      redirect(base_url().'index.php/Residencia/PresidenteAcademico/Panel_presidenteacademico');
      break;
      /*  ERROR DE BASE DE DATOS*/
      case 'presidenteacademia ':
      redirect(base_url().'index.php/Residencia/PresidenteAcademico/Panel_presidenteacademico');
      break;
      /* errors  */
      case 'jeferesidencia':
      redirect(base_url().'index.php/Residencia/JefeResidencia/Panel_jeferesidencia');
      break;

      case 'jefeservicio':
      redirect(base_url() . 'index.php/panel_servicio');
      break;

      case 'jefevinculacion':
      redirect(base_url() . 'index.php/panel_vinculacion');
      break;

      case 'directivo':
      redirect(base_url() . 'index.php/panel_directivo');
      break;

      case 'jefeacademico':
      $this->load->helper('file');
      $archivoid=$this->session->userdata('id_usuario');
      $usuario=$this->session->userdata('user_id_archivo');
      $archivo= read_file(FCPATH.'uploads/ss/academico'.$archivoid.'.txt');
      if ($archivo!=false) {
        $REVISION="";
        $int=0;
        $handle = fopen(FCPATH.'uploads/ss/academico'.$archivoid.'.txt', "r");
        while (($line = fgets($handle)) !== false) {
          echo $line."<br>";
          $REVISION[$int]=trim($line);
          $int++;
        }
        $afecha ="".date("Y-m-d");
        $ahora ="".date("H");
        $aminutos ="".date("i");
        $asegundos ="".date("s");
        if ($REVISION[0]!=$usuario) {
          echo "Entra primera revision <br>";
          if ($REVISION[1]==$afecha) {
            echo "Misma fecha <br>";
            if ($ahora!=$REVISION[2]) {
              $idusuarioarchivo=$this->session->userdata('user_id_archivo');
              $fecha ="".date("Y-m-d");
              $hora ="".date("H");
              $minutos ="".date("i");
              $segundos ="".date("s");
              if (write_file(FCPATH.'uploads/ss/academico'.$archivoid.'.txt',$idusuarioarchivo."\n",'w+'))
              {
                write_file(FCPATH.'uploads/ss/academico'.$archivoid.'.txt', $fecha."\n",'a+');
                write_file(FCPATH.'uploads/ss/academico'.$archivoid.'.txt', "".$hora."\n",'a+');
                write_file(FCPATH.'uploads/ss/academico'.$archivoid.'.txt', "".$minutos."\n",'a+');
                write_file(FCPATH.'uploads/ss/academico'.$archivoid.'.txt', "".$segundos."\n",'a+');
                echo 'Se escribio';
              }
              else
              {
                echo "error";
              }
            }
            else{
              $tiempotoal=($aminutos-$REVISION[3]);
              if ($tiempotoal>=2) {
                //echo "TIEMPO EXEDIDO <br>";
                //echo "SE ACTUALIZA";
                $fecha ="".date("Y-m-d");
                $hora ="".date("H");
                $minutos ="".date("i");
                $segundos ="".date("s");
                if (write_file(FCPATH.'uploads/ss/academico'.$archivoid.'.txt',$usuario."\n",'w+'))
                {
                  write_file(FCPATH.'uploads/ss/academico'.$archivoid.'.txt', $fecha."\n",'a+');
                  write_file(FCPATH.'uploads/ss/academico'.$archivoid.'.txt', "".$hora."\n",'a+');
                  write_file(FCPATH.'uploads/ss/academico'.$archivoid.'.txt', "".$minutos."\n",'a+');
                  write_file(FCPATH.'uploads/ss/academico'.$archivoid.'.txt', "".$segundos."\n",'a+');
                  echo 'SE ACTUALIZO!';
                }
                else
                {
                  echo "error";
                }
              }
              else {
              }
            }

          }else {
            $idusuarioarchivo=$this->session->userdata('user_id_archivo');
            $fecha ="".date("Y-m-d");
            $hora ="".date("H");
            $minutos ="".date("i");
            $segundos ="".date("s");
            if (write_file(FCPATH.'uploads/ss/academico'.$archivoid.'.txt',$idusuarioarchivo."\n",'w+'))
            {
              write_file(FCPATH.'uploads/ss/academico'.$archivoid.'.txt', $fecha."\n",'a+');
              write_file(FCPATH.'uploads/ss/academico'.$archivoid.'.txt', "".$hora."\n",'a+');
              write_file(FCPATH.'uploads/ss/academico'.$archivoid.'.txt', "".$minutos."\n",'a+');
              write_file(FCPATH.'uploads/ss/academico'.$archivoid.'.txt', "".$segundos."\n",'a+');
              echo 'Se escribio';
            }
            else
            {
              echo "error";
            }
          }
        }
        fclose($handle);
      }else {
        $idusuarioarchivo=$this->session->userdata('user_id_archivo');
        $fecha ="".date("Y-m-d");
        $hora ="".date("H");
        $minutos ="".date("i");
        $segundos ="".date("s");
        if (write_file(FCPATH.'uploads/ss/academico'.$archivoid.'.txt',$idusuarioarchivo."\n",'w+'))
        {
          write_file(FCPATH.'uploads/ss/academico'.$archivoid.'.txt', $fecha."\n",'a+');
          write_file(FCPATH.'uploads/ss/academico'.$archivoid.'.txt', "".$hora."\n",'a+');
          write_file(FCPATH.'uploads/ss/academico'.$archivoid.'.txt', "".$minutos."\n",'a+');
          write_file(FCPATH.'uploads/ss/academico'.$archivoid.'.txt', "".$segundos."\n",'a+');
          echo 'Se escribio';
        }
        else
        {
          echo "error";
        }
      }
      //  echo '<pre>'; print_r($this->session->all_userdata());exit;
      redirect(base_url() . 'index.php/panel_academico');
      break;
      case 'administrador':
      redirect(base_url() . 'index.php/panel_administrador');
      break;
      case 'docente':
      redirect(base_url() . 'index.php/Residencia/Docente/Panel_docente');
      break;
      default:
      $this->load->view('milogeo');
      break;
    }
  }

  //*****************************************************************************************************
  public function new_user() {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('usuario', 'Usuario', 'required|trim|min_length[1]|max_length[150]');
    $this->form_validation->set_rules('pass', 'Contraseña', 'required|trim|min_length[1]|max_length[150]|callback_a');
    if ($this->form_validation->run() == FALSE) {
      //Field validation failed.  User redirected to login page
      $this->load->view('milogeo');
    } else {
      //Go to private area
      $this->index();
    }
  }
  public function a() {
    $username = $this->input->post('usuario');
    $password = sha1($this->input->post('pass'));
    $check_user = $this->login_model->login_user($username, $password);
    if ($check_user == TRUE) {
      $perfil=str_replace(" ","", $check_user->perfil);// QUITA los espacios del perfil
      $jefearchivo="";
      if ($perfil=="jefeacademico") {
        $jefearchivo="JA".$check_user->id.rand(1,1000);
      }
      $data = array(
        'is_logued_in' => TRUE,
        'id_usuario' => $check_user->id,
        'perfil' =>$perfil,
        'alias' => $check_user->alias,
        'username' => $check_user->usuario,
        'user_id_archivo'=>$jefearchivo,
        'permisoS' => $check_user->permiso_servicio
      );
      $this->session->set_userdata($data);
      // var_dump($check_user);
      return true;
    } else {
      //$this->load->view('notienespermisos');
      $this->form_validation->set_message('a', '<i class="material-icons">error</i> Usuario o contraseña inválida.');
      return false;
    }
  }
  public function logout_ci() {
    $this->session->sess_destroy();
    $this->index();
  }
  //*****************************************************************************************************
}
