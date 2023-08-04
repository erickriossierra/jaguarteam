<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventarios_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();

    }

    public function CreateInv($data)
    {
        $this->db->insert('inventarios', $data);
        //echo $this->db->last_query();

        return $this->db->insert_id();
    }


    public function InventariosList()
    {

        $this->db->select(" *,ponchadodel.tipo as tipo_pd, ponchadotra.tipo as tipo_pt ");
        $this->db->from("inventarios");
       // $this->db->join("clientes", "pedidos.id_cli=clientes.id_cli");
        $this->db->join("playeras", "inventarios.id_tipo=playeras.id_play");
        $this->db->join("sexos", "inventarios.id_tc=sexos.id_sex");
        $this->db->join("colores", "inventarios.id_color=colores.id_color");
        $this->db->join("tallas", "inventarios.id_talla=tallas.id_talla");
        $this->db->join("ponchadodel", "inventarios.id_ponD=ponchadodel.id_ponD");
        $this->db->join("ponchadotra", "inventarios.id_ponT=ponchadotra.id_ponT");
        $result = $this->db->get();
        //echo $this->db->last_query();
        if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }

    }

    public function UpdateInv($data,$where)
    {
        $this->db->where($where);
        $this->db->update('inventarios', $data);
        //echo $this->db->last_query();
    }

    public function DeletePedidos($where)
    {
        $this->db->where($where);
        $this->db->delete('Pedidos');
        //echo $this->db->last_query();
    }


    public  function GetIdInv($id){
        $this->db->select("*");
        $this->db->from("inventarios");
       // $this->db->join("clientes", "inventarios.id_cli=clientes.id_cli");
        $this->db->join("playeras", "inventarios.id_tipo=playeras.id_play");
        $this->db->join("sexos", "inventarios.id_tc=sexos.id_sex");
        $this->db->join("colores", "inventarios.id_color=colores.id_color");
        $this->db->join("tallas", "inventarios.id_talla=tallas.id_talla");
       // $this->db->join("estatus", "inventarios.id_est=estatus.id_est");
        $this->db->where($id);
        $result = $this->db->get();
        //echo $this->db->last_query();
        if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }
    }

}