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
                        <h3>Datos Vendedor</h3>
                    </div>

                </div>
                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                              <h2>Datos del Vendedor</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                      </ul>

                                <div class="clearfix"></div>

                            </div>
                            <div class="x_content">

                                <form class="form-horizontal form-label-left" novalidate action="<?php echo base_url() ?>vendedores/UpdateVendedor/<?php echo html_escape($GetIdVen[0]->id_ven) ?>" method="post" accept-charset="utf-8">



                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre 
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input type="nombre_ven" id="nombre_ven" name="nombre_ven" class="form-control col-md-7 col-xs-12" value="<?php echo $GetIdVen[0]->nombre_ven?>">
                                    </div>
                                  </div>

                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Telefono 
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input type="telefono" id="telefono" name="telefono" class="form-control col-md-7 col-xs-12" value="<?php echo $GetIdVen[0]->telefono?>">
                                    </div>
                                  </div>

                                  <div class="item form-group">
                                    <label for="ropa" class="control-label col-md-3">Correo</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">  
                                      
                                      <input type="mcorreo" id="mcorreo" name="mcorreo" class="form-control col-md-7 col-xs-12" value="<?php echo $GetIdVen[0]->correo?>">
                                     
                                    </div>
                                  </div>
                                                                                                
                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Punto de venta
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <select name="carrera" id="carrera" class="form-control" >
                                      <?php foreach ($CarrerasList as $key): ?>
                                          <option  <?php if($GetIdVen[0]->id_carr==$key->id) echo 'selected'?> value="<?php echo $key->id ?>"> <?php echo $key->nombre ?></option>

                                      <?php endforeach ?>
                                    </select>

                                    </div>
                                  </div>                                                                

                                  <div class="ln_solid"></div>
                                  <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                      <a href="<?php echo base_url('vendedores') ?>"><button type="button" class="btn btn-primary">Cancelar</button></a>
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
