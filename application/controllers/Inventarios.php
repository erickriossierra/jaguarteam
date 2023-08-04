<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventarios extends CI_Controller {

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
        $this->load->model('Inventarios_model');
        $this->load->model('ropas_model');
        $this->load->model('Colores_model');
        $this->load->model('tallas_model');
    //    $this->load->model('estatus_model');
        $this->load->model('sexos_model');
    //    $this->load->model('vendedores_model');
        $this->load->model('pagos_model');

        $this->load->helper('form');
    }



    public function index()
    {

        $data = array(
            'title' => 'prueba',
        );
        $this->parser->parse('Inventarios/list',$data);

    }

    public function dataListJson(){
      $InventariosList=$this->Inventarios_model->InventariosList();
      $data=array();
      if($InventariosList==NULL){

        $data[]=array(
        "id"=>'',
        //"cliente"=>'',
        "ropa"=> '',
        "cantidad"=> '',
        "corte"=> '',
        "color"=> '',
        "talla"=> '',
        "pd"=> '',
        "pt"=> '',
        
        );

      }else{
        foreach ($InventariosList as $key) {
            $data[]=array(
            "id"=>$key->id_inv,
            //"cliente"=>$key->Nombre,
            "cantidad"=> $key->cantidad,
            "ropa"=> $key->modelo,   
            "corte"=> $key->sexo,
            "color"=> $key->Nombre_color,
            "talla"=> $key->Medida,
            "pd"=> $key->tipo_pd,
            "pt"=> $key->tipo_pt,
           
            );

          }
        }
        echo '{"data": '.json_encode($data).'}';
    }

    public function addView()
        {
        
          //$GetIdInv=$this->Inventarios_model->GetIdInv();
          $RopasList=$this->ropas_model->RopasList();
          $CorteList=$this->sexos_model->SexosList();
          $ColoresList=$this->Colores_model->ColoresList();
          $TallasList=$this->tallas_model->TallasList();
        //  $EstatusList=$this->estatus_model->estatusList();
        //  $VendedoresList=$this->vendedores_model->VendedoresList();
            $data = array(
                'title' => 'prueba',
             //   'ClientesList'=>$ClientesList,
                'RopasList'=>$RopasList,
                'CortesList'=>$CorteList,
                'ColoresList'=>$ColoresList,
                'TallasList'=>$TallasList,
              //  'EstatusList'=>$EstatusList,
              //  'VendedoresList'=>$VendedoresList,

    
            );
            $this->parser->parse('Inventarios/new',$data);
    
        }
     
  /*      public function dataInsert()
        {
              
           // $id_cli=$this->input->post('id_cli');
            $id_play=$this->input->post('ropa');
            $cant=$this->input->post('cant');
            $id_tc=$this->input->post('corte');
            $id_color=$this->input->post('color');
            $id_talla=$this->input->post('talla');
            $id_ponD=1; //$this->input->post('id_ponD');
            $id_ponT=1;//$this->input->post('id_ponT');
                
            $value_update =array(
             
              //'id_cli'=>$id_cli,
             // 'id_play'=>$id_play,
              'cantidad'=>$cant,
             // 'id_tc'=>$id_tc,
             // 'id_color'=>$id_color,
             // 'id_talla'=>$id_talla,
              //'id_ponD'=>$id_ponD,
             // 'id_ponT'=>$id_ponT,
              //'id_ven'=>$id_ven
              
            );
            //$idreturn=$this->Inventarios_model->UpdateInv($value_insert);
             $this->pedidos_model->UpdatePedido($value_update,array('id_tipo' => $id_play,'id_tc'=>$id_tc,'id_talla'=>$id_talla,'id_color'=>$id_color,'id_ponD'=>$id_ponD,'id_ponT'=>$id_ponT ));
    
            redirect(base_url('pedidos/editView/').$idreturn);
            
        }*/

        public function editView($id)
        {

          $GetIdPedido=$this->Inventarios_model->GetIdInv(array('Inventarios.id_inv'=>$id));
          $ColoresList=$this->Colores_model->ColoresList();
         // $EstatusList=$this->estatus_model->EstatusListPre();
          //$GetIdPago=$this->pagos_model->GetIdPago($id);
          $RopasList=$this->ropas_model->RopasList();
          $CortesList=$this->sexos_model->SexosList();
          $TallasList=$this->tallas_model->TallasList();
         // $ClientesList=$this->clientes_model->ClientesList();
            $data = array(
                'title' => 'prueba',
                'ColoresList'=>$ColoresList,
               // 'EstatusList'=>$EstatusList,
                'RopasList'=>$RopasList,
                'CortesList'=>$CortesList,
                'TallasList'=>$TallasList,
               // 'EstadosList'=>$EstadosList,
                'GetIdPedido'=>$GetIdPedido,
                //'GetIdPago'=>$GetIdPago

            );
            $this->parser->parse('inventarios/edit',$data);

        }

        public function UpdateInv($id,$data)
        {
            $id_play=$this->input->post('ropa');
            $stock=$this->input->post('stock');
            $cant=$this->input->post('cant');
            $id_tc=$this->input->post('corte');
            $id_color=$this->input->post('color');
            $id_talla=$this->input->post('talla');
            $id_ponD=1; //$this->input->post('id_ponD');
            $id_ponT=1;//$this->input->post('id_ponT');
                
                $val= $cant + $stock;

            $value_update =array(
             
              //'id_cli'=>$id_cli,
             // 'id_play'=>$id_play,
              'cantidad'=>$val,
             // 'id_tc'=>$id_tc,
             // 'id_color'=>$id_color,
             // 'id_talla'=>$id_talla,
              //'id_ponD'=>$id_ponD,
             // 'id_ponT'=>$id_ponT,
              //'id_ven'=>$id_ven
              
            );
            //$idreturn=$this->Inventarios_model->UpdateInv($value_insert);
             $this->Inventarios_model->UpdateInv($value_update,array('id_tipo' => $id_play,'id_tc'=>$id_tc,'id_talla'=>$id_talla,'id_color'=>$id_color,'id_ponD'=>$id_ponD,'id_ponT'=>$id_ponT ));
    
            //$this->parser->parse('welcome',$data);
            redirect(base_url('Inventarios'));
        } 

      
}