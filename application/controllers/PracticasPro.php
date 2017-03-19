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
    }



    public function index()
    {

        $data = array(
            'title' => 'prueba',

        );

        $this->parser->parse('practicas_pro/list',$data);

    }

    public function dataListJson(){
      $PracticasList=$this->practicas_model->PracticasList();
      $data=array();
        foreach ($PracticasList as $key) {
            $data[]=array(
            "id"=>$key->id,
            "nombre"=> $key->nombre,
            "status"=> $key->status
            );

        }

        echo '{"data": '.json_encode($data).'}';



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
        $practica_inicio= $this->input->post('practica_inicio');
        $practica_fin= $this->input->post('practica_fin');
        $constancia= $this->input->post('constancia');
        $info= $this->input->post('info');

        $value_insert_practica =array('tipo_practica_id'=>$tipo_practica_id,'empresas_id'=>$empresas_id,'representante'=>$representante,'registroCP'=>$registrocp,'practica_inicio'=>$practica_inicio,'practica_fin'=>$practica_fin,'constancia'=>$constancia,'info'=>$info,'Alumnos_id'=>$Alumnos_id);
        $this->practicas_model->CreatePracticas($value_insert_practica);

        redirect(base_url('PracticasPro'));

    }


    public function editView($id)
    {
        $GetIdPracticas=$this->practicas_model->GetIdPracticas(array('id'=>$id));

        $data = array(
            'title' => 'prueba',
            'GetIdPracticas'=> $GetIdPracticas,



        );

       //print_r($tipo_usuario);
        $this->parser->parse('practicas_pro/edit',$data);

    }


    public function dataUpdate($id)
    {


      $nombre           = $this->input->post('nombre');
      $status           = $this->input->post('status');
      $value_update =array('nombre'=>$nombre,'status'=>$status);
      $this->practicas_model-> UpdatePracticas($value_update,array('id' => $id ));
        //$this->parser->parse('welcome',$data);
        redirect(base_url('PracticasPro'));

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
