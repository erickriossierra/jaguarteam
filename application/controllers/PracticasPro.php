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
        $data = array(
            'title' => 'prueba',
            'TipoPracticasList'=>$TipoPracticasList,

        );
        $this->parser->parse('practicas_pro/new',$data);

    }

    public function dataInsert()
    {

        $nombre           = $this->input->post('nombre');
        $value_insert =array('nombre'=>$nombre);
        $this->practicas_model->CreatePracticas($value_insert);
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

    /*Busqueda de Alumno*/
    public function BuscarAlumno(){
      $searchTerm = $this->input->get('term');


       $search=$this->practicas_model->GetBuscarAlumno(array('nombre'=>$searchTerm));
       
       $data=array();

       /*foreach ($search as $key) {
           $data[]=array(
           "id"=>$key->id,
           "name"   => $key->name,
           "phone"   => $key->phone,
           "email" => $key->email,
           "address" => $key->address,
           "contact_name" => $key->contact_name,
           "directive" => $key->directive);

       }

       echo json_encode($data);*/
    }

}
