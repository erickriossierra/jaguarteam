<?php
$this->load->view('header');
?>
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Contacto</h3>
                    </div>

                </div>
                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                <form class="form-horizontal form-label-left" novalidate action="<?php echo base_url() ?>empresa/dataUpdateContactoByEmpresa/<?php echo html_escape($ContactoByEmpresaList[0]->contactoid) ?>" method="post" accept-charset="utf-8">
                        <div class="x_panel">
                            <div class="x_title">
                              <h2>Datos Contactos</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                      </ul>

                                <div class="clearfix"></div>

                            </div>
                            <div class="x_content">




                                  <div class="modal-body form-horizontal form-label-left">

                                    <div class="form-group " id="name">
                                        <label for="name">Nombre</label>
                                        <input id="mnombre" type="text" name="mnombre" class="optional form-control col-md-7 col-xs-12" value="<?php echo html_escape($ContactoByEmpresaList[0]->nombre) ?>">
                                    </div>

                                    <div class="form-group " id="name">
                                        <label for="name">Correo</label>
                                        <input id="mcorreo" type="text" name="mcorreo" class="optional form-control col-md-7 col-xs-12" value="<?php echo html_escape($ContactoByEmpresaList[0]->correo) ?>">
                                    </div>

                                    <div class="form-group " id="name">
                                        <label for="name">Numero(s) de contacto</label>
                                        <input id="mtelefono" type="text" name="mtelefono" class="optional form-control col-md-7 col-xs-12" value="<?php echo html_escape($ContactoByEmpresaList[0]->telefono) ?>">
                                    </div>

                                    <div class="form-group " id="name">
                                        <label for="name">Departamento</label>
                                        <input id="mdepto" type="text" name="mdepto" class="optional form-control col-md-7 col-xs-12" value="<?php echo html_escape($ContactoByEmpresaList[0]->depto) ?>">
                                    </div>
                                    <input type="hidden" id="midempresa" name="midempresa" value="<?php echo html_escape($ContactoByEmpresaList[0]->id)?>">

                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>


                              </form>

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
