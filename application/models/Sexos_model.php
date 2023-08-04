<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Sexos_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();

    }

    public function SexosList()
    {
        $query=$this->db->get('sexos');
    //echo $this->db->last_query();
        return $query->result();

    }
}