<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_alumnos_pdf extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_alumnos_pdf');
        $this->load->model('m_tarjeta');
    }

    public function index() {

        $this->load->view('v_alumnos_pdf', $data);
    }

    public function generar2() {

        $this->load->library('Pdf');
        $resolution = array(216, 279);
        $pdf = new Pdf('P', 'mm', $resolution, true, 'UTF-8', false);

        $pdf->SetAuthor('Diego Alberto');
        $pdf->SetTitle('Instituto Tecnologico de Tepic');
        $pdf->SetSubject('Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        $image_file = 'sin.png';

// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config_alt.php de libraries/config
        $pdf->SetHeaderData($image_file, PDF_HEADER_LOGO_WIDTH, 'Instituto Tecnologico de Tepic', 's');



// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));


// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);


// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//relación utilizada para ajustar la conversión de los píxeles
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


// ---------------------------------------------------------
// establecer el modo de fuente por defecto
        $pdf->setFontSubsetting(true);

// Establecer el tipo de letra
//Si tienes que imprimir carácteres ASCII estándar, puede utilizar las fuentes básicas como
// Helvetica para reducir el tamaño del archivo.
        $pdf->SetFont('helvetica', '', 10);

// Añadir una página
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(true);
// Este método tiene varias opciones, consulta la documentación para más información.
        $pdf->AddPage();

//fijar efecto de sombra en el texto
        $pdf->setTextShadow(array('disabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

// Establecemos el contenido para imprimir
        $id = $this->input->post('id');
        $result = $this->m_alumnos_pdf->show_data_by_id($id);

        $data['datosjefev'] = $this->m_alumnos_pdf->show_nombreJV();
        foreach ($data['datosjefev'] as $m) {

            $jefevinculacion = $m->nombre_usuariosistema;
            $jvinculacion = strtoupper($jefevinculacion);
        }

        $data['alumno'] = $result;

        foreach ($data['alumno'] as $item) {

            $idsolicitud = $item->id_solicitud;
        }



        $result = $this->m_alumnos_pdf->show_actividades_by_id($idsolicitud);
        $data['actividades'] = $result;

        $imgdata = base64_decode('iVBORw0KGgoAAAANSUhEUgAAABwAAAASCAMAAAB/2U7WAAAABlBMVEUAAAD///+l2Z/dAAAASUlEQVR4XqWQUQoAIAxC2/0vXZDrEX4IJTRkb7lobNUStXsB0jIXIAMSsQnWlsV+wULF4Avk9fLq2r8a5HSE35Q3eO2XP1A1wQkZSgETvDtKdQAAAABJRU5ErkJggg==');


        //preparamos y maquetamos el contenido a crear

        $pdf->Image(K_PATH_IMAGES . 'sin.png', 15, 0, 180, 40, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);
        $pdf->Image(K_PATH_IMAGES . 'abajo1.png', 15, 230, 180, 40, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);

        $tbl = <<<EOD
<table border="0" align="left" >
DATOS PERSONALES
</table>
EOD;

        $pdf->writeHTML($tbl, true, false, false, false, '');

        $html = '';




        foreach ($data['alumno'] as $item) {


// -----------------------------------------------------------------------------
// NON-BREAKING ROWS (nobr="true")

            $tbl = <<<EOD
<table border="1" align="left" >

 <tr nobr="true">
  <td colspan="3">
  <br>&nbsp;
                        	<br>
                        	Nombre completo: <u>$item->nombre</u>
                        	<br>
                        	Sexo:<u>$item->sexo</u>
                        	Teléfono: <u>$item->telefono</u>
                        	Domicilio: <u>$item->domicilio</u>
                        	<br>
                        	<br>
                        	ESCOLARIDAD
                        	<br>
                            No. de control: <u>$item->numero_control</u>
                           
                            Carrera: <u>$item->carrera</u>
                            <br>
                            Periodo: <u>$item->semestre</u>
                            
                            Semestre: <u>$item->semestre_cursado</u>
                            
                            Tipo de plan: <u>$item->plan_estudios</u>
                            <br>
  </td>

 </tr>
</table>
EOD;

            $pdf->writeHTML($tbl, true, false, false, false, '');


            $tbl = <<<EOD
<table border="0" align="left" >
DATOS DEL PROGRAMA
</table>
EOD;

            $pdf->writeHTML($tbl, true, false, false, false, '');




            $tbl = <<<EOD
<table border="1" align="left" >

 <tr nobr="true">
  <td colspan="3">
  <br>&nbsp;<br>&nbsp;
                           Dependencia Oficial: <u>$item->nombre_instancia</u>
                           
                           Telefono: <u>$item->telefono_instancia</u>
                           <br> 
                           Titular de la Dependencia: <u>$item->titular_instancia</u>
                           <br>
                           Puesto ó cargo: <u>$item->puesto_titular_instancia</u>
                           <br> 
                           Unidad orgánica ó Departamento: <u>$item->departamento</u>
                           <br>
                           Nombre del encargado: <u>$item->nombre_encargado</u>
                           
                           Correo electónico: <u>$item->correo_encargado</u>
                           <br>
                           Nombre del Programa: <u>$item->nombre_programa</u>
                           <br>
                           Modalidad: <u>$item->modalidad</u>
                           
                           Fecha de inicio: <u>$item->fecha_inicio</u>
                           <br>
                          
						   
						   </td>

 </tr>
</table>
EOD;

            $pdf->writeHTML($tbl, true, false, false, false, '');
        }


        if ($data['actividades'] == 0) {


            $tbl = <<<EOD
			<table border="1" align="left" >

 			<tr nobr="true">
  			<td colspan="3">
  			<br>&nbsp;<br>&nbsp;
  			
  			<font color="red">&nbsp;  No hay actividades registradas para este programa.</font>
  	                        
                           
						   
						   <br>
  </td>
 </tr>
</table>
EOD;

            $pdf->writeHTML($tbl, true, false, false, false, '');
        } else {
            $html = '';
            $html .= "<style type=text/css>";
            $html .= "table{border: 1px solid black}";

            $html .= "</style>";
            $html .= "<table width='100%'>";
            $html .= "<tr><th>Actividades:</th></tr>";
            foreach ($data['actividades'] as $item) {
                $html .= "<tr><td>" . "&nbsp;" . $item->descripcion_act . "</td></tr>";
            }
            $html .= "</table>";

            $pdf->writeHTML($html, true, false, false, false, '');
        }


        foreach ($data['alumno'] as $item) {
            $tbl = <<<EOD
<table border="1" align="left" >

 <tr nobr="true">
  <td colspan="3">
                      <br>&nbsp;<br>&nbsp;     
                           Tipo de programa:
						   <u>$item->nombre_tipoprograma</u>
						   <br>
  </td>
 </tr>
</table>
EOD;

            $pdf->writeHTML($tbl, true, false, false, false, '');


            $tbl = <<<EOD
<table border="0" align="left" >
PARA USO EXCLUSIVO DE LA OFICINA DE SERVICIO SOCIAL
</table>
EOD;

            $pdf->writeHTML($tbl, true, false, false, false, '');



            $tbl = <<<EOD
<table border="1" align="left" >

 <tr nobr="true">
  <td colspan="3">
  <br>
                        	<br>
                        	ACEPTADO: SI ( ) NO ( ) MOTIVO: _____________________________________________________________
                        	<br> 	
                        	<br>
                        	OBSERVACIONES: _________________________________________________________________________
                        	<br>    __________________________________________________________________________________________
                        	<br>
  </td>

 </tr>
</table>
EOD;

            $pdf->writeHTML($tbl, true, false, false, false, '');


            $tbl = <<<EOD
<table border="0" align="left" >

 <tr nobr="true">
  <td colspan="3">
  <br>
                        	
  </td>

 </tr>
</table>
EOD;

            $pdf->writeHTML($tbl, true, false, false, false, '');

            $tbl = <<<EOD
<table border="0" align="left" >

 <tr nobr="true">
  <td colspan="3">
  <br>
                        	
  </td>

 </tr>
</table>
EOD;

            $pdf->writeHTML($tbl, true, false, false, false, '');

            $tbl = <<<EOD
<table border="0" align="left" >

 <tr nobr="true">
  <td colspan="3">
  <br>
                        	
  </td>

 </tr>
</table>
EOD;

            $pdf->writeHTML($tbl, true, false, false, false, '');

            $tbl = <<<EOD
<table border="0" align="center" >

 <tr nobr="true">
  <td colspan="3">
  <br>
                        	
                        	_______________________________________<br>Firma Solicitante
  </td>

 </tr>
</table>
EOD;

            $pdf->writeHTML($tbl, true, false, false, false, '');
// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------
// -----------------------------SEGUNDA HOJA------------------------------------
// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------		
        }


        $pdf->AddPage();

//fijar efecto de sombra en el texto
        $pdf->setTextShadow(array('disabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

// Establecemos el contenido para imprimir
        $id = $this->input->post('id');
        $result = $this->m_alumnos_pdf->show_data_by_id($id);



        $imgdata = base64_decode('iVBORw0KGgoAAAANSUhEUgAAABwAAAASCAMAAAB/2U7WAAAABlBMVEUAAAD///+l2Z/dAAAASUlEQVR4XqWQUQoAIAxC2/0vXZDrEX4IJTRkb7lobNUStXsB0jIXIAMSsQnWlsV+wULF4Avk9fLq2r8a5HSE35Q3eO2XP1A1wQkZSgETvDtKdQAAAABJRU5ErkJggg==');


        //preparamos y maquetamos el contenido a crear

        $pdf->Image(K_PATH_IMAGES . 'sin2.png', 15, 0, 180, 40, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);
        $pdf->Image(K_PATH_IMAGES . 'abajo2.png', 15, 230, 180, 40, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);

        $tbl = <<<EOD
<table border="0" align="left" >
DATOS DEL PRESTADOR DE SERVICIO SOCIAL
</table>
EOD;

        $pdf->writeHTML($tbl, true, false, false, false, '');

        $html = '';

        foreach ($result as $item) {


// -----------------------------------------------------------------------------
// NON-BREAKING ROWS (nobr="true")

            $tbl = <<<EOD
<table border="1" align="left" >

 <tr nobr="true">
  <td colspan="3">
  <br>&nbsp;
                        	<br>
                        	Nombre completo: <u>$item->nombre</u> Sexo:<u>$item->sexo</u>
                        	<br>
                        	
                        	
                        	Domicilio: <u>$item->domicilio</u>
                        	Teléfono: <u>$item->telefono</u>
                        	<br>
                        
                        	<br>
                           
                           
                            Carrera: <u>$item->carrera</u> Semestre: <u>$item->semestre_cursado</u>
                            <br>
                            
                             No. de control: <u>$item->numero_control</u> No. de creditos cubiertos: <u>$item->creditos</u>
                             
                           
                            <br>
  </td>

 </tr>
</table>
EOD;

            $pdf->writeHTML($tbl, true, false, false, false, '');


            $tbl = <<<EOD
<table border="0" align="left" >
DATOS DEL PROGRAMA
</table>
EOD;

            $pdf->writeHTML($tbl, true, false, false, false, '');

            $tbl = <<<EOD
<table border="1" align="left" >
 <tr nobr="true">
  <td> Nombre del Programa: <u>$item->nombre_programa</u> </td>
  <td> Objetivo del Programa: <u>$item->objetivo_programa</u> </td>
  
 </tr>
</table>

  
  
   
EOD;

            $pdf->writeHTML($tbl, true, false, false, false, '');
        }
        $htmla = '';
        $htmla .= "<style type=text/css>";
        $htmla .= "table{border: 1px solid black}";

        $htmla .= "</style>";
        $htmla .= "<table width='100%'>";
        $htmla .= "<tr><th>Actividades a realizar:</th></tr>";
        foreach ($data['actividades'] as $item) {
            $htmla .= "<tr><td>" . "&nbsp;" . $item->descripcion_act . "</td></tr>";
        }
        $htmla .= "</table>";

        $pdf->writeHTML($htmla, true, false, false, false, '');

        foreach ($result as $item) {
            $tbl = <<<EOD
<table border="0" align="left" >
LUGAR DE REALIZACION
</table>
EOD;

            $pdf->writeHTML($tbl, true, false, false, false, '');



            $tbl = <<<EOD
<table border="1" align="left" >

 <tr nobr="true">
  <td colspan="3">
  <br>&nbsp;
                        	El servicio social se realizara en la instancia $item->nombre_instancia, con domicilio en $item->domicilio_instancia.<br>&nbsp; Numero de telefono $item->telefono_instancia 
   <br>&nbsp;
                      	
  </td>

 </tr>
</table>
EOD;

            $pdf->writeHTML($tbl, true, false, false, false, '');


            $tbl = <<<EOD
<table border="0" align="left" >

 <tr nobr="true">
  <td colspan="3">
  <br>
                        	
  </td>

 </tr>
</table>
EOD;

            $pdf->writeHTML($tbl, true, false, false, false, '');

            $tbl = <<<EOD
<table border="0" align="left" >

 <tr nobr="true">
  <td colspan="3">
  <br>
                        	
  </td>

 </tr>
</table>
EOD;

            $pdf->writeHTML($tbl, true, false, false, false, '');

            $tbl = <<<EOD
<table border="0" align="left" >

 <tr nobr="true">
  <td colspan="3">
  <br>
                        	
  </td>

 </tr>
</table>
EOD;

            $pdf->writeHTML($tbl, true, false, false, false, '');

            $tbl = <<<EOD
<table border="0" align="left" >

 <tr nobr="true">
  <td colspan="3">
  <br>
                        	Nombre y firma del responsable del programa: $item->nombre_encargado	<p align="left">&nbsp;&nbsp;___________________________________</p><br>&nbsp;<br>&nbsp;
                        	Nombre y firma del Jefe de la oficina de Serv. Social del ITTepic		<p align="left">&nbsp;&nbsp;___________________________________ </p>
  </td>

 </tr>
</table>
EOD;

            $pdf->writeHTML($tbl, true, false, false, false, '');
// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------
// -----------------------------tercera HOJA------------------------------------
// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------		
        }

        $pdf->AddPage();

//fijar efecto de sombra en el texto
        $pdf->setTextShadow(array('disabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

// Estab

        $imgdata = base64_decode('iVBORw0KGgoAAAANSUhEUgAAABwAAAASCAMAAAB/2U7WAAAABlBMVEUAAAD///+l2Z/dAAAASUlEQVR4XqWQUQoAIAxC2/0vXZDrEX4IJTRkb7lobNUStXsB0jIXIAMSsQnWlsV+wULF4Avk9fLq2r8a5HSE35Q3eO2XP1A1wQkZSgETvDtKdQAAAABJRU5ErkJggg==');


        //preparamos y maquetamos el contenido a crear

        $pdf->Image(K_PATH_IMAGES . 'sin3.png', 15, 0, 180, 40, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);
        $pdf->Image(K_PATH_IMAGES . 'abajo3.png', 15, 230, 180, 40, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);

        $tbl = <<<EOD
<table border="0" align="justify" >
<p style='text-align:justify'>
Con el fin de dar cumplimiento a lo establecido en la Ley Reglamentaria del Articulo 5° Constitucional relativo al ejercicio de profesores, el suscrito:
</p><br>&nbsp;<br>DATOS PERSONALES
</table>
EOD;

        $pdf->writeHTML($tbl, true, false, false, false, '');

        $html = '';




        foreach ($data['alumno'] as $item) {


// -----------------------------------------------------------------------------
// NON-BREAKING ROWS (nobr="true")

            $tbl = <<<EOD
<table border="1" align="left" >

 <tr nobr="true">
  <td colspan="3" >
  <br>&nbsp;
                        	<br>
                        	Nombre completo: <u>$item->nombre</u>
                        	<br>
                        	Sexo:<u>$item->sexo</u>
                        	Teléfono: <u>$item->telefono</u>
                        	Domicilio: <u>$item->domicilio</u>
                        	<br>
                        	
                            No. de control: <u>$item->numero_control</u>
                           
                            Carrera: <u>$item->carrera</u>
                            <br>
                            
                            
                            Semestre: <u>$item->semestre_cursado</u>
                            
                            
                            <br>
  </td>

 </tr>
</table>
EOD;

            $pdf->writeHTML($tbl, true, false, false, false, '');


            $tbl = <<<EOD
<table border="0" align="justify" ><p style="text-align:justify">
Me comprometo a realizar el Servicio Social acatando el reglamento delSistema Nacional de Educación Superior Tecnológica y llevarlo a cabo en el lugar y periodos manifestados, así como, a participar con mis conocimientos e iniciativa en las actividades que desempeñe, dando siempre una imagen positiva del Instituto Tenológico en el organismo o dependencia oficial, de no hacerlo así, quedo enterado (a) de la cancelación respectiva, la cual procedera automaticamente.
</p><br>&nbsp;
<br>&nbsp;
<br>&nbsp;
<br>&nbsp;</table>
EOD;

            $pdf->writeHTML($tbl, true, false, false, false, '');
        }





        foreach ($data['alumno'] as $item) {



            $tbl = <<<EOD
<table border="0" align="left" >

</table>
EOD;

            $pdf->writeHTML($tbl, true, false, false, false, '');



            $tbl = <<<EOD
<table border="0" align="left" >

 <tr nobr="true">
  <td colspan="3">
  
                       	
  </td>

 </tr>
</table>
EOD;

            $pdf->writeHTML($tbl, true, false, false, false, '');


            $tbl = <<<EOD
<table border="0" align="left" >

 <tr nobr="true">
  <td colspan="3">
  
                        	
  </td>

 </tr>
</table>
EOD;

            $pdf->writeHTML($tbl, true, false, false, false, '');

            $tbl = <<<EOD
<table border="0" align="left" >

 <tr nobr="true">
  <td colspan="3">
 
                        	
  </td>

 </tr>
</table>
EOD;

            $pdf->writeHTML($tbl, true, false, false, false, '');
            $hoy = date("F j, Y");
            $tbl = <<<EOD
<table border="0" align="left" >

 <tr nobr="true">
  <td colspan="3">
  <br>
                En la Ciudad de Tepic, Nayarit, Mexico. con fecha de $hoy.        	
                <br>&nbsp;
                <br>&nbsp;
                <br>&nbsp;
  </td>

 </tr>
</table>
EOD;

            $pdf->writeHTML($tbl, true, false, false, false, '');

            $tbl = <<<EOD
<table border="0" align="center" >

 <tr nobr="true">
  <td colspan="3">
  <br>
                        	
                        	_______________________________________<br>Firma Solicitante
  </td>

 </tr>
</table>
EOD;

            $pdf->writeHTML($tbl, true, false, false, false, '');
// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------
// -----------------------------CUARTA HOJA------------------------------------
// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------		
        }

        $pdf->AddPage();

//fijar efecto de sombra en el texto
        $pdf->setTextShadow(array('disabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

// Estab

        $imgdata = base64_decode('iVBORw0KGgoAAAANSUhEUgAAABwAAAASCAMAAAB/2U7WAAAABlBMVEUAAAD///+l2Z/dAAAASUlEQVR4XqWQUQoAIAxC2/0vXZDrEX4IJTRkb7lobNUStXsB0jIXIAMSsQnWlsV+wULF4Avk9fLq2r8a5HSE35Q3eO2XP1A1wQkZSgETvDtKdQAAAABJRU5ErkJggg==');


        //preparamos y maquetamos el contenido a crear

        $pdf->Image(K_PATH_IMAGES . 'sin4.png', 15, 0, 180, 40, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);
        $pdf->Image(K_PATH_IMAGES . 'abajo4.png', 15, 230, 180, 40, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);

        $tbl = <<<EOD
<table border="0" align="justify" >
<p style='text-align:justify'>
</p><br>&nbsp;<br>DATOS PERSONALES
</table>
EOD;

        $pdf->writeHTML($tbl, true, false, false, false, '');

        $html = '';




        foreach ($data['alumno'] as $item) {


// -----------------------------------------------------------------------------
// NON-BREAKING ROWS (nobr="true")

            $tbl = <<<EOD
<table border="1" align="justify" >

 <tr nobr="true">
  <td colspan="3" >
 <p style='text-align:justify'>
                        	Nombre completo: <u>$item->nombre</u>
                        	&nbsp;&nbsp;&nbsp;
                        	&nbsp;&nbsp;&nbsp;Sexo:<u>$item->sexo</u>
                        	<br>
                        	Teléfono: <u>$item->telefono</u>&nbsp;&nbsp;
                        	Domicilio: <u>$item->domicilio</u>&nbsp;&nbsp;
                        	<br>
                        	
                            No. de control: <u>$item->numero_control</u>&nbsp;&nbsp;
                           
                            Carrera: <u>$item->carrera</u><br>&nbsp;
                            
                            
                            
                            Creditos: <u>$item->creditos</u>
                            
                            
                            <br></p>
  </td>

 </tr>
</table>
EOD;

            $pdf->writeHTML($tbl, true, false, false, false, '');


            $tbl = <<<EOD
<table border="0" align="justify" ><p style="text-align:justify">
Periodo de realización: <u>$item->semestre</u>
</p>

<br>&nbsp;</table>
EOD;

            $pdf->writeHTML($tbl, true, false, false, false, '');
        }

        $tbl = <<<EOD
<table border="1"  align="center">
 <tr nobr="true">
  <th colspan="5"><br>Información del Programa</th>
 </tr>
 <tr nobr="true">
  <td><br>INICIO</td>
  <td><br>TERMINACION</td>
  <td><br>PROGRAMA</td>
  <td><br>DEPENDENCIA</td>
  <td><br>HORAS ACREDITADAS</td>
 </tr>
 <tr nobr="true">
  <td><br>$item->fecha_inicio</td>
  <td><br></td>
  <td><br>$item->nombre_programa</td>
  <td><br>$item->nombre_instancia</td>
  <td><br></td>
 </tr>
 
 
</table>
EOD;

        $pdf->writeHTML($tbl, true, false, false, false, '');

        $tbl = <<<EOD
<table border="0" align="justify" ><p style="text-align:justify">
Control de expediente
<hr>
</p>

<br>&nbsp;</table>
EOD;

        $pdf->writeHTML($tbl, true, false, false, false, '');

        $tbl = <<<EOD
<table border="0"  align="left">


 <tr nobr="true">
  <td><br>SOLICITUD&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;]</td>
  <td>REPORTES BIMESTRALES&nbsp;&nbsp;&nbsp; [&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;] [&nbsp;&nbsp;&nbsp;] [&nbsp;&nbsp;&nbsp;] [&nbsp;&nbsp;&nbsp;]</td>
  
 </tr>
 <tr nobr="true">
  <td><br></td>
  <td><br></td>
  
 </tr>
 <tr nobr="true">
  <td><br>CURSO DE INDUCCION&nbsp;&nbsp; [&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;]</td>
  <td><br>REPORTE FINAL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;]</td>
  
 </tr>
 <tr nobr="true">
  <td><br></td>
  <td><br></td>
  
 </tr>
 <tr nobr="true">
  <td><br>CARTA DE ASIGNACION &nbsp;[&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;]</td>
  <td><br>CARTA DE TERMINACION &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;]</td>
  
 </tr>
 <tr nobr="true">
  <td><br></td>
  <td><br></td>
  
 </tr>
 <tr nobr="true">
  <td><br>PLAN DE TRABAJO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;]</td>
  <td><br>CONSTANCIA OFICIAL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;]</td>
  
 </tr>
 
 
</table>
EOD;

        $pdf->writeHTML($tbl, true, false, false, false, '');

        foreach ($data['alumno'] as $item) {






            $tbl = <<<EOD
<table border="0" align="left" >

 <tr nobr="true">
  <td colspan="3">
  
                       	
  </td>

 </tr>
</table>
EOD;

            $pdf->writeHTML($tbl, true, false, false, false, '');


            $tbl = <<<EOD
<table border="1" align="left" >
&nbsp;Obervaciones:
<br>&nbsp;
<br>&nbsp;

</table>
EOD;

            $pdf->writeHTML($tbl, true, false, false, false, '');
            $tbl = <<<EOD
<table border="0" align="left" >

 <tr nobr="true">
  <td colspan="3">
  
                        	
  </td>

 </tr>
</table>
EOD;

            $pdf->writeHTML($tbl, true, false, false, false, '');

            $tbl = <<<EOD
<table border="0" align="left" >

 <tr nobr="true">
  <td colspan="3">
 
                        	
  </td>

 </tr>
</table>
EOD;

            $pdf->writeHTML($tbl, true, false, false, false, '');



// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------
// -----------------------------QUINTA PAGINA------------------------------------
// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------		
        }


// Imprimimos el texto con writeHTMLCell()
        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);

// ---------------------------------------------------------
// Cerrar el documento PDF y preparamos la salida
// Este método tiene varias opciones, consulte la documentación para más información.
        foreach ($result as $item) {
            $nombre_archivo = utf8_decode("Documento de  " . $item->numero_control . ".pdf");
        }

        $pdf->Output($nombre_archivo, 'I');
    }

    public function generar() {

        //TARJETA DE CONTROL

        $idx = $this->input->post('idps');

        $data = array(
            'id_programaseleccionado' => $this->input->post('idps'),
            'solicitud' => FALSE,
            'cartaasignacion' => FALSE,
            'cartacompromiso' => FALSE,
            'tarjetacontrol' => FALSE,
            'cartapresentacion' => TRUE);

        $data['tarjeta'] = $this->m_tarjeta->insert_t($idx, $data);

        //IIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII


        $this->load->library('Pdf');
        $resolution = array(216, 279);
        $pdf = new Pdf('P', 'mm', $resolution, true, 'UTF-8', false);

        $pdf->SetAuthor('Diego Alberto');
        $pdf->SetTitle('Instituto Tecnologico de Tepic');
        $pdf->SetSubject('Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        $image_file = 'sin.png';

// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config_alt.php de libraries/config
        $pdf->SetHeaderData($image_file, PDF_HEADER_LOGO_WIDTH, 'Instituto Tecnologico de Tepic', 's');

// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);


// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//relación utilizada para ajustar la conversión de los píxeles
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


// ---------------------------------------------------------
// establecer el modo de fuente por defecto
        $pdf->setFontSubsetting(true);

// Establecer el tipo de letra
//Si tienes que imprimir carácteres ASCII estándar, puede utilizar las fuentes básicas como
// Helvetica para reducir el tamaño del archivo.
        $pdf->SetFont('helvetica', '', 10);

// Añadir una página
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(true);
// Este método tiene varias opciones, consulta la documentación para más información.
        $pdf->AddPage();

//fijar efecto de sombra en el texto
        $pdf->setTextShadow(array('disabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

// Establecemos el contenido para imprimir
        $id = $this->input->post('id');
        $no_oficio = $this->input->post('oficio');
        $result = $this->m_alumnos_pdf->show_data_by_id($id);
        $data['datosjefev'] = $this->m_alumnos_pdf->show_nombreJV();
        foreach ($data['datosjefev'] as $m) {

            $jefevinculacion = $m->nombre_usuariosistema;
            $jvinculacion = mb_strtoupper($jefevinculacion, 'UTF-8');
        }

        $data['alumno'] = $result;

        foreach ($data['alumno'] as $item) {

            $idsolicitud = $item->id_solicitud;
        }

// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------
// -----------------------------QUINTA PAGINA------------------------------------
// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------		
// Estab

        $imgdata = base64_decode('iVBORw0KGgoAAAANSUhEUgAAABwAAAASCAMAAAB/2U7WAAAABlBMVEUAAAD///+l2Z/dAAAASUlEQVR4XqWQUQoAIAxC2/0vXZDrEX4IJTRkb7lobNUStXsB0jIXIAMSsQnWlsV+wULF4Avk9fLq2r8a5HSE35Q3eO2XP1A1wQkZSgETvDtKdQAAAABJRU5ErkJggg==');


        //preparamos y maquetamos el contenido a crear

        $pdf->Image(K_PATH_IMAGES . 'sin5.png', 15, 0, 180, 40, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);
        //Aqui se quita lo de abajo
        // $pdf->Image(K_PATH_IMAGES . 'abajo5.png', 15, 230, 180, 40, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);

        $dia = date("j");
        $mes = date("n");
        $año = date("Y");
        switch ($mes) {
            case 1:
                $mes = 'Enero';

                break;
            case 2:
                $mes = 'Febrero';

                break;
            case 3:
                $mes = 'Marzo';

                break;
            case 4:
                $mes = 'Abril';

                break;
            case 5:
                $mes = 'Mayo';

                break;
            case 6:
                $mes = 'Junio';

                break;
            case 7:
                $mes = 'Julio';

                break;
            case 8:
                $mes = 'Agosto';

                break;
            case 9:
                $mes = 'Septiembre';

                break;
            case 10:
                $mes = 'Octubre';

                break;
            case 11:
                $mes = 'Noviembre';

                break;

            case 12:
                $mes = 'Diciembre';
                break;
        }
        $tbl = <<<EOD
<table border="0" align="right" >
<p style='text-align:right'>
<br>&nbsp;
<br>&nbsp;
</p><br>&nbsp;<br>DPTO.: GESTIÓN TECNOLÓGICA Y VINCULACIÓN
                        	<br> No. DE OFICIO: $no_oficio<br>&nbsp;<br>ASUNTO: Carta de presentación.
                        
</table>
EOD;

        $pdf->writeHTML($tbl, true, false, false, false, '');
        $tbl = <<<EOD
<table border="0" align="left" >
<p style='text-align:left'>

</p><br>&nbsp;<br>Tepic, Nayarit a $dia de $mes del $año.
                        	<br>$item->titular_instancia
                        <br>$item->nombre_instancia                        
                        <br>P R E S E N T E
                        
                        
</table>
EOD;

        $pdf->writeHTML($tbl, true, false, false, false, '');

        $tbl = <<<EOD
<table border="0" align="right" >
<p style='text-align:right'>
</p>$item->nombre_encargado
                        	<br> $item->departamento
                        
</table>
EOD;

        $pdf->writeHTML($tbl, true, false, false, false, '');

        $html = '';



        $tbl = <<<EOD
<table border="0" align="justify" ><p style="text-align:justify">
Por este conducto, presentamos a sus finas atenciones, el C. <b>$item->nombre</b>, con numero de control <b>$item->numero_control</b> alumno de la carrera de <b>$item->carrera</b>, quien desea realizar su Servicio Social en esta dependencia, cubriendo un total de <b>480</b> horas en el programa “<b>$item->nombre_programa</b>“ en un periodo mínimo de seis meses y no mayor de dos años. Así mismo solicito de la manera más atenta nos haga llegar la carta de aceptación, donde menciona el día de inicio de servicio social.</p><br>&nbsp;
<br>&nbsp;
<br>
Agradezco las atenciones se sirva brindar al portador de la presente.
<br>&nbsp;
<br>&nbsp;
<br>
A T E N T A M E N T E 
<br>
“SABIDURIA TECNOLÓGICA PASIÓN DE NUESTRO ESPIRITU”
<br>&nbsp;
<br>&nbsp;
<br>&nbsp;
<br>&nbsp;
<br>&nbsp;
<br>
$jvinculacion
<br>JEFE DEL DEPARTAMENTO DE GESTIÓN TECNOLÓGICA Y VINCULACIÓN.	 
</table>
EOD;

        $pdf->writeHTML($tbl, true, false, false, false, '');

        foreach ($data['alumno'] as $item) {


// -----------------------------------------------------------------------------
// NON-BREAKING ROWS (nobr="true")
        }






        foreach ($data['alumno'] as $item) {





// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------
// ----------------------------- PAGINA------------------------------------
// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------		
        }

// Imprimimos el texto con writeHTMLCell()
        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);

// ---------------------------------------------------------
// Cerrar el documento PDF y preparamos la salida
// Este método tiene varias opciones, consulte la documentación para más información.
        foreach ($result as $item) {
            $nombre_archivo = utf8_decode("Documento de  " . $item->numero_control . ".pdf");
        }

        $pdf->Output($nombre_archivo, 'I');
    }

    public
            function generarLiberacion() {
        $this->load->library('Pdf');
        $resolution = array(216, 279);
        $pdf = new Pdf('P', 'mm', $resolution, true, 'UTF-8', false);

        $pdf->SetAuthor('Javier Villegas');
        $pdf->SetTitle('Instituto Tecnologico de Tepic');
        $pdf->SetSubject('Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        $image_file = 'sin.png';

// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config_alt.php de libraries/config
        $pdf->SetHeaderData($image_file, PDF_HEADER_LOGO_WIDTH, 'Instituto Tecnologico de Tepic', 's');



// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));


// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);


// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//relación utilizada para ajustar la conversión de los píxeles
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


// ---------------------------------------------------------
// establecer el modo de fuente por defecto
        $pdf->setFontSubsetting(true);

// Establecer el tipo de letra
//Si tienes que imprimir carácteres ASCII estándar, puede utilizar las fuentes básicas como
// Helvetica para reducir el tamaño del archivo.
        $pdf->SetFont('helvetica', '', 10);

// Añadir una página
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(true);
// Este método tiene varias opciones, consulta la documentación para más información.
        $pdf->AddPage();

//fijar efecto de sombra en el texto
        $pdf->setTextShadow(array('disabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

        // Establecemos el contenido para imprimir
        $id = $this->input->post('id');
        $no_oficio = $this->input->post('oficio');
        $calificacion = $this->input->post('calif');
        $result = $this->m_alumnos_pdf->show_data_by_id($id);
        $data['alumno'] = $result;

        foreach ($data['alumno'] as $item) {

            $idsolicitud = $item->id_solicitud;
        }
        setlocale(LC_CTYPE, 'es_MX.UTF8');
        $data['datosjefev'] = $this->m_alumnos_pdf->show_nombreJV();
        foreach ($data['datosjefev'] as $m) {

            $jefevinculacion = $m->nombre_usuariosistema;
            $jvinculacion = mb_strtoupper($jefevinculacion, 'UTF-8');
        }
        $data['datossubplan'] = $this->m_alumnos_pdf->show_nombreSP();
        foreach ($data['datossubplan'] as $p) {

            $subplaneacion = mb_strtoupper($p->nombre_usuariosistema, 'UTF-8');
        }

        //fijar efecto de sombra en el texto
        $pdf->setTextShadow(array('disabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

// Estab

        $imgdata = base64_decode('iVBORw0KGgoAAAANSUhEUgAAABwAAAASCAMAAAB/2U7WAAAABlBMVEUAAAD///+l2Z/dAAAASUlEQVR4XqWQUQoAIAxC2/0vXZDrEX4IJTRkb7lobNUStXsB0jIXIAMSsQnWlsV+wULF4Avk9fLq2r8a5HSE35Q3eO2XP1A1wQkZSgETvDtKdQAAAABJRU5ErkJggg==');


        //preparamos y maquetamos el contenido a crear

        $pdf->Image(K_PATH_IMAGES . 'sin5.png', 15, 0, 180, 40, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);
        //$pdf->Image(K_PATH_IMAGES . 'abajo5.png', 15, 230, 180, 40, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);
        $dia = date("j");
        $mes = date("n");
        $año = date("Y");
        $uno = explode("-", $item->fecha_inicio2);
        $dos = explode("-", $item->fecha_reporte3);
        $mes2 = $uno[1];
        $mes3 = $dos[1];
        switch ($mes) {
            case 1:
                $mes = 'ENERO';
                break;
            case 2:
                $mes = 'FEBRERO';
                break;
            case 3:
                $mes = 'MARZO';
                break;
            case 4:
                $mes = 'ABRIL';
                break;
            case 5:
                $mes = 'MAYO';
                break;
            case 6:
                $mes = 'JUNIO';
                break;
            case 7:
                $mes = 'JULIO';
                break;
            case 8:
                $mes = 'AGOSTO';
                break;
            case 9:
                $mes = 'SEPTIEMBRE';
                break;
            case 10:
                $mes = 'OCTUBRE';
                break;
            case 11:
                $mes = 'NOVIEMBRE';
                break;
            case 12:
                $mes = 'DICIEMBRE';
                break;
        }
        switch ($mes2) {
            case 1:
                $mes2 = 'ENERO';
                break;
            case 2:
                $mes2 = 'FEBRERO';
                break;
            case 3:
                $mes2 = 'MARZO';
                break;
            case 4:
                $mes2 = 'ABRIL';
                break;
            case 5:
                $mes2 = 'MAYO';
                break;
            case 6:
                $mes2 = 'JUNIO';
                break;
            case 7:
                $mes2 = 'JULIO';
                break;
            case 8:
                $mes2 = 'AGOSTO';
                break;
            case 9:
                $mes2 = 'SEPTIEMBRE';
                break;
            case 10:
                $mes2 = 'OCTUBRE';
                break;
            case 11:
                $mes2 = 'NOVIEMBRE';
                break;
            case 12:
                $mes2 = 'DICIEMBRE';
                break;
        }
        switch ($mes3) {
            case 1:
                $mes3 = 'ENERO';
                break;
            case 2:
                $mes3 = 'FEBRERO';
                break;
            case 3:
                $mes3 = 'MARZO';
                break;
            case 4:
                $mes3 = 'ABRIL';
                break;
            case 5:
                $mes3 = 'MAYO';
                break;
            case 6:
                $mes3 = 'JUNIO';
                break;
            case 7:
                $mes3 = 'JULIO';
                break;
            case 8:
                $mes3 = 'AGOSTO';
                break;
            case 9:
                $mes3 = 'SEPTIEMBRE';
                break;
            case 10:
                $mes3 = 'OCTUBRE';
                break;
            case 11:
                $mes3 = 'NOVIEMBRE';
                break;
            case 12:
                $mes3 = 'DICIEMBRE';
                break;
        }

        $html = '';
        $tbl = <<<EOD
<table border="0" align="right" >
<p style='text-align:right'>
<br>&nbsp;
<br>&nbsp;
</p><br>&nbsp;<br><b>DEPARTAMENTO: GESTIÓN TECNOLÓGICA Y VINCULACIÓN
                        	<br> No. DE OFICIO: $no_oficio<br>&nbsp;<br><br>ASUNTO: Constancia de liberación de servicio social.</b><br>
                        
</table>
EOD;

        $pdf->writeHTML($tbl, true, false, false, false, '');

        $tbl = <<<EOD
<table border="0" align="justify" >
<b>A QUIEN CORRESPONDA:</b>
<br>
<br>
Por medio de la presente se hace <b>constar</b> que:
<p>
Según documentos en los archivos de esta Institución, el C. <b>$item->nombre</b>, con numero de control <b>$item->numero_control</b> de la carrera de <b>$item->carrera</b> realizó  su Servicio Social en <b>$item->nombre_instancia</b>, en el programa “<b>$item->nombre_programa</b>“, cubriendo un total de <b>480</b> horas, durante el periodo comprendido del <b>$uno[2] de $mes2 del $uno[0] al $dos[2] de $mes3 del $dos[0]</b>, obteniendo una calificación de <b>$calificacion.</b>
</p>
<br>
<p>
Este servicio social fue realizado de acuerdo a los establecido en la Ley Reglamentaria del Articulo 5o. Constitucional relativo al ajercicio de las Profesiones y los Reglamentos que rigen al Sistema Nacional de Educación Superior Tecnológica.
</p>
<p>
Se extiende la presente para los fines legales que al interesado convengan, en la ciudad de Tepic, Nayarit, a los <b>$dia</b> días del mes de <b>$mes DEL $año.</b>
   <br>
<br>

   </p>                


<p>
<b>
ATENTAMENTE.
<br>
<small><b>"SABIDURÍA TECNOLÓGICA, PASIÓN DE NUESTRO ESPÍRITU"</b></small>
 </b></p>
<br>
<br>
<br>
<br>

</table>
EOD;

        $pdf->writeHTML($tbl, true, false, false, false, '');

        $tbl = <<<EOD
<br>
<br>
<br>
<br>
<br>
<br>
<table border="0" align="center" >
<tr>
<th>
<br>
<p>
<b>$jvinculacion
<br>
JEFE DEL DEPARTAMENTO DE GESTIÓN TECNOLÓGICA Y VINCULACIÓN.
</b>
</p>
</th>    
<th>
<p>
<b>
Vo. Bo
<br>
<br>
$subplaneacion
<br>
SUBDIRECTOR DE PLANEACIÓN Y VINCULACIÓN
<br>
<br>
<br>               
</b>                  
</p>
</th>    
</tr>
</table>
<p>
<small>VMLH/NTLV/ahn</small>                
<br>
<small>c.c.p. Servicios Escolares.- Expediente del alumno</small>
</p>
                
                
EOD;

        $pdf->writeHTML($tbl, true, false, false, false, '');

        // Imprimimos el texto con writeHTMLCell()
        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);

// ---------------------------------------------------------
// Cerrar el documento PDF y preparamos la salida
// Este método tiene varias opciones, consulte la documentación para más información.
        foreach ($result as $item) {
            $nombre_archivo = utf8_decode("Constancia_de_liberacion_" . $item->numero_control . ".pdf");
        }

        $pdf->Output($nombre_archivo, 'I');
    }

}
