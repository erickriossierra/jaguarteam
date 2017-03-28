<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Despachos_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();

    }

    public function DespachosList()
    {
        $this->db->order_by('nombre','asc');
        $query=$this->db->get('despachos');
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


    public function CreateDespachos($data)
    {
        $this->db->insert('despachos', $data);
        echo $this->db->last_query();
        return $this->db->insert_id();
    }

    public function UpdateDespachos($data,$where)
    {
        $this->db->where($where);
        $id=$this->db->update('despachos', $data);
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

    public function GetIdDespachos($id='')
    {
        $this->db->where($id);
        $result = $this->db->get('despachos');
        //echo $this->db->last_query();
         if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }
    }

    public function GetBuscarDespacho($data)
    {
      $this->db->like($data);
      $result = $this->db->get('despachos');
      //echo $this->db->last_query();
      if ($result->num_rows()>0) {
          return $result->result();
      }else{
          return False;
      }

    }

}
