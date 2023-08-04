<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagos_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();

    }

    public function CreatePago($data)
    {
        $this->db->insert('pagos', $data);
        //echo $this->db->last_query();

        return $this->db->insert_id();
    }

    public function GetIdPago($id)
    {//Se debe modificar los valores de 180 y 80 por si cambian precios
        $this->db->select("id_pago,((SELECT cantidad from pedidos where id_ped =".$id.") * 180) as total,(((SELECT cantidad from pedidos where id_ped =".$id.") * 180)-((SELECT cantidad from pedidos where id_est =2 and id_ped=".$id.") * 80) ) as saldo, ((SELECT cantidad from pedidos where id_est =2 and id_ped=".$id.") * 80) as ant");
        $this->db->from("pagos");
       // $this->db->join("pedidos", "pagos.id_ped=pedidos.id_ped");
         //$this->db->join("carreras", "carreras.id=clientes.id_carr");
         //$this->db->where($id);
         $result = $this->db->get();
            //echo $this->db->last_query();
            if ($result->num_rows()>0) {
                return $result->result();
            }else{
                return False;
            }
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
        $this->db->where("estatus.id_est =2");
        $result = $this->db->get();
        //echo $this->db->last_query();
        if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }

    }    
}