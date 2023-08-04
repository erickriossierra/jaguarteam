<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asignaturas_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();

    }

    public function AsignaturasList()
    {
        $this->db->select("*,round(asignaturas.horas *.0625) as CreditosR");
        $this->db->from ("asignaturas");
        $this->db->order_by('nombre','asc');
        $query=$this->db->get();
//echo $this->db->last_query();
        return $query->result();

    }

    public function AsignaturasListForm()
    {
      $this->db->where(array('id'=>1));
        $query=$this->db->get('asignaturas');
//echo $this->db->last_query();
        return $query->result();

    }


    public function CreateAsignaturas($data)
    {
        $this->db->insert('asignaturas', $data);
        echo $this->db->last_query();
        return $this->db->insert_id();
    }

    public function UpdateAsignatura($data,$where)
    {
        $this->db->where($where);
        $id=$this->db->update('asignaturas', $data);
        //echo $this->db->last_query();
        //print_r($id);
        //exit;
    }


    public function DeleteAsignatura($where='')
    {
        $this->db->where($where);
        $this->db->delete('asignaturas');
        //echo $this->db->last_query();
    }

    public function GetIdAsignaturas($id='')
    {
        $this->db->select("*");
        $this->db->select("asignaturas.id as id, asignaturas.nombre as AsignaturaNombre");

        $this->db->select("categoria_libres.id as idCL, categoria_libres.nombre as catasignatura");

        $this->db->from("asignaturas");

        $this->db->join("categoria_libres", "asignaturas.cveAsignatura=categoria_libres.id");

        $this->db->where($id);
        $result = $this->db->get();
        //echo $this->db->last_query();
         if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }
    }
    public function GetIdInstitucion($id='')
    {
        $this->db->select("*");

        $this->db->select("institutos.id as idLugar, institutos.nombre as nombreInst");
        
        $this->db->from("asignaturas");

        $this->db->join("institutos", "asignaturas.id_lugar=institutos.id");

        $this->db->where($id);
        $result = $this->db->get();
        //echo $this->db->last_query();
         if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }
    }
    public function GetBuscarAsignaturas($data)
    {
      $this->db->like($data);
      $result = $this->db->get('asignaturas');
      //echo $this->db->last_query();
      if ($result->num_rows()>0) {
          return $result->result();
      }else{
          return False;
      }

    }

/*Historial Practica*/

      public function HistorialPracticasList($id='')
      {
        $this->db->select("*");
        $this->db->select("asignaturas.id as asignaturasid");
        $this->db->select("alumnos.nombre as nombrealumno");
        $this->db->select("carreras.Nombre as carreranombre");
        $this->db->from("asignaturas_alumno");
        $this->db->join("alumnos", "asignaturas_alumno.id_alumno=alumnos.id");
        $this->db->join("carreras", "alumnos.carreras_id=carreras.id");
        $this->db->join("estatus_practicas", "asignaturas_alumno.estatus=estatus_practicas.id");
        $this->db->where($id);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();

      }
//
    public function asignaturas_alumnoList()
      {
        $this->db->select("*");
        
        $this->db->select("asignaturas_alumno.id as asignaturas_alumnoid");
        $this->db->select("asignaturas_alumno.inicio as asignaturas_alumnoin");
        $this->db->select("asignaturas_alumno.termino as asignaturas_alumnoter");

        $this->db->select("alumnos.nombre as nombrealumno");
        $this->db->select("alumnos.apellido_paterno as apellido_paterno");
        $this->db->select("alumnos.apellido_materno as apellido_materno");
        $this->db->select("carreras.Nombre as carreranombre");

        $this->db->select("asignaturas.nombre as asignaturasnombre");
        $this->db->select("asignaturas.horas as asignaturashoras");
        $this->db->select("asignaturas.creditos as asignaturascreditos");
        $this->db->select("institutos.nombre as institutonombre");

        $this->db->select("estatus_practicas.status as estatus");

        $this->db->from("asignaturas_alumno");

        $this->db->join("asignaturas ", "asignaturas_alumno.id_asignatura=asignaturas.id");
        $this->db->join("estatus_practicas", "asignaturas_alumno.estatus=status_practicas.id");
        $this->db->join("alumnos", "asignaturas_alumno.id_alumno=alumnos.id");
        $this->db->join("institutos", "asignaturas.id_lugar=institutos.id","left");
        $this->db->join("carreras", "alumnos.carreras_id=carreras.id");
        
        $query = $this->db->get();
        echo $this->db->last_query();
        return $query->result();

      } 

      /*Carrera*/
      public function EstatusPracticasList()
      {
          $query=$this->db->get('estatus_practicas');
          //echo $this->db->last_query();
          return $query->result();

      }
      public function CarreraList()
    {
        $this->db->order_by('nombre','asc');
        $query=$this->db->get('institutos');
        //echo $this->db->last_query();
        return $query->result();

    }

}