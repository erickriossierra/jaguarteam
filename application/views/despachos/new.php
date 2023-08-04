<?php
$this->load->view('header');
?>
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Alta Despacho</h3>
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

                                <form class="form-horizontal form-label-left" novalidate action="<?php echo base_url() ?>Despacho/datainsert" method="post" accept-charset="utf-8">
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Despacho</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="name" class="form-control col-md-7 col-xs-12" name="nombre" type="text">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="colegio">Colegio de Profesionales al que pertenece</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="colegio" class="form-control col-md-7 col-xs-12" name="colegio" type="text">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Dirección
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input type="text" id="calle" name="calle" class="form-control col-md-7 col-xs-12" placeholder="calle">
                                      <input type="text" id="num_exter" name="num_exter" class="form-control col-md-7 col-xs-12" placeholder="num exterior">
                                      <input type="text" id="cruzamiento" name="cruzamiento" class="form-control col-md-7 col-xs-12" placeholder="cruzamientos">

                                    </div>
                                  </div>
                                   <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Colonia
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input id="colonia" class="form-control col-md-7 col-xs-12" name="colonia" type="text" required>
                                        <input type="hidden" name="idcolonia" id="idcolonia"  required>
                                       </div>
                                  </div> 
                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Código Postal
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="cp" name="cp" class="form-control col-md-7 col-xs-12" disabled="false">
                                    </div>
                                  </div>

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                          <a href="<?php echo base_url('Despacho') ?>">  <button type="button" class="btn btn-primary">Cancelar</button></a>
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
<!-- autocomplete -->
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script >
     $(document).ready(function() {
              /* Colonia */
            $( "#colonia" ).autocomplete({
                      minLength: 0,
                      source: '<?php echo base_url() ?>Despacho/GetBuscarColonia',
                      select: function( event, ui ) {
                          $( "#colonia" ).val( ui.item.nombre);
                          $( "#idcolonia" ).val( ui.item.id );
                         
                          $("#cp").val( ui.item.cp);
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
