<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Colonias_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();

    }

    public function ColoniasList()
    {
        $this->db->order_by('nombre','asc');
        $query=$this->db->get('colonias');
//echo $this->db->last_query();
        return $query->result();

    }

    public function ColoniasListForm()
    {
      $this->db->where(array('status'=>1));
        $query=$this->db->get('colonias');
//echo $this->db->last_query();
        return $query->result();

    }


    public function CreateColonias($data)
    {
        $this->db->insert('colonias', $data);
        echo $this->db->last_query();
        return $this->db->insert_id();
    }

    public function UpdateColonias($data,$where)
    {
        $this->db->where($where);
        $id=$this->db->update('colonias', $data);
        //echo $this->db->last_query();
        //print_r($id);
        //exit;
    }


    public function DeleteColonias($where='')
    {
        $this->db->where($where);
        $this->db->delete('colonias');
        //echo $this->db->last_query();
    }

    public function GetIdColonias($id='')
    {
        $this->db->where($id);
        $result = $this->db->get('colonias');
        //echo $this->db->last_query();
         if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }
    }

public function GetBuscarColonia($data)
    {
      
     $this->db->select('*');
     $this->db->from("colonias");
      $this->db->like($data);
      $result = $this->db->get();
      //echo $this->db->last_query();
      if ($result->num_rows()>0) {
          return $result->result();
      }else{
          return False;
      }

    }

}
