<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sector extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ( $this->session->userdata('nameS')=='') {
            redirect();
        }
        $this->name_session  =  $this->session->userdata('nameS');
        $this->idtypeUser_session = $this->session->userdata('idtypeUserS');

        $this->load->model('sectors_model');
        $this->load->helper('form');
    }



    public function index()
    {

        $data = array(
            'title' => 'prueba',

        );

        $this->parser->parse('sectors/list',$data);

    }

    public function dataListJson(){
      $SectorsList=$this->sectors_model->SectorsList();
      $data=array();
        foreach ($SectorsList as $key) {
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
        $this->parser->parse('sectors/new');

    }

    public function dataInsert()
    {

        $nombre           = $this->input->post('nombre');
        $value_insert =array('nombre'=>$nombre);
        $this->sectors_model->CreateSectors($value_insert);
        redirect(base_url('Sector'));

    }


    public function editView($id)
    {
        $GetIdSectors=$this->sectors_model->GetIdSectors(array('id'=>$id));

        $data = array(
            'title' => 'prueba',
            'GetIdSectors'=> $GetIdSectors,



        );

      // print_r($data);
        $this->parser->parse('sectors/edit', $data);

    }


    public function dataUpdate($id)
    {


      $nombre           = $this->input->post('nombre');
      $value_update =array('nombre'=>$nombre);
      $this->sectors_model-> UpdateSectors($value_update,array('id' => $id ));
        //$this->parser->parse('welcome',$data);
        redirect(base_url('Sector'));

    }

    public function dataDelete($id)
    {



        $this->sectors_model-> UpdateSectors(array('status'=>0),array('id' => $id ));
        redirect(base_url('Sector'));

    }

}
