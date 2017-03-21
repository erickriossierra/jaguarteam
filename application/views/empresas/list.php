<?php
$this->load->view('header');
?>

    <!-- Datatables -->
<link href="<?php echo base_url() ?>vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
   <link href="<?php echo base_url() ?>vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">

<div class="right_col noheigthwidt" role="main" >

    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
            <h2>Empresas</h2>

            <div class="clearfix"></div>
            <a href="<?php echo base_url() ?>empresa/addView"> <button type="button" class="btn btn-success">Agregar  Empresa</button></a>
        </div>
        <div class="x_content">

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr id="filterrow">
                    <th>Id</th>
                    <th>Giro</th>
                    <th>Estatus</th>
                    <th>Editar</th>


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

    <script src="<?php echo base_url() ?>vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?php echo base_url() ?>vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url() ?>vendors/pdfmake/build/vfs_fonts.js"></script>
    <!-- Datatables -->
    <script>
        $(document).ready(function() {

          /* Setup - add a text input to each footer cell
  $('#datatable-responsive thead tr#filterrow th').each( function () {
      var title = $('#datatable-responsive thead th').eq( $(this).index() ).text();
      $(this).html( '<input type="text" onclick="stopPropagation(event);" placeholder="Search '+title+'" />' );
  } );
  // Apply the filter
    $("#datatable-responsive thead input").on( 'keyup change', function () {
        table
            .column( $(this).parent().index()+':visible' )
            .search( this.value )
            .draw();
    } );
            */

          var table = $('#datatable-responsive').DataTable({
                processing: true,
                ordering: false,
                ajax: "<?php echo base_url('giro/dataListJson') ?>",
                columns: [
                            { "data": "id" },
                            { "data": "nombre" },

                        ],
                columnDefs: [ {
                           "targets": 2,
                           "data": "status",
                           "render": function ( data, type, full, meta ) {
                             return data== 1 ? '<button type="button" class="btn btn-primary">Activo</button>' : '<button type="button" class="btn btn-warning">Desactivado</button>';
                                }
                         },{
                            "targets": 3,
                            "data": "id",
                            "render": function ( data, type, full, meta ) {
                              return '<a href="<?php echo base_url('giro/editView/') ?>'+data+'">Editar</a>';
                                 }
                          } ]


            });

            setInterval( function () {table.ajax.reload();}, 20000 );
        });
    </script>
    <!-- /Datatables -->
