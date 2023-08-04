<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();

    }

    public function CreatePedidos($data)
    {
        $this->db->insert('Pedidos', $data);
        //echo $this->db->last_query();

        return $this->db->insert_id();
    }


    public function PedidosList()
    {

        $this->db->select("*, CONCAT(empresas.nombre_razon_social ,' ',giro.nombre) AS nombre_comp");
        $this->db->select("empresas.id as empresasid");
        $this->db->select("giro.nombre as giroempresa");
        $this->db->select("colonias.nombre as colonia, colonias.CP");
        $this->db->from("empresas");
        $this->db->join("giro", "empresas.giro_id = giro.id");
        $this->db->join("colonias", "empresas.colonia_id = colonias.id");
        $this->db->join("clasificacion_empresa", "empresas.clasificacion_empresa_id = clasificacion_empresa.id");
        $result = $this->db->get();
        //echo $this->db->last_query();
        if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }

    }

    public function UpdatePedidos($data,$where)
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


    public  function GetIdPedidos($id){
        $this->db->select("*, empresas.id as idemp, colonias.id as idcol,colonias.nombre as Colonia, CONCAT(empresas.nombre_razon_social ,' ',giro.nombre) AS nombre_comp, giro.nombre as giro");
        $this->db->from("empresas");
        $this->db->join("colonias", "empresas.colonia_id=colonias.id ");
        $this->db->join("giro", "empresas.giro_id=giro.id ");
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



}
