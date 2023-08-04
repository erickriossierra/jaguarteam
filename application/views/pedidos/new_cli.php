<?php
$this->load->view('header');
?>
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Alta de pedido</h3>
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

                                <form class="form-horizontal form-label-left" novalidate action="<?php echo base_url() ?>pedidos/datainsert_2" method="post" accept-charset="utf-8">
<div class="item form-group">
                  <h3>Si no eres un Cliente registrate <a href="<?php echo base_url() ?>clientes/addView">Aqui</a> </h3>
                                    <label class="">Después se debe realizar el pago y mandar captura al correo:
                                    </label>
</div>
                                

                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre Cliente
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input type="nombre_cli" id="nombre_cli" name="nombre_cli" class="form-control col-md-7 col-xs-12" type="text" required>
                                      <input type="hidden" name="id_cli" id="id_cli"  required>
                                    </div>
                                  </div>
                               
                                  <div class="item form-group">
                                    <label for="nombre_razon_social" class="control-label col-md-3">Tipo playera:</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">  
                                      <select name="ropa" id="ropa" class="form-control" onchange="mostrarValor(this)">
                                        <?php foreach ($RopasList as $key): ?>
                                            <option value="<?php echo $key->id_play ?>"> <?php echo $key->modelo ?></option>

                                        <?php endforeach ?>
                                      </select>
                                      <input type="cant" id="cant" name="cant" class="form-control col-md-7 col-xs-12" placeholder="Numero de playeras">
                                    </div>
                                  </div>

                                  <div class="item form-group">
                                    <label for="nombre_razon_social" class="control-label col-md-3">Tipo corte:</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">  
                                      <select name="corte" id="corte" class="form-control" onchange="mostrarValor(this)">
                                        <?php foreach ($CortesList as $key): ?>
                                            <option value="<?php echo $key->id_sex ?>"> <?php echo $key->sexo ?></option>

                                        <?php endforeach ?>
                                      </select>
                                    </div>
                                  </div>
                                                                
                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Color:
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <select name="color" id="color" class="form-control" >
                                      <?php foreach ($ColoresList as $key): ?>
                                          <option value="<?php echo $key->id_color ?>"> <?php echo $key->Nombre_color ?></option>

                                      <?php endforeach ?>
                                    </select>

                                    </div>
                                  </div>
                                  
                                  <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipo_sector">Talla</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <select name="talla" id="talla" class="form-control" >
                                          
                                          <?php foreach ($TallasList as $key): ?>
                                              <option  value="<?php echo $key->id_talla ?>"><?php echo $key->Medida ?></option>

                                          <?php endforeach ?>
                                        </select>
                                        
                                        </div>
                                    </div>

                              
                            <!--      <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Estado</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <select name="entidades_id" id="" class="form-control" >
                                      <?php foreach ($EstatusList as $key): ?>
                                          <option value="<?php echo $key->id_est ?>"> <?php echo $key->tipo ?></option>

                                      <?php endforeach ?>
                                    </select>
                                    </div>
                                  </div> -->

                                  <div class="ln_solid"></div>
                                  <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                    <a href="<?php echo base_url('pedidos/addView_2') ?>"><button type="button" class="btn btn-primary">Cancelar</button></a>
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

