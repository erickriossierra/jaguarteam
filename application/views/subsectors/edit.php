
<?php
$this->load->view('header');
?>
<!-- Datatables -->
<link href="<?php echo base_url() ?>vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Sub sector</h3>
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

                                <form class="form-horizontal form-label-left" novalidate action="<?php echo base_url() ?>SubSector/dataInsert/{id}" method="post" accept-charset="utf-8">
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Sub sector</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="name" class="form-control col-md-7 col-xs-12" name="nombre" type="text">
                                        </div>
                                    </div>

                                    <hr/>



                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                          <a href="<?php echo base_url('SubSector') ?>">  <button type="button" class="btn btn-primary">Cancelar</button></a>
                                            <button id="send" type="submit" class="btn btn-success">Guardar</button>
                                        </div>
                                    </div>

                            </div>



                            <div class="x_content">

                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr id="filterrow">


                                        <th>Nombre del SubSector</th>


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
            ajax: "<?php echo base_url('SubSector/dataListJson') ?>/{id}",
            columns: [
                        
                        { "data": "nombre" },

                    ]


        });

        setInterval( function () {table.ajax.reload();}, 20000 );
    });
</script>
<!-- /Datatables -->

<!-- validator -->

<script src="<?php echo base_url() ?>vendors/validator/validator.js"></script>

<!-- /validator -->
