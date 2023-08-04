<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Vendedores_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();

    }

    public function VendedoresList()
    {
        $this->db->select("*, campus.nombre as nombre_esc, carreras.Nombre as nombre_carr");
        $this->db->from("vendedores");
        $this->db->join("campus", "vendedores.id_esc=campus.id");
        $this->db->join("carreras", "vendedores.id_carr=carreras.id");
        $this->db->join("sexos", "vendedores.id_sex=sexos.id_sex");
        $result = $this->db->get();
        //echo $this->db->last_query();
        if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }

    }

    public function GetBuscarVen($data)
    {
        $this->db->select('*');
        $this->db->from("vendedores");
        $this->db->like($data);
         $result = $this->db->get();
         //echo $this->db->last_query();
         if ($result->num_rows()>0) {
             return $result->result();
         }else{
             return False;
         }
    }

    public function CreateVendedor ($data)
    {
        $this->db->insert('vendedores', $data);
        //echo $this->db->last_query();

        return $this->db->insert_id();
    }

    public function GetIdPVen($id)
    {
        $this->db->select('*');
        $this->db->from("vendedores");
        $this->db->where($id);
         $result = $this->db->get();
         //echo $this->db->last_query();
         if ($result->num_rows()>0) {
             return $result->result();
         }else{
             return False;
         }
    }

     public function UpdateVendedor($data,$where)
    {
        $this->db->where($where);
        $this->db->update('vendedores', $data);
        //echo $this->db->last_query();
    }
}