<?php
$this->load->view('header');
?>
<style>

		#external_filter_container_wrapper {
		  margin-bottom: 20px;
		}

		#external_filter_container {
		  display: inline-block;
		}

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
<div class="right_col noheigthwidt" role="main" >

    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
            <h2>Reporte Practicas Profesionales</h2>

            <div class="clearfix"></div>

        </div>
        <div class="x_content">

            <table id="datatable-responsive" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
                <thead>
                <tr id="filterrow">
                    <th>Alumno</th>
                    <th>Tipo Practica </th>
                    <th>Carrera</th>
										<th>Empresa / Despacho / Dependencia </th>
                    <th>Representante</th>
                    <th>Reg. CCPYA.E</th>
                    <th>Inicio</th>
                    <th>Termino</th>
										<th>Estatus</th>
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

    <!-- Datatables -->
    <script>
        $(document).ready(function() {

          var table = $('#datatable-responsive').DataTable({
                processing: true,
                scrollX: true,
                ordering: false,
                ajax: "<?php echo base_url('PracticasPro/ReportePracticasListJSON') ?>",
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
                aoColumns: [
                            { "data": "nombre" },
                            { "data": "tipo_practica"},
														{ "data": "carrera" },
														{	"data":	"lugar"},
													  { "data": "representante" },
                            { "data": "registroCP" },
                            { "data": "practica_inicio" },
                            { "data": "practica_fin" },
														{ "data": "estatus" },

                        ]


            });


            yadcf.init(table, [
						{column_number: 1,filter_type: "text"},
						{column_number: 2,filter_type: "select"},
						{column_number: 3,filter_type: "text"},
            {column_number: 6,filter_type: "range_date",date_format: "dd-mm-yyyy"},
            {column_number: 7,filter_type: "range_date",date_format: "dd-mm-yyyy"},
						{column_number: 8,filter_type: "select"}
            ]);


        });


    </script>
    <!-- /Datatables -->
