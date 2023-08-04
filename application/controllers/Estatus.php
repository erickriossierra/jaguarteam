<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estatus extends CI_Controller {

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
       // $this->load->model('ropas_model');
       // $this->load->model('Colores_model');
        $this->load->model('pagos_model');
        $this->load->model('estatus_model');
        $this->load->model('sexos_model');
        $this->load->model('vendedores_model');

        $this->load->helper('form');
    }



    public function index()
    {

        $data = array(
            'title' => 'prueba',
        );
        $this->parser->parse('estatus/list',$data);

    }

      public function dataListJsonEst(){
        $PedidosList=$this->pedidos_model->PedidosListA();
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
      
      public function editViewEst($id)
        {
          
          $GetIdPedido=$this->pedidos_model->GetIdPedido(array('pedidos.id_ped'=>$id));
          $ClientesList=$this->clientes_model->ClientesList();
          //$RopasList=$this->ropas_model->RopasList();
          //$CorteList=$this->sexos_model->SexosList();
         // $ColoresList=$this->Colores_model->ColoresList();
         // $TallasList=$this->tallas_model->TallasList();
          $EstatusList=$this->estatus_model->estatusListPre();
          //$VendedoresList=$this->vendedores_model->VendedoresList();
            $data = array(
                'title' => 'prueba',
                'ClientesList'=>$ClientesList,
                //'RopasList'=>$RopasList,
                //'CortesList'=>$CorteList,
                //'ColoresList'=>$ColoresList,
                //'TallasList'=>$TallasList,
                'EstatusList'=>$EstatusList,
                'GetIdPedido'=>$GetIdPedido,

    
            );
            $this->parser->parse('estatus/edit',$data);
    
        }
        public function UpdatePedidoEst($id,$data)
        {
           // $id_cli=$this->input->post('id_cli');
           // $id_play=$this->input->post('id_play');
          //  $cant=$this->input->post('cant');
         //   $id_tc=$this->input->post('corte');
           // $id_color=$this->input->post('color');
            $id_est=$this->input->post('id_est');

            $value_update = array( 
              //'id_cli'=>$id_cli,
             // 'id_play'=>$id_play,
             // 'Cantidad'=>$cant,
             // 'id_tc'=>$id_tc,
             // 'id_color'=>$id_color,
              'id_est'=>$id_est 
            );
            $this->pedidos_model->UpdatePedido($value_update,array('id_ped' => $id));

            $value_insert =array(
             
              'id_ped'=>$id,
            
              'id_est'=>7
              
            );
            $idreturn=$this->pagos_model->CreatePago($value_insert);
            //$this->parser->parse('welcome',$data);
            redirect(base_url('estatus'));
        } 
}