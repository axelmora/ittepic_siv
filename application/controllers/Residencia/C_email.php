<?php

class C_email extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function sendMailGmail() {
        //cargamos la libreria email de ci
        $this->load->library("email");

        //configuracion para gmail
        $configGmail = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'avisosiv@ittepic.edu.mx',
            'smtp_pass' => 'sivittepic',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        );

        //cargamos la configuración para enviar con gmail
        $this->email->initialize($configGmail);

        $this->email->from('avisosiv@ittepic.edu.mx', 'Sistema Integral de Vinculación');
        $this->email->to("joanrosalesvi@ittepic.edu.mx");
        $this->email->subject('Di hola a SIV');
        $this->email->message('<h2>Prueba</h2>');
        if ($this->email->send()) {
            var_dump('Se envió');
        } else {
            var_dump('No se envio');
        }

        //$this->email->send();
        //con esto podemos ver el resultado
        //var_dump($this->email->print_debugger());
    }

}
