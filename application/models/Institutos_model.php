<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Institutos_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();

    }

    public function InstitutosList()
    {
        $this->db->select("*");
        $this->db->from ("institutos");
        $this->db->order_by('nombre','asc');
        $query=$this->db->get();
//echo $this->db->last_query();
        return $query->result();

    }

    public function AsignaturasListForm()
    {
      $this->db->where(array('id'=>1));
        $query=$this->db->get('asignaturas');
//echo $this->db->last_query();
        return $query->result();

    }


    public function CreateInstituto($data)
    {
        $this->db->insert('institutos', $data);
        echo $this->db->last_query();
        return $this->db->insert_id();
    }

    public function UpdateInstituto($data,$where)
    {
        $this->db->where($where);
        $id=$this->db->update('institutos', $data);
        //echo $this->db->last_query();
    }


    public function DeleteAsignatura($where='')
    {
        $this->db->where($where);
        $this->db->delete('asignaturas');
        //echo $this->db->last_query();
    }

    public function GetIdInstituto($id='')
    {
        $this->db->select("*");

        $this->db->from("institutos");

        $this->db->where($id);
        $result = $this->db->get();
        //echo $this->db->last_query();
         if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }
    }

/*
      public function CarreraList()
    {
        $this->db->order_by('nombre','asc');
        $query=$this->db->get('institutos');
        //echo $this->db->last_query();
        return $query->result();

    }*/

}