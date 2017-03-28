<?php
$this->load->view('header');
?>
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Editar Practica</h3>
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

                                <form class="form-horizontal form-label-left" novalidate action="<?php echo base_url() ?>PracticasPro/dataUpdate/<?php echo html_escape($GetIdPracticas[0]->practicasid) ?>" method="post" accept-charset="utf-8">
                                  <h2> Datos Practica</h2>
                                  <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipo_practica">Tipo practica</label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="tipo_practica" id="tipo_practica" class="form-control" >
                                        <?php foreach ($TipoPracticasList as $key): ?>
                                            <option <?php if (html_escape($GetIdPracticas[0]->tipo_practica_id)==  $key->id )echo 'selected';?>  value="<?php echo $key->id ?>"><?php echo $key->Nombre ?></option>

                                        <?php endforeach ?>
                                      </select>
                                      </div>
                                  </div>

                                  <h2>Datos Empresa</h2>
                                 <div class="empresa">
                                  <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="empresa">Empresa</label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input id="empresa" class="form-control col-md-7 col-xs-12 autocomplete" name="empresa" type="text"  value="<?php echo html_escape($GetIdPracticas[0]->nombre_comercial) ?>">
                                          <input type="hidden" name="idEmpresa" id="idEmpresa" value="<?php echo html_escape($GetIdPracticas[0]->empresasid) ?>" >
                                      </div>
                                  </div>

                                </div>
                                <div class="despacho">
                                  <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="empresa">Despacho</label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input id="despacho" class="form-control col-md-7 col-xs-12" name="despacho" type="text" value="<?php echo html_escape($GetIdPracticas[0]->empresasnombre) ?>" >
                                          <input type="hidden" name="idDespacho" id="idDespacho" value="<?php echo html_escape($GetIdPracticas[0]->despachosid) ?>" >

                                      </div>
                                  </div>
                                  <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="registrocp">Colegio de Profesionista al que pertence</label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input id="registrocp" class="form-control col-md-7 col-xs-12" name="registrocp" type="text" value="<?php echo html_escape($GetIdPracticas[0]->colegio) ?>" >
                                      </div>
                                  </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="empresa">Representante</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="representante" class="form-control col-md-7 col-xs-12" name="representante" type="text" value="<?php echo html_escape($GetIdPracticas[0]->representante) ?>">
                                    </div>
                                </div>
                                  <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="practica_inicio">Practica Inicio</label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input id="practica_inicio" class="date-picker form-control col-md-7 col-xs-12" name="practica_inicio" type="text" value="<?php echo date_format_esp(html_escape($GetIdPracticas[0]->practica_inicio)) ?>">
                                      </div>
                                  </div>
                                  <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="practica_fin">Practica Fin</label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input id="practica_fin" class="form-control col-md-7 col-xs-12" name="practica_fin" type="text" value="<?php echo date_format_esp(html_escape($GetIdPracticas[0]->practica_fin) )?>">
                                      </div>
                                  </div>
                                  <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="practica_fin">Apoyo Económico</label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="apoyo_economico" id="apoyo_economico" class="form-control" >
                                        <option  value="1">Si</option>
                                        <option  value="0">No</option>

                                      </select>
                                      </div>
                                  </div>
                                  <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="constancia">Contrato</label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="estatus_id" id="estatus_id" class="form-control" >
                                        <?php foreach ($EstatusPracticasList as $key): ?>
                                            <option <?php if (html_escape($GetIdPracticas[0]->estatus_id)==  $key->id )echo 'selected';?>  value="<?php echo $key->id ?>"><?php echo $key->estatus ?></option>

                                        <?php endforeach ?>
                                      </select>
                                      </div>
                                  </div>
                                  <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="info">Información</label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input id="info" class="form-control col-md-7 col-xs-12" name="info" type="text" value="<?php echo html_escape($GetIdPracticas[0]->info) ?>">
                                      </div>
                                  </div>

                                  <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                          <a href="<?php echo $_SERVER['HTTP_REFERER']?>">  <button type="button" class="btn btn-primary">Cancelar</button></a>
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
<script src="<?php echo base_url() ?>vendors/moment/min/moment.min.js"></script>
<script src="<?php echo base_url() ?>vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- autocomplete -->
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
     $(document).ready(function() {

       /*Empresa*/
       $( "#empresa" ).autocomplete({
            minLength: 0,
            source: '<?php echo base_url() ?>PracticasPro/BuscarEmpresa',
            select: function( event, ui ) {
                $( "#empresa" ).val( ui.item.nombre_comercial );
                $( "#idEmpresa" ).val( ui.item.id );
                return false;
            }
        })
            .autocomplete( "instance" )._renderItem = function( ul, item ) {
            return $( "<li>" )
            //.append( "<div>" + item.name + "<br>" + item.name + "</div>" )
                .append( "<div>" + item.nombre_comercial + "</div>" )
                .appendTo( ul );
                 };


                 /*Empresa*/
                 $( "#despacho" ).autocomplete({
                      minLength: 0,
                      source: '<?php echo base_url() ?>PracticasPro/BuscarDespacho',
                      select: function( event, ui ) {
                          $( "#despacho" ).val( ui.item.nombre);
                          $( "#idDespacho" ).val( ui.item.id );
                          $("#registrocp").val( ui.item.colegio);
                          return false;
                      }
                  })
                      .autocomplete( "instance" )._renderItem = function( ul, item ) {
                      return $( "<li>" )
                      //.append( "<div>" + item.name + "<br>" + item.name + "</div>" )
                          .append( "<div>" + item.nombre + "</div>" )
                          .appendTo( ul );
                           };

        /*Habilitar Registro*/

       $('#practica_inicio').daterangepicker({
        locale: {
        format: 'DD-MM-YYYY'
        },
        showDropdowns: true,
        singleDatePicker: true,
       });

       $('#practica_fin').daterangepicker({
         locale: {
         format: 'DD-MM-YYYY'
         },
         showDropdowns: true,
         singleDatePicker: true,
       });

     });
   </script>
<!-- /validator -->
<script>
$(".empresa").hide();
$(".despacho").hide();
$("#tipo_practica").change(function() {

var tipo_practica = $(this).val();
if (tipo_practica == "1") {
  $(".empresa").show();
  $(".despacho").hide();
  $( "#idDespacho" ).val('');
  $("#registrocp").val('');
  $( "#empresa" ).val('');
}
else if (tipo_practica == "2") {
  $(".empresa").hide();
  $(".despacho").show();
  $( "#idEmpresa" ).val('');
    $("#despacho" ).val('');

}
if (tipo_practica == "3") {
   $(".empresa").show();
   $(".despacho").hide();
   $( "#idDespacho" ).val('');
   $("#registrocp").val('');
   $( "#empresa" ).val('');
 }

});



var tipo_practica_inicio = '<?php echo html_escape($GetIdPracticas[0]->tipo_practica_id )?>';
console.log(tipo_practica_inicio);
if (tipo_practica_inicio == "1") {
  $(".empresa").show();
  $(".despacho").hide();

}
else if (tipo_practica_inicio == "2") {
  $(".empresa").hide();
  $(".despacho").show();

}
if (tipo_practica_inicio == "3") {
   $(".empresa").show();
   $(".despacho").hide();

 }

</script>
