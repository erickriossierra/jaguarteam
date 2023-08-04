<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Representantes_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();

    }

    public function CreateEmpresa($data)
    {
        $this->db->insert('empresas', $data);
        //echo $this->db->last_query();

        return $this->db->insert_id();
    }


    public function RepresentanteList()
    {

        $this->db->select("*");
        $this->db->select("tipo_tramite.nombre as Tipo");
        $this->db->from("contprac");
        $this->db->join("tipo_tramite", "contprac.Tipo_Estadia = tipo_tramite.id");
       // $this->db->join("empresas", "contprac.empresas_id = empresas.id");
      
        $result = $this->db->get();
        //echo $this->db->last_query();
        if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }

    }
       public function RepresentanteList2()
    {

        $this->db->select("*");
        $this->db->select("tipo_tramite.nombre as Tipo");
        $this->db->from("contprac");
        $this->db->join("tipo_tramite", "contprac.Tipo_Estadia = tipo_tramite.id");
       // $this->db->join("empresas", "contprac.empresas_id = empresas.id");
      
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

    public function DeleteEmpresasContact($id){

      $this->db->where($id);
      $this->db->delete('contactos');

    }


}
