<?php
$this->load->view('header');
?>
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Alta Empresa</h3>
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

                                <form class="form-horizontal form-label-left" novalidate action="<?php echo base_url() ?>empresa/datainsert" method="post" accept-charset="utf-8">



                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre Empresa
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input id="nombre_empresa" class="form-control col-md-7 col-xs-12"  name="nombre_empresa" type="text">
                                    </div>
                                  </div>
                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Dirección
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input type="text" id="calle" name="calle" class="form-control col-md-7 col-xs-12" placeholder="calle">
                                      <input type="text" id="num_inter" name="num_inter" class="form-control col-md-7 col-xs-12" placeholder="num interior">
                                      <input type="text" id="num_exter" name="num_exter" class="form-control col-md-7 col-xs-12" placeholder="num exterior">
                                      <input type="text" id="cruzamiento" name="cruzamiento" class="form-control col-md-7 col-xs-12" placeholder="cruzamientos">
                                      <input type="text" id="colonia" name="colonia" class="form-control col-md-7 col-xs-12" placeholder="colonia">
                                    </div>
                                  </div>
                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Codigo Postal
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="CP" name="cp" class="form-control col-md-7 col-xs-12">
                                    </div>
                                  </div>
                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre Comercial
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input type="nombre_comercial" id="nombre_comercial" name="nombre_comercial" class="form-control col-md-7 col-xs-12">
                                    </div>
                                  </div>
                                  <div class="item form-group">
                                    <label for="nombre_razon_social" class="control-label col-md-3">Nombre Fiscal</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input id="nombre_razon_social" type="input" name="nombre_razon_social" class="form-control col-md-7 col-xs-12">
                                    </div>
                                  </div>
                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="giro">Giro</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <select name="giro_id" id="" class="form-control" >
                                      <?php foreach ($GirosList as $key): ?>
                                          <option value="<?php echo $key->id ?>"> <?php echo $key->nombre ?></option>

                                      <?php endforeach ?>
                                    </select>
                                    </div>
                                  </div>
                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Numero de empleados
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <select name="clasificacion_empresa_id" id="" class="form-control" >
                                      <?php foreach ($ClasificacionEmpresaList as $key): ?>
                                          <option value="<?php echo $key->id ?>"> <?php echo $key->clasificacion. " ".$key->numeros ?></option>

                                      <?php endforeach ?>
                                    </select>

                                    </div>
                                  </div>
                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Sector
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <select name="sector_id" id="" class="form-control" >
                                      <?php foreach ($SectorsList as $key): ?>
                                          <option value="<?php echo $key->id ?>"> <?php echo $key->nombre ?></option>

                                      <?php endforeach ?>
                                    </select>
                                    </div>
                                  </div>
                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Subsector
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <select name="subsector_id" id="" class="form-control" >
                                      <?php foreach ($SubSectorList as $key): ?>
                                          <option value="<?php echo $key->id ?>"> <?php echo $key->nombre ?></option>

                                      <?php endforeach ?>
                                    </select>
                                    </div>
                                  </div>

                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Estado</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <select name="entidades_id" id="" class="form-control" >
                                      <?php foreach ($EstadosList as $key): ?>
                                          <option value="<?php echo $key->id ?>"> <?php echo $key->nombre ?></option>

                                      <?php endforeach ?>
                                    </select>
                                    </div>
                                  </div>

                                  <div class="ln_solid"></div>
                                  <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                    <a href="<?php echo base_url('Empresa') ?>"><button type="button" class="btn btn-primary">Cancelar</button></a>
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

<!-- /validator -->
