<?php
$this->load->view('header');
?>
<style>
    .yadcf-filter-wrapper {
    float: left;
  }

	</style>

<!-- Datatables -->
<link href="<?php echo base_url() ?>vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<link href="<?php echo base_url() ?>vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>vendors/yadcf/jquery.dataTables.yadcf.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>vendors/yadcf/jquery-ui.1.9.0.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>vendors/yadcf/select2.css" rel="stylesheet" type="text/css" />
<div class="right_col noheigthwidt" role="main" >

    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
            <h2>Listado de pedidos</h2>

            <div class="clearfix"></div>
        <!--    <a href="<?php echo base_url() ?>pedidos/addView"> <button type="button" class="btn btn-success">Agregar  Pedido</button></a>
            
            <a href="<?php echo base_url() ?>clientes/addView"> <button type="button" class="btn btn-success">Agregar  Cliente</button></a>
-->
        </div>
        <div class="x_content">

            <table id="datatable-responsive" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
                <thead>
                <tr id="filterrow">
                  <th>Cliente</th>
                  <th>Ropa</th>
                  <th>Cantidad</th>
                  <th>Corte</th>
                  <th>Color</th>
                  <th>Talla</th>
                  <th>Fecha</th>
                  <th>Estatus</th>
                  <th>Ver</th>
                </tr>
                </thead>

            </table>

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
                ajax: "<?php echo base_url('estatus/dataListJsonEst') ?>",
                dom: "Bfrtip",
                buttons: [

                             {
                               extend: "csv",
                               className: "btn-sm"
                             },
                             {
                               extend: "excel",
                               className: "btn-sm"
                             },
                             

                           ],
                columns: [
                            { "data": "cliente" },
                            { "data": "ropa"},                            
                            { "data": "cantidad" },
                            { "data": "corte" },
                            { "data": "color" },
                            { "data": "talla" },
                            { "data": "fecha" },
                            { "data": "estatus" }


                        ],
               /* columnDefs: [ {
                            "targets": 7,
                            "data": "id" ,
                            "render": function ( data, type, full, meta ) {
                              return '<a href="<?php echo base_url('') ?>'+data+'">Cambiar</a>';
                                 }
                          } ],*/

                columnDefs: [ {
                            "targets": 8,
                            "data": "id",
                            "render": function ( data, type, full, meta ) {
                              return '<a href="<?php echo base_url('estatus/editViewEst/') ?>'+data+'">Ver</a>';
                                 }
                          } ]


            });


                        yadcf.init(table, [
                        {column_number: 0,filter_type: "text"},
                        {column_number: 1,filter_type: "multi_select",select_type: 'select2'},
                        {column_number: 3,filter_type: "multi_select",select_type: 'select2'},
                        {column_number: 4,filter_type: "multi_select",select_type: 'select2'},
                        {column_number: 5,filter_type: "multi_select",select_type: 'select2'},
                        {column_number: 7,filter_type: "multi_select",select_type: 'select2'}
                        ]);

        });
    </script>
    <!-- /Datatables -->
