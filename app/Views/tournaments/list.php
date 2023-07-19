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
                            <a href="<?= base_url('/tournaments/create')  ?>" ><button type="button" class="btn btn-primary">Cargar torneo</button></a>
                        </div>
                    <?php } ?>
                    <?php if (!empty($tournaments) && is_array($tournaments)) : ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Fecha de Inicio</th>
                                    <th>Fecha de Finalización</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tournaments as $tournament_item) : ?>
                                    <tr>
                                        <td><?= esc($tournament_item['name']) ?></td>
                                        <td><?= esc($tournament_item['start_date']) ?></td>
                                        <td><?= esc($tournament_item['end_date']) ?></td>
                                        <td>
                                            <a href="<?= base_url('/fixtures/view/' . $tournament_item['id']) ?>" title="Fixture de este torneo"><button type="button" class="btn btn-primary">Fixture</button></a>
                                            <?php if ((isset(session()->id_role))) { ?>
                                                <a href="<?= base_url('/phases/list/' . $tournament_item['id']) ?>" title="Fases de este torneo"><button type="button" class="btn btn-primary">Fases</button></a>
                                            <?php } ?>
                                           
                                            <?php if (session()->id_role != 2 and (isset(session()->id_role))) { ?>
                                                <a href="<?= base_url('/tournaments/edit/' . $tournament_item['id']) ?>" title="Modificar"><button type="button" class="btn btn-success btn-sm"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                                <a href="<?= base_url('/tournaments/delete/' . $tournament_item['id']) ?>" title="Eliminar"><button type="button" class="btn btndanger btn-sm"><i class="fa-solid fa-trash "></i></button></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <h3>No hay Torneos Cargados</h3>
                    <?php endif ?>
                </div>
            </div>
        </div>

    </div>
</body>

</html>