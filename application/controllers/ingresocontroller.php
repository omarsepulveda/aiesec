<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ingresocontroller extends CI_Controller {
    
    
    public function __construct() {
        parent::__construct();
        
        $this->load->database();
        $this->load->helper('url');
          $this->load->model("appmodel");
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper(array('url', 'form'));
       // $this->load->models('appmodel');
    }

    public function index() {
         $this->load->view('ingreso_view');
         
       
    }

    function login() {
// $correo = $this->input->get("correo");
//$contraseña = $this->input->get("contraseña");

        if (isset($_POST['CLAVE'])) {
// echo json_encode(array('personas' => $data));

            if ($this->appmodel->consultarLoggin(md5($_POST['EMAIL']), md5($_POST['CLAVE']))) {
                redirect('aieseccontroller');
            } else {
                $this->load->view('ingreso_view.php');
            }
        }
        $this->load->view('ingreso_view.php');
    }
    
   
    public function registro(){
        $this->load->view('registro_view.php');
    }
            function registrar() {
        $usuarios = $this->appmodel->consultarusuarios();
        $DOCUMENTO = $this->input->post("DOCUMENTO");
        $existe = FALSE;
        if ($usuarios != false) {
            foreach ($usuarios as $u) {
                if (($u->DOCUMENTO) == $DOCUMENTO) {
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
            $data['TIPO'] = $this->input->post('selCombo');
            $data['EMAIL'] = $this->input->post("EMAIL");
            $data['CLAVE'] = md5($this->input->post("CLAVE"));
            $this->appmodel->insertarUsuario($data);
            echo "Usuario Registrado con exito";
             $this->load->view('ingreso_view.php');
        }
    }

   
    public function auteticacion() {
        switch ($this->session->userdata('perfil')) {
            case '':
                $data['token'] = $this->token();
//$data['titulo'] = 'Login con roles de usuario en codeigniter';
                $this->load->view('aiesecview', $data);
                break;
            case 'administrador':
                redirect(base_url() . 'admin');
                break;
            case 'vicepresidente':
                redirect(base_url() . 'vicep');
                break;
            case 'usuario':
                redirect(base_url() . 'usuario');
                break;
            default:
                $data['titulo'] = 'AIESEC';
                $this->load->view('loginView', $data);
                break;
        }
    }

   
    public function token() {
        $token = md5(uniqid(rand(), true));
        $this->session->set_userdata('token', $token);
        return $token;
    }

    public function serrar_session() {
        $this->session->sess_destroy();
        $this->load->view('ingreso_view.php');
    }
   public function mostrareventos($nombre_evento){
       
   }

}

