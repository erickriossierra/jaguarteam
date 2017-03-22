<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresas_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();

    }

    public function CreateEmpresa($data)
    {
        $this->db->insert('empresas', $data);
        echo $this->db->last_query();

        return $this->db->insert_id();
    }


    public function EmpresaList()
    {

        $this->db->select("*");
        $this->db->select("empresas.id as empresasid");
        $this->db->select("giro.nombre as giroempresa");
        $this->db->from("empresas");
        $this->db->join("giro", "empresas.giro_id = giro.id");
        $this->db->join("clasificacion_empresa", "empresas.clasificacion_empresa_id = clasificacion_empresa.id");
        $result = $this->db->get();
        //echo $this->db->last_query();
        if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }

    }

    public function UpdateEmpresa($data,$where)
    {
        $this->db->where($where);
        $this->db->update('empresas', $data);
        //echo $this->db->last_query();
    }

    public function DeleteEmpresa($where)
    {
        $this->db->where($where);
        $this->db->delete('empresas');
        //echo $this->db->last_query();
    }


    public  function GetIdEmpresa($id){

        $this->db->where($id);
        $result = $this->db->get('empresas');
        //echo $this->db->last_query();
        if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }
    }

    public function GetBuscarEmpresa($data)
    {
      $this->db->like($data);
      $result = $this->db->get('empresas');
      //echo $this->db->last_query();
      if ($result->num_rows()>0) {
          return $result->result();
      }else{
          return False;
      }

    }

    public function clasificacionEmpresaList()
    {

        $result = $this->db->get('clasificacion_empresa');
       // echo $this->db->last_query();
        if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }

    }
    public function estadosList()
    {

        $result = $this->db->get('entidades');
       // echo $this->db->last_query();
        if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }

    }

  public function CreateContactoEmpresa($data)
  {
      $this->db->insert('contactos', $data);
      //  echo $this->db->last_query();

      return $this->db->insert_id();
  }




  public function UpdateContactoEmpresa($data,$where)
  {
          $this->db->where($where);
        $this->db->update('contactos', $data);
         //echo $this->db->last_query();

      }

    public function ContactoByEmpresaList($data="")
    {
      $this->db->select("*");
      $this->db->select("contactos.id as contactoid");
      $this->db->from("contactos");
      $this->db->join("empresas", "contactos.empresas_id= empresas.id ");
      if($data!=''){
      $this->db->where($data);
      }
      $result = $this->db->get();
      //echo $this->db->last_query();
      if ($result->num_rows()>0) {
          return $result->result();
      }else{
          return False;
      }
    }


}
