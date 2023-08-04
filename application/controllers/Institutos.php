<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Institutos extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ( $this->session->userdata('nameS')=='') {
            redirect();
        }
        $this->name_session  =  $this->session->userdata('nameS');
        $this->idtypeUser_session = $this->session->userdata('idtypeUserS');
        $this->idUser_session = $this->session->userdata('idUserS');

        $this->load->model('Institutos_model');
       // $this->load->model('AsignaturasLibres_model');
        $this->load->helper('form');
      //  $this->load->model('practicas_model');
      //  $this->load->model('alumnos_model');
        $this->load->helper('aux_helper');

    }



    public function index()
    {

        $data = array(
            'title' => 'prueba',

        );

        $this->parser->parse('institutos/List',$data);

    }

    public function dataListJson(){
      $InstitutosList=$this->Institutos_model->InstitutosList();
      $data=array();
        foreach ($InstitutosList as $key) {
            $data[]=array(
            "id"=>$key->id,
            "nombre"=> $key->nombre,
            "nombre_comun"=>$key->nombre_comun,
            
            );

        }

        echo '{"data": '.json_encode($data).'}';



    }

    public function addView()
    {
        //$InstitutoList=$this->Institutos_model->CarreraList();
        $InstitutoList=$this->Institutos_model->InstitutosList();
        $data = array(
            'title' => 'prueba',
            //'InstitutoList'=>$InstitutoList,
            'InstitutoList'=>$InstitutoList,
        );
        $this->parser->parse('institutos/new',$data);

    }

    public function dataInsert()
    {

       // $id           = $this->input->post('id');
      
        $nombre       = $this->input->post('nombre');
        $nombre_comun =$this->input->post('nombre_comun');
        
        $value_insert =array('id'=>$id, 'nombre'=>$nombre,'nombre_comun'=>$nombre_comun);
        $this->Institutos_model->CreateInstituto($value_insert);
        redirect(base_url('Institutos'));

    }


    public function editView($id)
    {
         $GetIdInstituto=$this->Institutos_model->GetIdInstituto(array('id'=>$id));
      //   $CatAsignaturasLibres=$this->Institutos_model->CatAsignaturasLibresList();

        $data = array(
        'title' => 'prueba',
        'GetIdInstituto'=> $GetIdInstituto,
       // 'CatAsignaturasLibres'=>$CatAsignaturasLibres
        //'catasignatura'=>$catasignatura,

        );

      // print_r($data);
        $this->parser->parse('Institutos/edit', $data);

    }


    public function dataDelete($id)
    {

        $this->Asignaturas_model-> UpdateAsignatura(array('status'=>0),array('id' => $id ));
        redirect(base_url('Asignaturas'));

    }
    public function dataUpdate($id)
    {

      $nombre  = $this->input->post('nombre');
      $nombre_comun   = $this->input->post('nombre_comun');
      //$creditos= $this->input->post('creditos');

      $value_update =array( 'nombre'=>$nombre, 'nombre_comun'=>$nombre_comun);
      $this->Institutos_model-> UpdateInstituto($value_update,array('id' => $id ));
        //$this->parser->parse('welcome',$data);
        redirect(base_url('Institutos'));

    }

    public function dataDeleteModal(){
        $id = $this->input->post('id');
        //echo $id; exit;
        $this->Asignaturas_model->DeleteAsignatura(array('id'=>$id));

        $status = True;
        $result = array('statusR' => $status);
        echo json_encode($result);

    }


}