<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sectors_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();

    }

    public function SectorsList()
    {
        $query=$this->db->get('sector');
//echo $this->db->last_query();
        return $query->result();

    }

    public function CreateSectors($data)
    {
        $this->db->insert('sector', $data);
        echo $this->db->last_query();
        return $this->db->insert_id();
    }

    public function UpdateSectors($data,$where)
    {
        $this->db->where($where);
        $id=$this->db->update('sector', $data);
        //echo $this->db->last_query();
        //print_r($id);
        //exit;
    }


    public function DeleteSectors($where='')
    {
        $this->db->where($where);
        $this->db->delete('sector');
        //echo $this->db->last_query();
    }

    public function GetIdSectors($id='')
    {
        $this->db->where($id);
        $result = $this->db->get('sector');
        //echo $this->db->last_query();
         if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }
    }

}
