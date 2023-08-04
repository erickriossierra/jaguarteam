<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solicitudes extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ( $this->session->userdata('nameS')=='') {
            redirect();
        }
        $this->name_session  =  $this->session->userdata('nameS');
        $this->idtypeUser_session = $this->session->userdata('idtypeUserS');
        $this->idUser_session = $this->session->userdata('idUserS');

        $this->load->model('Solicitudes_model');
		$this->load->model('practicas_model');
        $this->load->model('users_model');
        $this->load->model('ServicioSoc_model');
        $this->load->helper('form');
    }

/*---------------------------{EDITADO-----------------------------------------*/

    public function index($id)
    {
    
    if ($this->idtypeUser_session!=1){
          
        $SolList=$this->Solicitudes_model->SolList2(array('id_alumno'=>$id));

        $ServList=$this->Solicitudes_model->ServList2(array('id_alumno'=>$id));

        if ($SolList==null) {
            $SolList=$this->Solicitudes_model->SolList2(array('id_practicas'=>16));
        }
        if ($ServList==null) {
            $ServList=$this->Solicitudes_model->ServList2(array('id_servicio'=>1));
        }
    }else{
        $SolList=$this->Solicitudes_model->SolList();
        $ServList=$this->Solicitudes_model->ServList(array('id_alumno'>0));
        }
		//$UserList=$this->users_model->UserList();

        $data = array(
            'title' => 'prueba',
            'SolList'=>$SolList,
			'ServList'=>$ServList,
        );

        $this->parser->parse('solicitudes/list',$data);

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
    public function visualizar()
    {
         $Alumnos_id=  $this->input->post('id_alumno');

        /*Insertar tabla Practicas*/
        $tipo_practica_id = $this->input->post('tipo_practica');
        $empresas_id = $this->input->post('idEmpresa');
        $despacho_id = $this->input->post('idDespacho');
        $dependencia_id = $this->input->post('idDepedencia');
        $representante= $this->input->post('representante');
        $jefedirec = $this->input->post('jefe');
        $registrocp= $this->input->post('registrocp');
        $practica_inicio= date_format_db($this->input->post('practica_inicio'));

        $practica_fin= date_format_db($this->input->post('practica_fin'));
        $apoyo_economico=$this->input->post('apoyo_economico');
        $info= $this->input->post('info');
        $datosal=$this->Solicitudes_model->usuarios(array('id'=>$Alumnos_id));

        $value_insert_practica ='CARTA COMPROMISO DE PRÁCTICAS PROFESIONALES QUE CELEBRAN LA EMPRES ' .$idEmpresa. ' A LA QUE EN LO SUCESIVO SE LE DENOMINARÁ “LA EMPRESA”, REPRESENTADA EN ESTE ACTO POR '. $representante. ' EL BR. '. $id_alumno. ' A QUIEN EN LO SUCESIVO SE LE DENOMINARÁ “EL ALUMNO RESIDENTE” Y LA FACULTAD DE CONTADURÍA Y ADMINISTRACIÓN DE LA UNIVERSIDAD AUTONÓMA DE YUCATÁN, QUE EN LO SUCESIVO SE LE DENOMINARÁ “FCA” REPRESENTADA POR EL COORDINADOR DE SERVICIO SOCIAL Y PRÁCTICAS PROFESIONALES C.P. MANUEL JESÚS BASULTO TRIAY, CONFORME A LAS SIGUIENTES DECLARACIONES Y CLÁUSULAS.' ;
         redirect(base_url('solicitudes/new'));
    }
}
