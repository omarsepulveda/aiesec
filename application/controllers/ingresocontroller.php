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
            $email = $_POST['EMAIL'];
            if ($this->appmodel->consultarLoggin($email, md5($_POST['CLAVE']))) {
                $newuser = array(
                    'email' => $email,
                    'islogin' => TRUE
                );
                $this->session->set_userdata($newuser);
                redirect('aieseccontroller');
            }
        }
        $datos['inicio'] = "aprendiendo codeigniter";
        $this->load->view('ingreso_view', $datos);
    }

    public function registro() {
        $this->load->view('registro_view');
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
            $datos['registro'] = FALSE;
            $this->load->view('registro_view', $datos);
        } else {
            $data['DOCUMENTO'] = $this->input->post("DOCUMENTO");
            $data['NOMBRES'] = $this->input->post("NOMBRES");
            $data['APELLIDOS'] = $this->input->post("APELLIDOS");
            $data['TIPO'] = $this->input->post('selCombo');
            $data['EMAIL'] = $this->input->post("EMAIL");
            $data['CLAVE'] = md5($this->input->post("CLAVE"));
            $this->appmodel->insertarUsuario($data);
            $datos['registro'] = FALSE;
            $this->load->view('ingreso_view.php', $datos);
               echo "<script>alert('Estás suscrito, ¡Gracias!.');</script>";

                 redirect('PaquetesController', 'refresh');
        }
    }

    public function Cerrar_session() {
        $this->session->sess_destroy();
        $this->load->view('ingreso_view');
    }

    public function mostrareventos($nombre_evento) {
      //  $this->db->insert(TABLE_PRODUCTOS, $data);

     
    }

}
