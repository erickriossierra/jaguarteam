<?php

function uploadfile($nombre,$etiqueta,$id,$carpeta,$modelo,$tabla,$fieltable)
{

    //echo $nombre . $etiqueta . $id . $carpeta. $modelo . $tabla .$fieltable;

    $ci=& get_instance();
    $ci->config->set_item('language','spanish');
    $config['upload_path']   = './uploads/'.$carpeta.'/';
    $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|ppt|pptx|zip|rar';
    $pdfnombre               = "";
    $errorimagen             = False;
    $ci->load->library('upload', $config);
    $ci->load->model($modelo.'_model');

    $get_ficha= '$ci->'.$modelo."_model->$tabla(array($fieltable => $id))";



    if ($_FILES[$nombre]['name']!="" )
    {
        // archivo no obligatorio
        if ($get_ficha) {
            $archivo = './uploads/' . $carpeta . '/' . $get_ficha[0]->$nombre;

            unlink($archivo);
        }

        $error = "";

        if (!$ci->upload->do_upload($nombre))
        {
            $error          =  '('.$etiqueta.') '.$ci->upload->display_errors();
            $errorimagen    = True;

        }else{
            $getimg         = $ci->upload->data();
            $pdfnombre      = $getimg["file_name"];

        }
    }

    $valores = array("error"=>$error,"pdfnombre"=>$pdfnombre,"errorimagen"=>$errorimagen);

    print_r($valores);
//exit;
    return $valores;
}


function getAlarmsData($id)
{
    //mAlarmsEditView GetAlarm
    $ci =& get_instance();
    $ci->load->model('alarms_model');
    $getAlarmsDataReturn = $ci->alarms_model->AlarmList(array('id'=>$id));
    if ($getAlarmsDataReturn != False) {
        return $getAlarmsDataReturn[0]->name;
    } else {
        return False;
    }
}


function getDataListRecord($id)
{


    $valores = array();

    $ci =& get_instance();
    $ci->load->model('contacts_model');
    $ci->load->model('typeRecords_model');
    $ci->load->model('status_model');
    $ci->load->model('typeQuations_model');
    $getRecordsDataReturn = $ci->contacts_model->GetIdContact($id['idContacts']);
    $getTypeRecordsDataReturn = $ci->typeRecords_model->GetIdType($id['idTypeRecord']);
    $getStatusDataReturn = $ci->status_model->GetIdStatus($id['idStatus']);
    $getQuationDataReturn = $ci->typeQuations_model->GetIdQuotationByRecord(array('idRecord'=>$id['idRecord']));

    $valores['name'] = $getRecordsDataReturn[0]->name;
    $valores['contact_name'] = $getRecordsDataReturn[0]->contact_name;
    $valores['name_type']=$getTypeRecordsDataReturn[0]->name;
    $valores['name_status']=$getStatusDataReturn[0]->name;
    $valores['quotation']=$getQuationDataReturn[0]->quotation;
    $valores['balance']=$getQuationDataReturn[0]->balance;
    return $valores;
}

function date_format_esp($date){

    $dateChange= date('d-m-Y', strtotime($date));
    return $dateChange;
}
?>