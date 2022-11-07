<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/myStyles.css">

    <title>Document</title>
</head>

<body class="color-back">
    <div class="container-fluid" style="margin-top: 15px;">
        <div class="card">
            <div class="card-header" style="background-color:silver">
                <h3 class="title" style="color:black"><?= $title ?></h3>
            </div>
            <div class="card-body">
                <form action="<?= base_url("login/login") ?>" method="post" name="Guardar">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="username">Nombre de Usuario:</label>
                        <input required type="text" class="form-control form-control-border" name="username" id="username" placeholder="Ingresa tu usuario">
                        <label for="password">Contraseña:</label>
                        <input required type="password" class="form-control form-control-border" name="password" id="password" placeholder="Ingresa tu contraseña">
                        <a href="<?= base_url("") ?>">¿Olvidaste tu contraseña? Recuperala aquí</a>
                    </div>
                    <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                </form>
                <hr />
                <a href="<?= base_url("users/create") ?>">¿No tenes un usuario? Registrate aquí</a>
            </div>
        </div>
    </div>
</body>

</html>