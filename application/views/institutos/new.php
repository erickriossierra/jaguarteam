<?php
$this->load->view('header');
?>
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Alta Instituto </h3>
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

                                <form id="multiplicar" class="form-horizontal form-label-left" novalidate action="<?php echo base_url() ?>Institutos/datainsert" method="post" accept-charset="utf-8">
                                   
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="nombre" class="form-control col-md-7 col-xs-12" name="nombre" type="text">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre común</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="nombre_comun" class="form-control col-md-7 col-xs-12" name="nombre_comun" type="text">
                                        </div>
                                    </div>

                                  <!--  <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Horas Asignatura</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="horas" class="form-control col-md-7 col-xs-12" name="horas" type="text">
                                        </div>
                                    </div> -->

                                   <!-- 
                                    <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido">Intitución</label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select name="instituto" id="instituto" class="form-control" >
                                            <?php foreach ($InstitutoList as $key): ?>
                                                <option <?php  echo "selected" ?> value="<?php echo $key->id ?>"><?php echo $key->nombre ?></option>

                                            <?php endforeach ?>
                                          </select>
                                          </div>
                                      </div>     -->

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                          <a href="<?php echo base_url('Institutos') ?>">  <button type="button" class="btn btn-primary">Cancelar</button></a>
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
