<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');

    }

	public function index()
	{
        $tipomsg = 0;
        $msg= "Introducir los datos de la cuenta";
        $data = array(
            'title' => 'Login Usuario',
            'msg'  => $msg,
            'tipomsg' => $tipomsg
        );
        $this->parser->parse('login/index',$data);

		//$this->load->view('login/index');

	}

    public function validate()
    {

        $msg     = "";
        $tipomsg = "";

        if ($_POST) {
            $usuario  = $this->input->post('usuario');
            $password = $this->input->post('password');
            $login_user=$this->users_model->Login($usuario,$password);

            if ($login_user) {
                $array = array(
                    'idUserS' => $login_user["id"],
                    'idtypeUserS' => $login_user["tipo_usuario_id"],
                    'nameS' => $login_user["nombre"] . " " . $login_user["apellido_p"]. " " .$login_user["apellido_m"],
                    'usrS'=>$login_user["usuario"]
                );


                $this->session->set_userdata( $array );

                if($login_user["tipo_usuario_id"]==1){
                redirect(base_url('user'));
                }elseif($login_user["tipo_usuario_id"]==2){
                  redirect(base_url('Pedidos')); //PracticasPro <- Volver a poner cuando se aclare que se hara en la parte de racticas.
                }elseif($login_user["tipo_usuario_id"]==3){
                  redirect(base_url('Pedidos'));
                }
                else{
                  redirect(base_url('Pedidos/addview_2'));
                }
               //}elseif($login_user["tipo_usuario_id"]!=0){
                 // redirect(base_url('Inicio/index'));}
            }else{

                $tipomsg = 1;
                $msg= "Usuario o contraseña incorrecta";
            }
        }

        $data = array(
            'title' => 'Login Usuario',
            'msg'  => $msg,
            'tipomsg' => $tipomsg
        );
        $this->parser->parse('login/index',$data);


    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url(''));

    }

}
