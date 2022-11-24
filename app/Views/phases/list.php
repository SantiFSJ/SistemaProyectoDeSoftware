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
                    <?php if (!empty($phases) && is_array($phases)) : ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Cantidad de Partidos</th>
                                    <th>Cantidad de Equipos</th>
                                    <th>Fecha de Inicio</th>
                                    <th>Fecha de Finalización</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($phases as $phase_item) : ?>
                                    <tr>
                                        <td><?= esc($phase_item['name']) ?></td>
                                        <td><?= esc($phase_item['match_amount']) ?></td>
                                        <td><?= esc($phase_item['team_amount']) ?></td>
                                        <td><?= esc($phase_item['start_date']) ?></td>
                                        <td><?= esc($phase_item['end_date']) ?></td>
                                        <td>
                                            <?php if ((isset(session()->id_role))) { ?>
                                                <a href="<?= base_url('/bets/create/' . $phase_item['id']) ?>" title="Realizar Apuesta">Apuesta</a>
                                            <?php } ?>
                                            <a href="<?= base_url('/groups/list/' . $phase_item['id']) ?>" title="Grupos de esta Fase"><i class="fa-sharp fa-solid fa-list"></i></a>
                                            <?php if (session()->id_role != 2 and (isset(session()->id_role))) { ?>
                                                <a href="<?= base_url('/matchs/create/' . $phase_item['id']) ?>" title="Agregar Partido"><i class="fa-sharp fa-solid fa-plus"></i></a>
                                                <a href="<?= base_url('/groups/create/' . $phase_item['id']) ?>" title="Agregar Grupo"><i class="fa-sharp fa-solid fa-plus"></i></a>
                                                <a href="<?= base_url('/phases/edit/' . $phase_item['id']) ?>" title="Modificar"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="<?= base_url('/phases/delete/' . $phase_item['id']) ?>" title="Eliminar"><i class="fa-solid fa-trash text-danger"></i></a>
                                            <?php } ?>

                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <h3>No hay Fases Cargadas</h3>
                    <?php endif ?>
                </div>
            </div>
        </div>

    </div>

</body>

</html>