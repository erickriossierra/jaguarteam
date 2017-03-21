<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ( $this->session->userdata('nameS')=='') {
            redirect();
        }
        $this->name_session  =  $this->session->userdata('nameS');
        $this->idtypeUser_session = $this->session->userdata('idtypeUserS');

        $this->load->model('empresas_model');
        $this->load->helper('form');
    }



    public function index()
    {

        $data = array(
            'title' => 'prueba',

        );

        $this->parser->parse('empresas/list',$data);

    }

    public function dataListJson(){
      $EmpresasList=$this->empresas_model->EmpresasList();
      $data=array();
        foreach ($EmpresasList as $key) {
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
        $this->parser->parse('empresas/new');

    }

    public function dataInsert()
    {

        $nombre           = $this->input->post('nombre');
        $value_insert =array('nombre'=>$nombre);
        $this->empresas_model->CreateEmpresa($value_insert);
        redirect(base_url('giro'));

    }


    public function editView($id)
    {
        $GetIdEmpresas=$this->empresas_model->GetIdEmpresa(array('id'=>$id));

        $data = array(
            'title' => 'prueba',
            'GetIdEmpresas'=> $GetIdEmpresas,



        );

       //print_r($tipo_usuario);
        $this->parser->parse('empresas/edit',$data);

    }


    public function dataUpdate($id)
    {


      $nombre           = $this->input->post('nombre');
      $status           = $this->input->post('status');
      $value_update =array('nombre'=>$nombre,'status'=>$status);
      $this->empresas_model-> UpdateEmpresa($value_update,array('id' => $id ));
        //$this->parser->parse('welcome',$data);
        redirect(base_url('Empresa'));

    }

    public function dataDelete($id)
    {



        $this->empresas_model-> UpdateEmpresa(array('status'=>0),array('id' => $id ));
        redirect(base_url('Empresa'));

    }

    public function dataInsertJson()
    {

        $nombre           = $this->input->post('nombre_empresa');
        $value_insert =array('nombre_empresa'=>$nombre);
        $this->empresas_model->CreateEmpresa($value_insert);
        $status = True;
        $result = array('statusR' => $status);


       echo json_encode($result);

    }


}
