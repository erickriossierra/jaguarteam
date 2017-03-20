<?php
$this->load->view('header');
?>
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Editar Alumno</h3>
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
                              <div class="x_content">

                                  <form class="form-horizontal form-label-left" novalidate action="<?php echo base_url() ?>Alumnos/dataUpdate/<?php echo html_escape($GetIdAlumnos[0]->id) ?>" method="post" accept-charset="utf-8">


                                      <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombre</label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                              <input id="nombre" class="form-control col-md-7 col-xs-12" name="nombre" type="text" value="<?php echo $GetIdAlumnos[0]->nombre ?>">
                                          </div>
                                      </div>

                                      <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido">Apellido Paterno</label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                              <input id="apellido_paterno" class="form-control col-md-7 col-xs-12" name="apellido_paterno" type="text" value="<?php echo $GetIdAlumnos[0]->apellido_paterno ?>">
                                          </div>
                                      </div>

                                      <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido">Apellido Materno</label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                              <input id="apellido_materno" class="form-control col-md-7 col-xs-12" name="apellido_materno" type="text" value="<?php echo $GetIdAlumnos[0]->apellido_materno ?>">
                                          </div>
                                      </div>

                                      <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido">Carrera</label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select name="carrera" id="carrera" class="form-control" >
                                            <?php foreach ($TipoCarrerasList as $key): ?>
                                                <option <?php if($GetIdAlumnos[0]->carreras_id== $key->id) echo "selected" ?> value="<?php echo $key->id ?>"><?php echo $key->Nombre ?></option>

                                            <?php endforeach ?>
                                          </select>
                                          </div>
                                      </div>



                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                          <a href="<?php echo base_url('PracticasPro') ?>">  <button type="button" class="btn btn-primary">Cancelar</button></a>
                                            <button id="send" type="submit" class="btn btn-success">Guardar</button>
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


<?php
$this->load->view('footer');
?>


<!-- validator -->

<script src="<?php echo base_url() ?>vendors/validator/validator.js"></script>

<!-- /validator -->
