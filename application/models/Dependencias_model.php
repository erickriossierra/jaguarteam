<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dependencias_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();

    }

    public function DependenciasList()
    {
        $this->db->select('*, dependencias.id as iddep, campus.nombre as campus');
        $this->db->from('dependencias');
        $this->db->join('campus', 'dependencias.campus_id=campus.id');
       // $this->db->order_by('nombre','asc');
        $query=$this->db->get();
//echo $this->db->last_query();
        return $query->result();

    }

    public function DespachosListForm()
    {
      $this->db->where(array('status'=>1));
        $query=$this->db->get('despachos');
//echo $this->db->last_query();
        return $query->result();

    }


    public function CreateDependencia($data)
    {
        $this->db->insert('dependencias', $data);
        echo $this->db->last_query();
        return $this->db->insert_id();
    }
//modificado
    public function UpdateDependencia($data,$where)
    {
        $this->db->where($where);
        $id=$this->db->update('dependencias', $data);
        //echo $this->db->last_query();
        //print_r($id);
        //exit;
    }


    public function DeleteDespachos($where='')
    {
        $this->db->where($where);
        $this->db->delete('despachos');
        //echo $this->db->last_query();
    }
//modificado no borrar
    public function GetIdDependencia($id='')
    {
        $this->db->select('*, dependencias.id as iddep,colonias.nombre as colonia, campus.nombre as campus');
        $this->db->from('dependencias');
        $this->db->join('colonias', 'dependencias.colonia_id=colonias.id');
        $this->db->join('campus', 'dependencias.campus_id=campus.id');
        $this->db->where($id);
        $result = $this->db->get();
        //echo $this->db->last_query();
         if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }
    }
//modificado no borrar

    public function GetBuscarCampus($data)
    {
      $this->db->like($data);
      $result = $this->db->get('campus');
      //echo $this->db->last_query();
      if ($result->num_rows()>0) {
          return $result->result();
      }else{
          return False;
      }

    }

}
