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
        echo $this->db->last_query();
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
      $this->db->select("*, alumnos.id as idAlumno, alumnos.nombre as alumno,CONCAT( alumnos.nombre,' ',apellido_paterno,' ',apellido_materno) as Nombre_cp");
      $this->db->select("carreras.id as idcarrera, carreras.Nombre as Carrera");
      //$this->db->from('alumnos');
      $this->db->join("carreras", "alumnos.carreras_id=carreras.id");
      
      $this->db->like($data);
      $result = $this->db->get('alumnos');
      //echo $this->db->last_query();
      if ($result->num_rows()>0) {
          return $result->result();
      }else{
          return False;
      }

    }

    /*Practicas List con Alumnos*/
    public function AlumnosCarrerasList()
  {

      $this->db->select("DISTINCT(alumnos.id) as idAlumno, alumnos.nombre, apellido_materno,apellido_paterno,carreras.Nombre as carrera ");
      $this->db->from("alumnos");
      $this->db->join("carreras", "alumnos.carreras_id=carreras.id");
      $this->db->join("practicas_profesionales", "alumnos.id=practicas_profesionales.Alumnos_id");
      $this->db->order_by("alumnos.nombre","DESC");
      $query = $this->db->get();
      //echo $this->db->last_query();
      return $query->result();
  }

    /*Servicio Social List con Alumnos*/
    public function AlumnosServicioList()
  {

      $this->db->select("DISTINCT(alumnos.id) as idAlumno, alumnos.nombre, apellido_materno,apellido_paterno,carreras.Nombre as carrera ");
      $this->db->from("alumnos");
      $this->db->join("carreras", "alumnos.carreras_id=carreras.id");
      $this->db->join("servicio_social", "alumnos.id=servicio_social.id_alumno");
      $this->db->order_by("alumnos.nombre","DESC");
      $query = $this->db->get();
      //echo $this->db->last_query();
      return $query->result();
  }


}
