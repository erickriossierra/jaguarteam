<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Despacho extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ( $this->session->userdata('nameS')=='') {
            redirect();
        }
        $this->name_session  =  $this->session->userdata('nameS');
        $this->idtypeUser_session = $this->session->userdata('idtypeUserS');
        $this->idUser_session = $this->session->userdata('idUserS');

        $this->load->model('despachos_model');
        $this->load->model('colonias_model');

        $this->load->helper('form');
    }



    public function index()
    {

        $data = array(
            'title' => 'prueba',

        );

        $this->parser->parse('despachos/list',$data);

    }

    public function dataListJson(){
      $DespachosList=$this->despachos_model->DespachoList();
      $data=array();
        foreach ($DespachosList as $key) {
            $data[]=array(
            "id"=>$key->iddespacho,
            "nombre"=> $key->despacho,
            "colegio"=> $key->colegio,
            "colonia"=> $key->colonia,
            );

        }

        echo '{"data": '.json_encode($data).'}';



    }

    public function addView()
    {

        $data = array(
            'title' => 'prueba',

        );
        $this->parser->parse('despachos/new',$data);

    }

     /*Busqueda de colonia*/
    public function GetBuscarColonia(){
      $searchTerm = $this->input->get('term');

       $search=$this->colonias_model->GetBuscarColonia(array('nombre'=>$searchTerm));

       $data=array();
       if ($search==FALSE)
       {
         $data[]=array(
         "id"=>'0',
         "nombre"   => 'No existe',
         "cp"=> 'No disponible',
         );
       }else{
       foreach ($search as $key) {
           $data[]=array(
           "id"       =>$key->id,
           "nombre"   => $key->nombre,
           "cp"       =>$key->CP,
           
           );

       }
      }
       echo json_encode($data);
    }

    public function dataInsert()
    {

        $nombre           = $this->input->post('nombre');
        $colegio          = $this->input->post('colegio');
        $calle           = $this->input->post('calle');
        $num_ext          = $this->input->post('num_exter');
        $cruzamiento           = $this->input->post('cruzamiento');
        $id_colonia          = $this->input->post('idcolonia');

        $value_insert =array('nombre'=>$nombre,'colegio'=>$colegio, 'calle'=>$calle, 'num_ext'=>$num_ext, 'cruzamiento'=>$cruzamiento, 'id_colonia'=>$id_colonia);
        $this->despachos_model->CreateDespachos($value_insert);
        redirect(base_url('Despacho'));

    }


    public function editView($id)
    {
        $GetIdDespachos=$this->despachos_model->GetIdDespachos(array('despachos.id'=>$id));

        $data = array(
            'title' => 'prueba',
            'GetIdDespachos'=> $GetIdDespachos,



        );

      // print_r($data);
        $this->parser->parse('despachos/edit', $data);

    }


    public function dataUpdate($id)
    {


      $nombre           = $this->input->post('nombre');
      $colegio          = $this->input->post('colegio');
      $calle            = $this->input->post('calle');
      $num_ext        =$this->input->post('num_ext');
      $cruzamiento      =$this->input->post('cruzamiento');
      $idcolonia          =$this->input->post('idcolonia');
     // $cp               =$this->input->post('cp');
      $value_update =array('nombre'=>$nombre,'colegio'=>$colegio, 'calle'=>$calle, 'num_ext'=>$num_ext,'cruzamiento'=>$cruzamiento,'id_colonia'=>$idcolonia);
      $this->despachos_model-> UpdateDespachos($value_update,array('id' => $id ));
        //$this->parser->parse('welcome',$data);
        redirect(base_url('Despacho'));

    }

    public function dataDelete($id)
    {



        $this->despachos_model-> UpdateDespachos(array('status'=>0),array('id' => $id ));
        redirect(base_url('Despacho'));

    }

    public function dataDeleteModal(){
        $id = $this->input->post('id');
        //echo $id; exit;
        $this->despachos_model->DeleteDespachos(array('id'=>$id));
        $status = True;
        $result = array('statusR' => $status);
        echo json_encode($result);

    }

    public function ContactosListDespachos()
      {

          $data = array(
              'title' => 'prueba',
          );
          $this->parser->parse('Despachos/list_contactos',$data);

      }
    public function ContactosListDespachosJSON(){

          $ContactoByDespachoList=$this->despachos_model->ContactoByDespachoList();
          $data=array();
          if($ContactoByDespachoList==False){

            $data[]=array(
            "id"=>"",
            "nombre_"=>"",
            "correo"=>"",
            "telefono"=>"",
            "depto"=> "",
            "colegio"=> "",
            "Despacho"=> ""
            );

          }else {

            foreach ($ContactoByDespachoList as $key) {
                $data[]=array(
                "id"=>$key->idContac,
                "nombre_"=>$key->nombrecont,
                "correo"=>$key->correo,
                "telefono"=>$key->telefono,
                "depto"=> $key->depto,
                "Colegio"=> $key->colegio,
                "Despacho"=> $key->Despacho,
                );

            }


              }
              echo '{"data": '.json_encode($data).'}';

          }
     public function dataListContactoDespachoJson($id){
      $ContactoByDespachoList=$this->despachos_model->ContactoByDespachoList(array('despacho_id'=>$id));
      $data=array();
      if($ContactoByDespachoList==False){

        $data[]=array(
        "id"=>"",
        "nombre_"=>"",
        "correo"=>"",
        "telefono"=>"",
        "depto"=> ""
        );

      }else {

        foreach ($ContactoByDespachoList as $key) {
            $data[]=array(
            "id"=>$key->idContac,
            "nombre_"=>$key->nombrecont,
            "correo"=>$key->correo,
            "telefono"=>$key->telefono,
            "depto"=> $key->depto,
            "despacho_id"=>$key->iddesp
            );

        }


          }
          echo '{"data": '.json_encode($data).'}';

      }

    public function dataInsertContactoDespachoJson()
    {

        $nombre= $this->input->post('nombre');
        $correo= $this->input->post('correo');
        $telefono= $this->input->post('telefono');
        $depto= $this->input->post('depto');
        $despacho_id= $this->input->post('despacho_id');

        $value_insert =array(

          'nombre'=>$nombre,
          'correo'=>$correo,
          'telefono'=>$telefono,
          'depto'=>$depto,
          'despacho_id'=>$despacho_id

      );
        $this->despachos_model->CreateContactoDespacho($value_insert);
        $status = True;
        $result = array('statusR' => $status);


       echo json_encode($result);

    }

    public function editViewContactosDespacho($id){

        $ContactoByDespachoList=$this->despachos_model->ContactoByDespachoList(array("contactos.id"=>$id));
          $data = array(
          'title' => 'prueba',
          'ContactoByDespachoList'=>$ContactoByDespachoList,

             );
              $this->parser->parse('despachos/editContactosDespacho',$data);

          }
    public function dataUpdateContactoByDespacho($id){

            $nombre= $this->input->post('mnombre');
            $correo= $this->input->post('mcorreo');
            $telefono= $this->input->post('mtelefono');
            $depto= $this->input->post('mdepto');
            $midempresa=$this->input->post('midempresa');


            $value_insert =array(

              'nombre'=>$nombre,
              'correo'=>$correo,
              'telefono'=>$telefono,
              'depto'=>$depto,

          );
            $this->despachos_model->UpdateContactoDespacho($value_insert,array('id' => $id ));

              //$this->parser->parse('welcome',$data);
              redirect(base_url('Despacho/editView/').$midempresa);

          }


    public function dataDeleteModalContact(){
              $id = $this->input->post('id');
              //echo $id; exit;
              $this->empresas_model->DeleteDespachoContact(array('id'=>$id));
              $status = True;
              $result = array('statusR' => $status);
              echo json_encode($result);

          }
}
