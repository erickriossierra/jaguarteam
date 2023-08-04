<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller {

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
        $this->load->model('ropas_model');
        $this->load->model('Colores_model');
        $this->load->model('tallas_model');
        $this->load->model('estatus_model');
        $this->load->model('sexos_model');
        $this->load->model('vendedores_model');
        $this->load->model('pagos_model');

        $this->load->helper('form');
    }



    public function index()
    {

        $data = array(
            'title' => 'prueba',
        );
        $this->parser->parse('pedidos/list',$data);

    }

    public function dataListJson(){
      $PedidosList=$this->pedidos_model->PedidosList();
      $data=array();
      if($PedidosList==NULL){

        $data[]=array(
        "id"=>'',
        "cliente"=>'',
        "ropa"=> '',
        "cantidad"=> '',
        "corte"=> '',
        "color"=> '',
        "talla"=> '',
        "fecha"=> '',
        "estatus"=> '',
        
        );

      }else{
        foreach ($PedidosList as $key) {
            $data[]=array(
            "id"=>$key->id_ped,
            "cliente"=>$key->Nombre,
            "ropa"=> $key->modelo,
            "cantidad"=> $key->Cantidad,
            "corte"=> $key->sexo,
            "color"=> $key->Nombre_color,
            "talla"=> $key->Medida,
            "fecha"=> $key->Fecha,
            "estatus"=> $key->tipo,
           
            );

          }
        }
        echo '{"data": '.json_encode($data).'}';
    }
    public function addView()
        {
        
          $ClientesList=$this->clientes_model->ClientesList();
          $RopasList=$this->ropas_model->RopasList();
          $CorteList=$this->sexos_model->SexosList();
          $ColoresList=$this->Colores_model->ColoresList();
          $TallasList=$this->tallas_model->TallasList();
          $EstatusList=$this->estatus_model->estatusList();
          $VendedoresList=$this->vendedores_model->VendedoresList();
            $data = array(
                'title' => 'prueba',
                'ClientesList'=>$ClientesList,
                'RopasList'=>$RopasList,
                'CortesList'=>$CorteList,
                'ColoresList'=>$ColoresList,
                'TallasList'=>$TallasList,
                'EstatusList'=>$EstatusList,
                'VendedoresList'=>$VendedoresList,

    
            );
            $this->parser->parse('pedidos/new',$data);
    
        }
        /* Buscar cliente */
        public function GetBuscarCli(){
          $searchTerm = $this->input->get('term');
    
           $search=$this->clientes_model->GetBuscarCli(array('nombre'=>$searchTerm));
    
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
               "id"       =>$key->id_cli,
               "nombre"   => $key->Nombre,
               
               
               );
    
           }
          }
           echo json_encode($data);
        } 

        public function dataInsert()
        {
              
            $id_cli=$this->input->post('id_cli');
            $id_play=$this->input->post('ropa');
            $cant=$this->input->post('cant');
            $id_tc=$this->input->post('corte');
            $id_color=$this->input->post('color');
            $id_talla=$this->input->post('talla');
            $fecha= date('Y-m-d H:i:s'); //$this->input->post('sub_secundario');
            $id_est=  3; //$this->input->post('estatus');
            $id_ven=$this->input->post('id_ven');
                
            $value_insert =array(
             
              'id_cli'=>$id_cli,
              'id_play'=>$id_play,
              'cantidad'=>$cant,
              'id_tc'=>$id_tc,
              'id_color'=>$id_color,
              'id_talla'=>$id_talla,
              'fecha'=>$fecha,
              'id_est'=>$id_est,
              'id_ven'=>$id_ven
              
            );
            $idreturn=$this->pedidos_model->CreatePedido($value_insert);
    
            redirect(base_url('pedidos/editView/').$idreturn);
            
        }

        public function editView($id)
        {

          $GetIdPedido=$this->pedidos_model->GetIdPedido(array('pedidos.id_ped'=>$id));
          $ColoresList=$this->Colores_model->ColoresList();
          $EstatusList=$this->estatus_model->EstatusListPre();
          $GetIdPago=$this->pagos_model->GetIdPago($id);
          $RopasList=$this->ropas_model->RopasList();
          $CortesList=$this->sexos_model->SexosList();
          $TallasList=$this->tallas_model->TallasList();
          $ClientesList=$this->clientes_model->ClientesList();
            $data = array(
                'title' => 'prueba',
                'ColoresList'=>$ColoresList,
                'EstatusList'=>$EstatusList,
                'RopasList'=>$RopasList,
                'CortesList'=>$CortesList,
                'TallasList'=>$TallasList,
               // 'EstadosList'=>$EstadosList,
                'GetIdPedido'=>$GetIdPedido,
                'GetIdPago'=>$GetIdPago

            );
            $this->parser->parse('pedidos/edit',$data);

        }

        public function UpdatePedido($id,$data)
        {
           // $id_cli=$this->input->post('id_cli');
            $id_play=$this->input->post('id_play');
            $cant=$this->input->post('cant');
            $id_tc=$this->input->post('corte');
            $id_color=$this->input->post('color');
            $id_talla=$this->input->post('talla');

            $value_update = array( 
              //'id_cli'=>$id_cli,
              'id_play'=>$id_play,
              'Cantidad'=>$cant,
              'id_tc'=>$id_tc,
              'id_color'=>$id_color,
              'id_talla'=>$id_talla );
            $this->pedidos_model->UpdatePedido($value_update,array('id_ped' => $id ));
            //$this->parser->parse('welcome',$data);
            redirect(base_url('pedidos'));
        } 

        public function dataListContactoClienteJson($id){
        $ContactoByClienteList=$this->pedidos_model->ContactoByClienteList(array("id_ped"=>$id));
        $data=array();
        if($ContactoByClienteList==False){

          $data[]=array(
          "id"=>"",
          "nombre_"=>"",
          "correo"=>"",
          "telefono"=>"",
          "carrera"=> ""
          );

        }else {

          foreach ($ContactoByClienteList as $key) {
              $data[]=array(
              "id"=>$key->id_cli,
              "nombre_"=>$key->Nombre_cli,
              "correo"=>$key->Correo,
              "telefono"=>$key->Telefono,
              "carrera"=> $key->Carr,
              "id_ped"=>$key->id_ped
              );

          }


            }
            echo '{"data": '.json_encode($data).'}';

      }

      public function addView_2()
        {
        
          $ClientesList=$this->clientes_model->ClientesList();
          $RopasList=$this->ropas_model->RopasList();
          $CorteList=$this->sexos_model->SexosList();
          $ColoresList=$this->Colores_model->ColoresList();
          $TallasList=$this->tallas_model->TallasList();
          $EstatusList=$this->estatus_model->estatusList();
          
            $data = array(
                'title' => 'prueba',
                'ClientesList'=>$ClientesList,
                'RopasList'=>$RopasList,
                'CortesList'=>$CorteList,
                'ColoresList'=>$ColoresList,
                'TallasList'=>$TallasList,
                'EstatusList'=>$EstatusList,

    
            );
            $this->parser->parse('pedidos/new_cli',$data);
    
        }

      public function dataInsert_2()
        {
              
            $id_cli=$this->input->post('id_cli');
            $id_play=$this->input->post('ropa');
            $cant=$this->input->post('cant');
            $id_tc=$this->input->post('corte');
            $id_color=$this->input->post('color');
            $id_talla=$this->input->post('talla');
            $fecha= date('Y-m-d H:i:s'); //$this->input->post('sub_secundario');
            $id_est=  3; //$this->input->post('estatus');
            $id_ven=1;
            
            $value_insert =array(
             
              'id_cli'=>$id_cli,
              'id_play'=>$id_play,
              'cantidad'=>$cant,
              'id_tc'=>$id_tc,
              'id_color'=>$id_color,
              'id_talla'=>$id_talla,
              'fecha'=>$fecha,
              'id_est'=>$id_est
              
            );
            $idreturn=$this->pedidos_model->CreatePedido($value_insert);
    
            redirect(base_url('pedidos/editView/').$idreturn);
            
        }

        public function editViewEst($id)
        {
          
          $GetIdPedido=$this->pedidos_model->GetIdPedido(array('pedidos.id_ped'=>$id));
          $ClientesList=$this->clientes_model->ClientesList();
          
          //$CorteList=$this->sexos_model->SexosList();
         // $ColoresList=$this->Colores_model->ColoresList();
         // $TallasList=$this->tallas_model->TallasList();
          $EstatusList=$this->estatus_model->estatusList();
          //$VendedoresList=$this->vendedores_model->VendedoresList();
            $data = array(
                'title' => 'prueba',
                'ClientesList'=>$ClientesList,
                //'RopasList'=>$RopasList,
                //'CortesList'=>$CorteList,
                //'ColoresList'=>$ColoresList,
                //'TallasList'=>$TallasList,
                'EstatusList'=>$EstatusList,
                //'VendedoresList'=>$VendedoresList,

    
            );
            $this->parser->parse('pedidos/edit_est',$data);
    
        }

      public function dataListJsonEst(){
        $PedidosList=$this->pedidos_model->PedidosList();
        $data=array();
        if($PedidosList==NULL){

          $data[]=array(
          "id"=>'',
          "cliente"=>'',
          "ropa"=> '',
          "cantidad"=> '',
          "corte"=> '',
          "color"=> '',
          "talla"=> '',
          "fecha"=> '',
          "estatus"=> '',
          
          );

        }else{
          foreach ($PedidosList as $key) {
              $data[]=array(
              "id"=>$key->id_ped,
              "cliente"=>$key->Nombre,
              "ropa"=> $key->modelo,
              "cantidad"=> $key->Cantidad,
              "corte"=> $key->sexo,
              "color"=> $key->Nombre_color,
              "talla"=> $key->Medida,
              "fecha"=> $key->Fecha,
              "estatus"=> $key->tipo,
             
              );

            }
          }
        echo '{"data": '.json_encode($data).'}';
    }

}