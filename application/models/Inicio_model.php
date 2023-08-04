<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();

    }

    public function CreateUser($data)
    {
        $this->db->insert('usuarios', $data);
        //echo $this->db->last_query();

        return $this->db->insert_id();
    }

/*
    public function SolList()
    {
        $this->db->select("*");
		$this->db->from("solicitudes");
		$this->db->join("estatus_practicas","solicitudes.id_estado=estatus_practicas.id");
        $result = $this->db->get();
       // echo $this->db->last_query();
        if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }

    }
*/
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


    public function Login($usuario='',$password)
    {
        $this->db->where('usuario', $usuario);
        $this->db->where('password', md5($password));
        $get_user = $this->db->get('usuarios');
        //echo $this->db->last_query();

        if ($get_user->num_rows()==1 ) {

            $rows = $get_user->row();




            if($rows->status==1){

                return  array('nombre'=>$rows->nombre,'apellido_p'=>$rows->apellido_p,'apellido_m'=>$rows->apellido_m,'tipo_usuario_id'=>$rows->tipo_usuario_id);
            }else{

                return False;
            }

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

      $result = $this->db->get('cat_tramites');
     // echo $this->db->last_query();
      if ($result->num_rows()>0) {
          return $result->result();
      }else{
          return False;
      }

    }
}
