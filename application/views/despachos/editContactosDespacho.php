<?php
$this->load->view('header');
?>
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Contacto</h3>
                    </div>

                </div>
                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                <form class="form-horizontal form-label-left" novalidate action="<?php echo base_url() ?>despacho/dataUpdateContactoByDespacho/<?php echo html_escape($ContactoByDespachoList[0]->contactoid) ?>" method="post" accept-charset="utf-8">
                        <div class="x_panel">
                            <div class="x_title">
                              <h2>Datos Contactos</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                      </ul>

                                <div class="clearfix"></div>

                            </div>
                            <div class="x_content">

                                  <div class="modal-body form-horizontal form-label-left">

                                    <div class="form-group " id="name">
                                        <label for="name">Nombre</label>
                                        <input id="mnombre" type="text" name="mnombre" class="optional form-control col-md-7 col-xs-12" value="<?php echo html_escape($ContactoByDespachoList[0]->nombrecont) ?>">
                                    </div>

                                    <div class="form-group " id="name">
                                        <label for="name">Correo</label>
                                        <input id="mcorreo" type="text" name="mcorreo" class="optional form-control col-md-7 col-xs-12" value="<?php echo html_escape($ContactoByDespachoList[0]->correo) ?>">
                                    </div>

                                    <div class="form-group " id="name">
                                        <label for="name">Numero(s) de contacto</label>
                                        <input id="mtelefono" type="text" name="mtelefono" class="optional form-control col-md-7 col-xs-12" value="<?php echo html_escape($ContactoByDespachoList[0]->telefono) ?>">
                                    </div>

                                    <div class="form-group " id="name">
                                        <label for="name">Departamento</label>
                                        <input id="mdepto" type="text" name="mdepto" class="optional form-control col-md-7 col-xs-12" value="<?php echo html_escape($ContactoByDespachoList[0]->depto) ?>">
                                    </div>
                                    <input type="hidden" id="midempresa" name="midempresa" value="<?php echo html_escape($ContactoByDespachoList[0]->iddesp)?>">

                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                      <a href="<?php echo base_url('despacho/editView') ?>/<?php echo html_escape($ContactoByDespachoList[0]->iddesp)?>">  <button type="button" class="btn btn-primary">Cancelar</button></a>

                                        <button id="send" type="submit" class="btn btn-success">Guardar</button>
                                         <button type="button" name="button"  onclick="mConfirmacion(<?php echo html_escape($ContactoByDespachoList[0]->contactoid)?>)"  class="btn btn-danger">Eliminar</button>
                                    </div>
                                </div>


                              </form>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->


    </div>
</div>


<!---modal eliminar-->


<div class="modal fade" id="mConfirmacion">
    <div class="modal-dialog">
        <div class="modal-content col-md-12 col-sm-12 col-xs-12">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Eliminar</h4>
            </div>
            <div class="modal-body">


                <div class="form-group " id="alamr">
                    <label for="comment">¿Esta seguro de Eliminar al Contacto?</label>

                </div>


            <input type="hidden" value="" id="idContactom" name="idContactom">
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
<script>
//modal mAlarms
   var mConfirmacion = function(id) {

       $('#mConfirmacion').modal('show');
       $('#idContactom').val(id);

   }


   var DeleteModal = function() {
       var id = $('#idContactom').val();
       var link = '<?php echo base_url('despacho/editView'); ?>/<?php echo html_escape($ContactoByDespachoList[0]->iddesp)?>';

       $.post("<?php echo base_url('empresa/dataDeleteModalContact') ?>",{ id:id},
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
