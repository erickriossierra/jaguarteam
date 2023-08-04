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
                        <h3>Datos Pedido</h3>
                    </div>

                </div>
                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                              <h2>Datos de Pedido</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                      </ul>

                                <div class="clearfix"></div>

                            </div>
                            <div class="x_content">

                                <form class="form-horizontal form-label-left" novalidate action="<?php echo base_url() ?>pedidos/UpdatePedido/<?php echo html_escape($GetIdPedido[0]->id_ped) ?>" method="post" accept-charset="utf-8">



                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre Cliente
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input type="Nombre_cli" id="Nombre_cli" name="Nombre_cli" class="form-control col-md-7 col-xs-12" value="<?php echo $GetIdPedido[0]->Nombre_cli?>" disabled>
                                      <input type="hidden" id="Nombre_cli" name="Nombre_cli" class="form-control col-md-7 col-xs-12" value="<?php echo $GetIdPedido[0]->id_cli?>" disabled>
                                    </div>
                                  </div>
                                  <div class="item form-group">
                                    <label for="ropa" class="control-label col-md-3">Tipo playera:</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">  
                                      <select name="ropa" id="ropa" class="form-control" onchange="mostrarValor(this)" disabled>
                                        <?php foreach ($RopasList as $key): ?>
                                            <option  <?php if($GetIdPedido[0]->id_play==$key->id_play) echo 'selected'?> value="<?php echo $key->id_play ?>"> <?php echo $key->modelo ?></option>

                                        <?php endforeach ?>
                                      </select>
                                    
                                      <input type="cant" id="cant" name="cant" class="form-control col-md-7 col-xs-12" value="<?php echo $GetIdPedido[0]->Cantidad?>">
                                      <input type="hidden" id="id_play" name="id_play" class="form-control col-md-7 col-xs-12" value="<?php echo $GetIdPedido[0]->id_play?>" >
                                    </div>
                                  </div>

                                  <div class="item form-group">
                                    <label for="nombre_razon_social" class="control-label col-md-3">Tipo corte:</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">  
                                      <select name="corte" id="corte" class="form-control" onchange="mostrarValor(this)">
                                        <?php foreach ($CortesList as $key): ?>
                                            <option  <?php if($GetIdPedido[0]->id_tc==$key->id_sex) echo 'selected'?> value="<?php echo $key->id_sex ?>"> <?php echo $key->sexo ?></option>

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
                                          <option  <?php if($GetIdPedido[0]->id_color==$key->id_color) echo 'selected'?> value="<?php echo $key->id_color ?>"> <?php echo $key->Nombre_color ?></option>

                                      <?php endforeach ?>
                                    </select>

                                    </div>
                                  </div>
                                  
                                  <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipo_sector">Talla</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <select name="talla" id="talla" class="form-control" >
                                          
                                          <?php foreach ($TallasList as $key): ?>
                                              <option  <?php if($GetIdPedido[0]->id_talla==$key->id_talla) echo 'selected'?> value="<?php echo $key->id_talla ?>"> <?php echo $key->Medida ?></option>

                                          <?php endforeach ?>
                                        </select>
                                        
                                        </div>
                                    </div>
  <!--                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Estatus</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <select name="entidades_id" id="" class="form-control" >
                                      <?php foreach ($EstatusList as $key): ?>
                                          <option  <?php if($GetIdPedido[0]->id_est==$key->id_est) echo 'selected'?> value="<?php echo $key->id_est ?>"> <?php echo $key->tipo ?></option>

                                      <?php endforeach ?>
                                    </select>
                                    </div>
                                  </div> -->

                                  <div class="ln_solid"></div>
                                  <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
   <?php if ($this->idtypeUser_session ==4){ ?>

                                      <a href="<?php echo base_url('pedidos/addview_2') ?>"><button type="button" class="btn btn-primary">Pedir Más</button></a>
   <?php }else { ?>
                                      <a href="<?php echo base_url('pedidos') ?>"><button type="button" class="btn btn-primary">Cancelar</button></a>
  <?php } ?> 
  <?php if ($this->idtypeUser_session ==4){ ?>                                    
                                      <button id="send" type="submit" class="btn btn-success">Modificar</button>
  <?php }else { ?>                                        
                                      <button id="send" type="submit" class="btn btn-success">Guardar</button>
  <?php } ?>
                                    </div>
                                  </div>
                                </form>
  <div class="form-group">
    <div class="col-md-6">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Total Pago: </label>
      <input class="form-control col-md-7 col-xs-12"  type="text" disabled="false" value="<?php echo $GetIdPago[0]->total?>"></input>
      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Anticipo: </label>
      <input class="form-control col-md-7 col-xs-12"  type="text" disabled="false" value="<?php echo $GetIdPago[0]->ant?>"></input>
       <label class="control-label col-md-3 col-sm-3 col-xs-12" >Saldo: </label>
      <input class="form-control col-md-7 col-xs-12"  type="text" disabled="false" value="<?php echo $GetIdPago[0]->saldo?>"></input>
    </div>
  </div>    

                            </div>
                        </div>


                        <div class="x_panel">
                            <div class="x_title">
                              <h2>Datos de Contacto</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                      </ul>

                                <div class="clearfix"></div>

                            </div>
                            <div class="x_content">


                            <!--    <a  onclick="mContactoAgregar(<?php echo html_escape($GetIdPedido[0]->id_ped) ?>)"><button type="button" class="btn btn-success">Agregar Contacto</button></a> -->
                                <table id="datatable-responsive" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr id="filterrow">
                                      <th>Nombre</th>
                                      <th>Correo</th>
                                      <th>Telefono</th>
                                    <!--  <th>Carrera</th> -->
                                      <th>Editar</th>
                                    </tr>
                                    </thead>

                                </table>

                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
      <!--Empresa Modal Agregar-->
<div class="modal fade" id="mContanctoModal">
    <div class="modal-dialog">
        <div class="modal-content col-md-12 col-sm-12 col-xs-12">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2>Agregar Contacto</h2>
            </div> -->
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

             <!-- <div class="form-group " id="name">
                  <label for="name">Departamento</label>
                  <input id="mdepto" type="text" name="mdepto" class="optional form-control col-md-7 col-xs-12">
              </div> -->
              <input type="hidden" id="mid_cli" name="mid_cli">

          </div>

          <div class="modal-footer">
              <button type="button" class="btn btn-primary" onclick="AgregarContactoModal();">Guardar</button>
          </div>


              </div>
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
    $(document).ready(function() {

      var table = $('#datatable-responsive').DataTable({
            processing: true,
            stateSave: true,
            scrollX: true,
            ordering: false,
            ajax: "<?php echo base_url('pedidos/dataListContactoClienteJson') ?>/<?php echo html_escape($GetIdPedido[0]->id_ped) ?>",
            columns: [
                        { "data": "nombre_" },
                        { "data": "correo"},
                        { "data": "telefono"},
                      //  { "data": "carerra"},

                    ],
                    columnDefs: [ {
                                "targets": 3,
                                "data": "id",
                                "render": function ( data, type, full, meta ) {

                                  return data!="" ? '<a href="<?php echo base_url('clientes/editView/') ?>'+data+'">Ver</a>' : ' ';
                                     } //Necesito hacer apartado de clientes editar sus datos
                              } ]


        });
        setInterval( function () {table.ajax.reload();}, 30000 );

    });
</script>
<!--
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
//var depto = $('#mdepto').val();
var empresas_id = $('#midempresa').val();

/*if ( nameEmpresa == "") {
  alert("Favor de ingresa el nombre de la empresa");
return false;
}*/
$.post("<?php echo base_url('pedidos/dataInsertContactoEmpresaJson') ?>",{nombre:nombre,correo:correo,telefono:telefono,depto:depto,empresas_id:empresas_id},
    function( data ) {
        data = JSON.parse(data);
        //console.log(data.statusR);
        var status = data.statusR;
        if (status == true) {
            //se limpia el form
             $('#mnombre').val();
             $('#mcorreo').val();
             $('#mtelefono').val();
           //  $('#mdepto').val();
             $('#mid_cli').val();
             $('#mContanctoModal').modal('toggle');
            //$("form[name='FormRecord']").submit();
            //location.reload();
        }

    }

);

}

</script> 
-->