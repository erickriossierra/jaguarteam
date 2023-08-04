<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Ropas_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();

    }

    public function RopasList()
    {
        $query=$this->db->get('playeras');
    //echo $this->db->last_query();
        return $query->result();

    }
}