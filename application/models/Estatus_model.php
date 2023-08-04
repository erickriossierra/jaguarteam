<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Estatus_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();

    }

    public function EstatusList()
    {
        $query=$this->db->get('estatus');
    //echo $this->db->last_query();
        return $query->result();

    }
    public function EstatusListPro()
    {
        $this->db->select("*");
        $this->db->where('id_est in (4,5,6)');

        $this->db->from("estatus");
        $query=$this->db->get();
    //echo $this->db->last_query();
        return $query->result();

    }
    public function EstatusListPag()
    {
        $this->db->select("*");
        $this->db->where('id_est in (7,8,9)');

        $this->db->from("estatus");
        $query=$this->db->get();
    //echo $this->db->last_query();
        return $query->result();

    }
    public function EstatusListPre()
    {
        $this->db->select("*");
        $this->db->where('id_est in (1,2,3)');

        $this->db->from("estatus");
        $query=$this->db->get();
    //echo $this->db->last_query();
        return $query->result();

    }
}