<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Giros_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();

    }

    public function GirosList()
    {
        $query=$this->db->get('giro');
//echo $this->db->last_query();
        return $query->result();

    }
    public function GirosListForm()
    {
        $this->db->where(array('status'=>1));
        $query=$this->db->get('giro');
//echo $this->db->last_query();
        return $query->result();

    }

    public function CreateGiros($data)
    {
        $this->db->insert('giro', $data);
        echo $this->db->last_query();
        return $this->db->insert_id();
    }

    public function UpdateGiros($data,$where)
    {
        $this->db->where($where);
        $id=$this->db->update('giro', $data);
        //echo $this->db->last_query();
        //print_r($id);
        //exit;
    }


    public function DeleteGiros($where='')
    {
        $this->db->where($where);
        $this->db->delete('giro');
        //echo $this->db->last_query();
    }

    public function GetIdGiros($id='')
    {
        $this->db->where($id);
        $result = $this->db->get('giro');
        //echo $this->db->last_query();
         if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }
    }

}
