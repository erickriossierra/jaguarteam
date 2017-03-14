<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ( $this->session->userdata('nameS')=='') {
            redirect();
        }
        $this->name_session  =  $this->session->userdata('nameS');
        $this->idtypeUser_session = $this->session->userdata('idtypeUserS');

        $this->load->model('users_model');
        $this->load->helper('form');
    }



    public function index()
    {
        $UserList=$this->users_model->UserList();
        $data = array(
            'title' => 'prueba',
            'UserList'=>$UserList
        );

        $this->parser->parse('users/list',$data);

    }

    public function addView()
    {
      $tipo_usuario=$this->users_model->GetAllTipoUsuario();
        $data = array(
            'title' => 'prueba',
            'tipo_usuario'=>$tipo_usuario
        );
        $this->parser->parse('users/new',$data);

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


    public function editView($id)
    {
        $User=$this->users_model->GetIdUser(array('id'=>$id));
        $tipo_usuario=$this->users_model->GetAllTipoUsuario();
        $data = array(
            'title' => 'prueba',
            'UserInfo'=> $User,
            'tipo_usuario'=>$tipo_usuario


        );

       //print_r($tipo_usuario);
        $this->parser->parse('users/edit',$data);

    }


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

}
