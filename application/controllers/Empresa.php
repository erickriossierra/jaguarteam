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


}
