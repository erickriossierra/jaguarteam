<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ServicioSoc extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ( $this->session->userdata('nameS')=='') {
            redirect();
        }
        $this->name_session  =  $this->session->userdata('nameS');
        $this->idtypeUser_session = $this->session->userdata('idtypeUserS');
        $this->idUser_session = $this->session->userdata('idUserS');

        $this->load->model('ServicioSoc_model');
        $this->load->model('empresas_model');
        $this->load->model('despachos_model');
        $this->load->model('alumnos_model');
        $this->load->model('Dependencias_model');
        $this->load->helper('form');
        $this->load->helper('aux_helper');
    }

//modificado
    public function index()
    {

        $data = array(
            'title' => 'prueba',

        );

        $this->parser->parse('servicio_social/list',$data);

    }

//modificado
    public function addView()
    {
        $TipoServicioList=$this->ServicioSoc_model->TipoServicioList();
        $TipoCarrerasList=$this->ServicioSoc_model->TipoCarrerasList();
        $TipoHorarioList=$this->ServicioSoc_model->TipoHorarioList();
        $TiposViaticosList=$this->ServicioSoc_model->TiposViaticosList();
        $TiposVigenciaList=$this->ServicioSoc_model->TiposVigenciaList();
        $TiposFuncionList=$this->ServicioSoc_model->TiposFuncionList();
        $TiposModalidadList=$this->ServicioSoc_model->TiposModalidadList();
        $TiposAreasDesList=$this->ServicioSoc_model->TiposAreasDesList();
       // $GetBuscarDepartamento=$this->ServicioSoc_model->GetBuscarDepartamento();
       // $EstatusPracticasList=$this->ServicioSoc_model->EstatusPracticasList();
        $data = array(
            'title' => 'prueba',
            'TipoServicioList'=>$TipoServicioList,
            'TipoCarrerasList'=>$TipoCarrerasList,
            'TipoHorarioList'=>$TipoHorarioList,
            'TiposViaticosList'=>$TiposViaticosList,
            'TiposVigenciaList'=>$TiposVigenciaList,
            'TiposFuncionList'=>$TiposFuncionList,
            'TiposModalidadList'=>$TiposModalidadList,
            'TiposAreasDesList'=>$TiposAreasDesList,
            //'GetBuscarDepartamento'=>$GetBuscarDepartamento,
           // 'EstatusPracticasList'=>$EstatusPracticasList

        );
        $this->parser->parse('servicio_social/new',$data);

    }
    //creado
    public function addView2()
    {
        $TipoTituloList=$this->ServicioSoc_model->TipoTituloList();
        $DepartamentoList=$this->ServicioSoc_model->DepartamentoList();
        $EmpresasList=$this->ServicioSoc_model->EmpresasList();
        $DependenciasList=$this->ServicioSoc_model->DependenciasList();
        $TipoServicioList=$this->ServicioSoc_model->TipoServicioList();
        $data = array(
            'title' => 'prueba',
            'TipoTituloList'=>$TipoTituloList,
            'DepartamentoList'=>$DepartamentoList,
            'TipoServicioList'=>$TipoServicioList,
            'DependenciasList'=>$DependenciasList,
            'EmpresasList'=>$EmpresasList,
        );
        $this->parser->parse('servicio_social/newResp',$data);

    }
     //creado
    public function addView3()
    {
        
       
        $data = array(
            'title' => 'prueba',
            
            
        );
        $this->parser->parse('servicio_social/newDepa',$data);

    }
    //nuevo
    public function addViewAS()
    {
      $id=$this->idUser_session;

          
      $GetIdPracticas=$this->ServicioSoc_model->HistorialServicosList2();
      $TipoPracticasList=$this->ServicioSoc_model->TipoServicioList();
      $TipoHorarioList=$this->ServicioSoc_model->TipoHorarioList();
      $EstatusPracticasList=$this->ServicioSoc_model->EstatusPracticasList();
      $TiposViaticosList=$this->ServicioSoc_model->TiposViaticosList();
        $data = array(
            'title' => 'prueba',
            'GetIdPracticas'=> $GetIdPracticas,
            'TipoPracticasList'=>$TipoPracticasList,
            'EstatusPracticasList'=>$EstatusPracticasList,
            'TipoHorarioList'=>$TipoHorarioList,
            'TiposViaticosList'=>$TiposViaticosList
        );

       //print_r($tipo_usuario);
        $this->parser->parse('servicio_social/newAlmServ',$data);

    }

//modificado
    public function dataInsert()
    {
        
       //  $Alumnos_id=  $this->input->post('id_alumno');

        /*Insertar tabla servicio*/
        $numero_proy = $this->input->post('numero_proy');
        $fecha_reg= date_format_db($this->input->post('fecha_reg'));

        $id_tipo_lugar = $this->input->post('id_tipo_lugar');
        $empresas_id = $this->input->post('id_empresa');
        $dependencia_id = $this->input->post('id_depedencia');

        $nombre_proy= $this->input->post('nombre_proy');
        $id_vigencia = $this->input->post('id_vigencia');
        $id_funcion = $this->input->post('id_funcion');
        $id_modalidad= $this->input->post('id_modalidad');
        $id_areades= $this->input->post('id_areades');

        $justificacion_social = $this->input->post('justificacion_social');
        $objetivo_gen = $this->input->post('objetivo_gen');
        $objetivo_esp = $this->input->post('objetivo_esp');

        $acciones_generales = $this->input->post('acciones_generales');
        $acciones_lcp= $this->input->post('acciones_lcp');
        $acciones_lmni = $this->input->post('acciones_lmni');
        $acciones_lati = $this->input->post('acciones_lati');

        $beneficiario = $this->input->post('beneficiario');
        $materiales = $this->input->post('materiales');
        $humanos= $this->input->post('humanos');
        $infraestructura = $this->input->post('infraestructura');

        $apoyo_economico=$this->input->post('apoyo_economico');
        $monto= $this->input->post('monto');
        $estatus_id = $this->input->post('estatus_id');

        $condicion_horario = $this->input->post('condicion_horario');

        $cupo_lcp = $this->input->post('cupo_lcp');
        $cupo_lmni = $this->input->post('cupo_lmni');
        $cupo_lati= $this->input->post('cupo_lati');       
        $total_cupo = $this->input->post('total_cupo');

        $induccion = $this->input->post('induccion');
        $horas_induccion = $this->input->post('horas_induccion');

        $instrumento= $this->input->post('instrumento');
        $periodicidad = $this->input->post('periodicidad');
        $criterios = $this->input->post('criterios');

        $id_resp= $this->input->post('id_resp');
        $id_depa= $this->input->post('id_depa');


        $total_cupoFCA= $cupo_lcp+$cupo_lmni+$cupo_lati;
        
        

        $value_insert_servicio =array('numero_proy'=>$numero_proy,'fecha_reg'=>$fecha_reg,'id_empresa'=>$empresas_id, 'id_dependencia'=>$dependencia_id,'id_departamento'=>$id_depa,'id_tipo_lugar'=>$id_tipo_lugar,'nombre_proy'=>$nombre_proy,'id_vigencia'=>$id_vigencia,'id_funcion'=>$id_funcion,'id_modalidad'=>$id_modalidad,'id_areades'=>$id_areades,'justificacion_social'=>$justificacion_social,'objetivos'=>$objetivo_gen.' ' .$objetivo_esp ,'acciones_generales'=>$acciones_generales,'acciones_lcp'=>$acciones_lcp,'acciones_lmni'=>$acciones_lmni,'acciones_lati'=>$acciones_lati,'beneficiario'=>$beneficiario,'recursos_prestador'=>'* '.$materiales.' * '.$humanos. ' * '.$infraestructura , 'apoyo_economico'=>$apoyo_economico,'monto'=>$monto,'id_viaticos'=>$estatus_id,'condicion_horario'=>$condicion_horario,'cupo_lcp'=>$cupo_lcp,'cupo_lmni'=>$cupo_lmni,'cupo_lati'=>$cupo_lati,'total_cupoFCA'=>$total_cupoFCA,'total_cupo'=>$total_cupo,'induccion'=>$induccion,'horas_induccion'=>$horas_induccion,'evaluacion_alumno'=>'-> '.$instrumento.' -> '.$periodicidad .' -> '.$criterios ,'id_responsable'=>$id_resp );
        $this->ServicioSoc_model->CreateProyecto($value_insert_servicio);

        redirect(base_url('ServicioSoc'));

    }
    //nuevo 
    public function dataInsertResp()
    {
        /*Insertar tabla departamentos*/
    $id_titulo = $this->input->post('tipo_titulo');
    $nombre_resp= $this->input->post('nombre_resp');
    $apellido_materno = $this->input->post('apellido_materno');
    $apellido_paterno= $this->input->post('apellido_paterno');
    $id_depa = $this->input->post('tipo_depedencia');

    $value_insert_depa =array('id_titulo'=>$id_titulo,'nombre_resp'=>$nombre_resp,'apellido_paterno'=>$apellido_paterno, 'apellido_materno'=>$apellido_materno, 'id_depa'=>$id_depa);
    $this->ServicioSoc_model->CreateResponsable($value_insert_depa);

        redirect(base_url('ServicioSoc'));
    }
//nuevo 
    public function dataInsertDepa()
    {
        /*Insertar tabla departamentos*/
    $numero_depa = $this->input->post('nombre_depa');
    $telefono= $this->input->post('telefono');
    //$id_tipo_lugar = $this->input->post('id_tipo_lugar');

    $value_insert_depa =array('nombre_depa'=>$numero_depa,'telefono'=>$telefono);
    $this->ServicioSoc_model->CreateDepartamento($value_insert_depa);

        redirect(base_url('ServicioSoc'));
    }
//modficado
    public function editView($id)
    {
          $GetIdPracticas=$this->ServicioSoc_model->HistorialServicosList(array('id_alumno'=>$id));
          $TipoPracticasList=$this->ServicioSoc_model->TipoServicioList();
          $TipoHorarioList=$this->ServicioSoc_model->TipoHorarioList();
          $EstatusPracticasList=$this->ServicioSoc_model->EstatusPracticasList();
          $TiposViaticosList=$this->ServicioSoc_model->TiposViaticosList();
        $data = array(
            'title' => 'prueba',
            'GetIdPracticas'=> $GetIdPracticas,
            'TipoPracticasList'=>$TipoPracticasList,
            'EstatusPracticasList'=>$EstatusPracticasList,
            'TipoHorarioList'=>$TipoHorarioList,
            'TiposViaticosList'=>$TiposViaticosList
        );

       //print_r($tipo_usuario);
        $this->parser->parse('servicio_social/edit',$data);

    }
//modificado
    public function bitacoraView($id)
    {
        $GetIdAlumnos=$this->alumnos_model->GetIdAlumno(array('id'=>$id));
        $TipoCarrerasList=$this->ServicioSoc_model->TipoCarrerasList();
        $TipoPracticasList=$this->ServicioSoc_model->TipoPracticasList();
        $HistorialPracticasList=$this->ServicioSoc_model->HistorialServicosList(array('servicio_social.id_alumno'=>$id));
        $data = array(
            'title' => 'prueba',
            'GetIdAlumnos'=> $GetIdAlumnos,
            'TipoCarrerasList'=>$TipoCarrerasList,
            'TipoPracticasList'=>$TipoPracticasList,
            'HistorialPracticasList'=>$HistorialPracticasList,
        );
       //print_r($HistorialPracticasList);
        $this->parser->parse('servicio_social/bitacora',$data);
    }

    public function dataInsertBitacora($id)
    {
        $Alumnos_id=  $id;
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

        $value_insert_practica =array('tipo_practica_id'=>$tipo_practica_id,'despacho_id'=>$despacho_id,'empresas_id'=>$empresas_id, 'dependencia_id'=>$dependencia_id,'representante'=>$representante,'jefedirec'=>$jefedirec,'registroCP'=>$registrocp,'practica_inicio'=>$practica_inicio,'practica_fin'=>$practica_fin,'apoyo_economico'=>$apoyo_economico,'info'=>$info,'Alumnos_id'=>$Alumnos_id);
        $this->practicas_model->CreatePracticas($value_insert_practica);

        redirect(base_url('PracticasPro/bitacoraView/'.$id));

    }




    public function HistorialPracticasJson(){
      $id = $this->input->post('id');
      $HistorialPracticasList=$this->practicas_model->HistorialPracticasList(array('practicas_profesionales.id'=>$id));
       $data=array();
       foreach ($HistorialPracticasList as $key) {
           $data[]=array(
           "nombre_comercial"   => $key->nombre_comercial,
           "tipo_practica"    => $key->tipo_practica,
           "representante"    => $key->representante,
           "jefe"             => $key->jefedirec,
           "registroCP"       =>$key->registroCP,
           "practica_inicio"  =>date_format_esp($key->practica_inicio),
           "practica_fin"     =>date_format_esp($key->practica_fin),
           "constancia"       =>$key->constancia,
           "info"             =>$key->info,
           );

       }
       echo json_encode($data);
    }


//modificado
    public function dataUpdate($id)
    {

/*
      $tipo_practica_id = $this->input->post('tipo_practica');
      $empresas_id = $this->input->post('idEmpresa');
      $despacho_id = $this->input->post('idDespacho');
      $dependencia_id = $this->input->post('idDepedencia');
      $representante= $this->input->post('representante');
      $jefedirec = $this->input->post('jefe');
      $registrocp= $this->input->post('registrocp');
      $practica_inicio= date_format_db($this->input->post('practica_inicio'));

      $practica_fin= date_format_db($this->input->post('practica_fin'));
      $apoyo_economico= $this->input->post('apoyo_economico');*/
      $estatus_id= $this->input->post('estatus_id');
    /*  $info= $this->input->post('info');
          if($empresas_id==NULL){
          $empresas_id=0;
          }else{
              $despacho_id=0;
              $dependencia_id=0;
          }
          if ($despacho_id==NULL) {
            $despacho_id=0;
          } else {
             $empresas_id=0;
            $dependencia_id=0;
          }
          if ($dependencia_id==NULL) {
            $dependencia_id=0;
          } else {
            $empresas_id=0;
            $despacho_id=0;
          }
          */
          
      $value_update =array('id_estatus'=>$estatus_id);
      $this->ServicioSoc_model-> UpdateServicio($value_update,array('id_servicio' => $id ));


      $idAlumno=$this->ServicioSoc_model->GetIdPracticas(array('id_servicio' => $id ));

      redirect(base_url('ServicioSoc/bitacoraView/'.$idAlumno[0]->id_alumno));


    }

    public function dataDelete($id)
    {



        $this->practicas_model-> UpdatePracticas(array('status'=>0),array('id' => $id ));
        redirect(base_url('PracticasPro'));

    }

     /*Busqueda de Alumno*/
    public function BuscarAlumno(){
      $searchTerm = $this->input->get('term');
       $search=$this->alumnos_model->GetBuscarAlumno(array('alumnos.nombre'=>$searchTerm));

       $data=array();
       if ($search==FALSE)
       {
         $data[]=array(
         "id"=>'0',
          "nombre_cp"   => 'No existe',
          "nombre"   => 'N/A',
          "apellido_paterno"   => 'N/A',
          "apellido_materno"   => 'N/A',
          "carrera"   => 'N/A',
          "id_carrera"   => 0
         );
       }else{
       foreach ($search as $key) {
           $data[]=array(
           "id"=>$key->idAlumno,
           "nombre_cp"   => $key->Nombre_cp,
           "nombre"   => $key->alumno,
           "apellido_paterno"   => $key->apellido_paterno,
           "apellido_materno"   => $key->apellido_materno,
           "carrera"   => $key->Carrera,
           "id_carrera"=>$key->idcarrera
           );

       }
      }
       echo json_encode($data);
    }

 //se queda   /*Busqueda de Empresas*/
    public function BuscarEmpresa(){
      $searchTerm = $this->input->get('term');


       $search=$this->empresas_model->GetBuscarEmpresa(array('nombre_comercial'=>$searchTerm));

       $data=array();
       if ($search==FALSE)
       {
         $data[]=array(
         "id"=>'0',
         "nombre_comercial"   => 'No existe',
         );
       }else{
       foreach ($search as $key) {
           $data[]=array(
           "id"=>$key->id,
           "nombre_comercial"   => $key->nombre_comercial,
           );

       }
      }
       echo json_encode($data);
    }
 //nuevo   /*Busqueda de departamento*/
    public function BuscarDepartamento(){
      $searchTerm = $this->input->get('term');


       $search=$this->ServicioSoc_model->GetBuscarDepartamento(array('nombre_depa'=>$searchTerm));

       $data=array();
       if ($search==FALSE)
       {
         $data[]=array(
         "id"=>'0',
         "nombre_depa"   => 'No existe',
         );
       }else{
       foreach ($search as $key) {
           $data[]=array(
           "id"=>$key->id_depa,
           "nombre_depa"   => $key->nombre_depa,
           );

       }
      }
       echo json_encode($data);
    }
    //nuevo   /*Busqueda de titulo*/
    public function BuscarTitulo(){
      $searchTerm = $this->input->get('term');

       $search=$this->ServicioSoc_model->GetBuscarTitulo(array('nombre_titulo'=>$searchTerm));

       $data=array();
       if ($search==FALSE)
       {
         $data[]=array(
         "id"=>'0',
         "nombre_titulo"   => 'No existe',
         );
       }else{
       foreach ($search as $key) {
           $data[]=array(
           "id"=>$key->id_titulo,
           "nombre_titulo"   => $key->nombre_titulo,
           );

       }
      }
       echo json_encode($data);
    }
     //nuevo   /*Busqueda de Nombre y titulo de responsable*/
    public function BuscarNombreresp(){
      $searchTerm = $this->input->get('term');

       $search=$this->ServicioSoc_model->GetBuscarNombreresp(array('responsables_proyecto.nombre_resp'=>$searchTerm));

       $data=array();
       if ($search==FALSE)
       {
         $data[]=array(
         "id"=>'0',
         "nombre_resp"   => 'No existe',
         "nombreC"   => 'No existe',
         "id_depa"=>'0',
         "departamento"   => 'No aplica',
         );
       }else{
       foreach ($search as $key) {
           $data[]=array(
           "id"=>$key->id_resp,
           "nombre_resp"=>$key->nombre_resp,
           "nombreC"   => $key->nombreC,
           "nombre_depa"=>$key->nombre_depa,
           "id_depa"=>$key->iddepa,
           );
       }
      }
       echo json_encode($data);
    }
     //nuevo   /*Busqueda de titulo*/
    public function BuscarProyecto(){
      $searchTerm = $this->input->get('term');

       $search=$this->ServicioSoc_model->HistorialServicosList3(array('nombre_proy'=>$searchTerm));

       $data=array();
       if ($search==FALSE)
       {
         $data[]=array(
         "id"=>'0',
         "nombre_proy"   => 'No existe',
         "id_tipo_lugar"   => 'N/A',
         );
       }else{
       foreach ($search as $key) {
        if($key->id_dependencia==0){   
            $val='Empresa';
            $val2=$key->id_empresa;
          }
          else{
              $val= 'Dependecia';
              $val2=$key->id_dependencia;
          }
         if($key->nombre_comercial==NULL){
            
              $lugar=$key->dependencianombre;
            
          }else {
              $lugar= $key->nombre_comercial;
          }  
 
           $data[]=array(
           "id"=>$key->id_proyecto,
           "nombre_proy"   => $key->nombre_proy,
           "idlugar"=>$val2,
           "id_tipo_lugar"=>$val,
           "num_proy"=>$key->numero_proy,
           "nombre_proy"=>$key->nombre_proy,
           "lugar"=>$lugar,
           "nombreCP"=>$key->nombre_cp,
           "objetivos"=>$key->objetivos,
           "acciones_generales"=>$key->acciones_generales,
           "tipo_horario"=>$key->nombre_tipohora,
           "servicio_inicio"=>$key->servicio_inicio,
           "servicio_fin"=>$key->servicio_fin,
           "apoyo_economico"=>$key->apoyo_economico,
           "nombre_via"=>$key->nombre_via,
           );

       }
      }
       echo json_encode($data);
    }

    public function Reporte()
    {
        $data = array(
            'title' => 'prueba',

        );
        $this->parser->parse('servicio_social/listReport',$data);

    }
//modificado
    public function ReportePracticasListJSON(){
      $HistorialServicioList=$this->ServicioSoc_model->ReporteServicioList();
      $data=array();
        foreach ($HistorialServicioList as $key) {

          if($key->nombre_comercial==NULL){
            
              $val=$key->dependencianombre;
            
          }else {
              $val= $key->nombre_comercial;
          }

         /* if ($key->colegio==NULL) {
            $val2="N/A";
          }else{$val2=$key->colegio;} */

            $data[]=array(
            "id"=>$key->id_servicio,
            "nombre"=>$key->nombrealumno. " ".$key->apellido_paterno. " ".$key->apellido_materno,
            "lugar"=> $val,
            "proyecto"=>$key->nombre_proy,
            "carrera"=> $key->carreranombre,
            "representante"=> $key->representante,
            "tipo_horario"=>$key->nombre_tipohora,
            "practica_inicio"=>date_format_esp($key->servicio_inicio),
            "practica_fin"=>date_format_esp($key->servicio_fin),
            "estatus"=>$key->estatus,
            );

        }

        echo '{"data": '.json_encode($data).'}';



    }

//modificado
    public function BuscarDependencia(){
      $searchTerm = $this->input->get('term');


       $search=$this->Dependencias_model->DependenciasList(array('Nombre'=>$searchTerm));

       $data=array();
       if ($search==FALSE)
       {
         $data[]=array(
         "id"=>'0',
         "nombre"   => 'No existe',
         //"colegio"=>''
         );
       }else{
       foreach ($search as $key) {
           $data[]=array(
           "id"=>$key->iddep,
           "nombre"   => $key->Nombre,
           //"colegio"=>$key->colegio
           );

       }
      }
       echo json_encode($data);
    }

}
