<?php
$this->load->view('header');
?>
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Alta Practica</h3>
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

                                <form class="form-horizontal form-label-left" novalidate action="<?php echo base_url() ?>giro/dataUpdate/<?php echo html_escape($GetIdGiros[0]->id) ?>" method="post" accept-charset="utf-8">
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Giro</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="name" class="form-control col-md-7 col-xs-12" name="nombre" type="text" value="<?php echo html_escape($GetIdGiros[0]->nombre) ?>">
                                        </div>
                                    </div>

                                    <hr/>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contact_name">Estatus
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control" name="status" >
                                                <option value="1" <?php if (html_escape($GetIdGiros[0]->status)==1) echo 'selected' ?>>Activado</option>
                                                <option value="2" <?php if (html_escape($GetIdGiros[0]->status)==2) echo 'selected' ?>>Desactivado</option>

                                            </select>
                                        </div>
                                    </div>


                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                          <a href="<?php echo base_url('Giro') ?>">  <button type="button" class="btn btn-primary">Cancelar</button></a>
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


<!-- validator -->

<script src="<?php echo base_url() ?>vendors/validator/validator.js"></script>

<!-- /validator -->
