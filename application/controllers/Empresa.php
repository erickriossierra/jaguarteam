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
        $this->load->model('giros_model');
        $this->load->model('sectors_model');
        $this->load->model('subsectors_model');
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
      $EmpresasList=$this->empresas_model->EmpresaList();
      $data=array();
        foreach ($EmpresasList as $key) {
            $data[]=array(
            "id"=>$key->empresasid,
            "nombre_empresa"=>$key->nombre_empresa,
            "clasificacion_empresa"=>$key->clasificacion,
            "giroempresa"=>$key->giroempresa,
            "calle"=> $key->calle,
            "num_inter"=> $key->num_inter,
            "num_exter"=> $key->num_exter,
            "cruzamiento"=> $key->cruzamientos,
            "colonia"=> $key->colonia,
            "cp"=> $key->cp,
            "nombre_comercial"=> $key->nombre_comercial,
            "nombre_razon_social"=> $key->nombre_razon_social,
            );

        }

        echo '{"data": '.json_encode($data).'}';



    }

    public function addView()
    {
      $GirosList=$this->giros_model->GirosListForm();
      $SubSectorList=$this->subsectors_model->SubSectorListsForm();
      $SectorsList=$this->sectors_model->SectorsListForm();
      $ClasificacionEmpresaList=$this->empresas_model->clasificacionEmpresaList();
      $EstadosList=$this->empresas_model->estadosList();
        $data = array(
            'title' => 'prueba',
            'GirosList'=>$GirosList,
            'SubSectorList'=>$SubSectorList,
            'SectorsList'=>$SectorsList,
            'ClasificacionEmpresaList'=>$ClasificacionEmpresaList,
            'EstadosList'=>$EstadosList

        );
        $this->parser->parse('empresas/new',$data);

    }

    public function dataInsert()
    {

        $nombre_empresa = $this->input->post('nombre_empresa');
        $calle=$this->input->post('calle');
        $num_inter=$this->input->post('num_inter');
        $num_exter=$this->input->post('num_exter');
        $cruzamiento=$this->input->post('cruzamiento');
        $colonia=$this->input->post('colonia');
        $cp=$this->input->post('cp');
        $nombre_comercial=$this->input->post('nombre_comercial');
        $nombre_razon_social=$this->input->post('nombre_razon_social');
        $giro_id=$this->input->post('giro_id');
        $clasificacion_empresa_id=$this->input->post('clasificacion_empresa_id');
        $sector_id=$this->input->post('sector_id');
        $subsector_id=$this->input->post('subsector_id');
        $entidades_id=$this->input->post('entidades_id');
        $value_insert =array(
          'nombre_empresa'=>$nombre_empresa,
          'calle'=>$calle,
          'num_inter'=>$num_inter,
          'num_exter'=>$num_exter,
          'cruzamientos'=>$cruzamiento,
          'colonia'=>$colonia,
          'cp'=>$cp,
          'nombre_comercial'=>$nombre_comercial,
          'nombre_razon_social'=>$nombre_razon_social,
          'giro_id'=>$giro_id,
          'clasificacion_empresa_id'=>$clasificacion_empresa_id,
          'sector_id'=>$sector_id,
          'subsector_id'=>$subsector_id,
          'entidades_id'=>$entidades_id,
        );
        $idreturn=$this->empresas_model->CreateEmpresa($value_insert);

        redirect(base_url('empresa/editView/').$idreturn);

    }


    public function editView($id)
    {

      $GetIdEmpresa=$this->empresas_model->GetIdEmpresa(array('id'=>$id));
      $GirosList=$this->giros_model->GirosListForm();
      $SubSectorList=$this->subsectors_model->SubSectorListsForm();
      $SectorsList=$this->sectors_model->SectorsListForm();
      $ClasificacionEmpresaList=$this->empresas_model->clasificacionEmpresaList();
      $EstadosList=$this->empresas_model->estadosList();
        $data = array(
            'title' => 'prueba',
            'GirosList'=>$GirosList,
            'SubSectorList'=>$SubSectorList,
            'SectorsList'=>$SectorsList,
            'ClasificacionEmpresaList'=>$ClasificacionEmpresaList,
            'EstadosList'=>$EstadosList,
            'GetIdEmpresa'=>$GetIdEmpresa

        );
        $this->parser->parse('empresas/edit',$data);

    }


    public function dataUpdate($id)
    {


      $nombre_empresa = $this->input->post('nombre_empresa');
      $calle=$this->input->post('calle');
      $num_inter=$this->input->post('num_inter');
      $num_exter=$this->input->post('num_exter');
      $cruzamiento=$this->input->post('cruzamiento');
      $colonia=$this->input->post('colonia');
      $cp=$this->input->post('cp');
      $nombre_comercial=$this->input->post('nombre_comercial');
      $nombre_razon_social=$this->input->post('nombre_razon_social');
      $giro_id=$this->input->post('giro_id');
      $clasificacion_empresa_id=$this->input->post('clasificacion_empresa_id');
      $sector_id=$this->input->post('sector_id');
      $subsector_id=$this->input->post('subsector_id');
      $entidades_id=$this->input->post('entidades_id');
      $value_update =array(
        'nombre_empresa'=>$nombre_empresa,
        'calle'=>$calle,
        'num_inter'=>$num_inter,
        'num_exter'=>$num_exter,
        'cruzamientos'=>$cruzamiento,
        'colonia'=>$colonia,
        'cp'=>$cp,
        'nombre_comercial'=>$nombre_comercial,
        'nombre_razon_social'=>$nombre_razon_social,
        'giro_id'=>$giro_id,
        'clasificacion_empresa_id'=>$clasificacion_empresa_id,
        'sector_id'=>$sector_id,
        'subsector_id'=>$subsector_id,
        'entidades_id'=>$entidades_id,
      );
      $this->empresas_model->UpdateEmpresa($value_update,array('id' => $id ));
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


    /*COntacto por empresas*/
    public function dataInsertContactoEmpresaJson()
    {

        $nombre= $this->input->post('nombre');
        $correo= $this->input->post('correo');
        $telefono= $this->input->post('telefono');
        $depto= $this->input->post('depto');
        $empresas_id= $this->input->post('empresas_id');

        $value_insert =array(

          'nombre'=>$nombre,
          'correo'=>$correo,
          'telefono'=>$telefono,
          'depto'=>$depto,
          'empresas_id'=>$empresas_id

      );
        $this->empresas_model->CreateContactoEmpresa($value_insert);
        $status = True;
        $result = array('statusR' => $status);


       echo json_encode($result);

    }

    public function dataListContactoEmpresaJson($id){
      $ContactoByEmpresaList=$this->empresas_model->ContactoByEmpresaList(array("empresas_id"=>$id));
      $data=array();
      if($ContactoByEmpresaList==False){

        $data[]=array(
        "id"=>"",
        "nombre_"=>"",
        "correo"=>"",
        "telefono"=>"",
        "depto"=> ""
        );

      }else {

        foreach ($ContactoByEmpresaList as $key) {
            $data[]=array(
            "id"=>$key->contactoid,
            "nombre_"=>$key->nombre,
            "correo"=>$key->correo,
            "telefono"=>$key->telefono,
            "depto"=> $key->depto,
            "empresas_id"=>$key->empresas_id
            );

        }


          }
          echo '{"data": '.json_encode($data).'}';

      }

      public function ContactosListEmpresas()
      {

          $data = array(
              'title' => 'prueba',
          );
          $this->parser->parse('empresas/list_contactos',$data);

      }

      public function ContactosListEmpresasJSON(){

          $ContactoByEmpresaList=$this->empresas_model->ContactoByEmpresaList();
          $data=array();
          if($ContactoByEmpresaList==False){

            $data[]=array(
            "id"=>"",
            "nombre_"=>"",
            "correo"=>"",
            "telefono"=>"",
            "depto"=> ""
            );

          }else {

            foreach ($ContactoByEmpresaList as $key) {
                $data[]=array(
                "id"=>$key->contactoid,
                "nombre_"=>$key->nombre,
                "correo"=>$key->correo,
                "telefono"=>$key->telefono,
                "depto"=> $key->depto,
                "nombre_empresa"=>$key->nombre_empresa,
                "nombre_comercial"=> $key->nombre_comercial,
                "nombre_razon_social"=> $key->nombre_razon_social
                );

            }


              }
              echo '{"data": '.json_encode($data).'}';

          }

          public function editViewContactosEmpresa($id){

              $ContactoByEmpresaList=$this->empresas_model->ContactoByEmpresaList(array("contactos.id"=>$id));
              $data = array(
                  'title' => 'prueba',
                  'ContactoByEmpresaList'=>$ContactoByEmpresaList,


              );
              $this->parser->parse('empresas/editContactosEmpresa',$data);

          }

          public function dataUpdateContactoByEmpresa($id){

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
            $this->empresas_model->UpdateContactoEmpresa($value_insert,array('id' => $id ));

              //$this->parser->parse('welcome',$data);
              redirect(base_url('empresa/editView/').$midempresa);

          }



}
