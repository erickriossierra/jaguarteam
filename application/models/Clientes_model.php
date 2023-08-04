<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Clientes_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();

    }

    public function ClientesList()
    {
        $query=$this->db->get('clientes');
    //echo $this->db->last_query();
        return $query->result();

    }
    public function GetBuscarCli($data)
    {
        $this->db->select('*');
        $this->db->from("clientes");
        $this->db->like($data);
         $result = $this->db->get();
         //echo $this->db->last_query();
         if ($result->num_rows()>0) {
             return $result->result();
         }else{
             return False;
         }
    }
    public function ClientesListJson()
    {
        $this->db->select('*, clientes.Nombre as Nombre_cli, carreras.Nombre as nombre_carr, campus.nombre as nombre_esc');
        $this->db->from("clientes"); 
        $this->db->join("sexos", "clientes.id_sex=sexos.id_sex");
        $this->db->join("carreras", "clientes.id_carr=carreras.id");
        $this->db->join("campus", "clientes.id_esc=campus.id");
        $result = $this->db->get();
            //echo $this->db->last_query();
            if ($result->num_rows()>0) {
                return $result->result();
            }else{
                return False;
            }
    }

    public function CreateCliente($data)
    {

        $this->db->insert('clientes', $data);
        //echo $this->db->last_query();

        return $this->db->insert_id();
    
    }

    public  function GetIdCliente($id)
    {
        $this->db->select("*, clientes.Nombre as nombre_cli, campus.nombre as escuela, carreras.nombre as carrera");
        $this->db->from("clientes");
        $this->db->join("carreras", "clientes.id_carr=carreras.id");
        $this->db->join("campus", "clientes.id_esc=campus.id");
        $this->db->join("sexos", "clientes.id_sex=sexos.id_sex");
       
        $this->db->where($id);
        $result = $this->db->get();
        //echo $this->db->last_query();
        if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }
    }

    public function UpdateContact($data,$where)
    {
         $this->db->where($where);
        $this->db->update('clientes', $data);
    }
}