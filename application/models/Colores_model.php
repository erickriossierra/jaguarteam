<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Colores_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();

    }

    public function ColoresList()
    {
        $query=$this->db->get('colores');
    //echo $this->db->last_query();
        return $query->result();

    }
}