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
                        <h3>Dependencia</h3>
                    </div>

                </div>
                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                              <h2>Datos Dependencia</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                      </ul>

                                <div class="clearfix"></div>

                            </div>
                            <div class="x_content">

                                <form class="form-horizontal form-label-left" novalidate action="<?php echo base_url() ?>Dependencia/dataUpdate/<?php echo html_escape($GetIdDependencia[0]->iddep) ?>" method="post" accept-charset="utf-8">



                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre Institución
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input type="nombre_comercial" id="nombre" name="nombre" class="form-control col-md-7 col-xs-12" value="<?php echo $GetIdDependencia[0]->Nombre?>">
                                    </div>
                                  </div>
                                  
                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Dirección
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input type="text" id="calle" name="calle" class="form-control col-md-7 col-xs-12" placeholder="calle" value="<?php echo $GetIdDependencia[0]->Calle?>">
                                      <input type="text" id="num_inter" name="num_inter" class="form-control col-md-7 col-xs-12" placeholder="num exterior" value="<?php echo $GetIdDependencia[0]->numext?>">
                                      
                                      <input type="text" id="cruzamiento" name="cruzamiento" class="form-control col-md-7 col-xs-12" placeholder="cruzamientos" value="<?php echo $GetIdDependencia[0]->cruzamiento?>">
                                    </div>
                                  </div>
                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Colonia
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input id="colonia" class="form-control col-md-7 col-xs-12" name="colonia" type="text" value="<?php echo $GetIdDependencia[0]->colonia?>" required>
                                        <input type="hidden" name="idcolonia" id="idcolonia" value="<?php echo $GetIdDependencia[0]->colonia_id?>" required>
                                       </div>
                                  </div> 
                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Código Postal
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="cp" name="cp" class="form-control col-md-7 col-xs-12" value="<?php echo $GetIdDependencia[0]->CP?>" disabled="false">
                                    </div>
                                  </div>

                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Campus
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="campus" name="campus" class="form-control col-md-7 col-xs-12" value="<?php echo $GetIdDependencia[0]->campus?>" >
                                        <input type="hidden" name="campus_id" id="campus_id"  value="<?php echo $GetIdDependencia[0]->campus_id?>">
                                    </div>
                                  </div>

                               

                                  <div class="ln_solid"></div>
                                  <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                      <a href="<?php echo base_url('Dependencia') ?>"><button type="button" class="btn btn-primary">Cancelar</button></a>
                                      <button id="send" type="submit" class="btn btn-success">Guardar</button>
                                    </div>
                                  </div>
                                </form>

                            </div>
                        </div>


                   <!--     <div class="x_panel">
                            <div class="x_title">
                              <h2>Datos Contactos</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                      </ul>

                                <div class="clearfix"></div>

                            </div>
                            <div class="x_content">


                                <a  onclick="mContactoAgregar(<?php echo html_escape($GetIdDependencia[0]->id) ?>)"><button type="button" class="btn btn-success">Agregar Contacto</button></a>
                                <table id="datatable-responsive" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr id="filterrow">
                                      <th>Nombre</th>
                                      <th>Correo</th>
                                      <th>Telefono</th>
                                      <th>Depto.</th>
                                      <th>Editar</th>
                                    </tr>
                                    </thead>

                                </table>

                            </div>
                        </div> -->


                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

<!--
    </div>
</div>
-->


<!--Empresa Modal Agregar-->
<div class="modal fade" id="mContanctoModal">
    <div class="modal-dialog">
        <div class="modal-content col-md-12 col-sm-12 col-xs-12">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2>Agregar Contacto</h2>
            </div>
            <div class="modal-body form-horizontal form-label-left">

              <div class="form-group " id="name">
                  <label for="name">Nombre</label>
                  <input id="mnombre" type="text" name="mnombre" class="optional form-control col-md-7 col-xs-12">
              </div>

              <div class="form-group " id="name">
                  <label for="name">Correo</label>
                  <input id="mcorreo" type="text" name="mcorreo" class="optional form-control col-md-7 col-xs-12">
              </div>

              <div class="form-group " id="name">
                  <label for="name">Numero(s) de contacto</label>
                  <input id="mtelefono" type="text" name="mtelefono" class="optional form-control col-md-7 col-xs-12">
              </div>

              <div class="form-group " id="name">
                  <label for="name">Departamento</label>
                  <input id="mdepto" type="text" name="mdepto" class="optional form-control col-md-7 col-xs-12">
              </div>
              <input type="hidden" id="midempresa" name="midempresa">

          </div>

          <div class="modal-footer">
              <button type="button" class="btn btn-primary" onclick="AgregarContactoModal();">Guardar</button>
          </div>


              </div>
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
<script>
/*Agregar Empresa*/
var mContactoAgregar = function(id) {
 $('#mContanctoModal').modal('show');
 $('#midempresa').val(id);

}


var AgregarContactoModal = function() {
var nombre = $('#mnombre').val();
var correo = $('#mcorreo').val();
var telefono = $('#mtelefono').val();
var depto = $('#mdepto').val();
var empresas_id = $('#midempresa').val();

/*if ( nameEmpresa == "") {
  alert("Favor de ingresa el nombre de la empresa");
return false;
}*/
$.post("<?php echo base_url('empresa/dataInsertContactoEmpresaJson') ?>",{nombre:nombre,correo:correo,telefono:telefono,depto:depto,empresas_id:empresas_id},
    function( data ) {
        data = JSON.parse(data);
        //console.log(data.statusR);
        var status = data.statusR;
        if (status == true) {
            //se limpia el form
             $('#mnombre').val();
             $('#mcorreo').val();
             $('#mtelefono').val();
             $('#mdepto').val();
             $('#midempresa').val();
             $('#mContanctoModal').modal('toggle');
            //$("form[name='FormRecord']").submit();
            //location.reload();
        }

    }

);

}

</script>

<script>
    $(document).ready(function() {

      var table = $('#datatable-responsive').DataTable({
            processing: true,
            stateSave: true,
            scrollX: true,
            ordering: false,
            ajax: "<?php echo base_url('empresa/dataListContactoEmpresaJson') ?>/<?php echo html_escape($GetIdEmpresa[0]->idemp) ?>",
            columns: [
                        { "data": "nombre_" },
                        { "data": "correo"},
                        { "data": "telefono"},
                        { "data": "depto"},

                    ],
                    columnDefs: [ {
                                "targets": 4,
                                "data": "id",
                                "render": function ( data, type, full, meta ) {

                                  return data!="" ? '<a href="<?php echo base_url('empresa/editViewContactosEmpresa/') ?>'+data+'">Ver</a>' : ' ';
                                     }
                              } ]


        });
        setInterval( function () {table.ajax.reload();}, 10000 );

    });
</script>
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
              /* CAMPUS */
            $( "#campus" ).autocomplete({
                      minLength: 0,
                      source: '<?php echo base_url() ?>Dependencia/GetBuscarCampus',
                      select: function( event, ui ) {
                          $( "#campus" ).val( ui.item.nombre);
                          $( "#campus_id" ).val( ui.item.id );
                         
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