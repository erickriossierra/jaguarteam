<?php
$this->load->view('header');
?>
<!-- Datatables -->
<link href="<?php echo base_url() ?>vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<link href="<?php echo base_url() ?>vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>vendors/yadcf/jquery.dataTables.yadcf.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>vendors/yadcf/jquery-ui.1.9.0.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>vendors/yadcf/select2.css" rel="stylesheet" type="text/css" />
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Asignar Inventario</h3>
                    </div>

                </div>
                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                              <h2>Datos de Inventario</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                      </ul>

                                <div class="clearfix"></div>

                            </div>
                            <div class="x_content">

                                <form class="form-horizontal form-label-left" novalidate action="<?php echo base_url() ?>Inventarios/UpdateInv/<?php echo html_escape($GetIdPedido[0]->id_inv) ?>" method="post" accept-charset="utf-8">



                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                     <input type="text" id="" name="" class="form-control col-md-7 col-xs-12" value="<?php echo $GetIdPedido[0]->modelo?>" disabled>
                                      <input type="hidden" id="ropa" name="ropa" class="form-control col-md-7 col-xs-12" value="<?php echo $GetIdPedido[0]->id_tipo?>" >
                                    </div>
                                  </div>

                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Corte
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input type="text" id="" name="" class="form-control col-md-7 col-xs-12" value="<?php echo $GetIdPedido[0]->sexo?>" disabled>
                                      <input type="hidden" id="corte" name="corte" class="form-control col-md-7 col-xs-12" value="<?php echo $GetIdPedido[0]->id_tc?>" >
                                    </div>
                                  </div>

                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Color
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input type="text" id="" name="" class="form-control col-md-7 col-xs-12" value="<?php echo $GetIdPedido[0]->Nombre_color?>" disabled>
                                      <input type="hidden" id="color" name="color" class="form-control col-md-7 col-xs-12" value="<?php echo $GetIdPedido[0]->id_color?>" >
                                    </div>
                                  </div>

                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Talla
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input type="text" id="" name="" class="form-control col-md-7 col-xs-12" value="<?php echo $GetIdPedido[0]->Medida?>" disabled>
                                      <input type="hidden" id="talla" name="talla" class="form-control col-md-7 col-xs-12" value="<?php echo $GetIdPedido[0]->id_talla?>" >
                                    </div>
                                  </div>

                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Exitencia de mercancia
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input type="text" id="" name="" class="form-control col-md-7 col-xs-12" value="<?php echo $GetIdPedido[0]->cantidad?>" disabled>
                                      <input type="hidden" id="stock" name="stock" class="form-control col-md-7 col-xs-12" value="<?php echo $GetIdPedido[0]->cantidad?>" >
                                    </div>
                                  </div>

                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Cantidad para añadir
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input type="cant" id="cant" name="cant" class="form-control col-md-7 col-xs-12" >
                                     
                                    </div>
                                  </div>

        <!--                          <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Estatus</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <select name="id_est" id="id_est" class="form-control" >
                                      <?php foreach ($EstatusList as $key): ?>
                                          <option  <?php if($GetIdPedido[0]->id_est==$key->id_est) echo 'selected'?> value="<?php echo $key->id_est ?>"> <?php echo $key->tipo ?></option>

                                      <?php endforeach ?>
                                    </select>
                                    </div>
                                  </div>  -->

                                  <div class="ln_solid"></div>
                                  <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                      <a href="<?php echo base_url('inventarios') ?>"><button type="button" class="btn btn-primary">Cancelar</button></a>
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
</div>





<?php
$this->load->view('footer');
?>


<!-- Datatables -->
  <script src="<?php echo base_url() ?>vendors/yadcf/jquery-ui.js"></script>
  <script src="<?php echo base_url() ?>vendors/yadcf/select2.js"></script>
<script src="<?php echo base_url() ?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url() ?>vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url() ?>vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?php echo base_url() ?>vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?php echo base_url() ?>vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?php echo base_url() ?>vendors/yadcf/jquery.dataTables.yadcf.js"></script>

<script src="<?php echo base_url() ?>vendors/jszip/dist/jszip.min.js"></script>
<script src="<?php echo base_url() ?>vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>vendors/pdfmake/build/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>vendors/moment/min/moment.min.js"></script>
<script src="<?php echo base_url() ?>vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- autocomplete -->
