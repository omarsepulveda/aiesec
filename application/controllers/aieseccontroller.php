<?php

defined('BASEPATH') OR exit('No direct script access allowed');

//if (!defined('BASEPATH'))exit('No direct script access allowed');

class aieseccontroller extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');
        $this->load->model("appmodel");
        $this->load->library('grocery_CRUD');
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper(array('url', 'form'));

        //$this->load->library('ci_qr_code');
        //$this->config->load('qr_code');
    }

    public function _example_output($output = null) {
      $this->load->view('aiesecview.php', (array) $output);
       
       // $this->load->view('aiesecview.php', (array) $output);
    }
   
    public function carga() {
        $output = $this->grocery_crud->render();
        
        $this->_example_output($output);
    }

    public function index() {
        $this->_example_output((object) array('output' => '', 'js_files' => array(), 'css_files' => array()));
    }

    public function area_management() {

        $crud = new grocery_CRUD();

        $crud->set_theme('flexigrid');
        $crud->set_table('area_trabajo');
        $crud->set_subject('Nombre del Aera de Trabajo');
        $crud->columns('NOMBRE_AREA');
        $crud->display_as('NOMBRE_AREA', 'Area de trabajo');
        $crud->required_fields('NOMBRE_AREA');
        $crud->fields('NOMBRE_AREA');
        $crud->set_field_upload('file_url', 'assets/uploads/files');

        $output = $crud->render();

        $this->_example_output($output);
    }

    public function personas_management() {
        $crud = new grocery_CRUD();

        $crud->set_theme('flexigrid');
        $crud->set_table('personas');
        $crud->set_relation('AREATRABAJO', 'area_trabajo', 'NOMBRE_AREA');
        $crud->display_as('ID_AREA', 'Area de trabajo');
        $crud->set_subject('Usuarios');
       // $crud->unset_add();
        $crud->required_fields('NOMBRES', 'EMAIL', 'CLAVE', 'DOCUMENTO');
        $crud->set_rules('EMAIL', 'Correo electronico', 'email');
        $crud->set_field_upload('file_url', 'assets/uploads/files');

        $output = $crud->render();

        $this->_example_output($output);
    }

    public function lugares_management() {
        $crud = new grocery_CRUD();

        //$crud->set_relation('ID_LUGAR','lugares','{UBICADO}');
        $crud->set_theme('flexigrid');
        $crud->display_as('ID_LUGAR', 'Lugar');
        $crud->set_table('lugares');
        $crud->set_subject('Lugares');
        // $crud->unset_add();
        //$crud->unset_delete();
        $crud->columns('NOMBRE_LUGAR', 'TIPO_LUGAR');
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
        //$crud->unset_add();
        // $crud->unset_delete();
        $crud->set_field_upload('file_url', 'assets/uploads/files');
        $output = $crud->render();

        $this->_example_output($output);
    }

    public function detalles_management() {
        $crud = new grocery_CRUD();

        $crud->set_theme('flexigrid');
        $crud->set_relation('EVENTOS', 'eventos', 'NOMBRE_EVENTO');
        $crud->set_relation('cc', 'personas', '{NOMBRES}{APELLIDOS}');
        $crud->set_table('detalles_evento');
        $crud->set_subject('Detalles del evento');
        $crud->display_as('cc', 'Usuarios incritos');
        $crud->display_as('EVENTOS', 'Eventos');
        $crud->display_as('activado', 'Estado del evento');
        //$crud->unset_columns('cc','FOTO');
        $crud->columns('cc', 'EVENTOS', 'activado', 'FOTO', 'cantidad_refrigerio', 'valor', 'material');

        $crud->callback_column('valor', array($this, 'valueTopesos'));

        $output = $crud->render();

        $this->_example_output($output);
    }

    public function valueTopesos($value, $row) {
        return $value . '$';
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
//     return  $this->ciqrcode->generate($params);
//cargamos la libreria email de ci
        $this->load->library("email");

//configuracion para gmail
        $configGmail = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'jose.aguirre@uptc.edu.co',
            'smtp_pass' => '3193555847Jose',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        );

//cargamos la configuración para enviar con gmail
        $this->email->initialize($configGmail);

        $this->email->from('jose.aguirre@uptc.edu.co');
        $this->email->to("josecamilo.molina@uptc.edu.co");
        $this->email->subject('AIESEC QR para ingreso al evento');
        $this->email->attach('codigoQR/qrcode.jpg');
        $this->email->message('<h2>Correo con imagen</h2>
			<br>
			AIESEC
			<br>
			'
        );


        for ($i = 1; $i <= 1; $i++) {
            if ($this->email->send()) {

                echo "Enviado con éxito";
//redirect(base_url("aiesec/index.php/aieseccontroller"));
            } else {
                show_error($this->email->print_debugger());
            }
            sleep(1);
        }
    }

  
    public function random($num) {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $string = '';
        for ($i = 0; $i < $num; $i++) {
            $string .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $string;
    }

    public function codigo_qr() {
        //cargamos la librería	
        $this->load->library('ciqrcode');
        $data = $this->random(10);

        //hacemos configuraciones
        $params['data'] = $data;
        $params['level'] = 'H';
        $params['size'] = 5;
        //decimos el directorio a guardar el codigo qr, en este 
        //caso una carpeta en la raíz llamada qr_code
        $params['savename'] = FCPATH . 'codigoQR/qrcode.jpg';
        //generamos el código qr
        $this->ciqrcode->generate($params);
        echo '<img src="' . base_url() . 'codigoQR/qrcode.jpg" />';
        //echo $usuarios->cc;
    }
    
}