<?php
$this->load->view('header');
?>
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Editar Colonia</h3>
                    </div>

                </div>
                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <form class="form-horizontal form-label-left" novalidate action="<?php echo base_url() ?>colonia/dataUpdate/<?php echo html_escape($GetIdColonias[0]->id) ?>" method="post" accept-charset="utf-8">
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Colonia</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="name" class="form-control col-md-7 col-xs-12" name="nombre" type="text" value="<?php echo html_escape($GetIdColonias[0]->nombre) ?>">
                                        </div>
                                    </div>

                                    <hr/>



                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                          <a href="<?php echo base_url('Colonia') ?>">
                                            <button type="button" class="btn btn-primary">Cancelar</button></a>
                                            <button id="send" type="submit" class="btn btn-success">Guardar</button>
                                            <button type="button" name="button"  onclick="mConfirmacion(<?php echo html_escape($GetIdColonias[0]->id) ?>)"  class="btn btn-danger">Eliminar</button>
                                        </div>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->


    </div>
</div>



<!---modal eliminar--->


<div class="modal fade" id="mConfirmacion">
    <div class="modal-dialog">
        <div class="modal-content col-md-12 col-sm-12 col-xs-12">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Eliminar</h4>
            </div>
            <div class="modal-body">


                <div class="form-group " id="alamr">
                    <label for="comment">¿Esta seguro de Eliminar la Colonia?</label>

                </div>


            <input type="hidden" value="" id="idColonias" name="idColonias">
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-danger" onclick="DeleteModal();">Eliminar</button>
            </div>
        </div>
    </div>
</div>


<?php
$this->load->view('footer');
?>


<!-- validator -->

<script src="<?php echo base_url() ?>vendors/validator/validator.js"></script>

<!-- /validator -->
<script>
var mConfirmacion = function(id) {

    $('#mConfirmacion').modal('show');
    $('#idColonias').val(id);

}


var DeleteModal = function() {
    var id = $('#idColonias').val();
    var link = '<?php echo base_url('colonia'); ?>';

    $.post("<?php echo base_url('colonia/dataDeleteModal') ?>",{ id:id},
        function( data ) {
            data = JSON.parse(data);
            //console.log(data.statusR);
            var status = data.statusR;
            if (status == true) {
                window.location.replace(link);


            }

        }

    );

}


</script>
