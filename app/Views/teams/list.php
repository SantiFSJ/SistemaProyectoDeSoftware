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
                    <?php if (!empty($teams) && is_array($teams)) : ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Confederación</th>
                                    <th>Abreviatura FIFA</th>
                                    <th>Disciplina</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($teams as $team_item) : ?>
                                    <tr>
                                        <td><?= esc($team_item['name']) ?></td>
                                        <td><?= esc($team_item['confederation']) ?></td>
                                        <td><?= esc($team_item['fifa_abreviature']) ?></td>
                                        <td><?= esc($team_item['category']) ?></td>
                                        <?php if (!session()->username) { ?>
                                            <td>
                                                <a href="<?= base_url() . "/teams/edit/" . $team_item['id'] ?>" title="Modificar"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="<?= base_url('/teams/delete/' . $team_item['id']) ?>   " title="Eliminar"><i class="fa-solid fa-trash text-danger"></i></a>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <h3>No hay Equipos Cargados</h3>
                    <?php endif ?>
                </div>
            </div>
        </div>

    </div>

</body>

</html>