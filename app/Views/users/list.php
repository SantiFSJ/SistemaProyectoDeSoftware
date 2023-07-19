<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />
    <link rel="stylesheet" href="<?= base_url('plugins/fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/myStyles.css'); ?>">
</head>

<body>
    <div class="background">
        <div class="container-fluid" style="border:none!important">
            <div class="card" style="border:none!important">
                <div class="card-header form-card-header">
                    <h3 class="card-title" style="color:white"><?= $title ?></h3>
                </div>
                <div class="card-body">
                    <?php if (!empty($users) && is_array($users)) : ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Usuario</th>
                                    <th>Contraseña</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user_item) : ?>
                                    <tr>
                                        <td><?= esc($user_item->username) ?></td>
                                        <td><?= esc($user_item->password) ?></td>
                                        <td>

                                            <a href="<?= base_url('/users/edit/' . $user_item->id) ?>" title="Modificar"><button type="button" class="btn btn-success btn-sm"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                            <a href="<?= base_url('/users/delete/' . $user_item->id) ?>" title="Eliminar"><button type="button" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash "></i></button></a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <h3>No hay Usuarios Cargados</h3>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>