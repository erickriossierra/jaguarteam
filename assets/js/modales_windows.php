<script>
//modal Proposal
var mProposal = function(id) {

    $('#mProposal').modal('show');

}
//modal mAlarms
var mAlarms = function(id) {

    $('#mAlarms').modal('show');
    $('#idRecord').val(id);

}

///insert Alarm

var insertAlarm = function() {
    var idRecord = $('#idRecord').val();
    var name=$('#nameAlarm').val();
    var alarm = $('#DescriptionAlamr').val();


    //console.log(idRecord +"  " +name+"  " +alarm+"  ");



    $.post("<?php echo base_url('alarm/dataInsertModal') ?>",{ idRecord:idRecord, name:name, alarm:alarm},
        function( data ) {
            data = JSON.parse(data);
            console.log(data.statusR);
            var status = data.statusR;
            if (status == true) {
                //se limpia el form

                //window.location.href = "<?php echo base_url('detalle_proyecto').'/comentarios_cliente/'?>" + idproyecto ;
                location.reload();



            }

        }

    );

}

</script>