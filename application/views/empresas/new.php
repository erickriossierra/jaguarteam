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
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre Comercial
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input type="nombre_comercial" id="nombre_comercial" name="nombre_comercial" class="form-control col-md-7 col-xs-12">
                                    </div>
                                  </div>
                                  <div class="item form-group">
                                    <label for="nombre_razon_social" class="control-label col-md-3">Razón Social</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input id="nombre_razon_social" type="input" name="nombre_razon_social" class="form-control col-md-7 col-xs-12">
                                       <select name="giro_id" id="giro_id" class="form-control" onchange="mostrarValor(this)">
                                      <?php foreach ($GirosList as $key): ?>
                                          <option value="<?php echo $key->id ?>"> <?php echo $key->nombre ?></option>

                                      <?php endforeach ?>
                                    </select>
                                     <input id="giro" type="hidden" name="giro" class="form-control col-md-7 col-xs-12">
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
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipo_sector">Tipo Sector</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <select name="tipo_sector" id="tipo_sector" class="form-control" >
                                          <option  value="0"></option>
                                          <?php foreach ($SectorsList as $key): ?>
                                              <option  value="<?php echo $key->id ?>"><?php echo $key->nombre ?></option>

                                          <?php endforeach ?>
                                        </select>
                                        
                                        </div>
                                    </div>
                                    <div class="sub_terciario">
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sub_terciario">Sub Sector Terciario</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="sub_terciario" id="sub_terciario" class="form-control" >
                                      <?php foreach ($SubSectorList3 as $key): ?>
                                          <option value="<?php echo $key->id ?>"> <?php echo $key->nombre ?></option>

                                      <?php endforeach ?>
                                    </select>

                                        </div>
                                    </div>
                                  </div>
                                  <div class="sub_secundario">
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sub_secundario">Sub Sector Secundario</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="sub_secundario" id="sub_secundario" class="form-control" >
                                      <?php foreach ($SubSectorList2 as $key): ?>
                                          <option value="<?php echo $key->id ?>"> <?php echo $key->nombre ?></option>

                                      <?php endforeach ?>
                                    </select>

                                        </div>
                                    </div>
                                  </div>
                                  <div class="sub_primario">
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sub_primario">Sub Sectores Primario</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="sub_primario" id="sub_primario" class="form-control" >
                                      <?php foreach ($SubSectorList as $key): ?>
                                          <option value="<?php echo $key->id ?>"> <?php echo $key->nombre ?></option>

                                      <?php endforeach ?>
                                    </select>
                                        </div>
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
<script src="<?php echo base_url() ?>vendors/moment/min/moment.min.js"></script>
<!-- /validator -->
<!-- autocomplete -->
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script >
     $(document).ready(function() {
              /* Colonia */
            $( "#colonia" ).autocomplete({
                      minLength: 0,
                      source: '<?php echo base_url() ?>Empresa/GetBuscarColonia',
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
<script>

 var mostrarValor = function(x){
$( "#giro" ).val(x.options[x.selectedIndex].text);
 // alert("El valor: "+x.value+" y el texto: "+x.options[x.selectedIndex].text);

}    
 </script>
 <script>
   $(".sub_terciario").hide();
   $(".sub_secundario").hide();
   $(".sub_primario").hide();
   $("#tipo_sector").change(function() {

   var tipo_sector = $(this).val();
  if (tipo_sector=="1"){
    $(".sub_terciario").hide();
    $(".sub_secundario").hide();
    $(".sub_primario").hide();
  }
   else if (tipo_sector == "2") {
     $(".sub_terciario").hide();
     $(".sub_secundario").hide();
     $(".sub_primario").show();
     $(".sub_primario").show();
     $( "#idSubSec" ).val('');
   }
   else if (tipo_sector == "3") {
     $(".sub_terciario").hide();
     $(".sub_secundario").show();
     $(".sub_primario").hide();
     $( "#idSubSec" ).val('');
   }
   if (tipo_sector == "4") {
      $(".sub_terciario").show();
      $(".sub_secundario").hide();
      $(".sub_primario").hide();
      $( "#idSubSec" ).val('');
    }

 });

   </script>