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
            <h2>Empresas</h2>

            <div class="clearfix"></div>
            <a href="<?php echo base_url() ?>empresa/addView"> <button type="button" class="btn btn-success">Agregar  Empresa</button></a>
        </div>
        <div class="x_content">

            <table id="datatable-responsive" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
                <thead>
                <tr id="filterrow">
                  <th>Nombre empresa</th>
                  <th>Clasificacion empresa</th>
                  <th>Giro</th>
                  <th>Calle</th>
                  <th>Num. inter</th>
                  <th>Num.exter</th>
                  <th>Cruzamientos</th>
                  <th>Colonia</th>
                  <th>Cp</th>
                  <th>Nombre comercial</th>
                  <th>Nombre razon_social</th>
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
                ajax: "<?php echo base_url('empresa/dataListJson') ?>",
                columns: [
                            { "data": "nombre_empresa" },
                            { "data": "clasificacion_empresa"},
                            { "data": "giroempresa"},
                            { "data": "calle" },
                            { "data": "num_inter" },
                            { "data": "num_exter" },
                            { "data": "cruzamiento" },
                            { "data": "colonia" },
                            { "data": "cp" },
                            { "data": "nombre_comercial" },
                            { "data": "nombre_razon_social" },

                        ],
                columnDefs: [ {
                            "targets": 11,
                            "name": "nombre_empresa",
                            "data": "id",
                            "render": function ( data, type, full, meta ) {
                              return '<a href="<?php echo base_url('empresa/editView/') ?>'+data+'">Ver</a>';
                                 }
                          } ]


            });


                        yadcf.init(table, [
                        {column_number: 1,filter_type: "multi_select",select_type: 'select2'},
                        {column_number: 2,filter_type: "multi_select",select_type: 'select2'},
                        {column_number: 0,filter_type: "text"},
                        {column_number: 9,filter_type: "text"},
                        {column_number: 10,filter_type: "text"}
                        ]);

        });
    </script>
    <!-- /Datatables -->
