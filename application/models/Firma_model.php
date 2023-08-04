<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Firma_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();

    }


    public function FirmList()
    {
        $this->db->select("*");
		$this->db->from("firma_sade");
        $result = $this->db->get();
       // echo $this->db->last_query();
        if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }

    }
        public function reportefirmas()
    {
        $this->db->select("*, CONCAT(nombre, ' ', apellido_p, ' ', apellido_m) as nombreC");
        $this->db->from("firma_sade");
        $this->db->join("usuarios", "firma_sade.id_usuario=usuarios.id");
       // $this->db->where($id);
        $this->db->order_by('firma_sade.id');
        $result = $this->db->get();
       // echo $this->db->last_query();
        if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }

    }
    /*   */
    public function User($id='')
    {
        $this->db->select("*, CONCAT(nombre, ' ', apellido_p, ' ', apellido_m) as nombreC");
        $this->db->from("firma_sade");
        $this->db->join("usuarios", "firma_sade.id_usuario=usuarios.id");
        $this->db->where($id);
        $result = $this->db->get();
       // echo $this->db->last_query();
        if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }

    }

    public function UpdateUser($data,$where)
    {
        $this->db->where($where);
        $this->db->update('usuarios', $data);
        //echo $this->db->last_query();
    }

    public function DeleteUser($where)
    {
        $this->db->where($where);
        $this->db->delete('usuarios');
        //echo $this->db->last_query();
    }


    public  function GetIdUser($id){

        $this->db->where($id);
        $result = $this->db->get('usuarios');
        //echo $this->db->last_query();
        if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }
    }




    /*Tabla tipo de usuarios*/

    public function GetAllTipoUsuario()
    {

      $result = $this->db->get('tipo_usuario');
     // echo $this->db->last_query();
      if ($result->num_rows()>0) {
          return $result->result();
      }else{
          return False;
      }

    }
    /*Tabla tipo de trámites*/
    public function GetAllTipotramites()
    {

      $result = $this->db->get('cat_tramites');
     // echo $this->db->last_query();
      if ($result->num_rows()>0) {
          return $result->result();
      }else{
          return False;
      }

    }
}
