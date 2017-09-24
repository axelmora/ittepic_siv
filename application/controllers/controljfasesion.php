<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class controljfasesion extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->helper('file');
    }
    public function index() {
      if ($this->session->userdata('perfil')=='jefeacademico') {
        echo '<pre>'; print_r($this->session->all_userdata());
        $archivoid=$this->session->userdata('id_usuario');
        $user_id_archivo=$this->session->userdata('user_id_archivo');
        $handle = fopen(FCPATH.'uploads/ss/academico'.$archivoid.'.txt', "r");
        $REVISION="";
        $int=0;
        while (($line = fgets($handle)) !== false) {
          echo $line."<br>";
          $REVISION[$int]=trim($line);
          $int++;
        }
        fclose($handle);
        $afecha ="".date("Y-m-d");
        $ahora ="".date("H");
        $aminutos ="".date("i");
        $asegundos ="".date("s");
        if (trim ($REVISION[0])==$user_id_archivo) {
          /*actualizar */
          echo "SE ACTUALIZA";
          $fecha ="".date("Y-m-d");
          $hora ="".date("H");
          $minutos ="".date("i");
          $segundos ="".date("s");
          //  echo "ID:".$archivoid."<br>";
          if (write_file(FCPATH.'uploads/ss/academico'.$archivoid.'.txt',$user_id_archivo."\n",'w+'))
          {
            write_file(FCPATH.'uploads/ss/academico'.$archivoid.'.txt', $fecha."\n",'a+');
            write_file(FCPATH.'uploads/ss/academico'.$archivoid.'.txt', "".$hora."\n",'a+');
            write_file(FCPATH.'uploads/ss/academico'.$archivoid.'.txt', "".$minutos."\n",'a+');
            write_file(FCPATH.'uploads/ss/academico'.$archivoid.'.txt', "".$segundos."\n",'a+');
          //  echo 'SE ACTUALIZO!';
          }
          else
          {
            //echo "error";
          }
        }else {
          echo "SE verifica <br>";
          if (trim($afecha)==$REVISION[1]) {
            if ($ahora==$REVISION[2]) {
              $tiempotoal=($aminutos-$REVISION[3]);
              echo "t:".$tiempotoal;
              if ($tiempotoal>=2) {
              //  echo "SE ACTUALIZA";
                $fecha ="".date("Y-m-d");
                $hora ="".date("H");
                $minutos ="".date("i");
                $segundos ="".date("s");
                //  echo "ID:".$archivoid."<br>";
                if (write_file(FCPATH.'uploads/ss/academico'.$archivoid.'.txt',$user_id_archivo."\n",'w+'))
                {
                  write_file(FCPATH.'uploads/ss/academico'.$archivoid.'.txt', $fecha."\n",'a+');
                  write_file(FCPATH.'uploads/ss/academico'.$archivoid.'.txt', "".$hora."\n",'a+');
                  write_file(FCPATH.'uploads/ss/academico'.$archivoid.'.txt', "".$minutos."\n",'a+');
                  write_file(FCPATH.'uploads/ss/academico'.$archivoid.'.txt', "".$segundos."\n",'a+');
                  echo 'SE ACTUALIZO!';
                }
                else
                {
                //  echo "error";
                }
              }else {
                //    echo "DUPLICADO";
              }
            }else {
              //echo "Error 1";
            }
          }
        }
      }
    }
}
