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

        $this->load->model('practicas_model');
        $this->load->model('empresas_model');
        $this->load->model('alumnos_model');
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
        /*Insertar tabla Alumnos*/
        $nombre           = $this->input->post('nombre');
        $apellido_paterno = $this->input->post('apellido_paterno');
        $apellido_materno = $this->input->post('apellido_materno');
        $id_carrera       = $this->input->post('carrera');
        $value_insert=array('nombre'=>$nombre,'apellido_paterno'=>$apellido_paterno,'apellido_materno'=>$apellido_materno,'carreras_id'=>$id_carrera);
         $Alumnos_id=  $this->alumnos_model->CreateAlumno($value_insert);

        /*Insertar tabla Practicas*/
        $tipo_practica_id = $this->input->post('tipo_practica');
        $empresas_id = $this->input->post('idEmpresa');
        $representante= $this->input->post('representante');
        $registrocp= $this->input->post('registrocp');
        $practica_inicio= date_format_db($this->input->post('practica_inicio'));

        $practica_fin= date_format_db($this->input->post('practica_fin'));
        $constancia= $this->input->post('constancia');
        $info= $this->input->post('info');

        $value_insert_practica =array('tipo_practica_id'=>$tipo_practica_id,'empresas_id'=>$empresas_id,'representante'=>$representante,'registroCP'=>$registrocp,'practica_inicio'=>$practica_inicio,'practica_fin'=>$practica_fin,'constancia'=>$constancia,'info'=>$info,'Alumnos_id'=>$Alumnos_id);
        $this->practicas_model->CreatePracticas($value_insert_practica);

        redirect(base_url('PracticasPro'));

    }


    public function editView($id)
    {
        $GetIdPracticas=$this->practicas_model->HistorialPracticasList(array('practicas_profesionales.id'=>$id));
          $TipoPracticasList=$this->practicas_model->TipoPracticasList();
        $data = array(
            'title' => 'prueba',
            'GetIdPracticas'=> $GetIdPracticas,
            'TipoPracticasList'=>$TipoPracticasList
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
            'HistorialPracticasList'=>$HistorialPracticasList
        );
      // print_r($HistorialPracticasList);
        $this->parser->parse('practicas_pro/bitacora',$data);
    }

    public function dataInsertBitacora($id)
    {
        $Alumnos_id=  $id;
        /*Insertar tabla Practicas*/
        $tipo_practica_id = $this->input->post('tipo_practica');
        $empresas_id = $this->input->post('idEmpresa');
        $representante= $this->input->post('representante');
        $registrocp= $this->input->post('registrocp');
        $practica_inicio= date_format_db($this->input->post('practica_inicio'));

        $practica_fin= date_format_db($this->input->post('practica_fin'));
        $constancia= $this->input->post('constancia');
        $info= $this->input->post('info');

        $value_insert_practica =array('tipo_practica_id'=>$tipo_practica_id,'empresas_id'=>$empresas_id,'representante'=>$representante,'registroCP'=>$registrocp,'practica_inicio'=>$practica_inicio,'practica_fin'=>$practica_fin,'constancia'=>$constancia,'info'=>$info,'Alumnos_id'=>$Alumnos_id);
        $this->practicas_model->CreatePracticas($value_insert_practica);

        redirect(base_url('PracticasPro/bitacoraView/'.$id));

    }



    /*Busqueda de Empresas*/
    public function HistorialPracticasJson(){
      $id = $this->input->post('id');
      $HistorialPracticasList=$this->practicas_model->HistorialPracticasList(array('practicas_profesionales.id'=>$id));
       $data=array();
       foreach ($HistorialPracticasList as $key) {
           $data[]=array(
           "nombre_empresa"   => $key->nombre_empresa,
           "tipo_practica"    => $key->tipo_practica,
           "representante"    => $key->representante,
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
      $representante= $this->input->post('representante');
      $registrocp= $this->input->post('registrocp');
      $practica_inicio= date_format_db($this->input->post('practica_inicio'));

      $practica_fin= date_format_db($this->input->post('practica_fin'));
      $constancia= $this->input->post('constancia');
      $info= $this->input->post('info');

      $value_update =array('tipo_practica_id'=>$tipo_practica_id,'empresas_id'=>$empresas_id,'representante'=>$representante,'registroCP'=>$registrocp,'practica_inicio'=>$practica_inicio,'practica_fin'=>$practica_fin,'constancia'=>$constancia,'info'=>$info);
      $this->practicas_model-> UpdatePracticas($value_update,array('id' => $id ));


      $idAlumno=$this->practicas_model->GetIdPracticas(array('id' => $id ));

      redirect(base_url('PracticasPro/bitacoraView/'.$idAlumno[0]->Alumnos_id));


    }

    public function dataDelete($id)
    {



        $this->practicas_model-> UpdatePracticas(array('status'=>0),array('id' => $id ));
        redirect(base_url('PracticasPro'));

    }

    /*Busqueda de Empresas*/
    public function BuscarEmpresa(){
      $searchTerm = $this->input->get('term');


       $search=$this->empresas_model->GetBuscarEmpresa(array('nombre_empresa'=>$searchTerm));

       $data=array();
       if ($search==FALSE)
       {
         $data[]=array(
         "id"=>'0',
         "nombre_empresa"   => 'No existe',
         );
       }else{
       foreach ($search as $key) {
           $data[]=array(
           "id"=>$key->id,
           "nombre_empresa"   => $key->nombre_empresa,
           );

       }
      }
       echo json_encode($data);
    }

}
