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
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido">Apellido Paterno</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="apellido_paterno" class="form-control col-md-7 col-xs-12" name="apellido_paterno" type="text">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido">Apellido Materno</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="apellido_materno" class="form-control col-md-7 col-xs-12" name="apellido_materno" type="text">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido">Carrera</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <select name="carrera" id="carrera" class="form-control" >
                                          <?php foreach ($TipoCarrerasList as $key): ?>
                                              <option  value="<?php echo $key->id ?>"><?php echo $key->Nombre ?></option>

                                          <?php endforeach ?>
                                        </select>
                                        </div>
                                    </div>

                                    <hr>
                                    <h2>Datos Practica</h2>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipo_practica">Tipo practica</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <select name="tipo_practica" id="tipo_practica" class="form-control" >
                                          <?php foreach ($TipoPracticasList as $key): ?>
                                              <option  value="<?php echo $key->id ?>"><?php echo $key->Nombre ?></option>

                                          <?php endforeach ?>
                                        </select>
                                        </div>
                                    </div>

                                    <h2>Datos Empresa</h2>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="empresa">Empresa</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="empresa" class="form-control col-md-7 col-xs-12 autocomplete" name="empresa" type="text">
                                            <input type="hidden" name="idEmpresa" id="idEmpresa">

                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <a onclick="mEmpresaAgregar()" style="cursor:pointer">  Agregar empresa si no existe</a>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="empresa">Representante</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="representante" class="form-control col-md-7 col-xs-12" name="representante" type="text">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="registrocp">Registro Colegio de Contadores</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="registrocp" class="form-control col-md-7 col-xs-12" name="registrocp" type="text">
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
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="constancia">Contrato</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="constancia" class="form-control col-md-7 col-xs-12" name="constancia" type="text">
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
                $( "#empresa" ).val( ui.item.nombre_empresa );
                $( "#idEmpresa" ).val( ui.item.id );
                return false;
            }
        })
            .autocomplete( "instance" )._renderItem = function( ul, item ) {
            return $( "<li>" )
            //.append( "<div>" + item.name + "<br>" + item.name + "</div>" )
                .append( "<div>" + item.nombre_empresa + "</div>" )
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
       $.post("<?php echo base_url('empresa/dataInsertJson') ?>",{nombre_empresa:nameEmpresa},
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
