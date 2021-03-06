<?php

defined('BASEPATH') OR exit('No direct script access allowed');

//if (!defined('BASEPATH'))exit('No direct script access allowed');

class Aieseccontroller extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');
        $this->load->model("appmodel");
        $this->load->library('grocery_CRUD');
        $this->load->library(array('session'));
        $this->load->library('calendar');
        $this->load->helper(array('url', 'form'));
    }

    public function _example_output($output = null) {

        if ($this->session->userdata('islogin') != 1) {
            redirect('ingresocontroller');
        } else {
            $this->load->view('aiesecview.php', (array) $output);
        }



        //$this->load->view("activarusuarios.php", $data);
    }

    public function carga() {

        $output = $this->grocery_crud->render();
        $this->_example_output($output);
        $output = $crud->render();
    }

    public function index() {

        $this->_example_output((object) array('output' => '', 'js_files' => array(), 'css_files' => array()));
    }

    public function area_management() {

        $crud = new grocery_CRUD();

        $crud->set_theme('flexigrid');
        $crud->set_table('area_trabajo');
        $crud->columns('NOMBRE_AREA');
        $crud->display_as('NOMBRE_AREA', 'Area de trabajo');
        $crud->required_fields('NOMBRE_AREA');
        $crud->set_rules('NOMBRE_AREA', 'Area de trabajo', 'regex_match[/^[\p{L} ,.]*$/u]');

        $output = $crud->render();
        $this->_example_output($output);
    }

    public function personas_management() {
        $crud = new grocery_CRUD();

        $crud->set_theme('flexigrid');
        $crud->set_table('personas');
        $crud->set_relation('AREATRABAJO', 'area_trabajo', 'NOMBRE_AREA');
        $crud->display_as('AREATRABAJO', 'Area de trabajo');
        $crud->set_subject('Usuarios');
        $crud->unset_add();
        $crud->unset_edit();
        $crud->set_rules('EMAIL', 'Correo electronico', 'email');
        $crud->set_field_upload('file_url', 'assets/uploads/files');
        $crud->columns('NOMBRES', 'APELLIDOS', 'EMAIL', 'AREATRABAJO', 'TIPO');
        $crud->set_field_upload('file_url', 'assets/uploads/files');

        $output = $crud->render();
        $this->_example_output($output);
    }

    public function lugares_management() {
        $crud = new grocery_CRUD();
        $crud->set_relation('ID_LUGAR', 'lugares', '{UBICADO}');
        $crud->set_theme('flexigrid');
        $crud->display_as('ID_LUGAR', 'Lugar');
        $crud->set_table('lugares');
        $crud->set_subject('Lugares');
        $crud->unset_add_fields('UBICADO');
        $crud->columns('NOMBRE_LUGAR');
        $crud->required_fields('NOMBRE_LUGAR');

        $crud->set_field_upload('file_url', 'assets/uploads/files');
        $output = $crud->render();

        $this->_example_output($output);
    }

    public function eventos_management() {
        $crud = new grocery_CRUD();

        $crud->set_theme('flexigrid');
        $crud->set_relation('LUGAR', 'lugares', 'NOMBRE_LUGAR');
        $crud->set_relation('PERSONA_ENCARGADA', 'personas', '{NOMBRES} {APELLIDOS}');
        $crud->display_as('ID_LUGAR', 'Lugar');
        $crud->set_table('eventos');
        $crud->set_subject('Eventos');
        $crud->set_field_upload('file_url', 'assets/uploads/files');

        $output = $crud->render();
        $this->_example_output($output);
    }

    public function detalles_management() {
        $crud = new grocery_CRUD();
        $crud->set_theme('flexigrid');
        $crud->set_relation('eventos', 'eventos', 'NOMBRE_EVENTO');
        $crud->set_relation('cc', 'personas', '{NOMBRES}{APELLIDOS}');
        $crud->set_table('detalles_evento');
        $crud->set_subject('detalles');
        $crud->display_as('cc', 'Usuarios incritos');
        $crud->display_as('NOMBRE_EVENTO', 'Eventos');
        $crud->display_as('activado', 'Estado del evento');
        $crud->columns('cc', 'eventos', 'activado', 'FOTO', 'cantidad_refrigerio', 'valor', 'material', 'QR');
        $crud->set_field_upload('FOTO');
        $crud->callback_column('valor', array($this, 'valueTopesos'));

        $output = $crud->render();
        $this->_example_output($output);
    }

    public function valueTopesos($value, $row) {
        return '$' . $value;
    }

    public function estado_management() {
        $crud = new grocery_CRUD();

        $crud->set_table('film');
        $crud->set_relation_n_n('detalles_evento', 'event', 'PERSONAS', 'cc', 'estado', 'cantidad_refrigerio', 'valor');
        $crud->unset_columns('special_features', 'description', 'actors');
        $crud->fields('nombres', 'apellidos', 'NOMBRE_EVENTO', 'ESTADO', 'FECHA_INICIO', 'FECHA_FIN', 'PERSONA_ENCARGADA', 'LUGAR', 'DESCRIPCION', 'VALOR', 'FOTO');

        $output = $crud->render();
        $this->_example_output($output);
    }

    public function enviar_qr() {
        $emails = "";
        // $datos = $this->input->get("evento");
        $correo = $this->appmodel->Correo();
        // return $correo;
        $data = array('correo' => $correo
        );

        // $data = $emails;
        // echo $data;
//cargamos la libreria email de ci
        $this->load->library("Email");

//configuracion para gmail
        $configGmail = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'aieventapp@gmail.com',
            'smtp_pass' => 'a1234567890',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        );

//cargamos la configuración para enviar con gmail
        $this->email->initialize($configGmail);
        $this->email->from('aieventapp@gmail.com');
        //$this->email->to('jenny.quesada@uptc.edu.co'); //////////////////////ESTA SIN CORREO
        $this->email->to('curaseco@gmail.com'); //////////////////////ESTA SIN CORREO
        //$this->email->to('omar.sepulveda@uptc.edu.co'); //////////////////////ESTA SIN CORREO
        //$this->email->to('joseisrael.reyes@uptc.edu.co'); //////////////////////ESTA SIN CORREO
        //$this->email->to('lina.doza@uptc.edu.co'); //////////////////////ESTA SIN CORREO
        //$this->email->to('acalarcon@gmail.com'); //////////////////////ESTA SIN CORREO
        //$this->email->to('mauro.callejas@uptc.edu.co'); //////////////////////ESTA SIN CORREO
        //
        
        $this->email->subject('AIESEC QR para ingreso al evento');
        $this->email->attach('codigoQR/qrcode.jpg');
        $this->email->message('<h2>Código QR para el ingreso al evento</h2>
			<br>
			Aiesec
			<br>
			');

        for ($i = 1; $i <= 1; $i++) {
            if ($this->email->send()) {

                echo "Enviado con éxito";
            } else {
                show_error($this->email->print_debugger());
            }
            sleep(1);
        }
    }

    /*
      public function random($num) {
      $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
      $string = '';
      for ($i = 0; $i < $num; $i++) {
      $string .= $characters[rand(0, strlen($characters) - 1)];
      }
      return $string;
      }
     */

    public function codigo_qr() {
        //cargamos la librería	
     
              $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $string = '';
        for ($i = 0; $i < 20; $i++) {
            $string .= $characters[rand(30, strlen($characters) - 1)];
           
          
        }
         $cod['QR'] = $string;
         $this->appmodel->agregarcodigo($cod);
      
      
        $this->load->library('ciqrcode');
        
    
        //hacemos configuraciones
        $params['data'] = $string;

        $params['level'] = 'H';
        $params['size'] = 10;
        //decimos el directorio a guardar el codigo qr, en este 
        //caso una carpeta en la raíz llamada qr_code
        $params['savename'] = FCPATH . 'codigoQR/qrcode.jpg';
        //generamos el código qr
        $this->ciqrcode->generate($params);
        return '<img src="' . base_url() . 'codigoQR/qrcode.jpg" />';
    }

    public function sacarValorTotal() {
        $precio = $this->appmodel->sumar_valor();

        //$this->load->view('aiesecview/sacarValorTotal',$precio);
        echo $precio;
    }

    public function consultarCorrreo() {
        //  $dato1 = $this->input->get("cc");

        return $data;
        //$this->load->view('activarusuario',$data);
        // echo json_encode(array('email' => $correo));
    }

}
