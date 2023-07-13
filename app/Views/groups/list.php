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
                    <?php if (session()->id_role != 2 and (isset(session()->id_role))) { ?>
                        <div class="buttons-header">
                            <a href="<?= base_url('/groups/create/'.$phaseId)  ?>" ><button type="button" class="btn btn-primary">Cargar grupo</button></a>
                        </div>
                    <?php } ?>
                    <?php if (!empty($groups) && is_array($groups)) : ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <?php if (session()->id_role != 2 and (isset(session()->id_role))) { ?>
                                        <th>Acciones</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($groups as $groups_item) : ?>
                                    <tr>
                                        <td><?= esc($groups_item['name']) ?></td>
                                        <?php if (session()->id_role != 2 and (isset(session()->id_role))) { ?>
                                            <td>
                                                <a href="<?= base_url('/groups/edit/' . $groups_item['id']) ?>" title="Modificar"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="<?= base_url('/groups/delete/' . $groups_item['id']) ?>" title="Eliminar"><i class="fa-solid fa-trash text-danger"></i></a>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <h3>No hay grupos cargados</h3>
                    <?php endif ?>
                </div>
            </div>
        </div>

    </div>

</body>

</html>