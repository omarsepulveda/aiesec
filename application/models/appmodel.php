<?php

class appmodel extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insertarUsuario($data) {
        $this->db->insert('personas', $data);
    }

    public function consultarLoggin($correo, $contraseña) {
        $data = $this->db->query("select * from personas p, area_trabajo a where p.AREATRABAJO=A.ID_AREA AND EMAIL = '$correo' AND CLAVE = '$contraseña'AND"
                . " ID_AREA=3");
        // $contrasena = $this->db->query("select contrasena from personas where contrasena = '" . $contrasena . "'");

        if ($data->num_rows() > 0) {
            $data = $data->result();

            return $data;
            //elseif ($contrasena->num_rows()>0) {
        } else {
            return FALSE;
        }
    }

    public function consultarusuarios() {
        $data = $this->db->query("select * from personas");
        if ($data->num_rows() > 0) {
            $data = $data->result();
            return $data;
        } else {
            return FALSE;
        }
    }

    public function consultarEventos($cadena) {
        $data = $this->db->query("select * from eventos where lugar LIKE '%" . $cadena . "%' or nombre LIKE '%" . $cadena . "%' or valor LIKE '%" . $cadena . "%'");
        if ($data->num_rows() > 0) {
            $data = $data->result();
            return $data;
        } else {
            return FALSE;
        }
    }

    public function consultarPersonas() {
        $consulta = $this->db->get("personas");
        // $data = $this->db->query("select * from personas

        if ($consulta->num_rows() > 0) {
            $consulta = $consulta->result();
            return $consulta;
        } else {
            return FALSE;
        }
    }

    public function consultar_incritos_evetos() {
        $consulta = $this->db->get("detalles_evento");
        // $data = $this->db->query("select * from );

        if ($consulta->num_rows() > 0) {
            $consulta = $consulta->result();
            return $consulta;
        } else {
            return FALSE;
        }
    }

    public function eliminar($id) {
        $eliminar = $this->db->query("DELETE FROM personas WHERE numeroDocumento = $id");
    }

    public function sumar_valor() {
        $total = $this->db->query("SELECT SUM(valor) as total FROM detalles_evento");
        $total = $total->result();
        return $total[0]->total;
    }

    public function Correo($cc,$eve){
       $data = $this->db->query("select email from personas p,detalles_evento dt
                              where p.documento=dt.cc
                              and dt.eventos =$eve
                              and dt.cc=$cc
                               and foto is not null" );
           if ($data->num_rows() > 0) {
            $data = $data->result();
         return $data;
           } else {
           return FALSE;
      }
   }
   


}
