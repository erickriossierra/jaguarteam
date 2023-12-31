<?php
$this->load->view('header');
?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Alta Usuario</h3>
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


                        <form class="form-horizontal form-label-left" novalidate action="<?php echo base_url() ?>user/dataupdate/<?php echo html_escape($UserInfo[0]->id) ?>" method="post" accept-charset="utf-8">

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12" name="name" required="required" type="text" value="<?php echo html_escape($UserInfo[0]->nombre) ?>">
                                </div>
                            </div>


                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido_p">A. Paterno <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="apellido_p" class="form-control col-md-7 col-xs-12" name="apellido_p" required="required" type="text" value="<?php echo html_escape($UserInfo[0]->apellido_p) ?>">
                                </div>
                            </div>


                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido_m">A. Materno <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="apellido_m" class="form-control col-md-7 col-xs-12" name="apellido_m" required="required" type="text" value="<?php echo html_escape($UserInfo[0]->apellido_m) ?>">
                                </div>
                            </div>

                            <hr/>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="usuario">Usuario <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="usuario" id="usuario" name="usuario" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo html_escape($UserInfo[0]->usuario) ?>">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Contraseña
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="password" type="password" name="password" required="required" class="optional form-control col-md-7 col-xs-12" value="<?php echo html_escape($UserInfo[0]->password) ?>">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contact_name">Tipo de Usuarios
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <select name="tipo_usuario_id" id="tipo_usuario" class="form-control" >

                                      <option value=""></option>
                                      <?php foreach ($tipo_usuario as $key): ?>
                                          <option <?php if($key->id ==  html_escape($UserInfo[0]->tipo_usuario_id)) echo 'selected' ?> value="<?php echo $key->id ?>"><?php echo $key->tipo ?></option>


                                      <?php endforeach ?>

                                  </select>
                                </div>
                            </div>
                            <hr/>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contact_name">Estatus
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="status" >
                                        <option value="1" <?php if (html_escape($UserInfo[0]->status)==1) echo 'selected' ?>>Activado</option>
                                        <option value="2" <?php if (html_escape($UserInfo[0]->status)==2) echo 'selected' ?>>Desactivado</option>

                                    </select>
                                </div>
                            </div>


                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                  <a href="<?php echo base_url('user') ?>">  <button type="button" class="btn btn-primary">Cancelar</button></a>

                                    <button id="send" type="submit" class="btn btn-success">Guardar</button>
                                     <button type="button" name="button"  onclick="mConfirmacion(<?php echo html_escape($UserInfo[0]->id) ?>)"  class="btn btn-danger">Eliminar</button>
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
                    <label for="comment">¿Esta seguro de Eliminar al Usuario?</label>

                </div>


            <input type="hidden" value="" id="idUsuario" name="idUsuario">
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
<script>
    // initialize the validator function
    validator.message.date = 'not a real date';

    // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
    $('form')
        .on('blur', 'input[required], input.optional, select.required', validator.checkField)
        .on('change', 'select.required', validator.checkField)
        .on('keypress', 'input[required][pattern]', validator.keypress);

    $('.multi.required').on('keyup blur', 'input', function() {
        validator.checkField.apply($(this).siblings().last()[0]);
    });

    $('form').submit(function(e) {
        e.preventDefault();
        var submit = true;

        // evaluate the form using generic validaing
        if (!validator.checkAll($(this))) {
            submit = false;
        }

        if (submit)
            this.submit();

        return false;
    });


    //modal mAlarms
       var mConfirmacion = function(id) {

           $('#mConfirmacion').modal('show');
           $('#idUsuario').val(id);

       }


       var DeleteModal = function() {
           var id = $('#idUsuario').val();
           var link = '<?php echo base_url('user'); ?>';

           $.post("<?php echo base_url('user/dataDeleteModal') ?>",{ id:id},
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
<!-- /validator -->
