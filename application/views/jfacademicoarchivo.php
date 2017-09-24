<?php
if ($this->session->userdata('perfil')=='jefeacademico') {
  $this->load->helper('file');
  //echo '<pre>'; print_r($this->session->all_userdata());
  $archivoid=$this->session->userdata('id_usuario');
  $user_id_archivo=$this->session->userdata('user_id_archivo');
  $handle = fopen(FCPATH.'uploads/ss/academico'.$archivoid.'.txt', "r");
  $REVISION="";
  $int=0;
  while (($line = fgets($handle)) !== false) {
  //  echo $line."<br>";
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
      //echo "error";
    }
  }else {
    //echo "SE verifica <br>";
    if (trim($afecha)==$REVISION[1]) {
      if ($ahora==$REVISION[2]) {
        $tiempotoal=($aminutos-$REVISION[3]);
      //  echo "t:".$tiempotoal;
        if ($tiempotoal>=2) {
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
            echo 'SE ACTUALIZO!';
          }
          else
          {
          //  echo "error";
          }
        }else {
          //    echo "DUPLICADO";
          ?>
          <script>
          $(document).ready(function(){
            $('.tooltipped').tooltip({delay: 50});
            Materialize.toast('<i class="material-icons">error</i><b>ALERTA</b> Existe una sesion iniciada con este mismo usuario',99999);
          });
          </script>
          <?php
        }
      }else {
      //  echo "Error 1";
      }
    }
  }
?>
<script>
setInterval(function(){
  //alert("Hello");
  jQuery.ajax({
    type:"post",
    url: "<?php echo base_url(); ?>index.php/controljfasesion/",
    success: function(data) {
    },
    error: function(data) {
        alert("error");
    },
  });
}, 10000);
</script>

<?php
}
?>
