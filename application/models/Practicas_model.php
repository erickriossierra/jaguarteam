<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Practicas_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();

    }

    public function PracticasList($data)
    {
        $query=$this->db->get('practicas_profesionales');
        //echo $this->db->last_query();
        return $query->result();

    }

    public function CreatePracticas($data)
    {
        $this->db->insert('practicas_profesionales', $data);
        //echo $this->db->last_query();
        return $this->db->insert_id();
    }

    public function UpdatePracticas($data,$where)
    {
        $this->db->where($where);
        $id=$this->db->update('practicas_profesionales', $data);
        //echo $this->db->last_query();
        //print_r($id);
        //exit;
    }


    public function DeletePracticas($where='')
    {
        $this->db->where($where);
        $this->db->delete('practicas_profesionales');
        //echo $this->db->last_query();
    }

    public function GetIdPracticas($id='')
    {
        $this->db->where($id);
        $result = $this->db->get('practicas_profesionales');
        //echo $this->db->last_query();
         if ($result->num_rows()>0) {
            return $result->result();
        }else{
            return False;
        }
    }

    /*Tipo Practica*/

    public function TipoPracticasList()
    {
        $query=$this->db->get('tipo_practica');
        //echo $this->db->last_query();
        return $query->result();

    }

    /*Alumnos*/

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

      /*Carrera*/
      public function TipoCarrerasList()
      {
          $query=$this->db->get('carreras');
          //echo $this->db->last_query();
          return $query->result();

      }

      /*Historial Practica*/

      public function HistorialPracticasList($id='')
      {
        $this->db->select("*");
        $this->db->select("practicas_profesionales.id as practicasid");
        $this->db->select("tipo_practica.Nombre as tipo_practica");
        $this->db->select("empresas.id as empresasid");
        $this->db->select("despachos.id as despachosid");
        $this->db->select("despachos.nombre as empresasnombre");
        $this->db->select("dependencias.id as dependenciaid");
        $this->db->select("dependencias.nombre as dependencianombre");

        $this->db->from("practicas_profesionales");
        $this->db->join("tipo_practica", "practicas_profesionales.tipo_practica_id=tipo_practica.id", "left");
        $this->db->join("empresas", "practicas_profesionales.empresas_id=empresas.id","left");
        $this->db->join("despachos", "practicas_profesionales.despacho_id=despachos.id","left");
        $this->db->join("dependencias", "practicas_profesionales.dependencia_id=dependencias.id","left");
        $this->db->join("estatus_practicas", "practicas_profesionales.estatus_id=estatus_practicas.id", "left");
        $this->db->where($id);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();

      }

      public function ReportePracticasList()
      {
        $this->db->select("*");
        $this->db->select("practicas_profesionales.id as practicasid");
        $this->db->select("tipo_practica.Nombre as tipo_practica");
        $this->db->select("empresas.id as empresasid");
        $this->db->select("despachos.id as despachosid");
        $this->db->select("dependencias.id as dependenciaid");
        $this->db->select("despachos.nombre as empresasnombre");
        $this->db->select("dependencias.Nombre as dependencianombre");
        $this->db->select("alumnos.nombre as nombrealumno");
        $this->db->select("carreras.Nombre as carreranombre");
        $this->db->from("practicas_profesionales");
        $this->db->join("tipo_practica", "practicas_profesionales.tipo_practica_id=tipo_practica.id");
        $this->db->join("empresas", "practicas_profesionales.empresas_id=empresas.id","left");
        $this->db->join("despachos", "practicas_profesionales.despacho_id=despachos.id","left");
        $this->db->join("dependencias", "practicas_profesionales.dependencia_id=dependencias.id","left");
        $this->db->join("estatus_practicas", "practicas_profesionales.estatus_id=estatus_practicas.id");
        $this->db->join("alumnos", "practicas_profesionales.Alumnos_id=alumnos.id");
        $this->db->join("carreras", "alumnos.carreras_id=carreras.id");
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();

      }


      /*Carrera*/
      public function EstatusPracticasList()
      {
          $query=$this->db->get('estatus_practicas');
          //echo $this->db->last_query();
          return $query->result();

      }




}
