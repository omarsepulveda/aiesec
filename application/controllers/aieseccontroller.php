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




        //$this->load->library('ci_qr_code');
        //$this->config->load('qr_code');
    }

    public function _example_output($output = null) {

        if ($this->session->userdata('islogin') != 1) {
            redirect('ingresocontroller');
        } else {
            $this->load->view('aiesecview.php', (array) $output);
        }

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
        $crud->columns('NOMBRE_AREA');
        $crud->display_as('NOMBRE_AREA', 'Area de trabajo');
        $crud->required_fields('NOMBRE_AREA');
        $crud->set_rules('NOMBRE_AREA', 'Area de trabajo', 'regex_match[/^[\p{L} ,.]*$/u]');
        $crud -> required_fields ( 'NOMBRE_AREA') ;
       
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
        //$crud->required_fields('NOMBRES', 'EMAIL', 'CLAVE', 'DOCUMENTO');
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
        // $crud->set_subject('Lugares');
        // $crud->unset_add();
        //$crud->unset_delete();
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
        $crud->display_as('cc', 'Usuarios incritos');
        $crud->display_as('EVENTOS', 'Eventos');
        $crud->display_as('activado', 'Estado del evento');
        //$crud->unset_add();
        $crud->columns('cc', 'EVENTOS', 'activado', 'FOTO', 'cantidad_refrigerio', 'valor', 'material');
        // $crud->unset_edit('QR','FOTO','EVENTO','cc');
        $crud->callback_column('valor', array($this, 'valueTopesos'));

        $output = $crud->render();

        $this->_example_output($output);
    }

    public function valueTopesos($value, $row) {
        return '$' . $value;
    }
/*
    public function estado_management() {
        $crud = new grocery_CRUD();

        $crud->set_table('film');
        $crud->set_relation_n_n('detalles_evento', 'event', 'PERSONAS', 'cc', 'estado', 'cantidad_refrigerio', 'valor');
        $crud->unset_columns('special_features', 'description', 'actors');

        $crud->fields('nombres', 'apellidos', 'NOMBRE_EVENTO', 'ESTADO', 'FECHA_INICIO', 'FECHA_FIN', 'PERSONA_ENCARGADA', 'LUGAR', 'DESCRIPCION', 'VALOR', 'FOTO');

        $output = $crud->render();

        $this->_example_output($output);
    }
***/
    public function enviar_qr() {
//     return  $this->ciqrcode->generate($params);
//cargamos la libreria email de ci
        $this->load->library("Email");

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
        $this->email->to("josej36.aguirre@gmail.com"); //////////////////////ESTA SIN CORREO
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
        $data = $this->random(30);
        // $id = this->appmodel->get('DOCUMENTO');
        //hacemos configuraciones
        $params['data'] = $data;
        $params['level'] = 'H';
        $params['size'] = 10;
        //decimos el directorio a guardar el codigo qr, en este 
        //caso una carpeta en la raíz llamada qr_code
        $params['savename'] = FCPATH . 'codigoQR/qrcode.jpg';
        //generamos el código qr
        $this->ciqrcode->generate($params);
        return '<img src="' . base_url() . 'codigoQR/qrcode.jpg" />';
        //echo $usuarios->cc;
        // $this->load->view('aiesecview');
    }

    public function sacarValorTotal() {
        $total = $this->appmodel->sumar_valor();
        /* @var $total type */
        return $total;
    }

    public function consultarusuarios() {
        $estudiante = $this->appmodel->Correo($dato1, $dato2);
        echo json_encode(array('estudiante' => $estudiante));

        echo "esta imprimiendo bien" . $estudiante;
    }

    public function consultarCorrreo() {
        $dato1 = $this->input->get("cc");
        $dato2 = $this->input->get("evento");



        $estudiante = $this->appmodel->Correo($dato1, $dato2);

        echo json_encode(array('correo electronico de usuarios inscritos' => $estudiante));
    }
    /*********************************grillas///////////////////********************////
    	public function estado_management()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('film');
		$crud->set_relation_n_n('detalles_evento', 'event', 'PERSONAS', 'cc','estado','cantidad_refrigerio','valor');
		$crud->unset_columns('special_features','description','actors');

		$crud->fields('nombres', 'apellidos', 'NOMBRE_EVENTO' ,  'ESTADO' ,'FECHA_INICIO', 'FECHA_FIN', 'PERSONA_ENCARGADA', 'LUGAR', 'DESCRIPCION', 'VALOR', 'FOTO');

		$output = $crud->render();

		$this->_example_output($output);
	}

	function multigrids()
	{
		$this->config->load('grocery_crud');
		$this->config->set_item('grocery_crud_dialog_forms',true);
		$this->config->set_item('grocery_crud_default_per_page',20);

		$output1 = $this->area_management2();

		$output2 = $this->personas_management2();

		$output3 = $this->consultareventos_management2();

		$js_files = $output1->js_files + $output2->js_files + $output3->js_files;
		$css_files = $output1->css_files + $output2->css_files + $output3->css_files;
		$output = "<h1>AREAS DE TRABAJO DE LA EMPRESA</h1>".$output1->output."<h1>TABLA DE USUARIOA INSCRITOS</h1>".$output2->output."<h1> TABLA DE EVENTOS</h1>".$output3->output;

		$this->_example_output((object)array(
				'js_files' => $js_files,
				'css_files' => $css_files,
				'output'	=> $output
		));
	}

	public function area_management2()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('area_trabajo');
		$crud->set_subject('Area');
                $crud->unset_operations();
		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_example_output($output);
		} else {
			return $output;
		}
	}

	public function personas_management2()
	{
		$crud = new grocery_CRUD();
                
		$crud->set_theme('datatables');
		$crud->set_table('personas');
		$crud->set_relation('AREATRABAJO','area_trabajo','ID_AREA');
		$crud->display_as('AREATRABAJO','Area de trabajo');
		$crud->set_subject('Personas');

		$crud->required_fields('DOCUMENTO');
                $crud->unset_operations();
		$crud->set_field_upload('file_url','assets/uploads/files');

		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_example_output($output);
		} else {
			return $output;
		}
	}

	
        public function consultareventos_management2()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('eventos');
		$crud->columns('NOMBRE_EVENTO','FECHA_INICIO','FECHA_FIN','NOMBRE_LUGAR','DESCRIPCION','VALOR','estado');
		$crud->display_as('NOMBRE_LUGAR','lugares')
			 ->display_as('NOMBRE_EVENTO','Evento');
		$crud->set_subject('Eventos');
		$crud->set_relation('LUGAR','lugares','ID_LUGAR');
                $crud->unset_operations();
		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_example_output($output);
		} else {
			return $output;
		}
                
        }  

}
