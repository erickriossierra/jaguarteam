<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ServicioSoc_model extends CI_Model {

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
//modificado
    public function CreateServicio($data)
    {
        $this->db->insert('servicio_social', $data);
        //echo $this->db->last_query();
        return $this->db->insert_id();
    }
//modificado
    public function UpdateServicio($data,$where)
    {
        $this->db->where($where);
        $id=$this->db->update('servicio_social', $data);
        //echo $this->db->last_query();
        //print_r($id);
        //exit;
    }

//nuevo
    public function CreateProyecto($data)
    {
        $this->db->insert('proyectos', $data);
        //echo $this->db->last_query();
        return $this->db->insert_id();
    }
    //nuevo
    public function CreateDepartamento($data)
    {
        $this->db->insert('departamentos', $data);
        //echo $this->db->last_query();
        return $this->db->insert_id();
    }
//nuevo
    public function CreateResponsable($data)
    {
        $this->db->insert('responsables_proyecto', $data);
        //echo $this->db->last_query();
        return $this->db->insert_id();
    }

    public function DeletePracticas($where='')
    {
        $this->db->where($where);
        $this->db->delete('practicas_profesionales');
        //echo $this->db->last_query();
    }
//aparenta ser borrado
    public function GetIdPracticas($id='')
    {
        $this->db->where($id);
        $result = $this->db->get('servicio_social');
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
  //Modificado  /*Tipo Servicio*/

    public function TipoServicioList()
    {
        $this->db->where('id<>2');
        $query=$this->db->get('tipo_practica');
        //echo $this->db->last_query();
        return $query->result();

    }
    //Modificado  /*Tipo Horario*/

    public function TipoHorarioList()
    {
       // $this->db->where('id<>2');
        $query=$this->db->get('tipo_horario');
        //echo $this->db->last_query();
        return $query->result();

    }
         //nuevo /*Vigencia*/
      public function TiposVigenciaList()
      {
          $this->db->order_by('id_vige','DESC');
          $query=$this->db->get('vigencias_semestre');
          //echo $this->db->last_query();
          return $query->result();

      }

         //nuevo /* Viaticos */
      public function TiposViaticosList()
      {
          $query=$this->db->get('viaticos');
          //echo $this->db->last_query();
          return $query->result();

      }
      //nuevo /* Funciones */
      public function TiposFuncionList()
      {
        $query=$this->db->get('funciones');
        return $query->result();
      }
      //nuevo /* Modalidades */
      public function TiposModalidadList()
      {
        $query=$this->db->get('modalidades');
        return $query->result();
      }
      //nuevo /* Areas de desarrollo */
      public function TiposAreasDesList()
      {
        $query=$this->db->get('areas_desarrollo');
        return $query->result();
      }
      public function TiposTramiteList()
      {
        $query=$this->db->get('tipo_tramite');
        return $query->result();
      }

//nuevo /* Buscar nombre y titulo responsable  */
      public function GetBuscarNombreresp($data)
    {
      $this->db->select("*, responsables_proyecto.id_depa as iddepa");
      $this->db->select("CONCAT(abrev_titulo, ' ', nombre_resp,' ',apellido_paterno, ' ' , apellido_materno) as nombreC");
     // $this->db->select("CONCAT(abrev_titulo, ' ',nombreC) as titulo_nom");
      $this->db->from("responsables_proyecto");
      $this->db->join("titulos", "responsables_proyecto.id_titulo=titulos.id_titulo");
      $this->db->join("departamentos", "responsables_proyecto.id_depa=departamentos.id_depa");
      $this->db->like($data);
      $result = $this->db->get();
      //echo $this->db->last_query();
      if ($result->num_rows()>0) {
          return $result->result();
      }else{
          return False;
      }

    }
      //nuevo /* Buscar departamento  */
      public function GetBuscarDepartamento($data)
    {
      $this->db->like($data);
      $result = $this->db->get('departamentos');
      //echo $this->db->last_query();
      if ($result->num_rows()>0) {
          return $result->result();
      }else{
          return False;
      }

    }
    //nuevo /* Buscar titulo  */
      public function GetBuscarTitulo($data)
    {
      $this->db->like($data);
      $result = $this->db->get('titulos');
      //echo $this->db->last_query();
      if ($result->num_rows()>0) {
          return $result->result();
      }else{
          return False;
      }

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
   //nuevo /* Buscar proyecto  */
      public function GetBuscarProyecto($data)
    {
      $this->db->like($data);
      $result = $this->db->get('proyectos');
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

      public function HistorialServicosList($id='')
      {
        $this->db->select("*");
       // $this->db->select("practicas_profesionales.id as practicasid");
        $this->db->select("CONCAT(responsables_proyecto.nombre_resp,' ',responsables_proyecto.apellido_paterno,' ', responsables_proyecto.apellido_materno ) as nombre_cp");
        $this->db->select("empresas.id as empresasid");
       // $this->db->select("despachos.id as despachosid");
       // $this->db->select("despachos.nombre as empresasnombre");
        $this->db->select("dependencias.id as dependenciaid");
        $this->db->select("dependencias.nombre as dependencianombre");

        $this->db->from("servicio_social");
        $this->db->join("proyectos", "servicio_social.id_proyecto=proyectos.id_proyecto");
        $this->db->join("empresas", "proyectos.id_empresa=empresas.id","left");
        $this->db->join("departamentos", "proyectos.id_departamento=departamentos.id_depa","left");
        $this->db->join("dependencias", "proyectos.id_dependencia=dependencias.id","left");
        $this->db->join("responsables_proyecto", "proyectos.id_responsable=responsables_proyecto.id_resp");
        $this->db->join("estatus_practicas", "servicio_social.id_estatus=estatus_practicas.id");
        $this->db->join("tipo_horario", "servicio_social.id_tipohorario=tipo_horario.id_tipohora");
        $this->db->where($id);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();

      }
      public function HistorialServicosList2()
      {
        $this->db->select("*");
       // $this->db->select("practicas_profesionales.id as practicasid");
        $this->db->select("CONCAT(responsables_proyecto.nombre_resp,' ',responsables_proyecto.apellido_paterno,' ', responsables_proyecto.apellido_materno ) as nombre_cp");
        $this->db->select("empresas.id as empresasid");
        $this->db->select("dependencias.id as dependenciaid");
        $this->db->select("dependencias.nombre as dependencianombre");

        $this->db->from("servicio_social");
        $this->db->join("proyectos", "servicio_social.id_proyecto=proyectos.id_proyecto");
        $this->db->join("empresas", "proyectos.id_empresa=empresas.id","left");
        $this->db->join("departamentos", "proyectos.id_departamento=departamentos.id_depa","left");
        $this->db->join("dependencias", "proyectos.id_dependencia=dependencias.id","left");
        $this->db->join("responsables_proyecto", "proyectos.id_responsable=responsables_proyecto.id_resp");
        $this->db->join("estatus_practicas", "servicio_social.id_estatus=estatus_practicas.id");
        $this->db->join("tipo_horario", "servicio_social.id_tipohorario=tipo_horario.id_tipohora");
        //$this->db->where($id);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();

      }
  public function HistorialServicosList3($data='')
      {
        $this->db->select("*");
       // $this->db->select("practicas_profesionales.id as practicasid");
        $this->db->select("CONCAT(responsables_proyecto.nombre_resp,' ',responsables_proyecto.apellido_paterno,' ', responsables_proyecto.apellido_materno ) as nombre_cp");
        $this->db->select("empresas.id as empresasid");
        $this->db->select("dependencias.id as dependenciaid");
        $this->db->select("dependencias.nombre as dependencianombre");

        $this->db->from("proyectos");
        $this->db->join("servicio_social", "proyectos.id_proyecto=servicio_social.id_proyecto","left");
        $this->db->join("empresas", "proyectos.id_empresa=empresas.id","left");
        $this->db->join("departamentos", "proyectos.id_departamento=departamentos.id_depa","left");
        $this->db->join("dependencias", "proyectos.id_dependencia=dependencias.id","left");
        $this->db->join("responsables_proyecto", "proyectos.id_responsable=responsables_proyecto.id_resp");
        $this->db->join("estatus_practicas", "servicio_social.id_estatus=estatus_practicas.id","left");
        $this->db->join("tipo_horario", "servicio_social.id_tipohorario=tipo_horario.id_tipohora","left");
        $this->db->join("viaticos", "proyectos.id_viaticos=viaticos.id_viatico");
        $this->db->like($data);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
      }
//modificado
      public function ReporteServicioList()
      {
        $this->db->select("*");
        //$this->db->select("practicas_profesionales.id as practicasid");
       // $this->db->select("tipo_practica.Nombre as tipo_practica");
        $this->db->select("empresas.id as empresasid");
        $this->db->select("CONCAT(responsables_proyecto.nombre_resp,' ',responsables_proyecto.apellido_paterno,' ', responsables_proyecto.apellido_materno ) as representante");
        $this->db->select("dependencias.id as dependenciaid");
       // $this->db->select("despachos.nombre as empresasnombre");
        $this->db->select("dependencias.Nombre as dependencianombre");
        $this->db->select("alumnos.nombre as nombrealumno");
        $this->db->select("carreras.Nombre as carreranombre");
        $this->db->from("servicio_social");
        $this->db->join("proyectos", "servicio_social.id_proyecto=proyectos.id_proyecto");
        $this->db->join("empresas", "proyectos.id_empresa=empresas.id","left");
        $this->db->join("tipo_horario", "servicio_social.id_tipohorario=tipo_horario.id_tipohora","left");
        $this->db->join("responsables_proyecto", "proyectos.id_responsable=responsables_proyecto.id_resp","left");
        $this->db->join("dependencias", "proyectos.id_dependencia=dependencias.id","left");
        $this->db->join("estatus_practicas", "servicio_social.id_estatus=estatus_practicas.id");
        $this->db->join("alumnos", "servicio_social.id_alumno=alumnos.id");
        $this->db->join("carreras", "alumnos.carreras_id=carreras.id");
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();

      }


      /*estatus para servicio*/
      public function EstatusPracticasList()
      {
          $query=$this->db->get('estatus_practicas');
          //echo $this->db->last_query();
          return $query->result();

      }
       /*titulo para responsables*/
      public function TipoTituloList()
      {
          $query=$this->db->get('titulos');
          //echo $this->db->last_query();
          return $query->result();

      }
    //nuevo   /*Departamento para responsables*/
      public function DepartamentoList()
      {
          $query=$this->db->get('departamentos');
          //echo $this->db->last_query();
          return $query->result();

      }
    //nuevo   /*Departamento para responsables*/
      public function DependenciasList()
      {
          $query=$this->db->get('dependencias');
          //echo $this->db->last_query();
          return $query->result();

      }
      //nuevo   /*Departamento para responsables*/
      public function EmpresasList()
      {
          $query=$this->db->get('empresas');
          //echo $this->db->last_query();
          return $query->result();

      }

}
