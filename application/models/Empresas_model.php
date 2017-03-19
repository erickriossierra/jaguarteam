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
        //echo $this->db->last_query();

        return $this->db->insert_id();
    }


    public function EmpresaList()
    {

        $result = $this->db->get('empresas');
       // echo $this->db->last_query();
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





}
