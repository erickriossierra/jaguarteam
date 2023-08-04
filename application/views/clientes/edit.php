<?php
$this->load->view('header');
?>
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Cliente </h3>
                    </div>

                </div>
                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                <form class="form-horizontal form-label-left" novalidate action="<?php echo base_url() ?>clientes/dataUpdate/<?php echo html_escape($GetIdCli[0]->id_cli) ?>" method="post" accept-charset="utf-8">
                        <div class="x_panel">
                            <div class="x_title">
                              <h2>Datos</h2>
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
                                        <input id="nombre_cli" type="text" name="nombre_cli" class="optional form-control col-md-7 col-xs-12" value="<?php echo html_escape($GetIdCli[0]->nombre_cli) ?>">
                                    </div>

                                    <div class="form-group " id="name">
                                        <label for="name">Correo</label>
                                        <input id="mcorreo" type="text" name="mcorreo" class="optional form-control col-md-7 col-xs-12" value="<?php echo html_escape($GetIdCli[0]->Correo) ?>">
                                    </div>

                                    <div class="form-group " id="name">
                                        <label for="name">Numero(s) de contacto</label>
                                        <input id="mtelefono" type="text" name="mtelefono" class="optional form-control col-md-7 col-xs-12" value="<?php echo html_escape($GetIdCli[0]->Telefono) ?>">
                                    </div>

                                    <div class="form-group" id="name">
                                    <label for="name" ">Carrera:</label>
                                    
                                      <select name="carrera" id="carrera" class="form-control" onchange="mostrarValor(this)">
                                        <?php foreach ($CarrerasList as $key): ?>
                                            <option  <?php if($GetIdCli[0]->id_carr==$key->id) echo 'selected'?> value="<?php echo $key->id ?>"> <?php echo $key->Nombre ?></option>

                                        <?php endforeach ?>
                                      </select>
                                    
                                  </div>
                                  <div class="form-group" id="name">
                                    <label for="name" ">Escula:</label>
                                    
                                      <select name="escuela" id="escuela" class="form-control" onchange="mostrarValor(this)">
                                        <?php foreach ($EscuelasList as $key): ?>
                                            <option  <?php if($GetIdCli[0]->id_esc==$key->id) echo 'selected'?> value="<?php echo $key->id ?>"> <?php echo $key->nombre ?></option>

                                        <?php endforeach ?>
                                      </select>
                                    
                                  </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
  <?php if ($this->idtypeUser_session ==4){ ?>
                                      <a href="<?php echo base_url('pedidos/addview_2') ?>">  <button type="button" class="btn btn-primary">Cancelar</button></a>
  <?php }else{ ?>
                                      <a href="<?php echo base_url('clientes') ?>">  <button type="button" class="btn btn-primary">Cancelar</button></a>
  <?php } ?>
                                        <button id="send" type="submit" class="btn btn-success">Guardar</button>
                           <!--              <button type="button" name="button"  onclick="mConfirmacion(<?php echo html_escape($GetIdCli[0]->id_cli)?>)"  class="btn btn-danger">Eliminar</button> -->
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
       var link = '<?php echo base_url('empresa/editView'); ?>/<?php echo html_escape($GetIdCli[0]->idemp)?>';

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
