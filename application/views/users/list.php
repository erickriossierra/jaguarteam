<?php
$this->load->view('header');
?>

    <!-- Datatables -->
<link href="<?php echo base_url() ?>vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
   <link href="<?php echo base_url() ?>vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">

<div class="right_col" role="main">

    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
            <h2>Tabla de Usuarios</h2>

            <div class="clearfix"></div>
            <a href="<?php echo base_url() ?>user/addView"> <button type="button" class="btn btn-success">Agregar Usuario</button></a>
        </div>
        <div class="x_content">

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>A. Paterno</th>
                    <th>A. Materno</th>
                    <th>Usuario</th>
                    <th>Tipo Usuario</th>
                    <th>Estado</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($UserList as $row=>$Userlist){ ?>
                <tr>
                    <td><a href="<?php echo base_url() ?>user/editView/<?php echo html_escape($Userlist->id) ?>"><?php echo html_escape($Userlist->nombre) ?></a></td>
                    <td><?php echo html_escape($Userlist->apellido_p)?></td>
                    <td><?php echo html_escape($Userlist->apellido_m)?></td>
                    <td><?php echo html_escape($Userlist->usuario)?></td>
                    <td><?php echo html_escape($Userlist->tipo_usuario_id)?></td>
                    <td><?php echo html_escape($Userlist->status) =='1' ? '<button type="button" class="btn btn-primary">Activo</button>' : '<button type="button" class="btn btn-warning">Desactivado</button>'?></td>


                </tr>
                <?php } ?>
                </tbody>
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



            $('#datatable-responsive').DataTable();

            $('#datatable-scroller').DataTable({
                ajax: "js/datatables/json/scroller-demo.json",
                deferRender: true,
                scrollY: 380,
                scrollCollapse: true,
                scroller: true
            });
        });
    </script>
    <!-- /Datatables -->
