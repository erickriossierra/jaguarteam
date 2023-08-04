<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();

    }

    public function CreatePedido($data)
    {
        $this->db->insert('Pedidos', $data);
        //echo $this->db->last_query();

        return $this->db->insert_id();
    }


    public function PedidosList()
    {

        $this->db->select("*,clientes.nombre as Nombre_cli");
        $this->db->from("pedidos");
        $this->db->join("clientes", "pedidos.id_cli=clientes.id_cli");
        $this->db->join("playeras", "pedidos.id_play=playeras.id_play");
        $this->db->join("sexos", "pedidos.id_tc=sexos.id_sex");
        $this->db->join("colores", "pedidos.id_color=colores.id_color");
        $this->db->join("tallas", "pedidos.id_talla=tallas.id_talla");
        $this->db->join("estatus", "pedidos.id_est=estatus.id_est");
        $result = $this->db->get();
        //echo $this->db->last_query();
        if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }

    }

    public function UpdatePedido($data,$where)
    {
        $this->db->where($where);
        $this->db->update('Pedidos', $data);
        //echo $this->db->last_query();
    }

    public function DeletePedidos($where)
    {
        $this->db->where($where);
        $this->db->delete('Pedidos');
        //echo $this->db->last_query();
    }


    public  function GetIdPedido($id){
        $this->db->select("*, clientes.Nombre as  Nombre_cli");
        $this->db->from("pedidos");
        $this->db->join("clientes", "pedidos.id_cli=clientes.id_cli");
        $this->db->join("playeras", "pedidos.id_play=playeras.id_play");
        $this->db->join("sexos", "pedidos.id_tc=sexos.id_sex");
        $this->db->join("colores", "pedidos.id_color=colores.id_color");
        $this->db->join("tallas", "pedidos.id_talla=tallas.id_talla");
        $this->db->join("estatus", "pedidos.id_est=estatus.id_est");
        $this->db->where($id);
        $result = $this->db->get();
        //echo $this->db->last_query();
        if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }
    }

    public function GetBuscarPedidos($data)
    {
      $this->db->like($data);
      $result = $this->db->get('Pedidos');
      //echo $this->db->last_query();
      if ($result->num_rows()>0) {
          return $result->result();
      }else{
          return False;
      }

    }
    public function ContactoByClienteList($id)
    {
        $this->db->select("*, clientes.Nombre as  Nombre_cli, carreras.nombre as Carr");
        $this->db->from("pedidos");
        $this->db->join("clientes", "pedidos.id_cli=clientes.id_cli");
         $this->db->join("carreras", "carreras.id=clientes.id_carr");
         $this->db->where($id);
         $result = $this->db->get();
            //echo $this->db->last_query();
            if ($result->num_rows()>0) {
                return $result->result();
            }else{
                return False;
            }
    }

        public function PedidosListA()
    {

        $this->db->select("*,clientes.nombre as Nombre_cli");
        $this->db->from("pedidos");
        $this->db->join("clientes", "pedidos.id_cli=clientes.id_cli");
        $this->db->join("playeras", "pedidos.id_play=playeras.id_play");
        $this->db->join("sexos", "pedidos.id_tc=sexos.id_sex");
        $this->db->join("colores", "pedidos.id_color=colores.id_color");
        $this->db->join("tallas", "pedidos.id_talla=tallas.id_talla");
        $this->db->join("estatus", "pedidos.id_est=estatus.id_est");
        $this->db->where("pedidos.id_est=3");
        $result = $this->db->get();
        //echo $this->db->last_query();
        if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }

    }

   



}
