<?php
$this->load->view('header');
?>
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Alta de vendedor</h3>
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

                                <form class="form-horizontal form-label-left" novalidate action="<?php echo base_url() ?>vendedores/datainsert" method="post" accept-charset="utf-8">

                               

                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre vendedor
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input type="nombre_ven" id="nombre_ven" name="nombre_ven" class="form-control col-md-7 col-xs-12" type="text" required>
                                      
                                    </div>
                                  </div>
                               
                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Telefono
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input type="telefono" id="telefono" name="telefono" class="form-control col-md-7 col-xs-12" placeholder="123456789">
                                    </div>
                                  </div>

                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Correo
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input type="correo" id="correo" name="correo" class="form-control col-md-7 col-xs-12" placeholder="eje@eje.com">
                                    </div>
                                  </div>

                                  <div class="item form-group">
                                    <label for="nombre_razon_social" class="control-label col-md-3">Sexo</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">  
                                      <select name="sexo" id="sexo" class="form-control" onchange="mostrarValor(this)">
                                        <?php foreach ($SexosList as $key): ?>
                                            <option value="<?php echo $key->id_sex ?>"> <?php echo $key->sexo ?></option>

                                        <?php endforeach ?>
                                      </select>
                                    </div>
                                  </div>
                                                                
                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Punto de venta
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <select name="punto" id="punto" class="form-control" >
                                      <?php foreach ($PuntoList as $key): ?>
                                          <option value="<?php echo $key->id ?>"> <?php echo $key->nombre?></option>

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


<?php
$this->load->view('footer');
?>


<!-- validator -->

<script src="<?php echo base_url() ?>vendors/validator/validator.js"></script>
<script src="<?php echo base_url() ?>vendors/moment/min/moment.min.js"></script>
<!-- /validator -->
<!-- autocomplete -->
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script >
     $(document).ready(function() {
              /* Cliente */
            $( "#nombre_cli" ).autocomplete({
                      minLength: 0,
                      source: '<?php echo base_url() ?>Pedidos/GetBuscarCli',
                      select: function( event, ui ) {
                          $( "#nombre_cli" ).val( ui.item.nombre);
                          $( "#id_cli" ).val( ui.item.id );
                                                  
                          return false;
                      }
                  })
                      .autocomplete( "instance" )._renderItem = function( ul, item ) {
                      return $( "<li>" )
                          .append( "<div>" + item.nombre + "</div>" )
                          .appendTo( ul );
                           };

     });
</script>


