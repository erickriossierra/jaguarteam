<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solicitudes_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();

    }

    public function SolList2($id)
    {
        $this->db->select("*, solicitudes.id as idSol,tipo_tramite.nombre as tramite");
		$this->db->from("solicitudes");
		$this->db->join("estatus_practicas","solicitudes.id_estado=estatus_practicas.id");
        $this->db->join("tipo_tramite","solicitudes.id_tipo_solicitud=tipo_tramite.id");
        $this->db->where($id);
        $this->db->where('id_tipo_solicitud=3');
        $result = $this->db->get();
       // echo $this->db->last_query();
        if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }

    }

     public function SolList()
    {
        $this->db->select("*, solicitudes.id as idSol,tipo_tramite.nombre as tramite");
        $this->db->from("solicitudes");
        $this->db->join("estatus_practicas","solicitudes.id_estado=estatus_practicas.id");
        $this->db->join("tipo_tramite","solicitudes.id_tipo_solicitud=tipo_tramite.id");
        $this->db->where('id_tipo_solicitud=3');
        
        $result = $this->db->get();
       // echo $this->db->last_query();
        if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }

    }
         public function ServList()
    {
        $this->db->select("*, solicitudes.id as idSol,tipo_tramite.nombre as tramite");
        $this->db->from("solicitudes");
        $this->db->join("estatus_practicas","solicitudes.id_estado=estatus_practicas.id");
        $this->db->join("tipo_tramite","solicitudes.id_tipo_solicitud=tipo_tramite.id");
        $this->db->where('id_tipo_solicitud=2');
        
        $result = $this->db->get();
       // echo $this->db->last_query();
        if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }

    }
        public function ServList2($id)
    {
        $this->db->select("*, solicitudes.id as idSol,tipo_tramite.nombre as tramite");
    $this->db->from("solicitudes");
    $this->db->join("estatus_practicas","solicitudes.id_estado=estatus_practicas.id");
        $this->db->join("tipo_tramite","solicitudes.id_tipo_solicitud=tipo_tramite.id");
        $this->db->where($id);
        $this->db->where('id_tipo_solicitud=2');
        $result = $this->db->get();
       // echo $this->db->last_query();
        if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }

    }

    public function CreateSolicitud($data)
    {
        $this->db->insert('solicitudes', $data);
        //echo $this->db->last_query();
        return $this->db->insert_id();
    }

    public function UpdateUser($data,$where)
    {
        $this->db->where($where);
        $this->db->update('usuarios', $data);
        //echo $this->db->last_query();
    }

    public function DeleteUser($where)
    {
        $this->db->where($where);
        $this->db->delete('usuarios');
        //echo $this->db->last_query();
    }


    public  function GetIdUser($id){

        $this->db->where($id);
        $result = $this->db->get('usuarios');
        //echo $this->db->last_query();
        if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }
    }

    /*Tabla tipo de usuarios*/

    public function GetAllTipoUsuario()
    {

      $result = $this->db->get('tipo_usuario');
     // echo $this->db->last_query();
      if ($result->num_rows()>0) {
          return $result->result();
      }else{
          return False;
      }

    }
    /*Tabla tipo de trámites*/
    public function GetAllTipotramites()
    {

      $result = $this->db->get('tipo_tramite');
     // echo $this->db->last_query();
      if ($result->num_rows()>0) {
          return $result->result();
      }else{
          return False;
      }

    }
    public function usuarios($id='')
    {
        $this->db->where($id);
        $result = $this->db->get('usaurios');
        //echo $this->db->last_query();
        if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }
    }
}
