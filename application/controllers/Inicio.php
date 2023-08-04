<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ( $this->session->userdata('nameS')=='') {
            redirect();
        }
        $this->name_session  =  $this->session->userdata('nameS');
        $this->idtypeUser_session = $this->session->userdata('idtypeUserS');
        $this->idUser_session = $this->session->userdata('idUserS');

        $this->load->model('Inicio_model');
		$this->load->model('Solicitudes_model');
		$this->load->model('practicas_model');
        $this->load->model('users_model');
        $this->load->helper('form');
    }

/*---------------------------{EDITADO-----------------------------------------*/

    public function index()
    {
        $SolList=$this->Solicitudes_model->SolList();
		$UserList=$this->users_model->UserList();
        $data = array(
            'title' => 'prueba',
            'SolList'=>$SolList,
			'UserList'=>$UserList
        );

        $this->parser->parse('inicio/list',$data);

    }
/*---------------------------EDITADO}-----------------------------------------*/

    public function addView()
    {
      $tipo_tramite=$this->Solicitudes_model->GetAllTipotramites();
      $TipoCarrerasList=$this->practicas_model->TipoCarrerasList();
      $TipoPracticasList=$this->practicas_model->TipoPracticasList();	  
		$data = array(
            'title' => 'prueba',
            'tipo_tramite'=>$tipo_tramite,
			'TipoCarrerasList'=>$TipoCarrerasList,
			'TipoPracticasList'=>$TipoPracticasList
			
        );
        $this->parser->parse('solicitudes/new',$data);

    }

    public function dataInsert()
    {

      $name           = $this->input->post('name');
      $apellido_p           = $this->input->post('apellido_p');
      $apellido_m           = $this->input->post('apellido_m');
      $usuario            = $this->input->post('usuario');
      $password           = $this->input->post('password');
      $tipo_usuario_id = $this->input->post('tipo_usuario_id');
      $status = $this->input->post('status');



        $value_insert =array('nombre'=>$name,'apellido_p'=>$apellido_p,'apellido_m'=>$apellido_m, 'usuario'=>$usuario,'password'=>md5($password),'tipo_usuario_id'=>$tipo_usuario_id,'status'=>1);
        $this->users_model->CreateUser($value_insert);
        redirect(base_url('User'));

    }
/*-----------------------------------{EDITADO-----------------------------------------*/

    public function editView($id)
    {
        $Solicitud=$this->Solicitudes_model->GetIdUser(array('id'=>$id));
        $tipo_solicitud=$this->Solicitudes_model->GetAllTipotramites();
        $data = array(
            'title' => 'prueba',
            'UserInfo'=> $Solicitud,
            'tipo_solicitud'=>$tipo_solicitud
			
        );

       //print_r($tipo_usuario);
        $this->parser->parse('solicitudes/edit',$data);

    }

/*-----------------------------------EDITADO}-----------------------------------------*/

    public function dataUpdate($id)
    {


        $name           = $this->input->post('name');
        $apellido_p           = $this->input->post('apellido_p');
        $apellido_m           = $this->input->post('apellido_m');
        $usuario            = $this->input->post('usuario');
        $password           = $this->input->post('password');
        $Result_password=$this->users_model->GetIdUser(array('password'=>$password));

        if($Result_password!=null){
            $passwordI=$Result_password[0]->password;
        }else{
            $passwordI=md5($password);
        }



        $tipo_usuario_id = $this->input->post('tipo_usuario_id');
        $status = $this->input->post('status');

        $value_update = array('nombre'=>$name,'apellido_p'=>$apellido_p,'apellido_m'=>$apellido_m, 'usuario'=>$usuario,'password'=>$passwordI,'tipo_usuario_id'=>$tipo_usuario_id,'status'=>$status);
        $this->users_model->UpdateUser($value_update,array('id' => $id ));
        //$this->parser->parse('welcome',$data);
        redirect(base_url('User'));

    }

    public function dataDelete($id)
    {
        $this->users_model->UpdateUser(array('status'=>0),array('id' => $id ));
        redirect(base_url('User'));
    }

    public function dataDeleteModal(){
        $id = $this->input->post('id');
        //echo $id; exit;
        $this->users_model->DeleteUser(array('id'=>$id));
        $status = True;
        $result = array('statusR' => $status);
        echo json_encode($result);

    }

}
