<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Tallas_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();

    }

    public function TallasList()
    {
        $query=$this->db->get('tallas');
    //echo $this->db->last_query();
        return $query->result();

    }
}