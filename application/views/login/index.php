<!DOCTYPE html PUBLIC "-//W3C//DTD html 4.01 Transitional//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Login CRM </title>

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/login.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.css">

</head>
<body>

<form action="<?php echo base_url('Welcome/validate') ?>" method="POST" role="form" id="slick-login">

    <img src="<?php echo base_url() ?>/assets/images/uady-logo.png" width="200">
    <div class="form-group">
        <label for="">Usuario</label>
        <input type="text" name="usuario" class="form-control" id="" placeholder="">
    </div>

    <div class="form-group">
        <label for="">Password</label>
        <input type="password" name="password" class="form-control" id="" placeholder="">
    </div>

    <?php if ($tipomsg == 1): ?>
        <div class="alert alert-danger" role="alert"><?php echo $msg; ?></div>
    <?php endif ?>


    <button type="submit" class="btn btn-primary">Aceptar</button>
</form>

</body>
