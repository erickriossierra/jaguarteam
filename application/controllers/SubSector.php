<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubSector extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ( $this->session->userdata('nameS')=='') {
            redirect();
        }
        $this->name_session  =  $this->session->userdata('nameS');
        $this->idtypeUser_session = $this->session->userdata('idtypeUserS');
        $this->idUser_session = $this->session->userdata('idUserS');

        $this->load->model('subsectors_model');
        $this->load->helper('form');
    }



    public function index()
    {



    }

    public function dataListJson($id){
      $SectorsList=$this->subsectors_model->GetIdSubSector(array('sector_id' =>$id));
      $data=array();
      if($SectorsList==False)
      {
        $data[]=array(
        "subsector.id"=>'',
        "subsector.nombre"=>''
        );
      }else{
          foreach ($SectorsList as $key) {
            $data[]=array(
           // "subsector.id"=>$key->id,
            "nombre"=> $key->nombre
            );

        }
  }
        echo '{"data": '.json_encode($data).'}';



    }


    public function addView()
    {

        $data = array(
            'title' => 'prueba',

        );
        $this->parser->parse('subsectors/new');

    }

    public function dataInsert($id)
    {

        $nombre           = $this->input->post('nombre');

        $value_insert =array('nombre'=>$nombre,'sector_id'=>$id);

        $this->subsectors_model->CreateSubSector($value_insert);

        redirect(base_url('SubSector/editView/').$id);

    }


    public function editView($id)
    {


        $data = array(
            'title' => 'prueba',
            'id'=> $id,



        );

        $this->parser->parse('subsectors/edit',$data);

    }


    public function dataUpdate($id)
    {


      $nombre           = $this->input->post('nombre');
      $value_update =array('nombre'=>$nombre);
      $this->subsectors_model-> UpdateSubSector($value_update,array('id' => $id ));
        //$this->parser->parse('welcome',$data);
        redirect(base_url('SubSector'));

    }

    public function dataDelete($id)
    {



        $this->subsectors_model-> UpdateSubSector(array('status'=>0),array('id' => $id ));
        redirect(base_url('SubSector'));

    }

}
