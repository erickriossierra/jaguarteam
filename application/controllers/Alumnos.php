<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumnos extends CI_Controller {

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
        $this->load->helper('aux_helper');
        $this->load->helper('form');
    }


    public function AlumnosCarrerasListJSON(){
      $AlumnosCarrerasList=$this->alumnos_model->AlumnosCarrerasList();
      $data=array();
        foreach ($AlumnosCarrerasList as $key) {
            $data[]=array(
            "id"=>$key->id,
            "nombre"=>$key->nombre,
            "apellido_paterno"=> $key->apellido_paterno,
            "apellido_materno"=> $key->apellido_materno,
            "carrera"=> $key->carrera,
            );

        }

        echo '{"data": '.json_encode($data).'}';



    }

    public function index()
    {
    }



    public function editView($id)
    {
        $GetIdAlumnos=$this->alumnos_model->GetIdAlumno(array('id'=>$id));
        $TipoCarrerasList=$this->practicas_model->TipoCarrerasList();

        $data = array(
            'title' => 'prueba',
            'GetIdAlumnos'=> $GetIdAlumnos,
            'TipoCarrerasList'=>$TipoCarrerasList,
        );

       //print_r($tipo_usuario);
        $this->parser->parse('alumnos/edit',$data);

    }


    public function dataUpdate($id)
    {

      /*Insertar tabla Alumnos*/
      $nombre           = $this->input->post('nombre');
      $apellido_paterno = $this->input->post('apellido_paterno');
      $apellido_materno = $this->input->post('apellido_materno');
      $id_carrera       = $this->input->post('carrera');
      $value_update=array('nombre'=>$nombre,'apellido_paterno'=>$apellido_paterno,'apellido_materno'=>$apellido_materno,'carreras_id'=>$id_carrera);
      $this->alumnos_model->UpdateAlumno($value_update,array('id' => $id ));
        //$this->parser->parse('welcome',$data);
        redirect(base_url('PracticasPro'));

    }

    public function dataDelete($id)
    {



        $this->alumnos_model-> UpdateAlumno(array('status'=>0),array('id' => $id ));
        redirect(base_url('Alumnos'));

    }

}
