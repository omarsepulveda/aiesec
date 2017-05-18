<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class aieseccontroller extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');
        $this->load->model("appmodel");
        $this->load->library('grocery_CRUD');
        $this->load->library('session');
        $this->config->base_url = "http://localhost/qr_code/";
    }

    public function _example_output($output = null) {
        $this->load->view('aiesecview.php', (array) $output);
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
        //$crud->required_fields('area');
        //$crud->columns('idArea','area');
        $crud->set_subject('Area');
        $crud->required_fields('area');

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
        $crud->set_subject('area_trabajo');

        $crud->required_fields('area');
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
        $crud->set_subject('detalles');
        $crud->display_as('cc', 'Usuarios incritos');
        $crud->unset_columns('FOTO', 'QR', 'cc');
        $crud->callback_column('VALOR', array($this, 'valueTopesos'));

        $output = $crud->render();

        $this->_example_output($output);
    }

    public function valueTopesos($value, $row) {
        return $value . ' &peso;';
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

    function multigrids() {
        $this->config->load('grocery_crud');
        $this->config->set_item('grocery_crud_dialog_forms', true);
        $this->config->set_item('grocery_crud_default_per_page', 20);

        $output1 = $this->area_management2();

        $output2 = $this->personas_management2();

        $output3 = $this->consultareventos_management2();

        $js_files = $output1->js_files + $output2->js_files + $output3->js_files;
        $css_files = $output1->css_files + $output2->css_files + $output3->css_files;
        $output = "<h1>AREAS DE TRABAJO DE LA EMPRESA</h1>" . $output1->output . "<h1>TABLA DE USUARIOA INSCRITOS</h1>" . $output2->output . "<h1> TABLA DE EVENTOS</h1>" . $output3->output;

        $this->_example_output((object) array(
                    'js_files' => $js_files,
                    'css_files' => $css_files,
                    'output' => $output
        ));
    }

    public function area_management2() {
        $crud = new grocery_CRUD();
        $crud->set_table('area_trabajo');
        $crud->set_subject('Area');
        $crud->unset_operations();
        $crud->set_crud_url_path(site_url(strtolower(__CLASS__ . "/" . __FUNCTION__)), site_url(strtolower(__CLASS__ . "/multigrids")));

        $output = $crud->render();

        if ($crud->getState() != 'list') {
            $this->_example_output($output);
        } else {
            return $output;
        }
    }

    public function personas_management2() {
        $crud = new grocery_CRUD();

        $crud->set_theme('datatables');
        $crud->set_table('personas');
        $crud->set_relation('AREATRABAJO', 'area_trabajo', 'ID_AREA');
        $crud->display_as('AREATRABAJO', 'Area de trabajo');
        $crud->set_subject('Personas');

        $crud->required_fields('DOCUMENTO');
        $crud->unset_operations();
        $crud->set_field_upload('file_url', 'assets/uploads/files');

        $crud->set_crud_url_path(site_url(strtolower(__CLASS__ . "/" . __FUNCTION__)), site_url(strtolower(__CLASS__ . "/multigrids")));

        $output = $crud->render();

        if ($crud->getState() != 'list') {
            $this->_example_output($output);
        } else {
            return $output;
        }
    }

    public function consultareventos_management2() {
        $crud = new grocery_CRUD();

        $crud->set_table('eventos');
        $crud->columns('NOMBRE_EVENTO', 'FECHA_INICIO', 'FECHA_FIN', 'NOMBRE_LUGAR', 'DESCRIPCION', 'VALOR', 'estado');
        $crud->display_as('NOMBRE_LUGAR', 'lugares')
                ->display_as('NOMBRE_EVENTO', 'Evento');
        $crud->set_subject('Eventos');
        $crud->set_relation('LUGAR', 'lugares', 'ID_LUGAR');
        $crud->unset_operations();
        $crud->set_crud_url_path(site_url(strtolower(__CLASS__ . "/" . __FUNCTION__)), site_url(strtolower(__CLASS__ . "/multigrids")));

        $output = $crud->render();

        if ($crud->getState() != 'list') {
            $this->_example_output($output);
        } else {
            return $output;
        }
    }

    function loggin() {
        $correo = $this->input->get("correo");
        $contraseña = $this->input->get("contraseña");
        $data = $this->appmodel->consultarLoggin($correo, $contraseña);
        if ($data != FALSE) {
            echo json_encode(array('personas' => $data));
        }
    }

    function registrar() {
        $usuarios = $this->appmodel->consultarusuarios();
        $documento = $this->input->post("documento");
        $existe = FALSE;
        if (usuarios != false) {
            foreach (usuarios as $u) {
                if (($u->DOCUMENTO) == $documento) {
                    $existe = TRUE;
                }
            }
        }
        if ($existe) {
            echo " El usuario ya existe";
        } else {
            $data['DOCUMENTO'] = $this->input->post("DOCUMENTO");
            $data['NOMBRES'] = $this->input->post("NOMBRES");
            $data['APELLIDOS'] = $this->input->post("APELLIDOS");
            $data['EMAIL'] = $this->input->post("EMAIL");
            $data['CLAVE'] = $this->input->post("CLAVE");
            $this->appmodel->registrarusuario($data);
            echo "Usuario Registrado con exito";
        }
    }
    
    
	public function enviar_qr()
	{
		//cargamos la libreria email de ci
		$this->load->library("email");

		//Configuracion para yahoo
		// $configYahoo = array(
		// 	'protocol' => 'smtp',
		// 	'smtp_host' => 'smtp.mail.yahoo.com',
		// 	'smtp_port' => 587,
		// 	'smtp_crypto' => 'tls',
		// 	'smtp_user' => 'emaildeyahoo',
		// 	'smtp_pass' => 'password',
		// 	'mailtype' => 'html',
		// 	'charset' => 'utf-8',
		// 	'newline' => "\r\n"
		// ); 


		//configuracion para gmail
		$configGmail = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'josej36.aguirre@gmail.com',
			'smtp_pass' => 'joseuptc1983',
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		);

		//cargamos la configuración para enviar con gmail
		$this->email->initialize($configGmail);

		$this->email->from('josej36.aguirre@gmail.com');
		$this->email->to("curaseco@gmail.com");
		$this->email->subject('AIESEC QR para ingreso al evento');
		$this->email->message('<h2>Correo con imagen</h2>
			<hr><br>
			AIESEC
			<br>
			<a href=""><img src="'.base_url().'/plantilla/assets/img/qrcode.png"></a>
			<h3>AIESEC no reenviar este mensaje</h3>'
			);


		for ($i=1; $i <=1 ; $i++) { 
			if ($this->email->send()) {
                            
                            echo "Enviado con éxito";
                           //redirect(base_url("aiesec/index.php/aieseccontroller"));
			}else{
				show_error($this->email->print_debugger());
			}
			sleep(1);
		}
	}
        
        	public function random($num){
		$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
		$string = '';
		for ($i = 0; $i < $num; $i++) {
		     $string .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $string;
	}
	
	public function generador_qr(){
		//cargamos la librería	
		$this->load->library('ciqrcode');
		//hacemos configuraciones
		$this->load->library('ciqrcode');

$params['data'] = 'This is a text to encode become QR Code';
$params['size'] = 10;
//$params['savename'] = FCPATH.'tes.png';
$this->ciqrcode->generate($params);
		//decimos el directorio a guardar el codigo qr, en este 
		//caso una carpeta en la raíz llamada qr_code
		$params['savename'] = FCPATH.'/plantilla/assets/img/qrcode.png';
		//generamos el código qr
		$this->ciqrcode->generate($params);	
		echo '<img src="'.base_url().'/plantilla/assets/img/qrcode.png" />';
	}

}
