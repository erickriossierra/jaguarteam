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
    public function SubSectorLists()
    {
        
        $this->db->order_by('nombre');
        $query=$this->db->get('subsector');
        //echo $this->db->last_query();
        return $query->result();

    }
    public function SubSectorListsForm()
    {
        $this->db->where('sector_id=2');
        $this->db->order_by('nombre');
        $query=$this->db->get('subsector');
        //echo $this->db->last_query();
        return $query->result();

    }
    
    public function SubSectorListsForm2()
    {
        $this->db->where('sector_id=3');
        $this->db->order_by('nombre');        
        $query=$this->db->get('subsector');
        //echo $this->db->last_query();
        return $query->result();

    }
    public function SubSectorListsForm3()
    {
        $this->db->where('sector_id=4');
        $this->db->order_by('nombre');
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

    public function GetIdSubSector_Sector($id='')
    {
        $this->db->select('*, subsector.id as idsub, subsector.nombre as sub');
        $this->db->from("subsector");
        $this->db->join("sector", "subsector.sector_id=sector.id");
        $this->db->where($id);
       // $this->db->order_by("subsector.nombre","DESC");

        $result = $this->db->get();
        //echo $this->db->last_query();
         if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }
    }

}
