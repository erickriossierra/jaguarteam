<?php
$this->load->view('header');

?>

<link href="<?php echo base_url() ?>vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Alta Practicas Profesionales</h3>
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

                                <form class="form-horizontal form-label-left" novalidate action="<?php echo base_url() ?>PracticasPro/datainsert" method="post" accept-charset="utf-8">

                                    <h2>Datos del Alumno</h2>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombre</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="nombre" class="form-control col-md-7 col-xs-12" name="nombre" type="text">
                                            <input type="hidden" name="id_alumno" id="id_alumno">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido">Apellido Paterno</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="apellido_paterno" class="form-control col-md-7 col-xs-12" name="apellido_paterno" type="text" disabled="false" >
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido">Apellido Materno</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="apellido_materno" class="form-control col-md-7 col-xs-12" name="apellido_materno" type="text" disabled="false">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido">Carrera</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <select name="carrera" id="carrera" class="form-control" disabled="false">
                                          <?php foreach ($TipoCarrerasList as $key): ?>
                                              <option  value="<?php echo $key->id ?>"><?php echo $key->Nombre ?></option>

                                          <?php endforeach ?>
                                        </select>
                                        <input type="hidden" name="id_carrera" id="id_carrera">
                                        </div>
                                    </div>

                                    <hr>
                                    <h2>Datos Practica</h2>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipo_practica">Tipo practica</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <select name="tipo_practica" id="tipo_practica" class="form-control" >
                                          <option  value="0"></option>
                                          <?php foreach ($TipoPracticasList as $key): ?>
                                              <option  value="<?php echo $key->id ?>"><?php echo $key->Nombre ?></option>

                                          <?php endforeach ?>
                                        </select>
                                        </div>
                                    </div>

                                    <h2>Datos Empresa</h2>
                                    <div class="empresa">
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="empresa">Empresa</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="empresa" class="form-control col-md-7 col-xs-12" name="empresa" type="text">
                                            <input type="hidden" name="idEmpresa" id="idEmpresa">

                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                       
                                        </div>
                                    </div>
                                  </div>
                                  <div class="despacho">
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="empresa">Despacho</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="despacho" class="form-control col-md-7 col-xs-12" name="despacho" type="text">
                                            <input type="hidden" name="idDespacho" id="idDespacho">

                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="registrocp">Colegio de Profesionista al que pertence</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="registrocp" class="form-control col-md-7 col-xs-12" name="registrocp" type="text">
                                        </div>
                                    </div>
                                  </div>
                                  <div class="dependencia">
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="empresa">Dependencia</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="dependencia" class="form-control col-md-7 col-xs-12" name="dependencia" type="text">
                                            <input type="hidden" name="idDepedencia" id="idDepedencia">

                                        </div>
                                    </div>
                                    
                                  </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="empresa">Representante</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="representante" class="form-control col-md-7 col-xs-12" name="representante" type="text">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="empresa">Jefe directo</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="jefe" class="form-control col-md-7 col-xs-12" name="jefe" type="text">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="practica_inicio">Practica Inicio</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="practica_inicio" class="date-picker form-control col-md-7 col-xs-12" name="practica_inicio" type="text">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="practica_fin">Practica Fin</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="practica_fin" class="form-control col-md-7 col-xs-12" name="practica_fin" type="text">
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
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="info">Información</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="info" class="form-control col-md-7 col-xs-12" name="info" type="text">
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                          <a href="<?php echo base_url('Solicitudes/index/')?>">  <button type="button" class="btn btn-primary">Cancelar</button></a>
                                            <button id="send" type="submit" class="btn btn-success">Guardar</button>

                                            <a href="<?php echo base_url('Solicitudes/visualizar') ?>" target="_blank"><button class="btn btn-success" >Vizualizar</button></a>
                      
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
<script src="<?php echo base_url() ?>vendors/moment/min/moment.min.js"></script>
<script src="<?php echo base_url() ?>vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- autocomplete -->
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<script>
     $(document).ready(function() {

      /*Dependencia*/
       $( "#nombre" ).autocomplete({
            minLength: 0,
            source: '<?php echo base_url() ?>PracticasPro/BuscarAlumno',
            select: function( event, ui ) {

                $( "#nombre" ).val( ui.item.nombre);
                $( "#id_alumno" ).val( ui.item.id );
                $( "#apellido_paterno" ).val( ui.item.apellido_paterno);
                $( "#apellido_materno" ).val( ui.item.apellido_materno );
                $( "#carrera" ).val( ui.item.id_carrera );
                $( "#id_carrera" ).val( ui.item.id_carrera );
                return false;
            }
        })
            .autocomplete( "instance" )._renderItem = function( ul, item ) {
            return $( "<li>" )
                .append( "<div>" + item.nombre_cp + "</div>" )
                .appendTo( ul );
                 };

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


                 /*Despacho*/
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
              /*Dependencia*/
                 $( "#dependencia" ).autocomplete({
                      minLength: 0,
                      source: '<?php echo base_url() ?>PracticasPro/BuscarDependencia',
                      select: function( event, ui ) {
                          $( "#dependencia" ).val( ui.item.nombre);
                          $( "#idDepedencia" ).val( ui.item.id );
                        //  $("#registrocp").val( ui.item.colegio);
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

   <script>
   $(".empresa").hide();
   $(".despacho").hide();
   $(".dependencia").hide();
   $("#tipo_practica").change(function() {

   var tipo_practica = $(this).val();
  if (tipo_practica == "1") {
     $(".empresa").hide();
     $(".despacho").hide();
     $(".dependencia").show();
     $( "#idDespacho" ).val('');
     $("#registrocp").val('');
   }
   else if (tipo_practica == "2") {
     $(".empresa").hide();
     $(".despacho").show();
     $(".dependencia").hide();
     $( "#idEmpresa" ).val('');
   }
   if (tipo_practica == "3") {
      $(".empresa").show();
      $(".despacho").hide();
      $(".dependencia").hide();
      $( "#idDepedencia" ).val('');
    }

 });

   </script>
