<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumnos_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();

    }

    public function CreateAlumno($data)
    {
        $this->db->insert('alumnos', $data);
        //echo $this->db->last_query();

        return $this->db->insert_id();
    }


    public function AlumnoList()
    {

        $result = $this->db->get('alumnos');
       // echo $this->db->last_query();
        if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }

    }

    public function UpdateAlumno($data,$where)
    {
        $this->db->where($where);
        $this->db->update('alumnos', $data);
        //echo $this->db->last_query();
    }

    public function DeleteAlumno($where)
    {
        $this->db->where($where);
        $this->db->delete('alumnos');
        //echo $this->db->last_query();
    }


    public  function GetIdAlumno($id){

        $this->db->where($id);
        $result = $this->db->get('alumnos');
        //echo $this->db->last_query();
        if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }
    }

    public function GetBuscarAlumno($data)
    {
      $this->db->like($data);
      $result = $this->db->get('alumnos');
      //echo $this->db->last_query();
      if ($result->num_rows()>0) {
          return $result->result();
      }else{
          return False;
      }

    }





}
