<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>JaguarShop</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url() ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url() ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url() ?>vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Dropzone.js -->
    <link href="<?php echo base_url() ?>vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url() ?>assets/css/custom.min.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/css/jquery-ui.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                  <a href="<?php echo base_url('welcome/logout') ?>" class="site_title"><i class="fa fa-database" aria-hidden="true"></i></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">


                    <div class="profile_info">
                        <span>Bienvenido</span>
                        <h2><?php echo $this->name_session ; ?></h2>
                        <a href="<?php echo base_url('welcome/logout') ?>"><i class="fa fa-sign-out pull-right"></i>Salir</a>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
<?php if ($this->idtypeUser_session!=4){ ?>
                        <h3>General</h3>
                        <ul class="nav side-menu">
<?php }?>
<?php if ($this->idtypeUser_session==1){ ?>
                            <li><a href="<?php echo base_url() ?>user"><i class="fa fa-user-plus" aria-hidden="true"></i></i>Usuarios</span></a> </li>

                            <hr>
        <?php } ?>

<?php if ($this->idtypeUser_session==2 OR $this->idtypeUser_session==3 OR $this->idtypeUser_session==1  ){ ?>
                            <li><a href="<?php echo base_url() ?>pedidos"><i class="fa fa-book" aria-hidden="true"></i>Pedidos</span></a> </li>
                            <li><a href="<?php echo base_url() ?>estatus"><i class="fa fa-money" aria-hidden="true"></i>Asignar Anticipo</span></a> </li>
                             <li><a href="<?php echo base_url() ?>Pagos"><i class="fa fa-sellsy" aria-hidden="true"></i>Pagos</span></a> </li>
                            <hr>
                            <li><a href="<?php echo base_url() ?>clientes"><i class="fa fa-users" aria-hidden="true"></i>Clientes</span></a> </li>
                            <hr>
<?php if ($this->idtypeUser_session==3 OR $this->idtypeUser_session==1  ){ ?>                            
                            <li><a href="<?php echo base_url() ?>vendedores"><i class="fa fa-users" aria-hidden="true"></i>Vendedores</span></a> </li>
                            <hr>
                            <li><a href="<?php echo base_url() ?>inventarios"><i class="fa fa-book" aria-hidden="true"></i>Inventario</span></a> </li>

<?php } ?>

<?php if ( $this->idtypeUser_session==1 ){ ?>
                        <!--    <li><a href="<?php echo base_url() ?>Despacho"><i class="fa fa-briefcase" aria-hidden="true"></i></i>Despachos</span></a> </li>
                            <li><a href="<?php echo base_url() ?>Despacho/ContactosListDespachos"><i class="fa fa-users" aria-hidden="true"></i>Contacto Por Despacho</span></a> </li> -->
        <?php } ?>
                            
       <!--                     <li><a href="<?php echo base_url() ?>giro"><i class="fa fa-list-ul" aria-hidden="true"></i></i>Giros Empresa</span></a> </li>
                            <li><a href="<?php echo base_url() ?>sector"><i class="fa fa-caret-right" aria-hidden="true"></i></i>Sector</span></a> </li>
                            <li><a href="<?php echo base_url() ?>colonia"><i class="fa fa-map-marker" aria-hidden="true"></i></i>Colonias</span></a> </li>
-->
        <?php } ?> 


                        </ul>
                    </div>


                </div>
                <!-- /sidebar menu -->

            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>


                </nav>
            </div>
        </div>
        <!-- /top navigation -->
