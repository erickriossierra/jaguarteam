<?php
$this->load->view('header');
?>
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Alta de clientes</h3>
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

                                <form class="form-horizontal form-label-left" novalidate action="<?php echo base_url() ?>clientes/datainsert" method="post" accept-charset="utf-8">



                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre Cliente
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input type="Nombre_cli" id="Nombre_cli" name="Nombre_cli" class="form-control col-md-7 col-xs-12" type="text" required>
                                     
                                    </div>
                                  </div>

                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Telefono
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input type="Telefono" id="Telefono" name="Telefono" class="form-control col-md-7 col-xs-12" type="text" required>
                                      
                                    </div>
                                  </div>

                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Correo
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input type="Correo" id="Correo" name="Correo" class="form-control col-md-7 col-xs-12" type="text" required>
                                     
                                    </div>
                                  </div>
                               
                                  <div class="item form-group">
                                    <label for="nombre_razon_social" class="control-label col-md-3">Sexo:</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">  
                                      <select name="sexo" id="sexo" class="form-control" >
                                        <?php foreach ($SexosList as $key): ?>
                                            <option value="<?php echo $key->id_sex ?>"> <?php echo $key->sexo ?></option>

                                        <?php endforeach ?>
                                      </select>
                                     
                                    </div>
                                  </div>

                                  <div class="item form-group">
                                    <label for="nombre_razon_social" class="control-label col-md-3">Escuela/Campus:</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">  
                                      <select name="escuela" id="escuela" class="form-control" >
                                        <?php foreach ($EscuelasList as $key): ?>
                                            <option value="<?php echo $key->id ?>"> <?php echo $key->nombre ?></option>

                                        <?php endforeach ?>
                                      </select>
                                    </div>
                                  </div>
                                                                
                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Carrera:
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <select name="Carrera" id="Carrera" class="form-control" >
                                      <?php foreach ($CarrerasList as $key): ?>
                                          <option value="<?php echo $key->id ?>"> <?php echo $key->Nombre ?></option>

                                      <?php endforeach ?>
                                    </select>

                                    </div>
                                  </div>
            

                                  <div class="ln_solid"></div>
                                  <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
  <?php if ($this->idtypeUser_session==4) { } else{ ?>
                                    <a href="<?php echo base_url('clientes') ?>"><button type="button" class="btn btn-primary">Cancelar</button></a>
  <?php } ?>
                                      <button id="send" type="submit" class="btn btn-success">Guardar</button>
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


<?php
$this->load->view('footer');
?>


<!-- validator -->

<script src="<?php echo base_url() ?>vendors/validator/validator.js"></script>
<script src="<?php echo base_url() ?>vendors/moment/min/moment.min.js"></script>
<!-- /validator -->
<!-- autocomplete -->
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


