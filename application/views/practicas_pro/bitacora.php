<?php
$this->load->view('header');

?>

<link href="<?php echo base_url() ?>vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
        <!-- page content -->
        <form class="form-horizontal form-label-left" novalidate action="<?php echo base_url() ?>PracticasPro/dataInsertBitacora/<?php echo html_escape($GetIdAlumnos[0]->id) ?>" method="post" accept-charset="utf-8">
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Bitácora</h3>
                    </div>

                </div>
                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Datos Alumnos</h2>
                                      <ul class="nav navbar-right panel_toolbox">
                                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                      </li>
                                        </ul>

                                  <div class="clearfix"></div>
                            </div>

                                  <div class="x_content">

                                  <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombre</label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input id="nombre" disabled class="form-control col-md-7 col-xs-12" name="nombre" type="text" value="<?php echo $GetIdAlumnos[0]->nombre ?>">
                                      </div>
                                  </div>

                                  <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido">Apellido Paterno</label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input id="apellido_paterno" disabled class="form-control col-md-7 col-xs-12" name="apellido_paterno" type="text" value="<?php echo $GetIdAlumnos[0]->apellido_paterno ?>">
                                      </div>
                                  </div>

                                  <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido">Apellido Materno</label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input id="apellido_materno"  disabled class="form-control col-md-7 col-xs-12" name="apellido_materno" type="text" value="<?php echo $GetIdAlumnos[0]->apellido_materno ?>">
                                      </div>
                                  </div>

                                  <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido">Carrera</label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="carrera" id="carrera" class="form-control" disabled >
                                        <?php foreach ($TipoCarrerasList as $key): ?>
                                            <option <?php if($GetIdAlumnos[0]->carreras_id== $key->id) echo "selected" ?> value="<?php echo $key->id ?>"><?php echo $key->Nombre ?></option>

                                        <?php endforeach ?>
                                      </select>
                                      </div>
                                  </div>
                                </div>
                              </div>

                              <!--Historial-->
                              <div class="x_panel">
                                  <div class="x_title">
                                      <h2>Historial</h2>
                                            <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                              </ul>

                                        <div class="clearfix"></div>
                                  </div>

                                        <div class="x_content">

                                          <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                              <thead>
                                              <tr id="filterrow">
                                                  <th>Empresa/Dependencia/Despacho</th>
                                                  <th>Tipo de Practica</th>
                                                  <th>Fecha Inicio</th>
                                                  <th>Fecha Fin</th>
                                                  <th>Estatus</th>
                                                  <th>Editar</th>
                                              </tr>
                                              </thead>
                                              <tbody>
                                                <?php foreach ($HistorialPracticasList as $row){ ?>
                                                <tr>

                                                    <td><?php 

                                                    if($row->nombre_comercial==NULL){
                                                       if ($row->empresasnombre==NULL){
                                                        $val=$row->dependencianombre;
                                                        echo (html_escape($val));
                                                           }else{
                                                            $val= $row->empresasnombre;
                                                           echo (html_escape($val));
                                                           }
                                                     }else {
                                                        $val= $row->nombre_comercial;
                                                       echo (html_escape($val)); }
                                                    ?></td>
                                                    <td><?php echo html_escape($row->tipo_practica)?></td>
                                                    <td><?php echo date_format_esp(html_escape($row->practica_inicio))?></td>
                                                    <td><?php echo date_format_esp(html_escape($row->practica_fin))?></td>

                                                    <td><?php echo html_escape($row->estatus)?></td>
                                                    <td><a href="<?php echo base_url('PracticasPro/editView/')?><?php echo html_escape($row->practicasid) ?>">Edit</a></td>

                                                </tr>
                                                <?php } ?>
                                              </tbody>
                                          </table>
                                      </div>
                                    </div>

                              <!--Practicas-->
                              <div class="x_panel">

                                  <div class="x_title">
                                      <h2>Añadir Practicas Profesional</h2>
                                            <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                            </ul>

                                        <div class="clearfix"></div>
                                  </div>

                                  <div class="x_content">
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
                                       <!--   <a onclick="mEmpresaAgregar()" style="cursor:pointer">  Agregar empresa si no existe</a>-->
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
                                          <a href="<?php echo base_url('PracticasPro') ?>">  <button type="button" class="btn btn-primary">Cancelar</button></a>
                                            <button id="send" type="submit" class="btn btn-success">Guardar</button>
                                        </div>
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

<!--Modales-->
 <!--Ver Historial-->
 <!--Ventana mAlarmsEditView-->

<div class="modal fade" id="mPracticaViewEdit">
    <div class="modal-dialog">
        <div class="modal-content col-md-12 col-sm-12 col-xs-12">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div>
            <div class="modal-body form-horizontal form-label-left">


                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipo_practica">Tipo practica</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input readonly="readonly" id="mtipo_practica" class="form-control col-md-7 col-xs-12" name="mtipo_practica" type="text">
                    </div>
                </div>


                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="empresa">Empresa</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input readonly="readonly" id="mempresa" class="form-control col-md-7 col-xs-12" name="mempresa" type="text">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="empresa">Representante</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input readonly="readonly" id="mrepresentante" class="form-control col-md-7 col-xs-12" name="mrepresentante" type="text">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="empresa">Jefe Directo</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input readonly="readonly" id="mjefe" class="form-control col-md-7 col-xs-12" name="mjefe" type="text">
                    </div>
                </div>
                <div class="item form-group">
                    <label class=" control-label col-md-3 col-sm-3 col-xs-12" for="registrocp">Registro Colegio de Contadores</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input readonly="readonly" id="mregistrocp" class="form-control col-md-7 col-xs-12" name="mregistrocp" type="text">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="practica_inicio">Practica Inicio</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input readonly="readonly" id="mpractica_inicio" class="date-picker form-control col-md-7 col-xs-12" name="mpractica_inicio" type="text">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="practica_fin">Practica Fin</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input readonly="readonly" id="mpractica_fin" class="form-control col-md-7 col-xs-12" name="mpractica_fin" type="text">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="constancia">Contrato</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input readonly="readonly" id="mconstancia" class="form-control col-md-7 col-xs-12" name="mconstancia" type="text">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="info">Información</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input readonly="readonly" id="minfo" class="form-control col-md-7 col-xs-12" name="minfo" type="text">
                    </div>
                </div>




              </div>



        </div>
    </div>
</div>


<!--Empresa Modal Agregar-->
<div class="modal fade" id="mEmpresaAgregarModal">
    <div class="modal-dialog">
        <div class="modal-content col-md-12 col-sm-12 col-xs-12">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2>Agregar Empresa</h2>
            </div>
            <div class="modal-body form-horizontal form-label-left">

              <div class="form-group " id="name">
                  <label for="name">Nombre Empresa</label>
                  <input id="nameEmpresa" type="text" name="nameEmpresa" class="optional form-control col-md-7 col-xs-12" required="required">
              </div>


          </div>

          <div class="modal-footer">
              <button type="button" class="btn btn-primary" onclick="AgregarEmpresaModal();">Guardar</button>
          </div>

              </div>
        </div>
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

   <!--Ver Historial-->
   <script>
     var mPracticaView = function(id) {
           $('#mPracticaViewEdit').modal('show');
           var id=id;
           console.log(id);
           $.post("<?php echo base_url('PracticasPro/HistorialPracticasJson') ?>",{ id:id},
               function( data ) {
                   data = JSON.parse(data);
                   //console.log(data[0].nombre_empresa);
                       $('#mempresa').val(data[0].nombre_comercial);
                       $('#mtipo_practica').val(data[0].tipo_practica);
                       $('#mrepresentante').val(data[0].representante);
                     //  $('#mjefe').val(data[0].jefe);
                       $('#mregistrocp').val(data[0].registroCP);
                       $('#mpractica_inicio').val(data[0].practica_inicio);
                       $('#mpractica_fin').val(data[0].practica_fin);
                       $('#mconstancia').val(data[0].constancia);
                       $('#minfo').val(data[0].info);

               }
           );
       }

       /*Agregar Empresa*/
       var mEmpresaAgregar = function() {
        $('#mEmpresaAgregarModal').modal('show');
    }


    var AgregarEmpresaModal = function() {
       var nameEmpresa = $('#nameEmpresa').val();

       if ( nameEmpresa == "") {
         alert("Favor de ingresa el nombre de la empresa");
      return false;
      }
       $.post("<?php echo base_url('empresa/dataInsertJson') ?>",{nombre_comercial:nameEmpresa},
           function( data ) {
               data = JSON.parse(data);
               //console.log(data.statusR);
               var status = data.statusR;
               if (status == true) {
                   //se limpia el form
                    $('#nameEmpresa').val('');
                    $('#mEmpresaAgregarModal').modal('toggle');
                   //$("form[name='FormRecord']").submit();
                   //location.reload();
               }

           }

       );

   }
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
