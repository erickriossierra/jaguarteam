<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dependencia extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ( $this->session->userdata('nameS')=='') {
            redirect();
        }
        $this->name_session  =  $this->session->userdata('nameS');
        $this->idtypeUser_session = $this->session->userdata('idtypeUserS');
        $this->idUser_session = $this->session->userdata('idUserS');

        $this->load->model('Dependencias_model');
        $this->load->helper('form');
    }

//modificado

    public function index()
    {

        $data = array(
            'title' => 'prueba',

        );

        $this->parser->parse('dependencias/list',$data);

    }
//modificado
    public function dataListJson(){
      $DependenciasList=$this->Dependencias_model->DependenciasList();
      $data=array();
        foreach ($DependenciasList as $key) {
            $data[]=array(
            "id"=>$key->iddep,
            "nombre"=> $key->Nombre,
            "campus"=> $key->campus,
            );

        }

        echo '{"data": '.json_encode($data).'}';



    }
//modificado
    public function addView()
    {

        $data = array(
            'title' => 'prueba',

        );
        $this->parser->parse('dependencias/new',$data);

    }
//
    public function dataInsert()
    {

        $nombre           = $this->input->post('nombre');
        $calle          = $this->input->post('calle');
        $num_exter          = $this->input->post('num_exter');
        $cruzamiento          = $this->input->post('cruzamiento');
        $idcolonia          = $this->input->post('idcolonia');
        $campus_id          = $this->input->post('campus_id');
       // $campus_id          = $this->input->post('campus');
       
        $value_insert =array('nombre'=>$nombre,'Calle'=>$calle, 'numext'=>$num_exter, 'cruzamiento'=>$cruzamiento, 'campus_id'=>$campus_id,'colonia_id'=>$idcolonia);
        $this->Dependencias_model->CreateDependencia($value_insert);
        redirect(base_url('Dependencia'));

    }

//modificado
    public function editView($id)
    {
        $GetIdDependencia=$this->Dependencias_model->GetIdDependencia(array('dependencias.id'=>$id));
        $GetIdCampus=$this->Dependencias_model->GetBuscarCampus(array('id'=>$id));

        $data = array(
            'title' => 'prueba',
            'GetIdDependencia'=> $GetIdDependencia,
            'GetIdCampus'=>$GetIdCampus,

        );

      // print_r($data);
        $this->parser->parse('dependencias/edit', $data);

    }

 //nuevo x que no estaba
  /*Busqueda de dependencia*/
    public function GetBuscarDependencia(){
      $searchTerm = $this->input->get('term');

       $search=$this->Dependencias_model->GetBuscarDependencia(array('nombre'=>$searchTerm));

       $data=array();
       if ($search==FALSE)
       {
         $data[]=array(
         "id"=>'0',
         "nombre"   => 'No existe',
         
         );
       }else{
       foreach ($search as $key) {
           $data[]=array(
           "id"       =>$key->id,
           "nombre"   => $key->nombre,
         
           
           );

       }
      }
       echo json_encode($data);
    } 
    //nuevo x que no estaba
  /*Busqueda de colonia*/
    public function GetBuscarCampus(){
      $searchTerm = $this->input->get('term');

       $search=$this->Dependencias_model->GetBuscarCampus(array('nombre'=>$searchTerm));

       $data=array();
       if ($search==FALSE)
       {
         $data[]=array(
         "id"=>'0',
         "nombre"   => 'No existe',
         
         );
       }else{
       foreach ($search as $key) {
           $data[]=array(
           "id"       =>$key->id,
           "nombre"   => $key->nombre,
         
           
           );

       }
      }
       echo json_encode($data);
    }  

//
    public function dataUpdate($id)
    {


        $nombre          = $this->input->post('nombre');
        $calle          = $this->input->post('calle');
        $num_exter      = $this->input->post('num_exter');
        $cruzamiento    = $this->input->post('cruzamiento');
        $idcolonia      = $this->input->post('idcolonia');
        $campus_id      = $this->input->post('campus_id');
       
        $value_update =array('nombre'=>$nombre,'Calle'=>$calle, 'numext'=>$num_exter, 'cruzamiento'=>$cruzamiento, 'campus_id'=>$campus_id,'colonia_id'=>$idcolonia);
      $this->Dependencias_model-> UpdateDependencia($value_update,array('dependencias.id' => $id ));
        //$this->parser->parse('welcome',$data);
        redirect(base_url('Dependencia'));

    }
//
    public function dataDelete($id)
    {



        $this->despachos_model-> UpdateDespachos(array('status'=>0),array('id' => $id ));
        redirect(base_url('Despacho'));

    }
//
    public function dataDeleteModal(){
        $id = $this->input->post('id');
        //echo $id; exit;
        $this->despachos_model->DeleteDespachos(array('id'=>$id));
        $status = True;
        $result = array('statusR' => $status);
        echo json_encode($result);

    }


}
