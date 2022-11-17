<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/myStyles.css'); ?>">
</head>

<body>
    <div class="background">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header form-card-header">
                    <h3 class="card-title" style="color:white"><?= $title ?></h3>
                </div>
                <div class="card-body">
                    <form action="<?= base_url("users/save") ?>" method="post" name="Guardar">

                        <?= csrf_field() ?>
                        <div class="form-group">
                            <input type="hidden" name='id' value="<?= (isset($user[0]->id)) ? $user[0]->id : '' ?>">
                            <label for="username">Nombre de Usuario:</label>
                            <input required type="text" class="form-control form-control-border" name="username" id="username" placeholder="Ingresa un nombre de usuario" value="<?= (isset($user[0]->username)) ? $user[0]->username : '' ?>">
                            <label for="password">Contraseña:</label>
                            <input required type="password" class="form-control form-control-border" name="password" id="password" placeholder="Ingresa tu contraseña">
                            <label for=" password">Confirma su Contraseña:</label>
                            <input required type="password" class="form-control form-control-border" name="password-repeated" id="password-repeated" placeholder="Ingresa tu contraseña nuevamente">

                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

</body>

</html>