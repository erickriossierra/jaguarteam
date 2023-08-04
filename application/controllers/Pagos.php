<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagos extends CI_Controller {

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
        $this->parser->parse('pagos/list',$data);

    }

    public function dataListJson(){
      $PedidosList=$this->pagos_model->PedidosList();
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
       // "estatus"=> '',
        
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
           // "estatus"=> $key->tipo,
           
            );

          }
        }
        echo '{"data": '.json_encode($data).'}';
    }

     public function editView($id)
        {

          $GetIdPedido=$this->pedidos_model->GetIdPedido(array('pedidos.id_ped'=>$id));
          //$ColoresList=$this->Colores_model->ColoresList();
          //$EstatusList=$this->estatus_model->EstatusListPre();
          $GetIdPago=$this->pagos_model->GetIdPago($id);
         // $RopasList=$this->ropas_model->RopasList();
          //$CortesList=$this->sexos_model->SexosList();
         // $TallasList=$this->tallas_model->TallasList();
          //$ClientesList=$this->clientes_model->ClientesList();
            $data = array(
                'title' => 'prueba',
              //  'ColoresList'=>$ColoresList,
               // 'EstatusList'=>$EstatusList,
              //  'RopasList'=>$RopasList,
               // 'CortesList'=>$CortesList,
                //'TallasList'=>$TallasList,
               // 'EstadosList'=>$EstadosList,
                'GetIdPedido'=>$GetIdPedido,
                'GetIdPago'=>$GetIdPago

            );
            $this->parser->parse('pagos/edit',$data);

        }
    public function dataInsert($id)
        {
              
            $id_ped=$id;
            //$id_play=$this->input->post('ropa');
            $cant=$this->input->post('cant');
            //$id_tc=$this->input->post('corte');
            //$id_color=$this->input->post('color');
           // $id_talla=$this->input->post('talla');
            //$fecha= date('Y-m-d H:i:s'); //$this->input->post('sub_secundario');
            $id_est=  9; //$this->input->post('estatus');
            //$id_ven=$this->input->post('id_ven');
                
            $value_insert =array(
             
              'id_ped'=>$id_ped,
              //'id_play'=>$id_play,
              'id_est'=>$id_est,
              'Total'=>$cant
              //'id_tc'=>$id_tc,
              //'id_color'=>$id_color,
              //'id_talla'=>$id_talla,
              //'fecha'=>$fecha,
              
              //'id_ven'=>$id_ven
              
            );
            $idreturn=$this->pagos_model->CreatePago($value_insert);

             $value_update = array( 
              //'id_cli'=>$id_cli,
              //'id_play'=>$id_play,
              //'Cantidad'=>$cant,
              //'id_tc'=>$id_tc,
              //'id_color'=>$id_color,
              'id_est'=>1 );
            $this->pedidos_model->UpdatePedido($value_update,array('id_ped' => $id ));
    
            redirect(base_url('pagos/'));
            
        }
}    