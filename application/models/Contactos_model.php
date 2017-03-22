<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactos_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();

    }

    public function CreateContacto($data)
    {
        $this->db->insert('contacto', $data);
        echo $this->db->last_query();

        return $this->db->insert_id();
    }


    public function ContactoList()
    {

        $this->db->select("*");
        $this->db->select("contacto.id as contactoid");
        $this->db->select("giro.nombre as giroempresa");
        $this->db->from("contacto");
        $this->db->join("giro", "contacto.giro_id = giro.id");
        $this->db->join("clasificacion_empresa", "contacto.clasificacion_empresa_id = clasificacion_empresa.id");
        $result = $this->db->get();
        //echo $this->db->last_query();
        if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }

    }

    public function UpdateContacto($data,$where)
    {
        $this->db->where($where);
        $this->db->update('contacto', $data);
        //echo $this->db->last_query();
    }

    public function DeleteContacto($where)
    {
        $this->db->where($where);
        $this->db->delete('contacto');
        //echo $this->db->last_query();
    }


    public  function GetIdContacto($id){

        $this->db->where($id);
        $result = $this->db->get('contacto');
        //echo $this->db->last_query();
        if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }
    }

    public function GetBuscarContacto($data)
    {
      $this->db->like($data);
      $result = $this->db->get('contacto');
      //echo $this->db->last_query();
      if ($result->num_rows()>0) {
          return $result->result();
      }else{
          return False;
      }

    }






}
