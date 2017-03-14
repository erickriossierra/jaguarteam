<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistema Uady </title>

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
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                  <a href="index.html" class="site_title"><i class="fa fa-database" aria-hidden="true"></i></a>
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
                        <h3>General</h3>
                        <ul class="nav side-menu">

                            <?php if ($this->idtypeUser_session==1){ ?>
                            <li><a href="<?php echo base_url() ?>user"><i class="fa fa-user-plus" aria-hidden="true"></i></i>Usuarios</span></a> </li>
                            <li><a href="<?php echo base_url() ?>giro"><i class="fa fa-caret-right" aria-hidden="true"></i></i>Giros Empresa</span></a> </li>
                            <?php } ?>
                            <li><a href="<?php echo base_url() ?>contact"><i class="fa fa-users" aria-hidden="true"></i>Contactos</span></a> </li>
                            <li><a href="<?php echo base_url() ?>record"><i class="fa fa-folder" aria-hidden="true"></i>Fichas de Trabajos</span></a> </li>



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
