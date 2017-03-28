<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Despacho extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ( $this->session->userdata('nameS')=='') {
            redirect();
        }
        $this->name_session  =  $this->session->userdata('nameS');
        $this->idtypeUser_session = $this->session->userdata('idtypeUserS');

        $this->load->model('despachos_model');
        $this->load->helper('form');
    }



    public function index()
    {

        $data = array(
            'title' => 'prueba',

        );

        $this->parser->parse('despachos/list',$data);

    }

    public function dataListJson(){
      $DespachosList=$this->despachos_model->DespachosList();
      $data=array();
        foreach ($DespachosList as $key) {
            $data[]=array(
            "id"=>$key->id,
            "nombre"=> $key->nombre,
            "colegio"=> $key->colegio,
            );

        }

        echo '{"data": '.json_encode($data).'}';



    }

    public function addView()
    {

        $data = array(
            'title' => 'prueba',

        );
        $this->parser->parse('despachos/new',$data);

    }

    public function dataInsert()
    {

        $nombre           = $this->input->post('nombre');
        $colegio          = $this->input->post('colegio');
        $value_insert =array('nombre'=>$nombre,'colegio'=>$colegio);
        $this->despachos_model->CreateDespachos($value_insert);
        redirect(base_url('Despacho'));

    }


    public function editView($id)
    {
        $GetIdDespachos=$this->despachos_model->GetIdDespachos(array('id'=>$id));

        $data = array(
            'title' => 'prueba',
            'GetIdDespachos'=> $GetIdDespachos,



        );

      // print_r($data);
        $this->parser->parse('despachos/edit', $data);

    }


    public function dataUpdate($id)
    {


      $nombre           = $this->input->post('nombre');
      $colegio          = $this->input->post('colegio');
      $value_update =array('nombre'=>$nombre,'colegio'=>$colegio);
      $this->despachos_model-> UpdateDespachos($value_update,array('id' => $id ));
        //$this->parser->parse('welcome',$data);
        redirect(base_url('Despacho'));

    }

    public function dataDelete($id)
    {



        $this->despachos_model-> UpdateDespachos(array('status'=>0),array('id' => $id ));
        redirect(base_url('Despacho'));

    }

    public function dataDeleteModal(){
        $id = $this->input->post('id');
        //echo $id; exit;
        $this->despachos_model->DeleteDespachos(array('id'=>$id));
        $status = True;
        $result = array('statusR' => $status);
        echo json_encode($result);

    }


}
