<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Giro extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ( $this->session->userdata('nameS')=='') {
            redirect();
        }
        $this->name_session  =  $this->session->userdata('nameS');
        $this->idtypeUser_session = $this->session->userdata('idtypeUserS');

        $this->load->model('giros_model');
        $this->load->helper('form');
    }



    public function index()
    {

        $data = array(
            'title' => 'prueba',

        );

        $this->parser->parse('giros/list',$data);

    }

    public function dataListJson(){
      $GirosList=$this->giros_model->GirosList();
      $data=array();
        foreach ($GirosList as $key) {
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

        $data = array(
            'title' => 'prueba',

        );
        $this->parser->parse('giros/new',$data);

    }

    public function dataInsert()
    {

        $nombre           = $this->input->post('nombre');
        $value_insert =array('nombre'=>$nombre);
        $this->giros_model->CreateGiros($value_insert);
        redirect(base_url('giro'));

    }


    public function editView($id)
    {
        $GetIdGiros=$this->giros_model->GetIdGiros(array('id'=>$id));

        $data = array(
            'title' => 'prueba',
            'GetIdGiros'=> $GetIdGiros,



        );

       //print_r($tipo_usuario);
        $this->parser->parse('giros/edit',$data);

    }


    public function dataUpdate($id)
    {


      $nombre           = $this->input->post('nombre');
      $status           = $this->input->post('status');
      $value_update =array('nombre'=>$nombre,'status'=>$status);
      $this->giros_model-> UpdateGiros($value_update,array('id' => $id ));
        //$this->parser->parse('welcome',$data);
        redirect(base_url('Giro'));

    }

    public function dataDelete($id)
    {



        $this->giros_model-> UpdateGiros(array('status'=>0),array('id' => $id ));
        redirect(base_url('Giro'));

    }

}
