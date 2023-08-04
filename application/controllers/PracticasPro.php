<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PracticasPro extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ( $this->session->userdata('nameS')=='') {
            redirect();
        }
        $this->name_session  =  $this->session->userdata('nameS');
        $this->idtypeUser_session = $this->session->userdata('idtypeUserS');
        $this->idUser_session = $this->session->userdata('idUserS');

        $this->load->model('practicas_model');
        $this->load->model('empresas_model');
        $this->load->model('despachos_model');
        $this->load->model('alumnos_model');
        $this->load->model('Dependencias_model');
        $this->load->model('Solicitudes_model');
        $this->load->helper('form');
        $this->load->helper('aux_helper');
    }



    public function index()
    {

        $data = array(
            'title' => 'prueba',

        );

        $this->parser->parse('practicas_pro/list',$data);

    }


    public function addView()
    {
        $TipoPracticasList=$this->practicas_model->TipoPracticasList();
        $TipoCarrerasList=$this->practicas_model->TipoCarrerasList();
        $data = array(
            'title' => 'prueba',
            'TipoPracticasList'=>$TipoPracticasList,
            'TipoCarrerasList'=>$TipoCarrerasList,

        );
        $this->parser->parse('practicas_pro/new',$data);

    }

    public function dataInsert()
    {
        
         $Alumnos_id=  $this->input->post('id_alumno');

        /*Insertar tabla Practicas*/
        $tipo_practica_id = $this->input->post('tipo_practica');
        $empresas_id = $this->input->post('idEmpresa');
        $despacho_id = $this->input->post('idDespacho');
        $dependencia_id = $this->input->post('idDepedencia');
        $representante= $this->input->post('representante');
        $jefedirec = $this->input->post('jefe');
        $registrocp= $this->input->post('registrocp');
        $practica_inicio= date_format_db($this->input->post('practica_inicio'));

        $practica_fin= date_format_db($this->input->post('practica_fin'));
        $apoyo_economico=$this->input->post('apoyo_economico');
        $info= $this->input->post('info');

        $value_insert_practica =array('tipo_practica_id'=>$tipo_practica_id,'despacho_id'=>$despacho_id,'empresas_id'=>$empresas_id, 'dependencia_id'=>$dependencia_id,'representante'=>$representante,'jefedirec'=>$jefedirec,'registroCP'=>$registrocp,'practica_inicio'=>$practica_inicio,'practica_fin'=>$practica_fin,'apoyo_economico'=>$apoyo_economico,'info'=>$info,'Alumnos_id'=>$Alumnos_id);
        $this->practicas_model->CreatePracticas($value_insert_practica);

        /*Insertar tabla Solicitudes*/
        $value_insert_solicitud =array('id_tipo_solicitud'=>3,'fecha_ini'=>$practica_inicio,'fecha_fin'=>$practica_fin, 'id_alumno'=>$Alumnos_id);
        $this->Solicitudes_model->CreateSolicitud($value_insert_solicitud);

        redirect(base_url('Solicitudes'));

    }


    public function editView($id)
    {
          $GetIdPracticas=$this->practicas_model->HistorialPracticasList(array('practicas_profesionales.id'=>$id));
          $TipoPracticasList=$this->practicas_model->TipoPracticasList();
          $EstatusPracticasList=$this->practicas_model->EstatusPracticasList();
        $data = array(
            'title' => 'prueba',
            'GetIdPracticas'=> $GetIdPracticas,
            'TipoPracticasList'=>$TipoPracticasList,
            'EstatusPracticasList'=>$EstatusPracticasList
        );

       //print_r($tipo_usuario);
        $this->parser->parse('practicas_pro/edit',$data);

    }

    public function bitacoraView($id)
    {
        $GetIdAlumnos=$this->alumnos_model->GetIdAlumno(array('id'=>$id));
        $GetIdPracticas=$this->practicas_model->GetIdPracticas(array('alumnos_id'=>$id));
        $TipoCarrerasList=$this->practicas_model->TipoCarrerasList();
        $TipoPracticasList=$this->practicas_model->TipoPracticasList();
        $HistorialPracticasList=$this->practicas_model->HistorialPracticasList(array('practicas_profesionales.Alumnos_id'=>$id));
        $data = array(
            'title' => 'prueba',
            'GetIdPracticas'=> $GetIdPracticas,
            'GetIdAlumnos'=> $GetIdAlumnos,
            'TipoCarrerasList'=>$TipoCarrerasList,
            'TipoPracticasList'=>$TipoPracticasList,
            'HistorialPracticasList'=>$HistorialPracticasList,
        );
       //print_r($HistorialPracticasList);
        $this->parser->parse('practicas_pro/bitacora',$data);
    }

    public function dataInsertBitacora($id)
    {
        $Alumnos_id=  $id;
        /*Insertar tabla Practicas*/
        $tipo_practica_id = $this->input->post('tipo_practica');
        $empresas_id = $this->input->post('idEmpresa');
        $despacho_id = $this->input->post('idDespacho');
        $dependencia_id = $this->input->post('idDepedencia');
        $representante= $this->input->post('representante');
        $jefedirec = $this->input->post('jefe');
        $registrocp= $this->input->post('registrocp');
        $practica_inicio= date_format_db($this->input->post('practica_inicio'));

        $practica_fin= date_format_db($this->input->post('practica_fin'));
        $apoyo_economico=$this->input->post('apoyo_economico');
        $info= $this->input->post('info');

        $value_insert_practica =array('tipo_practica_id'=>$tipo_practica_id,'despacho_id'=>$despacho_id,'empresas_id'=>$empresas_id, 'dependencia_id'=>$dependencia_id,'representante'=>$representante,'jefedirec'=>$jefedirec,'registroCP'=>$registrocp,'practica_inicio'=>$practica_inicio,'practica_fin'=>$practica_fin,'apoyo_economico'=>$apoyo_economico,'info'=>$info,'Alumnos_id'=>$Alumnos_id);
        $this->practicas_model->CreatePracticas($value_insert_practica);

        redirect(base_url('PracticasPro/bitacoraView/'.$id));

    }




    public function HistorialPracticasJson(){
      $id = $this->input->post('id');
      $HistorialPracticasList=$this->practicas_model->HistorialPracticasList(array('practicas_profesionales.id'=>$id));
       $data=array();
       foreach ($HistorialPracticasList as $key) {
           $data[]=array(
           "nombre_comercial"   => $key->nombre_comercial,
           "tipo_practica"    => $key->tipo_practica,
           "representante"    => $key->representante,
           "jefe"             => $key->jefedirec,
           "registroCP"       =>$key->registroCP,
           "practica_inicio"  =>date_format_esp($key->practica_inicio),
           "practica_fin"     =>date_format_esp($key->practica_fin),
           "constancia"       =>$key->constancia,
           "info"             =>$key->info,
           );

       }
       echo json_encode($data);
    }



    public function dataUpdate($id)
    {


      $tipo_practica_id = $this->input->post('tipo_practica');
      $empresas_id = $this->input->post('idEmpresa');
      $despacho_id = $this->input->post('idDespacho');
      $dependencia_id = $this->input->post('idDepedencia');
      $representante= $this->input->post('representante');
      $jefedirec = $this->input->post('jefe');
      $registrocp= $this->input->post('registrocp');
      $practica_inicio= date_format_db($this->input->post('practica_inicio'));

      $practica_fin= date_format_db($this->input->post('practica_fin'));
      $apoyo_economico= $this->input->post('apoyo_economico');
      $estatus_id= $this->input->post('estatus_id');
      $info= $this->input->post('info');
          if($empresas_id==NULL){
          $empresas_id=0;
          }else{
              $despacho_id=0;
              $dependencia_id=0;
          }
          if ($despacho_id==NULL) {
            $despacho_id=0;
          } else {
             $empresas_id=0;
            $dependencia_id=0;
          }
          if ($dependencia_id==NULL) {
            $dependencia_id=0;
          } else {
            $empresas_id=0;
            $despacho_id=0;
          }
          
          
      $value_update =array('tipo_practica_id'=>$tipo_practica_id,'empresas_id'=>$empresas_id,'despacho_id'=>$despacho_id,'dependencia_id'=>$dependencia_id,'representante'=>$representante,'jefedirec'=>$jefedirec,'registroCP'=>$registrocp,'practica_inicio'=>$practica_inicio,'practica_fin'=>$practica_fin,'apoyo_economico'=>$apoyo_economico,'estatus_id'=>$estatus_id,'info'=>$info);
      $this->practicas_model-> UpdatePracticas($value_update,array('id' => $id ));


      $idAlumno=$this->practicas_model->GetIdPracticas(array('id' => $id ));

      redirect(base_url('PracticasPro/bitacoraView/'.$idAlumno[0]->Alumnos_id));


    }

    public function dataDelete($id)
    {



        $this->practicas_model-> UpdatePracticas(array('status'=>0),array('id' => $id ));
        redirect(base_url('PracticasPro'));

    }

     /*Busqueda de Alumno*/
    public function BuscarAlumno(){
      $searchTerm = $this->input->get('term');
       $search=$this->alumnos_model->GetBuscarAlumno(array('alumnos.nombre'=>$searchTerm));

       $data=array();
       if ($search==FALSE)
       {
         $data[]=array(
         "id"=>'0',
          "nombre_cp"   => 'No existe',
          "nombre"   => 'N/A',
          "apellido_paterno"   => 'N/A',
          "apellido_materno"   => 'N/A',
          "carrera"   => 'N/A',
          "id_carrera"   => 0
         );
       }else{
       foreach ($search as $key) {
           $data[]=array(
           "id"=>$key->idAlumno,
           "nombre_cp"   => $key->Nombre_cp,
           "nombre"   => $key->alumno,
           "apellido_paterno"   => $key->apellido_paterno,
           "apellido_materno"   => $key->apellido_materno,
           "carrera"   => $key->Carrera,
           "id_carrera"=>$key->idcarrera
           );

       }
      }
       echo json_encode($data);
    }

    /*Busqueda de Empresas*/
    public function BuscarEmpresa(){
      $searchTerm = $this->input->get('term');


       $search=$this->empresas_model->GetBuscarEmpresa(array('nombre_comercial'=>$searchTerm));

       $data=array();
       if ($search==FALSE)
       {
         $data[]=array(
         "id"=>'0',
         "nombre_comercial"   => 'No existe',
         );
       }else{
       foreach ($search as $key) {
           $data[]=array(
           "id"=>$key->id,
           "nombre_comercial"   => $key->nombre_comercial,
           );

       }
      }
       echo json_encode($data);
    }


    public function Reporte()
    {
        $data = array(
            'title' => 'prueba',

        );
        $this->parser->parse('practicas_pro/listReport',$data);

    }

    public function ReportePracticasListJSON(){
      $HistorialPracticasList=$this->practicas_model->ReportePracticasList();
      $data=array();
        foreach ($HistorialPracticasList as $key) {

          if($key->nombre_comercial==NULL){
             if ($key->empresasnombre==NULL){
              $val=$key->dependencianombre;
             }else{
              $val= $key->empresasnombre;
             }
          }else {
              $val= $key->nombre_comercial;
          }

          if ($key->colegio==NULL) {
            $val2="N/A";
          }else{$val2=$key->colegio;}

            $data[]=array(
            "id"=>$key->id,
            "nombre"=>$key->nombrealumno. " ".$key->apellido_paterno. " ".$key->apellido_materno,
            "lugar"=> $val,
            "tipo_practica"=>$key->tipo_practica,
            "carrera"=> $key->carreranombre,
            "representante"=> $key->representante,
            "registroCP"=>$val2,
            "practica_inicio"=>date_format_esp($key->practica_inicio),
            "practica_fin"=>date_format_esp($key->practica_fin),
            "estatus"=>$key->estatus,
            );

        }

        echo '{"data": '.json_encode($data).'}';



    }



    public function BuscarDespacho(){
      $searchTerm = $this->input->get('term');


       $search=$this->despachos_model->GetBuscarDespacho(array('nombre'=>$searchTerm));

       $data=array();
       if ($search==FALSE)
       {
         $data[]=array(
         "id"=>'0',
         "nombre"   => 'No existe',
         "colegio"=>''
         );
       }else{
       foreach ($search as $key) {
           $data[]=array(
           "id"=>$key->id,
           "nombre"   => $key->nombre,
           "colegio"=>$key->colegio
           );

       }
      }
       echo json_encode($data);
    }
//modificado
    public function BuscarDependencia(){
      $searchTerm = $this->input->get('term');


       $search=$this->Dependencias_model->DependenciasList(array('Nombre'=>$searchTerm));

       $data=array();
       if ($search==FALSE)
       {
         $data[]=array(
         "id"=>'0',
         "nombre"   => 'No existe',
         //"colegio"=>''
         );
       }else{
       foreach ($search as $key) {
           $data[]=array(
           "id"=>$key->iddep,
           "nombre"   => $key->Nombre,
           //"colegio"=>$key->colegio
           );

       }
      }
       echo json_encode($data);
    }

}
