<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subsectors_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();

    }

    public function SubSectorList($data)
    {
        $query=$this->db->get('subsector');
        //echo $this->db->last_query();
        return $query->result();

    }

    public function CreateSubSector($data)
    {
        $this->db->insert('subsector', $data);
      //  echo $this->db->last_query();
        return $this->db->insert_id();
    }

    public function UpdateSubSector($data,$where)
    {
        $this->db->where($where);
        $id=$this->db->update('subsector', $data);
        //echo $this->db->last_query();
        //print_r($id);
        //exit;
    }


    public function DeleteSubSector($where='')
    {
        $this->db->where($where);
        $this->db->delete('subsector');
        //echo $this->db->last_query();
    }

    public function GetIdSubSector($id='')
    {
        $this->db->where($id);
        $result = $this->db->get('subsector');
        //echo $this->db->last_query();
         if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }
    }

}
