<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ( $this->session->userdata('nameS')=='') {
            redirect();
        }
        $this->name_session  =  $this->session->userdata('nameS');
        $this->idtypeUser_session = $this->session->userdata('idtypeUserS');

        $this->load->model('contacts_model');
        $this->load->helper('form');
    }



    public function index()
    {
        $ContactList=$this->contacts_model->ContactList();
        $data = array(
            'title' => 'prueba',
            'ContactList'=>$ContactList
        );

        $this->parser->parse('contacts/list',$data);

    }

    public function addView()
    {
        $data = array(
            'title' => 'prueba'
        );
        $this->parser->parse('contacts/new',$data);

    }

    public function dataInsert()
    {

        $name           = $this->input->post('name');
        $phone         = $this->input->post('phone');
        $email            = $this->input->post('email');
        $contact_name            = $this->input->post('contact_name');
        $address = $this->input->post('address');
        $directive            = $this->input->post('directive');


        $value_insert = array('name'=>$name, 'phone'=>$phone, 'email'=>$email,'contact_name'=>$contact_name,'directive'=>$directive,'address'=>$address);
        $this->contacts_model->CreateContact($value_insert);
        redirect(base_url('contact'));

    }


    public function editView($id)
    {
        $contact=$this->contacts_model->GetIdContact($id);
        $data = array(
            'title' => 'prueba',
            'contactInfo'=> $contact


        );

      //  print_r($data);
        $this->parser->parse('contacts/edit',$data);

    }


    public function dataUpdate($id)
    {


       $name           = $this->input->post('name');
        $phone         = $this->input->post('phone');
        $email            = $this->input->post('email');
        $contact_name            = $this->input->post('contact_name');
        $directive            = $this->input->post('directive');
        $address = $this->input->post('address');

        $value_update = array('name'=>$name, 'phone'=>$phone, 'email'=>$email,'contact_name'=>$contact_name,'directive'=>$directive,'address'=>$address);
        $this->contacts_model->UpdateContact($value_update,array('id' => $id ));
        //$this->parser->parse('welcome',$data);
        redirect(base_url('contact'));

    }



    public function dataDeleteModal()
    {

        $id           = $this->input->post('id');



        $this->contacts_model->DeleteContact(array('id'=>$id));
        $status = True;
        $result = array('statusR' => $status);
        echo json_encode($result);

    }



}
