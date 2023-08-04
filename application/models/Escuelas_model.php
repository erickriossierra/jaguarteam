<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Escuelas_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();

    }

    public function EscuelasList()
    {
        $query=$this->db->get('campus');
    //echo $this->db->last_query();
        return $query->result();

    }
    
 }
    