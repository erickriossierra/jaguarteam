<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Despachos_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();

    }

    public function DespachosList()
    {
        $this->db->order_by('nombre','asc');
        $query=$this->db->get('despachos');
//echo $this->db->last_query();
        return $query->result();

    }
    public function DespachoList($id='')
    {
        $this->db->select('*,despachos.id as iddespacho,despachos.nombre as despacho,colonias.nombre as colonia');
        
        $this->db->join('colonias', 'despachos.id_colonia=colonias.id');
       // $this->db->where($id);
        $result = $this->db->get('despachos');
        //echo $this->db->last_query();
         if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }
    }

    public function DespachosListForm()
    {
      $this->db->where(array('status'=>1));
        $query=$this->db->get('despachos');
//echo $this->db->last_query();
        return $query->result();

    }


    public function CreateDespachos($data)
    {
        $this->db->insert('despachos', $data);
        echo $this->db->last_query();
        return $this->db->insert_id();
    }

    public function UpdateDespachos($data,$where)
    {
        $this->db->where($where);
        $id=$this->db->update('despachos', $data);
        //echo $this->db->last_query();
        //print_r($id);
        //exit;
    }


    public function DeleteDespachos($where='')
    {
        $this->db->where($where);
        $this->db->delete('despachos');
        //echo $this->db->last_query();
    }

    public function GetIdDespachos($id='')
    {
        $this->db->select('*, despachos.id as idDespa, despachos.nombre as Despa,colonias.nombre as colonia');
        
        $this->db->join('colonias', 'despachos.id_colonia=colonias.id');
        $this->db->where($id);
        $result = $this->db->get('despachos');
        //echo $this->db->last_query();
         if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }
    }

    public function GetBuscarDespacho($data)
    {
      $this->db->like($data);
      $result = $this->db->get('despachos');
      //echo $this->db->last_query();
      if ($result->num_rows()>0) {
          return $result->result();
      }else{
          return False;
      }

    }
    public function ContactoByDespachoList($data="")
    {
      $this->db->select(" contactos.id as idContac, contactos.nombre as nombrecont,despachos.id as iddesp, contactos.id as contactoid,  despachos.nombre as Despacho,colegio,correo,telefono,depto") ;
      $this->db->from("contactos");
      $this->db->join("despachos", "contactos.despacho_id= despachos.id ");
      //$this->db->join("giro", "empresas.giro_id=giro.id");
      if($data!=''){
      $this->db->where($data);
      }
      $result = $this->db->get();
      //echo $this->db->last_query();
      if ($result->num_rows()>0) {
          return $result->result();
      }else{
          return False;
      }
    }

public function CreateContactoDespacho($data)
  {
      $this->db->insert('contactos', $data);
      //  echo $this->db->last_query();

      return $this->db->insert_id();
  }
 public function UpdateContactoDespacho($data,$where)
  {
        $this->db->where($where);
        $this->db->update('contactos', $data);
         //echo $this->db->last_query();

      }
public function DeleteDespachoContact($id){

      $this->db->where($id);
      $this->db->delete('contactos');

    }
}
