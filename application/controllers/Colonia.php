<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Colonia extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ( $this->session->userdata('nameS')=='') {
            redirect();
        }
        $this->name_session  =  $this->session->userdata('nameS');
        $this->idtypeUser_session = $this->session->userdata('idtypeUserS');
        $this->idUser_session = $this->session->userdata('idUserS');

        $this->load->model('colonias_model');
        $this->load->helper('form');
    }



    public function index()
    {

        $data = array(
            'title' => 'prueba',

        );

        $this->parser->parse('colonias/list',$data);

    }

    public function dataListJson(){
      $ColoniasList=$this->colonias_model->ColoniasList();
      $data=array();
        foreach ($ColoniasList as $key) {
            $data[]=array(
            "id"=>$key->id,
            "nombre"=> $key->nombre,
            "cp"=>$key->CP,
            );

        }

        echo '{"data": '.json_encode($data).'}';



    }

    public function addView()
    {

        $data = array(
            'title' => 'prueba',

        );
        $this->parser->parse('colonias/new',$data);

    }

    public function dataInsert()
    {

        $nombre           = $this->input->post('nombre');
        $cp           =$this->input->post('cp');
        $value_insert =array('nombre'=>$nombre, 'CP'=>$cp);
        $this->colonias_model->CreateColonias($value_insert);
        redirect(base_url('Colonia'));

    }


    public function editView($id)
    {
        $GetIdColonias=$this->colonias_model->GetIdColonias(array('id'=>$id));

        $data = array(
            'title' => 'prueba',
            'GetIdColonias'=> $GetIdColonias,



        );

      // print_r($data);
        $this->parser->parse('colonias/edit', $data);

    }


    public function dataUpdate($id)
    {


      $nombre       = $this->input->post('nombre');
      $cp           = $this->input->post('cp');
      $value_update =array('nombre'=>$nombre, 'CP'=>$cp );
      $this->colonias_model-> UpdateColonias($value_update,array('id' => $id ));
        //$this->parser->parse('welcome',$data);
        redirect(base_url('Colonia'));

    }

    public function dataDelete($id)
    {



        $this->colonias_model-> UpdateColonias(array('status'=>0),array('id' => $id ));
        redirect(base_url('Colonia'));

    }

    public function dataDeleteModal(){
        $id = $this->input->post('id');
        //echo $id; exit;
        $this->colonias_model->DeleteColonias(array('id'=>$id));
        $status = True;
        $result = array('statusR' => $status);
        echo json_encode($result);

    }


}
