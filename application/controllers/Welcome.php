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

		$this->load->view('login/index');
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
                    'idtypeUserS' => $login_user["tipo_usuario_id"],
                    'nameS' => $login_user["nombre"],
                    'apellidoP' => $login_user["apellido_p"],
                    'apellidoM' => $login_user["apellido_m"],

                );

                $this->session->set_userdata( $array );

                redirect(base_url('user'));
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
