<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendedores extends CI_Controller {

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
        $this->load->model('vendedores_model');
        $this->load->model('Escuelas_model');
        //$this->load->model('tallas_model');
       // $this->load->model('estatus_model');
        $this->load->model('sexos_model');
       // $this->load->model('vendedores_model');

        $this->load->helper('form');
    }



    public function index()
    {

        $data = array(
            'title' => 'prueba',
        );
        $this->parser->parse('vendedores/list',$data);

    }

    public function dataListJson(){
      $VendedoresList=$this->vendedores_model->VendedoresList();
      $data=array();
      if($VendedoresList==NULL){

        $data[]=array(
        "id"=>'',
        "nombre"=>'',
        "telefono"=> '',
        "correo"=> '',
        "sexo"=> '',
        "punto"=> '',
       /* "talla"=> '',
        "fecha"=> '',
        "estatus"=> '',
        */
        );

      }else{
        foreach ($VendedoresList as $key) {
            $data[]=array(
            "id"=>$key->id_ven,
            "nombre"=>$key->nombre_ven,
            "telefono"=> $key->telefono,
            "correo"=> $key->correo,
            "sexo"=> $key->sexo,
            "punto"=> $key->nombre_esc,
         /*   "talla"=> $key->Medida,
            "fecha"=> $key->Fecha,
            "estatus"=> $key->tipo,
          */ 
            );

          }
        }
        echo '{"data": '.json_encode($data).'}';
    }

    public function addView()
        {
        
          $PuntoList=$this->Escuelas_model->EscuelasList();
          $SexosList=$this->sexos_model->SexosList();
        
            $data = array(
                'title' => 'prueba',
                //'ClientesList'=>$ClientesList,
                'PuntoList'=>$PuntoList,
                'SexosList'=>$SexosList,
               

    
            );
            $this->parser->parse('vendedores/new',$data);
    
        }
    public function dataInsert()
        {
              
            $nombre_ven=$this->input->post('nombre_ven');
            $telefono=$this->input->post('telefono');
            $correo=$this->input->post('correo');
            $id_sex=$this->input->post('sexo');
            $id_punto=$this->input->post('punto');
            
            $value_insert =array(
             
              'nombre_ven'=>$nombre_ven,
              'Telefono'=>$telefono,
              'Correo'=>$correo,
              'id_sex'=>$id_sex,
              'id_carr'=>$id_punto,
              'id_esc'=>1,
                            
            );
            $idreturn=$this->vendedores_model->CreateVendedor($value_insert);
    
            redirect(base_url('vendedores/editView/').$idreturn);
            
        }

        public function editView($id)
        {

          $GetIdVen=$this->vendedores_model->GetIdPVen(array('Vendedores.id_ven'=>$id));
          $CarrerasList=$this->Escuelas_model->EscuelasList();
          
         // $SexosList=$this->sexos_model->SexosList();
          
            $data = array(
                'title' => 'prueba',
                'CarrerasList'=>$CarrerasList,
                //'SexosList'=>$SexosList,
                'GetIdVen'=>$GetIdVen,

            );
            $this->parser->parse('vendedores/edit',$data);

        }   

        public function UpdateVendedor($id,$data)
        {
            $nombre_ven           = $this->input->post('nombre_ven');
            $mcorreo         = $this->input->post('mcorreo');
            $mtelefono            = $this->input->post('telefono');
            $id_carr            = $this->input->post('carrera');
            //$id_esc            = $this->input->post('escuela');
            //$address = $this->input->post('address');

            $value_update = array('nombre_ven'=>$nombre_ven, 'telefono'=>$mtelefono, 'correo'=>$mcorreo,'id_carr'=>$id_carr);
            $this->vendedores_model->UpdateVendedor($value_update,array('id_ven' => $id ));
            //$this->parser->parse('welcome',$data);
            redirect(base_url('vendedores'));
        } 
}