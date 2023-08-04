<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Carreras_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();

    }

    public function CarrerasList()
    {
        $query=$this->db->get('carreras');
    //echo $this->db->last_query();
        return $query->result();

    }
    
 }