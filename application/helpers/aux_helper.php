<?php

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

function date_format_esp($date){

    $dateChange= date('d-m-Y', strtotime($date));
    return $dateChange;
}
function date_format_db($date){

  $dateformat = new DateTime("$date");
  return $dateformat->format('Y-m-d');
}
?>
