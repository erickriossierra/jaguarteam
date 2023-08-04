<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AsignaturasLibres_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();

    }

    public function AsignaturasLibresList($data)
    {
        $query=$this->db->get('asignaturas_alumno');
        //echo $this->db->last_query();
        return $query->result();

    }


//Obtener ID de la tabla
    public function GetIdAsignaturasLibres($id='')
    {
        $this->db->where($id);
        $result = $this->db->get('asignaturas_alumno');
        //echo $this->db->last_query();
         if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }
    }
    //Obtener ID de la tabla
    public function GetIdAsignaturasLibres_Estatus($id='')
    {
        $this->db->select('*, asignaturas_alumno.id as AAid');
        $this ->db->from('asignaturas_alumno');
        $this->db->join('estatus_libres', 'asignaturas_alumno.status=estatus_libres.id');
        $this->db->where($id);
        $result = $this->db->get();
        //echo $this->db->last_query();
         if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }
    }
    public function updateFecha($id='')
    {
      if ($this->db->query("CALL cambiarFechaAsigLib(".$id.")"))
      {
        echo "Listo";
      }else{
        show_error('Error!');
      }
    }
  /*Alumnos*/

    public function GetBuscarAlumno($data)
    {
      $this->db->select("*");
      $this->db->select("alumnos.id as idAL");
      $this->db->select("carreras.nombre as carrera");
      $this->db->from("alumnos");
      $this->db->join("carreras", "alumnos.carreras_id=carreras.id");
      $this->db->like($data);
      $result = $this->db->get();
      //echo $this->db->last_query();
      if ($result->num_rows()>0) {
          return $result->result();
      }else{
          return False;
      }

    }
     public function GetidAlumno()
    {
      $this->db->select("*");
      $this->db->select("alumnos.id as idAL");
      $this->db->select("CONCAT(alumnos. nombre, ' ',apellido_paterno, '',apellido_materno) as NombreC");
      $this->db->select("carreras.nombre as carrera");
      $this->db->from("alumnos");
      $this->db->join("carreras", "alumnos.carreras_id=carreras.id");

      $result = $this->db->get();
      //echo $this->db->last_query();
      if ($result->num_rows()>0) {
          return $result->result();
      }else{
          return False;
      }

    }

// Obtener el ID del alumno
    public function GetidAlumnoL($id)
    {
      $this->db->select("*");
      $this->db->select("CONCAT(nombre, ' ',apellido_paterno, '',apellido_materno) as NombreC");
      $this->db->from("alumnos");
       $this->db->where($id);
      $query = $this->db->get();
        //echo $this->db->last_query();
      if ($query->num_rows()>0){
        return $query->result();
        }else{
          return false;
        }
      }

      /*Carrera*/
      public function TipoCarrerasList()
      {
          $query=$this->db->get('carreras');
          //echo $this->db->last_query();
          return $query->result();

      }

/******Asignaturas*********/
public function GetBuscarAsignaturas($data)
    {
      
      $this->db->select("*,asi.id as idAsg, asi.nombre as Nombre, ins.id as idInst,ins.nombre as Instituto ");
      $this->db->from("asignaturas asi");
     // $this->db->join("asignaturas_alumno asa", "asa.id_asignatura=asi.id, 'left'" );
      $this->db->join("institutos ins", "asi.id_lugar=ins.id");
      $this->db->like($data);
      $result = $this->db->get();
      //echo $this->db->last_query();
      if ($result->num_rows()>0) {
          return $result->result();
      }else{
          return False;
      }

    }
    /******Categoria Asignaturas*********/
public function GetBuscarCategoriaAsignatura($data)
    {
      
      $this->db->like($data);
      $result = $this->db->get('categoria_libres');
      //echo $this->db->last_query();
      if ($result->num_rows()>0) {
          return $result->result();
      }else{
          return False;
      }

    }
    public function CreateAsignaturasLibreAl($data)
    {
        $this->db->insert('asignaturas_alumno', $data);
        echo $this->db->last_query();
        return $this->db->insert_id();
    }
    /************* Instituto ****************/
     public function GetidInstituto()
    {
      $this->db->select("*");
      $this->db->select("institutos.nombre as Instituto");
      //$this->db->select("CONCAT(alumnos. nombre, ' ',apellido_paterno, '',apellido_materno) as NombreC");
      //$this->db->select("carreras.nombre as carrera");
      $this->db->from("institutos");
      $this->db->join("asignaturas_alumno", "asignaturas_alumno.id_instituto=institutos.id");

      $result = $this->db->get();
      //echo $this->db->last_query();
      if ($result->num_rows()>0) {
          return $result->result();
      }else{
          return False;
      }

    }

/*Estatus AsignaturasLibres */
      public function EstatusAsignaturasLibresList()
      {
          $query=$this->db->get('estatus_libres');
          //echo $this->db->last_query();
          return $query->result();

      }
  /*Catalogo de AsignaturasLibres */
      public function CatAsignaturasLibresList()
      {
          $query=$this->db->get('categoria_libres');
          //echo $this->db->last_query();
          return $query->result();

      }
  /*Catalogo de AsignaturasLibres */
      public function CatInst()
      {
          $query=$this->db->get('institutos');
          //echo $this->db->last_query();
          return $query->result();

      }
  /*Historial Practica*/

      public function ReporteAsignaturasLibresList()
      {
        $this->db->select("*");
        $this->db->select("asignaturas_alumno.id as AAid");
        $this->db->select("institutos.nombre as lugar");
        $this->db->select("asignaturas.id as asignaturaid");
        
        $this->db->select("asignaturas.Nombre as AsignaturaNombre");
        $this->db->select("alumnos.id as alumnoid");
        $this->db->select("round(horas * .0625) as creditos");
        
        $this->db->select("alumnos.nombre as nombrealumno");
        $this->db->select("carreras.Nombre as carreranombre");

        $this->db->select("estatus_libres.nombre as estatus");
        $this->db->select("categoria_libres.nombre as catasignatura");

        $this->db->from("asignaturas_alumno");
       
        $this->db->join("estatus_libres", "asignaturas_alumno.status=estatus_libres.id");
        $this->db->join("alumnos", "asignaturas_alumno.id_alumno=alumnos.id");
        $this->db->join("carreras", "alumnos.carreras_id=carreras.id");
        $this->db->join("asignaturas", "asignaturas_alumno.id_asignatura=asignaturas.id");
        $this->db->join("institutos", "asignaturas.id_lugar=institutos.id");
        $this->db->join("categoria_libres", "asignaturas.cveAsignatura=categoria_libres.id");

        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();

      }
      public function sumacreditos($id){
        //$this->db->select("*");        
         $this->db->select("SUM(asignaturas.horas * .0625) as suma");
          $this->db->select("SUM(round(asignaturas.horas * .0625)) as sumared");

         $this->db->from("asignaturas_alumno");
         $this->db->join("asignaturas", "asignaturas_alumno.id_asignatura=asignaturas.id");
         $this->db->join("alumnos", "asignaturas_alumno.id_alumno=alumnos.id");
         $this->db->join("estatus_libres","asignaturas_alumno.status= estatus_libres.id");
         $this->db->where("asignaturas_alumno.id_alumno=".$id );
         $this ->db->where("asignaturas_alumno.status=2");
         $this ->db->where("asignaturas_alumno.documento='Si'");
        $query = $this->db->get();
        //echo $this->db->last_query();
       //print_r($query);
        return $query->result();


}
      public function HistorialAsignaturasLibresList($id='')
      {
        $this->db->select("*");
        $this->db->select("asignaturas_alumno.id as AAid");
       // $this->db->select("tipo_practica.Nombre as tipo_practica");
        $this->db->select("asignaturas.id as asignaturaid");
        $this->db->select("asignaturas.nombre as nombreAsg");
        $this->db->select("asignaturas.horas as horas");
        $this->db->select("round(horas * .0625) as creditos");
        $this->db->select("alumnos.id as alumnoid");
        $this->db->select("estatus_libres.nombre as estatus");
        $this->db->select("institutos.nombre as nombreInst");


        $this->db->from("asignaturas_alumno");
        $this->db->join("asignaturas", "asignaturas_alumno.id_asignatura=asignaturas.id");
        $this->db->join("alumnos", "asignaturas_alumno.id_alumno=alumnos.id");
        $this->db->join("estatus_libres", "asignaturas_alumno.status=estatus_libres.id");
        $this->db->join("institutos", "asignaturas.id_lugar=institutos.id");
        $this->db->where($id);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();

      }
     /*Historial Asignaturas*/

      public function HistorialAsignaturas_alumnosList($id='')
      {
        $this->db->select("*");
        $this->db->select("asignaturas_alumno.id as asignaturasid");
        $this->db->select("asignaturas.nombre as asignatura");
        $this->db->select("asignaturas.creditos as creditos");
        $this->db->select("asignaturas.horas as horas");
       
        $this->db->from("asignaturas_alumno");
        $this->db->join("asignaturas", "asignaturas_alumno.id_asignatura=asignaturas.id");
        $this->db->join("estatus_libres", "asignaturas_alumno.status=estatus_libres.id");
        $this->db->join("alumnos", "asignaturas_alumno.id_alumno=alumnos.id");
        $this->db->where($id);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();

      }

      public function ReporteAsignaturasList()
      {
         $this->db->select("*");
         $this->db->select("asignaturas_alumno.id as asignaturasalumnosid");
         $this->db->select("asignaturas.id as asignaturasid");

         $this->db->select("CONCAT(alumnos.nombre,' ', alumnos.apellido_paterno, ' ', alumnos.apellido_materno ) as nombrealumno");
         $this->db->select("carreras.Nombre as carreranombre");         
         $this->db->select("asignaturas.cveasignatura");
         $this->db->select("asignaturas.nombre as asignaturasnombre");
         $this->db->select("asignaturas.horas");
         $this->db->select("asignaturas.creditos");
         $this->db->select("asignaturas_alumno.inicio");
         $this->db->select("asignaturas_alumno.termino");
         $this->db->select("institutos.nombre as lugar");
         $this->db->select("estatus_libres.nombre as estatus");
         
         $this->db->from("asignaturas_alumno");

         $this->db->join(" institutos", "asignaturas_alumno.id_instituto=institutos.id");
         $this->db->join("estatus_libres", "asignaturas_alumno.status=estatus_libres.id");
         $this->db->join("alumnos", "asignaturas_alumno.id_alumno=alumnos.id");
         $this->db->join("carreras", "alumnos.carreras_id=carreras.id");
         $this->db->join("asignaturas", "asignaturas_alumno.id_asignatura=asignaturas.id");
        $query = $this->db->get();

        return $query->result();

      }


      /*Carrera*/
      public function EstatusPracticasList()
      {
          $query=$this->db->get('estatus_practicas');
          //echo $this->db->last_query();
          return $query->result();

      }
/* Estaus para Libres*/
      public function EstatusLibresList()
      {
          $query=$this->db->get('estatus_libres');
          //echo $this->db->last_query();
          return $query->result();

      }

 /*Practicas List con Alumnos-Libres*/
    public function AlumnosLibresList()
  {

      $this->db->select("alumnos.id as ID,CONCAT(alumnos.nombre, ' ',alumnos.apellido_paterno,' ',apellido_materno) as nombreC,carreras.Nombre as carrera, estatus_libres.nombre as estatu, round(asignaturas.horas *.0625) as creditos,  asignaturas.nombre as asignatura");
      $this->db->from("alumnos");
      $this->db->join("carreras", "alumnos.carreras_id=carreras.id");
      $this->db->join("asignaturas_alumno", "asignaturas_alumno.id_alumno=alumnos.id");
      $this->db->join("estatus_libres", "asignaturas_alumno.status=estatus_libres.id");
      $this->db->join("asignaturas", "asignaturas_alumno.id_asignatura=asignaturas.id");
      $this->db->order_by("alumnos.nombre","DESC");
      $query = $this->db->get();
      //echo $this->db->last_query();
      return $query->result();
  }
  /* Actualizar asignatura libre*/
public function UpdateAsignaturaLibre($data,$where)
    {
        $this->db->where($where);
        $this->db->update('asignaturas_alumno', $data);
        echo $this->db->last_query();
    }
}


