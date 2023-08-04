<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ( $this->session->userdata('nameS')=='') {
            redirect();
        }
        $this->name_session  =  $this->session->userdata('nameS');
        $this->idtypeUser_session = $this->session->userdata('idtypeUserS');
        $this->idUser_session = $this->session->userdata('idUserS');

        $this->load->model('pedidos_model');
        $this->load->model('clientes_model');
        $this->load->model('escuelas_model');
        $this->load->model('carreras_model');
        //$this->load->model('tallas_model');
        $this->load->model('estatus_model');
        $this->load->model('sexos_model');

        $this->load->helper('form');
    }

    public function index()
    {

        $data = array(
            'title' => 'prueba',
        );
        $this->parser->parse('clientes/list',$data);

    }

    public function dataListJson(){
      $ClientesList=$this->clientes_model->ClientesListJson();
      $data=array();
      if($ClientesList==NULL){

        $data[]=array(
        "id"=>'',
        "Nombre"=> '',
        "telefono"=>'',
        "correo"=> '',
        "sexo"=> '',
        "escuela"=> '',
        "carrera"=> '',
        
     /*   "fecha"=> '',
        "estatus"=> '',*/
        
        );

      }else{
        foreach ($ClientesList as $key) {
            $data[]=array(
            "id"=>$key->id_cli,
            "Nombre"=>$key->Nombre_cli,
            "telefono"=> $key->Telefono,
            "correo"=> $key->Correo,
            "sexo"=> $key->sexo,
            "escuela"=> $key->nombre_carr,
            "carrera"=> $key->nombre_esc,
         /*   "fecha"=> $key->Fecha,
            "estatus"=> $key->tipo,
          */ 
            );

          }
        }
        echo '{"data": '.json_encode($data).'}';
    }

    public function addView()
        {
        
          //$ClientesList=$this->clientes_model->ClientesList();
          $EscuelasList=$this->escuelas_model->EscuelasList();
          $SexosList=$this->sexos_model->SexosList();
          $CarrerasList=$this->carreras_model->CarrerasList();
          //$TallasList=$this->tallas_model->TallasList();
          //$EstatusList=$this->estatus_model->estatusList();
          
            $data = array(
                'title' => 'prueba',
                'EscuelasList'=>$EscuelasList,
                'CarrerasList'=>$CarrerasList,
                'SexosList'=>$SexosList,
           /*   'ColoresList'=>$ColoresList,
                'TallasList'=>$TallasList,
                'EstatusList'=>$EstatusList,
*/
    
            );
            $this->parser->parse('clientes/new',$data);
    
        }

     public function dataInsert()
        {
              
            $Nombre_cli=$this->input->post('Nombre_cli');
            $telefono=$this->input->post('Telefono');
            $correo=$this->input->post('Correo');
            $id_sexo=$this->input->post('sexo');
            $id_carrera=$this->input->post('Carrera');
            $id_escuela=$this->input->post('escuela');
               
            $value_insert =array(
             
              'Nombre'=>$Nombre_cli,
              'Telefono'=>$telefono,
              'Correo'=>$correo,
              'id_sex'=>$id_sexo,
              'id_esc'=>$id_carrera,
              'id_carr'=>$id_escuela,
              
            );
            $idreturn=$this->clientes_model->CreateCliente($value_insert);
    
            redirect(base_url('Clientes/editView/').$idreturn);
            
        }

    public function editView($id)
        {

          $GetIdCli=$this->clientes_model->GetIdCliente(array('clientes.id_cli'=>$id));
          $CarrerasList=$this->carreras_model->CarrerasList();
          $EscuelasList=$this->escuelas_model ->EscuelasList();
          $SexosList=$this->sexos_model->SexosList();
          
          //$ClientesList=$this->clientes_model->ClientesList();
            $data = array(
                'title' => 'prueba',
                'CarrerasList'=>$CarrerasList,
                'EscuelasList'=>$EscuelasList,
               
                'SexosList'=>$SexosList,
               
                'GetIdCli'=>$GetIdCli,
             

            );
            $this->parser->parse('Clientes/edit',$data);

        }

    public function dataUpdate($id)
        {
            $nombre_cli           = $this->input->post('nombre_cli');
            $mcorreo         = $this->input->post('mcorreo');
            $mtelefono            = $this->input->post('mtelefono');
            $id_carr            = $this->input->post('carrera');
            $id_esc            = $this->input->post('escuela');
            //$address = $this->input->post('address');

            $value_update = array('Nombre'=>$nombre_cli, 'Telefono'=>$mtelefono, 'Correo'=>$mcorreo,'id_esc'=>$id_esc,'id_carr'=>$id_carr);
            $this->clientes_model->UpdateContact($value_update,array('id_cli' => $id ));
            //$this->parser->parse('welcome',$data);
              if ($this->idtypeUser_session==4){
                redirect(base_url('pedidos/addView_2'));
              }else{
              redirect(base_url('clientes'));
              }
        }    
}